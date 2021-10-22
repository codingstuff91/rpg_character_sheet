<template>
    <b-tab-item label="Jauges">
        <!-- Affichage des jauges variables -->
        <div class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center my-4">
            <h2 class="is-size-5">Santé</h2>
            <b-rate icon-pack="fas"
                size="is-medium"
                :max="degats_contondants_max"
                spaced="true" 
                custom-text="Dégats contondants"
                v-model="degats_contondants">
            </b-rate>
            <b-rate icon-pack="fas"
                size="is-medium"
                :max="degats_aggraves_max"
                spaced="true" 
                custom-text="Dégats aggravés"
                v-model="degats_aggraves">
            </b-rate>
        </div>
        <div class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center mt-4">
            <h2 class="has-text-centered mb-4 is-size-5">Volonté</h2>
            <b-rate icon-pack="fas"
                size="is-medium"
                :max="volonte_max"
                spaced="true" 
                v-model="volonte_actuelle">
            </b-rate>
        </div>
        <div class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center mt-4">
            <h2 class="has-text-centered mb-4 is-size-5">Soif</h2>
            <b-rate icon-pack="fas"
                size="is-medium"
                :max="soif_max"
                spaced="true" 
                v-model="soif">
            </b-rate>
        </div>
    </b-tab-item>
</template>
<script>
import axios from 'axios'

    export default {
        data() {
            return {
               degats_contondants : 7,
               degats_contondants_max : 10,
               degats_aggraves : 2, 
               degats_aggraves_max : 7,
               volonte_max : 6,
               volonte_actuelle : 6,
               soif_max : 5,
               soif : 0
            }
        },
        props: {
            personnage: {
                type: Object
            },
        },
        methods: {
            getJaugeValue(personnage_id, caracteristique, data, data_max) {
                axios.get(`/character/${personnage_id}/${caracteristique}/jauge_level`).then(response =>{
                    this[data] = response.data[0].score
                    this[data_max] = response.data[0].score_max
                })
            }
        },
        async mounted() {
            await this.getJaugeValue(this.personnage.id, 'Soif', 'soif', 'soif_max')
            await this.getJaugeValue(this.personnage.id, 'Volonté', 'volonte_actuelle', 'volonte_max')
            await this.getJaugeValue(this.personnage.id, 'Dégats Contondants', 'degats_contondants', 'degats_contondants_max')
            await this.getJaugeValue(this.personnage.id, 'Dégats Aggravés', 'degats_aggraves', 'degats_aggraves_max')
        },
    }
</script>

<style lang="scss" scoped>

</style>