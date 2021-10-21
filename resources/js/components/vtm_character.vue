<template>
    <div class="container is-widescreen">
        <Navbar/>
        <div class="row justify-content-center">
            <h2>Personnage : </h2>
            <b-tabs>
                <Attributs :personnage="personnage"/>

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
import axios from 'axios';
import Navbar from './Navbar.vue';
import Attributs from './Attributs.vue'

    export default {
        data() {
            return {
                competences_talents : [],
                isCardModalActive : false,
                description_caracteristique : ''
            }
        },
        components: {
            Navbar,
            Attributs
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

        }
    }
</script>
