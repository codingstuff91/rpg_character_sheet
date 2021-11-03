<template>
    <b-tab-item label="Sang">
        <div class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center mt-4">
            <h2 class="has-text-centered mb-4 is-size-5">Soif</h2>
            <b-rate icon-pack="fas"
                :size="size"
                :max="soif_max"
                icon="tint"
                spaced
                v-model="soif">
            </b-rate>
        </div>
        <div class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center mt-4">
            <h2 class="is-size-5 my-4">Informations puissance du sang</h2>
            <div class="columns is-mobile">
                <div class="column">
                    <h2 class="is-size-5">{{ infos_puissance_sang[0].nom }}</h2>
                    <p class="is-size-6">{{ infos_puissance_sang[0].niveau }}</p>
                </div>
                <div class="column">
                    <h2 class="is-size-5">{{ infos_puissance_sang[0].nom }}</h2>
                    <p class="is-size-6">{{ infos_puissance_sang[0].niveau }}</p>
                </div>
            </div>
        </div>
    </b-tab-item>
</template>
<script>
import axios from 'axios'
import CaracteristiquesMixin from '../mixins/caracteristiquesMixin.vue'

    export default {
        data() {
            return {
               soif_max : 5,
               soif : 0,
               size : 'is-medium',
               infos_puissance_sang : []
            }
        },
        props: {
            personnage: {
                type: Object
            },
        },
        mixins: [CaracteristiquesMixin],
        methods: {
            getSoifValue(personnage_id, caracteristique, data, data_max) {
                axios.get(`/character/${personnage_id}/${caracteristique}/jauge_level`).then(response =>{
                    this[data] = response.data[0].score
                    this[data_max] = response.data[0].score_max
                })
            },
            getPuissanceSangValues(personnage_id,caracteristique){
                axios.get(`/character/${personnage_id}/${caracteristique}/levels`).then(response => {
                    this.infos_puissance_sang = response.data
                    console.log(this.infos_puissance_sang);
                })
            },
            getDescription(caracteristique_id){
                this.$emit('get_description',caracteristique_id)
            }
        },
        async mounted() {
            await this.getSoifValue(this.personnage.id, 'Soif', 'soif', 'soif_max')
            await this.getPuissanceSangValues(this.personnage.id, 'Sang')
        },
    }
</script>

<style lang="scss" scoped>

</style>