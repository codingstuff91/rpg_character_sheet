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
                        :max="volonte_max"
                        icon='fist-raised'
                        spaced
                        :size="size"
                        @change="updateJaugeVolonte"
                        v-model="volonte">
                    </b-rate>
                    
                    <b-notification
                        type="is-success"
                        aria-close-label="Close notification"
                        role="alert">
                        <p class="my-2">Utiliser des points de volonté pour :</p>
                        <ul>
                            <li>=> Relancer 3 dés max de tout groupement (pas les dés de soif, ni pour les jets d'humanité et de volonté)</li>
                            <li>=> Pouvoir contrôler son personnage pendant un tour durant une frénésie</li>
                            <li>=> Ignorer le malus de santé "affaibli" du à des dégats de santé pendant un tour</li>
                        </ul>
                    </b-notification>

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
               volonte : 7,
               volonte_max : 10,
               jauge_volonte_id : 0, 
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
            getJaugeValue(personnage_id, caracteristique, data, data_max, jauge_id) {
                axios.get(`/character/${personnage_id}/${caracteristique}/jauge_level`).then(response =>{
                    this[data] = response.data[0].score
                    this[data_max] = response.data[0].score_max
                    this[jauge_id] = response.data[0].caracteristique_id
                })
            },
            updateJaugeVolonte(new_value){
                axios.post(`/character/${this.personnage.id}/${this.jauge_volonte_id}/update_jauge_level`, {
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
            }
        },
        async mounted() {
            await this.getJaugeValue(this.personnage.id, 'Volonté', 'volonte', 'volonte_max', 'jauge_volonte_id')
        },
    }
</script>

<style lang="scss" scoped>

</style>