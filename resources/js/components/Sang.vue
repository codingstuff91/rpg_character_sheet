<template>
    <b-tab-item label="Sang">
        <div class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center mt-4">
            <div class="is-flex is-flex-direction-row">
            <h2 class="has-text-centered mb-4 is-size-5 mr-2">Soif</h2>
                <b-button 
                type="is-danger"
                has-icon
                icon-left="ban"
                size="is-small"
                rounded
                @click="resetSoif">
                Reset
                </b-button>
            </div>
            <b-rate icon-pack="fas"
                :size="size"
                :max="soif_max"
                @change="updateSoif"
                icon="tint"
                spaced
                v-model="soif">
            </b-rate>
        </div>
        <div class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center mt-4">
            <b-notification
                type="is-danger"
                aria-close-label="Close notification"
                role="alert"
                :closable="closable">
                <h2 class="is-size-5">Puissance du sang : {{ infos_puissance_sang[1].niveau }}</h2>
            </b-notification>

            <!-- Affichage bonus coup de sang -->
            <b-message size="is-medium" :closable="closable">
                <template #header>
                    <div class="block is-flex is-justify-content-center is-align-items-center mb-2">
                        <h2 class="is-size-5 has-text-centered mr-2">{{ infos_puissance_sang[2].nom }}</h2>
                        <b-button
                            rounded
                            type="is-danger"
                            size="is-small"
                            icon-pack="fas"
                            icon-left="question-circle"
                            class="ml-2"
                            @click="getDescription(infos_puissance_sang[2].id)"
                        />
                    </div>
                </template>
                <h2 class="is-size-5 has-text-danger has-text-centered">{{ infos_puissance_sang[2].niveau }}</h2> 
            </b-message>

            <!-- Affichage test exaltation -->
            <b-message size="is-medium" :closable="closable">
                <template #header>
                    <div class="block is-flex is-justify-content-center is-align-items-center mb-2">
                        <h2 class="is-size-5 has-text-centered mr-2">{{ infos_puissance_sang[5].nom }}</h2>
                        <b-button
                            rounded
                            type="is-danger"
                            size="is-small"
                            icon-pack="fas"
                            icon-left="question-circle"
                            class="ml-2"
                            @click="getDescription(infos_puissance_sang[5].id)"
                        />
                    </div>
                </template>
                <h2 class="is-size-5 has-text-danger has-text-centered">{{ infos_puissance_sang[5].niveau }}</h2> 
            </b-message>

            <!-- Affichage Pénalité pour se nourrir -->
            <b-message size="is-medium" :closable="closable">
                <template #header>
                    <div class="block is-flex is-justify-content-center is-align-items-center mb-2">
                        <h2 class="is-size-5 has-text-centered mr-2">{{ infos_puissance_sang[6].nom }}</h2>
                        <b-button
                            rounded
                            type="is-danger"
                            size="is-small"
                            icon-pack="fas"
                            icon-left="question-circle"
                            class="ml-2"
                            @click="getDescription(infos_puissance_sang[6].id)"
                        />
                    </div>
                </template>
                <h2 class="is-size-5 has-text-danger has-text-centered">{{ infos_puissance_sang[6].niveau }}</h2> 
            </b-message>

            <!-- Affichage dégats régénérés -->
            <b-message size="is-medium" :closable="closable">
                <template #header>
                    <div class="block is-flex is-justify-content-center is-align-items-center mb-2">
                        <h2 class="is-size-5 has-text-centered mr-2">{{ infos_puissance_sang[3].nom }}</h2>
                        <b-button
                            rounded
                            type="is-danger"
                            size="is-small"
                            icon-pack="fas"
                            icon-left="question-circle"
                            class="ml-2"
                            @click="getDescription(infos_puissance_sang[3].id)"
                        />
                    </div>
                </template>
                <h2 class="is-size-5 has-text-danger has-text-centered">{{ infos_puissance_sang[3].niveau }}</h2> 
            </b-message>

            <!-- Affichage Bonus aux pouvoirs -->
            <b-message size="is-medium" :closable="closable">
                <template #header>
                    <div class="block is-flex is-justify-content-center is-align-items-center mb-2">
                        <h2 class="is-size-5 has-text-centered mr-2">{{ infos_puissance_sang[4].nom }}</h2>
                        <b-button
                            rounded
                            type="is-danger"
                            size="is-small"
                            icon-pack="fas"
                            icon-left="question-circle"
                            class="ml-2"
                            @click="getDescription(infos_puissance_sang[4].id)"
                        />
                    </div>
                </template>
                <h2 class="is-size-5 has-text-danger has-text-centered">{{ infos_puissance_sang[4].niveau }}</h2> 
            </b-message>

            <!-- Affichage score de fléau -->
            <b-message size="is-medium" :closable="closable">
                <template #header>
                    <div class="block is-flex is-justify-content-center is-align-items-center mb-2">
                        <h2 class="is-size-5 has-text-centered mr-2">{{ infos_puissance_sang[7].nom }}</h2>
                        <b-button
                            rounded
                            type="is-danger"
                            size="is-small"
                            icon-pack="fas"
                            icon-left="question-circle"
                            class="ml-2"
                            @click="getDescription(infos_puissance_sang[7].id)"
                        />
                    </div>
                </template>
                <h2 class="is-size-5 has-text-danger has-text-centered">{{ infos_puissance_sang[7].niveau }}</h2> 
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
               soif_max : 5,
               soif : 0,
               size : 'is-large',
               infos_puissance_sang : [],
               closable : false
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

</style>