<template>
    <div class="container is-widescreen">
        <Navbar/>

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

        <div class="row justify-content-center">
            <div class="content-center">
                <InfosGenerales :personnage="personnage"/>
            </div>

            <b-tabs>
                <Attributs :personnage="personnage" @get_description="getDescriptionCaracteristique"/>

                <Capacites :personnage="personnage" @get_description="getDescriptionCaracteristique"/>
            </b-tabs>
        </div>

    </div>
</template>

<script>
import axios from 'axios';
import Navbar from './Navbar.vue';
import Attributs from './Attributs.vue';
import Capacites from './Capacites.vue';
import InfosGenerales from './InfosGenerales.vue';

    export default {
        data() {
            return {
                isCardModalActive : false,
                description_caracteristique : ''
            }
        },
        components: {
            Navbar,
            Attributs,
            Capacites,
            InfosGenerales
        },
        props: {
            personnage: {
                type: Object
            },
        },
        methods: {
            getDescriptionCaracteristique(caracteristique_id) {
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

<style scoped>
.content-center{
    display: flex;
    justify-content: center;
}
</style>
