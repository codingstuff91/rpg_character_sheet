<template>
    <b-tab-item label="Santé">
        <!-- Affichage des jauges variables -->
        <div class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center my-4">
            <!-- Jauge dégats superficiels -->
            <b-message>
                <template #header>
                    <h3 class="is-size-6">Degats contondants (armes à feu, couteaux, coups)</h3>
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
                            @click="resetDegatsContondants">
                            Reset
                        </b-button>
                        <b-rate 
                            icon-pack="fas" 
                            :max="degats_contondants_max"
                            icon='fist-raised'
                            spaced
                            :size="size"
                            @change="updateDegatsContondants"
                            v-model="degats_contondants">
                        </b-rate>
                    </div>
                    <b-notification
                        type="is-warning"
                        aria-close-label="Close notification"
                        role="alert">
                        <p class="my-2"><span class="has-text-weight-bold">Jauge vide =></span> Personnage indemne</p>
                        <p class="my-2"><span class="has-text-weight-bold">Jauge remplie =></span> Personnage affaibli (-2 dès à tout groupement de dès physiques)</p>
                        <p class="my-2"><span class="has-text-weight-bold">Statut Affaibli + dégats =></span> Dégats aggravés + blessure incapacitante</p>
                        <p class="my-2"><span class="has-text-weight-bold">Soin =></span> Dépend de Dégats régénérés / tour (voir onglet Sang)</p>
                    </b-notification>
                </div>            
            </b-message>
            <!-- Jauge dégats superficiels -->
            <b-message>
                <template #header>
                    <h3 class="is-size-6">Degats aggravés (feu, soleil, griffes, crocs)</h3>
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
                            @click="resetDegatsAggraves">
                            Reset
                        </b-button>
                        <b-rate 
                            icon-pack="fas" 
                            :max="degats_aggraves_max"
                            icon="skull-crossbones"
                            spaced
                            :size="size"
                            @change="updateDegatsAggraves"
                            v-model="degats_aggraves">
                        </b-rate>
                    </div>
                    <b-notification
                        type="is-warning"
                        aria-close-label="Close notification"
                        role="alert">
                        <p class="my-2"><span class="has-text-weight-bold">Jauge vide =></span> Personnage indemne</p>
                        <p class="my-2"><span class="has-text-weight-bold">Jauge remplie =></span> Tombée en torpeur</p>
                        <p class="my-2"><span class="has-text-weight-bold">Soin =></span> Attendre prochain coucher de soleil. 3 tests de soif. Un seul dégat soigné par nuit.</p>
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
               degats_contondants : 0,
               degats_contondants_max : 0,
               degats_aggraves : 2, 
               degats_aggraves_max : 7,
               size : 'is-large',
               jauge_degats_contondants_id : 0,
               jauge_degats_aggraves_id : 0
            }
        },
        props: {
            personnage: {
                type: Object
            },
        },
        mixins: [CaracteristiquesMixin],
        methods: {
            getJaugeValue(personnage_id, caracteristique, data, data_max, jauge_id) {
                axios.get(`/character/${personnage_id}/${caracteristique}/jauge_level`).then(response =>{
                    this[data] = response.data[0].score
                    this[data_max] = response.data[0].score_max
                    this[jauge_id] = response.data[0].caracteristique_id
                })
            },
            updateDegatsContondants(new_value){
                axios.post(`/character/${this.personnage.id}/${this.jauge_degats_contondants_id}/update_jauge_level`, {
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
            updateDegatsAggraves(new_value){
                axios.post(`/character/${this.personnage.id}/${this.jauge_degats_aggraves_id}/update_jauge_level`, {
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
            resetDegatsContondants(){
                this.updateDegatsContondants(0)
                this.degats_contondants = 0
            },
            resetDegatsAggraves(){
                this.updateDegatsAggraves(0)
                this.degats_aggraves = 0
            },
        },
        async mounted() {
            await this.getJaugeValue(this.personnage.id, 'Dégats Contondants', 'degats_contondants', 'degats_contondants_max', 'jauge_degats_contondants_id')
            await this.getJaugeValue(this.personnage.id, 'Dégats Aggravés', 'degats_aggraves', 'degats_aggraves_max', 'jauge_degats_aggraves_id')
        },
    }
</script>

<style lang="scss" scoped>

</style>