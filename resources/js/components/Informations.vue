<template>
    <b-tab-item label="Personnage">
        <template #header>
            <img src="/img/character.png" class="mr-2" alt="">
            <span>Personnage</span>
        </template>
        <!-- Modal explication utilisation des points d'XP -->
        <b-modal v-model="isModalExperienceOpen" full-screen>
            <div class="card">
                <div class="card-content">
                    <div class="content">
                        <!-- Affichage explications générales -->
                        <b-notification
                            type="is-info is-light"
                            aria-close-label="Close notification"
                            has-icon
                            icon="question-circle"
                            role="alert">
                            <p class="my-2">Les points d'expérience permettent de faire progresser votre personnage.</p>
                            <p class="my-2">Certaines compétences nécessitent certaines conditions pour etre améliorées (par ex : disciplines).</p>
                            <p class="my-2">En fonction de ce que vous voulez améliorer, cela va couter un certains nombre de points (voir tableau ci-dessous)</p>
                            <img src="/img/tableau_experience.png" alt="tableau_experience">
                        </b-notification>
                        <b-notification
                            type="is-info is-light"
                            aria-close-label="Close notification"
                            has-icon
                            icon="question-circle"
                            role="alert">
                            <p class="my-2">A l'issue d'une partie chaque joueur obtiendra 1 à 5 points d'XP.</p>
                            <p class="my-2">1 point automatiquement pour tous les joueurs à la fin de la partie.</p>
                            <p class="my-2">1 point pour l'apprentissage du personnage</p>
                            <p class="my-2">1 à 2 points pour une bonne interprétation du personnage, bon comportement et absence de meta-gaming</p>
                            <p class="my-2">1 point pour un acte héroique ou faisant avancer considérablement le scénario</p>
                        </b-notification>
                    </div>
                    <footer class="modal-card-foot">
                        <b-button
                            label="Fermer"
                            @click="isModalExperienceOpen = false" />
                    </footer>
                </div>
            </div>
        </b-modal>   
        <!-- Affichage des Infos générales -->
        <b-collapse
            class="panel"
            animation="slide"
            v-model="isInfosTabOpen">
            <template #trigger>
                <div
                    class="panel-heading is-flex is-justify-content-space-between is-align-items-center"
                    role="button"
                    aria-controls="contentIdForA11y2">
                    <strong>Personnage</strong>
                </div>
            </template>
            <div class="panel-block columns is-mobile">
                <div class="column">
                    <div class="style-block">
                        <b-button 
                            icon-left="question-circle" 
                            size="is-small"
                            type="is-danger"
                            class="mr-2"
                            rounded
                            @click="getDescription(generalInformations[0].id)"> 
                            {{ generalInformations[0].nom }} : 
                        </b-button>
                        <h2 class="mb-4 is-size-6">{{ generalInformations[0].niveau }}</h2>
                    </div>
                    <div class="style-block">
                        <b-button 
                            icon-left="question-circle" 
                            size="is-small"
                            type="is-danger"
                            class="mr-2"
                            rounded
                            @click="getDescription(generalInformations[3].id)"> 
                            {{ generalInformations[3].nom }} : 
                        </b-button>
                        <h2 class="mb-4 is-size-6">{{ generalInformations[3].niveau }}</h2>
                    </div>
                    <div class="style-block">
                        <b-button 
                            icon-left="question-circle" 
                            size="is-small"
                            type="is-danger"
                            class="mr-2"
                            rounded
                            @click="getDescription(generalInformations[2].id)"> 
                            {{ generalInformations[2].nom }} : 
                        </b-button>
                        <h2 class="mb-4 is-size-6">{{ generalInformations[2].niveau }}</h2>
                    </div>
                    <div class="style-block">
                        <b-button 
                            icon-left="question-circle" 
                            size="is-small"
                            type="is-danger"
                            class="mr-2"
                            rounded
                            @click="getDescription(generalInformations[4].id)"> 
                            {{ generalInformations[4].nom }} : 
                        </b-button>
                        <h2 class="mb-4 is-size-6">{{ generalInformations[4].niveau }}</h2>
                    </div>
                    <div class="style-block">
                        <b-button 
                            icon-left="question-circle" 
                            size="is-small"
                            type="is-danger"
                            class="mr-2"
                            rounded
                            @click="getDescription(generalInformations[5].id)"> 
                            {{ generalInformations[5].nom }} : 
                        </b-button>
                        <h2 class="mb-4 is-size-6">{{ generalInformations[5].niveau }}</h2>
                    </div>
                </div>
                <div class="column">

                </div>
            </div>
        </b-collapse>

        <!-- Partie Experience -->
        <b-collapse
            class="panel"
            animation="slide"
            v-model="isExperienceTabOpen">
            <template #trigger>
                <div
                    class="panel-heading is-flex is-justify-content-space-between is-align-items-center"
                    role="button"
                    aria-controls="contentIdForA11y2">
                    <strong>Experience (XP)</strong>
                    <img src="/img/experience.png">
                    <b-button 
                        class="mx-2" 
                        type="is-info"
                        size="is-small" 
                        icon-left="question-circle"
                        @click="isModalExperienceOpen = !isModalExperienceOpen">
                        Aide
                    </b-button>
                </div>
            </template>
            <div class="panel-block is-flex is-align-items-center is-justify-content-space-evenly">
                <div class="is-flex is-flex-direction-column is-align-items-center is-justify-content-center">
                    <h2 class="is-size-4">{{ experience[0].niveau }} points</h2>
                </div>
            </div>
        </b-collapse>       
        
        <!-- Partie ambition et désir -->
        <b-collapse
            class="panel"
            animation="slide"
            v-model="isAmbitionTabOpen">
            <template #trigger>
                <div
                    class="panel-heading is-flex is-justify-content-space-between is-align-items-center"
                    role="button"
                    aria-controls="contentIdForA11y2">
                    <strong>Ambition / Désir</strong>
                </div>
            </template>
            <div class="panel-block is-flex is-align-items-center is-justify-content-space-evenly">
                <div class="is-flex is-flex-direction-column  is-align-items-center is-justify-content-center">
                    <b-button 
                        icon-left="question-circle" 
                        size="is-small"
                        type="is-danger"
                        rounded
                        @click="getDescription(generalInformations[6].id)"> 
                        {{ generalInformations[6].nom }}
                    </b-button>
                    <h2 class="mb-4 is-size-5">{{ generalInformations[6].niveau }}</h2>
                </div>
                <div class="is-flex is-flex-direction-column is-align-items-center is-justify-content-center">
                    <b-button 
                        icon-left="question-circle" 
                        size="is-small"
                        type="is-danger"
                        rounded
                        @click="getDescription(generalInformations[7].id)"> 
                        {{ generalInformations[7].nom }}
                    </b-button>
                    <h2 class="mb-4 is-size-5">{{ generalInformations[7].niveau }}</h2>
                </div>
            </div>
        </b-collapse>

    </b-tab-item>
</template>
<script>
import axios from 'axios'
import CaracteristiquesMixin from '../mixins/caracteristiquesMixin.vue'

    export default {
        data() {
            return {
                generalInformations : [],
                isInfosTabOpen : true,
                isAmbitionTabOpen : true,
                isExperienceTabOpen : true,
                experience : [],
                isModalExperienceOpen : false
            }
        },
        props: {
            personnage: {
                type: Object
            },
        },
        mixins: [CaracteristiquesMixin],
        methods: {
            getDescription(info_id) {
                this.$emit('get_description',info_id)
            }
        },
        async mounted() {
            await this.getCaracteristiquesLevels(this.personnage.id, 'Infos_générales', 'generalInformations');
            await this.getCaracteristiquesLevels(this.personnage.id, 'Experience', 'experience');
        }
    }
</script>

<style scoped>
.style-block{
    display : flex;
    justify-content: start;
    align-self: center;
}
</style>