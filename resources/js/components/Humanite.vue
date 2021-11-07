<template>
    <b-tab-item label="Humanité">
        <!-- Affichage des jauges variables -->
        <div class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center my-4">
            <!-- Jauge de volonté -->
            <b-message>
                <template #header>
                    <h3 class="is-size-6">{{ scores[0].nom }}</h3>
                </template>
                <div class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center my-4">
                    <b-rate 
                        icon-pack="fas" 
                        :max="humanite_max"
                        icon='cross'
                        spaced
                        show-score="true"
                        :size="size"
                        disabled
                        v-model="scores[0].niveau">
                    </b-rate>
                    <b-notification
                        type="is-warning"
                        aria-close-label="Close notification"
                        has-icon
                        role="alert">
                        <p class="my-2"><span class="has-text-weight-bold">Humanité à 0 =></span> Le personnage devient une bete sanguinaire</p>
                        <p class="my-2"><span class="has-text-weight-bold">Perte d'1 point d'humanité =></span> Echec au jet de remords</p>
                    </b-notification>
                </div>            
            </b-message>
            <b-message>
                <template #header>
                    <h3 class="is-size-6">{{ scores[1].nom }}</h3>
                </template>
                <div class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center my-4">
                    <div class="is-flex is-flex-direction-row is-align-items-center">
                        <b-button
                            class="mr-2"
                            type="is-danger"
                            has-icon
                            icon-left="ban"
                            size="is-small"
                            rounded
                            @click="resetScoreFletrissures">
                            Reset
                        </b-button>
                        <b-rate 
                            icon-pack="fas" 
                            :max="fletrissures_max"
                            icon='fist-raised'
                            spaced
                            :size="size"
                            @change="updateScoreFletrissures"
                            v-model="scores[1].niveau">
                        </b-rate>
                    </div>
                    <b-notification
                        type="is-warning"
                        aria-close-label="Close notification"
                        has-icon
                        role="alert">
                        <p class="my-2"><span class="has-text-weight-bold">Gain de flétrissures =></span> Le personnage agit contre une de ses convictions</p>
                        <p class="my-2"><span class="has-text-weight-bold">+1 flétrissure =></span> Si Acte bestial</p>
                    </b-notification>
                    <b-notification
                        type="is-info"
                        aria-close-label="Close notification"
                        has-icon
                        role="alert">
                        <p class="my-2"><span class="has-text-weight-bold">Jet de remords réussi =></span> Jauge remise à 0</p>
                    </b-notification>
                </div>            
            </b-message>
        </div>
    </b-tab-item>
</template>
<script>
import axios from 'axios'
import CaracteristiquesMixin from '../mixins/caracteristiquesMixin.vue'

    export default {
        data() {
            return {
               humanite_max : 10,
               humanite : 7,
               scores : [],
               size : 'is-large'
            }
        },
        computed: {
            fletrissures_max() {
                return this.humanite_max - this.scores[0].niveau
            }
        },
        props: {
            personnage: {
                type: Object
            },
        },
        mixins: [CaracteristiquesMixin],
        methods: {
            getDescription(caracteristique_id){
                this.$emit('get_description',caracteristique_id)
            },
            updateScoreFletrissures(new_value){
                axios.post(`/character/${this.personnage.id}/${this.scores[1].id}/update`, {
                    new_value
                }).then(response => {
                    console.log(response.data);
                }).catch(error => {
                    console.log(error);
                    this.$buefy.toast.open({
                        message: "Erreur lors de la de mise à jour",
                        type: 'is-danger'
                    })                    
                })
            },
            resetScoreFletrissures(){
                this.updateScoreFletrissures(0)
                this.scores[1].niveau = 0
            }
        },
        async mounted() {
            await this.getCaracteristiquesLevels(this.personnage.id, 'Humanité', 'scores')
        },
    }
</script>

<style lang="scss" scoped>

</style>