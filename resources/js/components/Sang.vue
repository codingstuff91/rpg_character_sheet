<template>
    <b-tab-item label="Sang">
        <div class="columns is-mobile">
            <div class="column is-6">
                <div :class="style">
                    <h3 class="has-text-centered is-size-4 section_header">Niveau soif</h3>
                    <b-button 
                        type="is-danger"
                        has-icon
                        icon-left="ban"
                        size="is-small"
                        rounded
                        @click="resetSoif">
                        Reset
                    </b-button>
                    <b-rate icon-pack="fas"
                        :size="size"
                        :max="soif_max"
                        @change="updateSoif"
                        icon="tint"
                        spaced
                        v-model="soif">
                    </b-rate>
                </div>
            </div>
            <div class="column is-6">
                <div :class="style">
                    <h3 class="has-text-centered is-size-4 section_header">Puiss. sang</h3>
                    <b-rate icon-pack="fas"
                        :size="size"
                        :max="soif_max"
                        @change="updateSoif"
                        icon="tint"
                        spaced
                        v-model="infos_puissance_sang[1].niveau">
                    </b-rate>
                </div>
            </div>
        </div>

        <div class="columns is-mobile">
            <div class="column is-6">
                <div :class="style">
                    <!-- Valeur test de soif -->
                    <b-button 
                        icon-left="question-circle" 
                        size="is-small"
                        type="is-danger"
                        rounded>
                        {{ infos_puissance_sang[5].nom }}
                    </b-button>
                    <h2 class="is-size-5 has-text-centered">{{ infos_puissance_sang[5].niveau }}</h2>

                    <!-- Degats régénérés -->
                    <b-button 
                        icon-left="question-circle" 
                        size="is-small"
                        type="is-danger"
                        class="mt-4"
                        rounded>
                        {{ infos_puissance_sang[3].nom }}
                    </b-button>
                    <h2 class="is-size-5 has-text-centered">{{ infos_puissance_sang[3].niveau }}</h2>
                    
                    <!-- Valeur coup de sang -->
                    <b-button 
                        icon-left="question-circle" 
                        size="is-small"
                        type="is-danger"
                        class="mt-4"
                        rounded>
                        {{ infos_puissance_sang[2].nom }}
                    </b-button>
                    <h2 class="is-size-5 has-text-centered">{{ infos_puissance_sang[2].niveau }}</h2>
                </div>
            </div>
            <div class="column is-6">
                <div :class="style">
                    <!-- Penalité pour se nourrir -->
                    <b-button 
                        icon-left="question-circle" 
                        size="is-small"
                        type="is-danger"
                        rounded>
                        {{ infos_puissance_sang[6].nom }}
                    </b-button>
                    <h2 class="is-size-5 has-text-centered">{{ infos_puissance_sang[6].niveau }}</h2>

                    <!-- Bonus aux pouvoirs -->
                    <b-button 
                        icon-left="question-circle" 
                        size="is-small"
                        type="is-danger"
                        class="mt-4"
                        rounded>
                        {{ infos_puissance_sang[4].nom }}
                    </b-button>
                    <h2 class="is-size-5 has-text-centered">{{ infos_puissance_sang[4].niveau }}</h2>

                    <!-- Score de fléau -->
                    <b-button 
                        icon-left="question-circle" 
                        size="is-small"
                        type="is-danger"
                        class="mt-4"
                        rounded>
                        {{ infos_puissance_sang[7].nom }}
                    </b-button>
                    <h2 class="is-size-5 has-text-centered">{{ infos_puissance_sang[7].niveau }}</h2>
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
               size : 'is-large',
               infos_puissance_sang : [],
               closable : false,
               style : 'is-flex is-flex-direction-column is-justify-content-center is-align-items-center'
            }
        },
        props: {
            personnage: {
                type: Object
            },
        },
        mixins: [CaracteristiquesMixin],
        methods: {
            getInfosSang(personnage_id,caracteristique){
                axios.get(`/character/${personnage_id}/${caracteristique}/levels`).then(response => {
                    this.infos_puissance_sang = response.data
                    this.soif = response.data[0].niveau
                })
            },
            getDescription(caracteristique_id){
                this.$emit('get_description',caracteristique_id)
            },
            updateSoif(new_value){
                axios.post(`/character/${this.personnage.id}/${this.infos_puissance_sang[0].id}/update`, {
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
            resetSoif(){
                axios.post(`/character/${this.personnage.id}/${this.infos_puissance_sang[0].id}/update`, {
                    new_value : 0
                }).then(response => {
                    console.log(response.data);
                    this.soif = 0
                }).catch(error => {
                    console.log(error);
                    this.$buefy.toast.open({
                        message: "Erreur lors de la de mise à jour",
                        type: 'is-danger'
                    })                    
                })
            }
        },
        async mounted() {
            await this.getInfosSang(this.personnage.id, 'Sang')
        },
    }
</script>

<style lang="scss" scoped>
.section_header{
    font-family: 'Vampiro One', cursive;
    color:#f14668;
}
</style>