<template>
    <b-tab-item label="Jauges">
        <div class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center mt-4">
            <h2 class="has-text-centered mb-4 is-size-5">Volonté</h2>
            <b-rate icon-pack="fas"
                icon='fist-raised'
                :size="size"
                :max="volonte_max"
                spaced="true" 
                v-model="volonte_actuelle">
            </b-rate>
        </div>
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
            <b-button size="is-small"
                type="is-danger"
                icon-left="question-circle"
                rounded
                @click="getDescription(humanite[0].id)">
            </b-button>
            <h2 class="has-text-centered mb-4 is-size-5">Humanité</h2>
            <b-rate icon-pack="fas"
                :size="size"
                :max="10"
                show-score="true"
                icon="user-alt"
                spaced
                disabled
                v-model="humanite[0].niveau">
            </b-rate>
        </div>
    </b-tab-item>
</template>
<script>
import axios from 'axios'
import CaracteristiquesMixin from '../mixins/caracteristiquesMixin.vue'

    export default {
        data() {
            return {
               volonte_max : 6,
               volonte_actuelle : 6,
               soif_max : 5,
               humanite : [],
               soif : 0,
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
            await this.getJaugeValue(this.personnage.id, 'Soif', 'soif', 'soif_max')
            await this.getJaugeValue(this.personnage.id, 'Volonté', 'volonte_actuelle', 'volonte_max')
            await this.getCaracteristiquesLevels(this.personnage.id, 'Humanité', 'humanite')
        },
    }
</script>

<style lang="scss" scoped>

</style>