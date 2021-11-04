<template>
    <b-tab-item label="Contacts/Alliés">
        <!-- modal affichage explication des alliés -->
        <b-modal v-model="isModalAlliesActive" full-screen>
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
                            <p class="my-2">Les alliés sont des humains qui aident votre personnage. De la famille, des amis ou même une organisation mortelle</p>
                            <p class="my-2">Ils ne peuvent (ou veulent) aider votre personnage qu'à un certain point.</p>
                        </b-notification>
                        <!-- Affichage explication critere efficacité -->
                        <b-notification
                            type="is-info is-light"
                            aria-close-label="Close notification"
                            has-icon
                            icon="question-circle"
                            role="alert">
                            <h2 class="my-2">Efficacité</h2>
                            <p class="my-2">Résume les capacités globales de l'allié concerné. Ce critère va de 1 à 4</p>
                            <p class="my-2">1 : Mortel faible, probablement inutile en situation violente ou potentiellement violente</p>
                            <p class="my-2">2 : Mortel moyen ou groupe soudé de mortels faibles (gamins de quartier ou branche locale d'ONG)</p>
                            <p class="my-2">3 : Mortel doué ou groupe dangereux de mortels moyens (gang de rue, entourage d'une célébrité, branche locale d'un syndicat ouvrier)</p>
                            <p class="my-2">4 : Mortel redoutable, mortel doué possédant d'autres pouvoirs surnaturels (goule, équipe de sécurité privée, contingents d'avocats)</p>
                        </b-notification>
                        <!-- Affichage explication critere efficacité -->
                        <b-notification
                            type="is-info is-light"
                            aria-close-label="Close notification"
                            has-icon
                            icon="question-circle"
                            role="alert">
                            <h2 class="my-2">Fiabilité</h2>
                            <p class="my-2">Résume à quel point votre personnage peut compter sur cet allié.</p>
                            <p class="my-2">1 : Quand on fait appel à lui il se montre une fois sur deux.</p>
                            <p class="my-2">2 : Quand on fait appel à lui, il arrive entre 1 et 10 heures plus tard (lancer 1D10)</p>
                            <p class="my-2">3 : Quand on fait appel à lui, il arrive le plus vite possible</p>
                        </b-notification>
                    </div>
                    <footer class="modal-card-foot">
                        <b-button
                            label="Fermer"
                            @click="isModalAlliesActive = false" />
                    </footer>
                </div>
            </div>
        </b-modal>
        <!-- modal affichage explication des contacts -->
        <b-modal v-model="isModalContactsActive" full-screen>
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
                            <p class="my-2">Les contacts sont des humains que connait votre personnage dans beaucoup de milieux différents.</p>
                            <p class="my-2">Les contacts peuvent fournir des informations dans leurs domains d'expertise, et peuvent vouloir échanger des faveurs de toute sorte.</p>
                            <p class="my-2">Un contact est une personne en bonne position pour obtenir des informations. Il peut etre un policier opérateur radio pour les patrouilles ou un membre de la mairie</p>
                        </b-notification>
                        <!-- Affichage explication critere efficacité -->
                        <b-notification
                            type="is-info is-light"
                            aria-close-label="Close notification"
                            has-icon
                            icon="question-circle"
                            role="alert">
                            <h2 class="my-2">Efficacité</h2>
                            <p class="my-2">Résume le niveau du contact. Ce critère va de 1 à 3</p>
                            <p class="my-2">1 : Il peut obtenir ou faire quelque chose de d'ordinaire, de courant ou bon marché. Exemples : dealer de cannabis, vendeur de voitures</p>
                            <p class="my-2">2 : Il peut obtenir quelque chose d'utile. Exemples : vendeur d'armes ou un vétérinaire</p>
                            <p class="my-2">3 : Il peut faire quelque chose de difficile ou obtenir quelque de cher. Exemples : expert en systeme de sécurité, lieutenant de police</p>
                        </b-notification>
                        <!-- Affichage explication critere efficacité -->
                    </div>
                    <footer class="modal-card-foot">
                        <b-button
                            label="Fermer"
                            @click="isModalContactsActive = false" />
                    </footer>
                </div>
            </div>
        </b-modal>
        <!-- Affichage des alliés -->
        <b-collapse
            class="panel"
            animation="slide"
            v-model="AlliesTabOpen">
            <template #trigger>
                <div
                    class="panel-heading is-flex is-justify-content-space-between is-align-items-center"
                    role="button"
                    aria-controls="contentIdForA11y2">
                    <strong>Allies</strong>
                    <b-rate 
                        icon-pack="fas" 
                        :max="count_allies"
                        icon="skull-crossbones"
                        spaced
                        :size="size"
                        v-model="count_allies">
                    </b-rate>
                </div>
            </template>
            <div class="panel-block is-flex is-flex-direction-column is-justify-content-center">
                <b-button 
                    class="my-4" 
                    type="is-info" 
                    @click="isModalAlliesActive = !isModalAlliesActive">
                    Aide
                </b-button>

                <b-message v-for="allie in allies" :key="allie.nom">
                    <template #header>
                        <h3 class="is-size-6">{{ allie.nom }}</h3>
                    </template>
                    <div class="">
                        <h2>Efficacité : {{ allie.efficacité }}</h2>
                        <h2>Fiabilité : {{ allie.fiabilité }}</h2>
                        <h2 class="my-2" v-html="allie.details"></h2>
                    </div>            
                </b-message>
            </div>
        </b-collapse>

        <!-- Affichage des contacts -->
        <b-collapse
            class="panel"
            animation="slide"
            v-model="ContactsTabOpen">
            <template #trigger>
                <div
                    class="panel-heading is-flex is-justify-content-space-between is-align-items-center"
                    role="button"
                    aria-controls="contentIdForA11y2">
                    <strong>Contacts</strong>
                    <b-rate 
                        icon-pack="fas" 
                        :max="count_contacts"
                        icon="skull-crossbones"
                        spaced
                        :size="size"
                        v-model="count_contacts">
                    </b-rate>
                </div>
            </template>
            <div class="panel-block is-flex is-flex-direction-column is-justify-content-center">
                <b-button 
                    class="my-4" 
                    type="is-info" 
                    @click="isModalContactsActive = !isModalContactsActive">
                    Aide
                </b-button>
                <b-message v-for="contact in contacts" :key="contact.nom">
                    <template #header>
                        <h3 class="is-size-6">{{ contact.nom }}</h3>
                    </template>
                    <div class="">
                        <h2>Métier : {{ contact.métier }}</h2>
                        <h2>Efficacité : {{ contact.efficacité }}</h2>
                        <h2 class="my-2" v-html="contact.details"></h2>
                    </div>            
                </b-message>
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
                AlliesTabOpen : false,
                ContactsTabOpen : false,
                count_allies : 2,
                count_contacts : 3,
                size : 'is-small',
                isModalAlliesActive : false,
                isModalContactsActive : false,
                allies : [{
                    'nom' : 'John',
                    'métier' : 'Agent de police',
                    'efficacité' : 2,
                    'fiabilité' : 'Forte',
                    'details' : "<p>Un descriptif plus détaillé de la relation avec cet allié</p><p>Ne pas oublier de mettre plusieurs explications</p>"
                }],
                contacts : [{
                    'nom' : 'Smoky',
                    'métier' : 'Lieutenant de police',
                    'efficacité' : 3,
                    'details' : "<p>Un descriptif plus détaillé de la relation avec cet allié</p><p>Ne pas oublier de mettre plusieurs explications</p>"
                }]
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
            await this.getJaugeValue(this.personnage.id, 'Dégats Contondants', 'degats_contondants', 'degats_contondants_max')
            await this.getJaugeValue(this.personnage.id, 'Dégats Aggravés', 'degats_aggraves', 'degats_aggraves_max')
        },
    }
</script>

<style lang="scss" scoped>

</style>