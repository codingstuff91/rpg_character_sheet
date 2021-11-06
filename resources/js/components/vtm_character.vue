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
            <b-tabs>
                <Informations :personnage="personnage" @get_description="getDescriptionCaracteristique"/>

                <Attributs :personnage="personnage" @get_description="getDescriptionCaracteristique"/>

                <Capacites :personnage="personnage" @get_description="getDescriptionCaracteristique"/>
                
                <Humanite :personnage="personnage" @get_description="getDescriptionCaracteristique"/>

                <Sante :personnage="personnage" @get_description="getDescriptionCaracteristique"/>

                <Volonte :personnage="personnage" @get_description="getDescriptionCaracteristique"/>

                <Sang :personnage="personnage" @get_description="getDescriptionCaracteristique"/>
                                
                <Disciplines :personnage="personnage"/>

                <AvantagesHandicaps :personnage="personnage"/>
                
                <ContactsAllies :personnage="personnage"/>
                
                <AttachesConvictions :personnage="personnage"/>
            </b-tabs>
        </div>

    </div>
</template>

<script>
import axios from 'axios';
import Navbar from './Navbar.vue';
import Attributs from './Attributs.vue';
import Capacites from './Capacites.vue';
import Disciplines from './Disciplines.vue';
import AvantagesHandicaps from './AvantagesHandicaps.vue';
import Sang from './Sang.vue';
import Sante from './Sante.vue';
import Volonte from './Volonte.vue';
import ContactsAllies from './ContactsAllies.vue';
import Informations from './Informations.vue';
import AttachesConvictions from './AttachesConvictions.vue';
import Humanite from './Humanite.vue';

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
            Disciplines,
            AvantagesHandicaps,
            Sang,
            Sante,
            Volonte,
            ContactsAllies,
            Informations,
            AttachesConvictions,
            Humanite
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

        }
    }
</script>

<style scoped>
.content-center{
    display: flex;
    justify-content: center;
}
</style>