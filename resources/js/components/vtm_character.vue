<template>
    <div class="container is-widescreen">
        <Navbar/>
        <div class="row justify-content-center">
            <h2>Personnage : </h2>
            <b-tabs>
                <b-tab-item label="Attributs / Capacités">
                    <!-- Affichage des attributs -->
                    <h1 class="has-text-centered is-size-4">Attributs</h1>
                    <div class="columns is-mobile">
                        <div class="column is-4">
                            <h2 class="has-text-centered mb-4 is-size-5">Physiques</h2>
                            <div class="my-4" v-for="attribut in attributs_physiques" :key="attribut.id">
                                <h3 class="has-text-centered" @click="getDescription(attribut.id)">{{ attribut.nom }}</h3>
                                <b-rate icon-pack="fas" v-model="attribut.niveau"></b-rate>
                            </div>
                        </div>
                        <div class="column is-4">
                            <h2 class="has-text-centered mb-4 is-size-5">Sociaux</h2>
                            <div class="my-4" v-for="attribut in attributs_sociaux" :key="attribut.id">
                                <h3 class="has-text-centered" @click="getDescription(attribut.id)">{{ attribut.nom }}</h3>
                                <b-rate icon-pack="fas" v-model="attribut.niveau"></b-rate>
                            </div>
                        </div>
                        <div class="column is-4">
                            <h2 class="has-text-centered mb-4 is-size-5">Mentaux</h2>
                            <div class="my-4" v-for="attribut in attributs_mentaux" :key="attribut.id">
                                <h3 class="has-text-centered" @click="getDescription(attribut.id)">{{ attribut.nom }}</h3>
                                <b-rate icon-pack="fas" v-model="attribut.niveau"></b-rate>
                            </div>
                        </div>
                    </div>
                    <!-- Affichage des compétences -->
                    <h1 class="has-text-centered is-size-4">Compétences</h1>
                    <div class="columns is-mobile">
                        <div class="column is-4">
                            <h2 class="has-text-centered mb-4 is-size-5">Talents</h2>
                            <div v-for="competence in competences_talents" :key="competence.id">
                                <h3 class="has-text-centered" @click="getDescription(competence.id)">{{ competence.nom }}</h3>
                                <b-rate icon-pack="fas" v-model="competence.niveau"></b-rate>
                            </div>
                        </div>
                    </div>
                </b-tab-item>

                <b-tab-item label="Avantages">
                    
                </b-tab-item>

                <b-tab-item label="Vertus">

                </b-tab-item>
            </b-tabs>
        </div>
        <!-- modal affichage description caracteristique -->
        <b-modal v-model="isCardModalActive" full-screen>
            <div class="card">
                <div class="card-content">
                    <div class="content" v-html="description_caracteristique">
                    </div>
                    <footer class="modal-card-foot">
                        <b-button
                            label="Close"
                            @click="isCardModalActive = false" />
                    </footer>
                </div>
            </div>
        </b-modal>
    </div>
</template>

<script>
import Navbar from './Navbar.vue';
import axios from 'axios';

    export default {
        data() {
            return {
                attributs_physiques : [],
                attributs_sociaux : [],
                attributs_mentaux: [],
                competences_talents : [],
                isCardModalActive : false,
                description_caracteristique : ''
            }
        },
        components: {
            Navbar,
        },
        props: {
            personnage: {
                type: Object
            },
        },
        methods: {
            getCaracteristiquesLevels(personnage_id, category_name, results){
                axios.get(`/character/${personnage_id}/${category_name}/levels`).then(response => {
                    this[results] =  response.data
                })
            },
            getDescription(caracteristique_id) {
                axios.get('/description/' + caracteristique_id).then(response => {
                    this.description_caracteristique = response.data
                    this.isCardModalActive = true
                })
            }
        },
        async mounted(){
            await this.getCaracteristiquesLevels(this.personnage.id, 'Attributs_physiques', 'attributs_physiques')
            await this.getCaracteristiquesLevels(this.personnage.id, 'Attributs_mentaux', 'attributs_mentaux')
            await this.getCaracteristiquesLevels(this.personnage.id, 'Attributs_sociaux', 'attributs_sociaux')
        }
    }
</script>
