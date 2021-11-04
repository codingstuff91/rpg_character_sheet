<template>
    <b-tab-item label="Volonté">
        <!-- Affichage des jauges variables -->
        <div class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center my-4">
            <!-- Jauge de volonté -->
            <b-message>
                <template #header>
                    <h3 class="is-size-6">Points de volonté</h3>
                </template>
                <div class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center my-4">
                    <b-rate 
                        icon-pack="fas" 
                        :max="degats_contondants_max"
                        icon='fist-raised'
                        spaced
                        :size="size"
                        v-model="degats_contondants">
                    </b-rate>
                    
                    <b-notification
                        type="is-warning"
                        aria-close-label="Close notification"
                        role="alert">
                        <p class="my-2"><span class="has-text-weight-bold">Jauge vide =></span> Statut affaibli (-2 dés à tout groupement social ou mental)</p>
                    </b-notification>

                    <b-notification
                        type="is-info"
                        aria-close-label="Close notification"
                        role="alert">
                        <h2 class="is-size-6 has-text-weight-bold mt-4">Gagner des points de volonté</h2>
                        <ul>
                            <li>=> Accomplir tache pour faire avancer son désir personnel</li>
                            <li>=> Interpréter correctement un triomphe brutal, échec bestial, frénésie ou une compulsion</li>
                        </ul>
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
               degats_contondants : 7,
               degats_contondants_max : 10,
               degats_aggraves : 2, 
               degats_aggraves_max : 7,
               size : 'is-large'
            }
        },
        props: {
            personnage: {
                type: Object
            },
        },
        mixins: [CaracteristiquesMixin],
        methods: {
            getJaugeValue(personnage_id, caracteristique, data, data_max) {
                axios.get(`/character/${personnage_id}/${caracteristique}/jauge_level`).then(response =>{
                    this[data] = response.data[0].score
                    this[data_max] = response.data[0].score_max
                })
            },
            getDescription(caracteristique_id){
                this.$emit('get_description',caracteristique_id)
            }
        },
        async mounted() {
            await this.getJaugeValue(this.personnage.id, 'Dégats Contondants', 'degats_contondants', 'degats_contondants_max')
            await this.getJaugeValue(this.personnage.id, 'Dégats Aggravés', 'degats_aggraves', 'degats_aggraves_max')
        },
    }
</script>

<style lang="scss" scoped>

</style>