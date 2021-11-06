<template>
    <b-tab-item label="Attaches / Convictions">
        <!-- modal affichage explication des attaches -->
        <b-modal v-model="isModalAttachesActive" full-screen>
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
                            <p class="my-2">Une attache est un humain représentant ce à quoi votre personnage attachait de l'importance de son vivant, une personne qui semble incarner l'une de ses convictions.</p>
                            <p class="my-2">Les attaches relient le personnage à son humanité et l'aident à la conserver en termes de mécaniques de jeu.</p>
                        </b-notification>
                        <b-notification
                            type="is-warning is-light"
                            aria-close-label="Close notification"
                            has-icon
                            icon="exclamation-triangle"
                            role="alert">
                            <p class="my-2">Si le personnage perd cette personne, il perd également la conviction qui était liée à elle.</p>
                        </b-notification>
                        <b-notification
                            type="is-info is-light"
                            aria-close-label="Close notification"
                            has-icon
                            icon="question-circle"
                            role="alert">
                            <p class="my-2">Une attache peut être l'un des exemples suivants : </p>
                            <ul>
                                <li>Le conjoint, l'amant ou le parent humain encore en vie du personnage</li>
                                <li>L'enfant humain ou un descendant de la lignée du personnage</li>
                                <li>Un humain qui ressemble trait pour trait à quelqu'un que le personnage aimait de son vivant</li>
                                <li>Un humain appartenant à la famille de quelqu'un que le personnage a tué</li>
                                <li>Quelqu'un que le personnage a fini par reconnaitre comme l'un des rares bons cœurs dans le monde, même à ses yeux</li>
                            </ul>
                            <p class="my-2">Les attaches relient le personnage à son humanité et l'aident à la conserver en termes de mécaniques de jeu.</p>
                        </b-notification>
                    </div>
                    <footer class="modal-card-foot">
                        <b-button
                            label="Fermer"
                            @click="isModalAttachesActive = false" />
                    </footer>
                </div>
            </div>
        </b-modal>
        <!-- modal affichage explication des convictions -->
        <b-modal v-model="isModalConvictionsActive" full-screen>
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
                            <p class="my-2">Ce sont les valeurs centrales d'un personnage, un ensemble de principes moraux qui renforcent des actions contre la dégénérescence de la bête..</p>
                            <p class="my-2">Ce sont des croyances fortes concernant des thèmes qui ont des chances d'être abordés en jeu.</p>
                            <p class="my-2">Le meurtre, l'amour, la loyauté, les grands idéaux, les principes politiques et les codes religieux sont tous de bonnes bases pour des convictions.</p>
                            <p class="my-2">Une conviction peut se résumer à l'aide d'une phrase comme par exemple</p>
                            <ul>
                                <li>Tu ne tueras point</li>
                                <li>Ne tue que les scélérats ou les non croyants, qu'en combat à la loyale, qu'en légitime défense</li>
                                <li>N'expose jamais d'enfant a la violence</li>
                                <li>Aime toujours ton prochain comme toi même</li>
                                <li>La désobeisance est un deshonneur</li>
                                <li>La désobeisance est un deshonneur</li>
                                <li>Le courage est la plus noble des vertus</li>
                            </ul>
                        </b-notification>
                    </div>
                    <footer class="modal-card-foot">
                        <b-button
                            label="Fermer"
                            @click="isModalConvictionsActive = false" />
                    </footer>
                </div>
            </div>
        </b-modal>
        <!-- Affichage des attaches -->
        <b-collapse
            class="panel"
            animation="slide"
            v-model="isAttachesTabOpen">
            <template #trigger>
                <div
                    class="panel-heading"
                    role="button"
                    aria-controls="contentIdForA11y2">
                    <strong>Attaches</strong>
                </div>
            </template>
            <div class="panel-block is-flex is-flex-direction-column">
                <b-button 
                    class="my-1" 
                    type="is-info" 
                    icon-left="question-circle"
                    @click="isModalAttachesActive = !isModalAttachesActive">
                    Aide
                </b-button>
                <b-message class="my-4" v-for="attache in attaches" :key="attache.nom">
                    <template #header>
                        <h3 class="is-size-6">{{ attache.nom }}</h3>
                    </template>
                    <div class="">
                        <h2 class="my-2" v-html="attache.details"></h2>
                    </div>            
                </b-message>
            </div>
        </b-collapse>
        <!-- Affichage des convictions -->
        <b-collapse
            class="panel"
            animation="slide"
            v-model="isConvictionsTabOpen">
            <template #trigger>
                <div
                    class="panel-heading"
                    role="button"
                    aria-controls="contentIdForA11y2">
                    <strong>Convictions</strong>
                </div>
            </template>
            <div class="panel-block is-flex is-flex-direction-column">
                <b-button 
                    class="my-1" 
                    type="is-info" 
                    icon-left="question-circle"
                    @click="isModalConvictionsActive = !isModalConvictionsActive">
                    Aide
                </b-button>
                <b-message class="my-4" v-for="conviction in convictions" :key="conviction.nom">
                    <div class="">
                        <h2 class="my-2" v-html="conviction.titre"></h2>
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
                generalInformations : [],
                isAttachesTabOpen : true,
                isConvictionsTabOpen : true,
                attaches : [],
                convictions : [],
                isModalAttachesActive : false,
                isModalConvictionsActive : false
            }
        },
        props: {
            personnage: {
                type: Object
            },
        },
        mixins: [CaracteristiquesMixin],
        methods: {
            getAttaches(personnage_id) {
                axios.get(`/character/${personnage_id}/attaches`).then(response =>{
                    this.attaches = response.data
                })
            },
            getConvictions(personnage_id) {
                axios.get(`/character/${personnage_id}/convictions`).then(response =>{
                    this.convictions = response.data
                })
            }
        },
        async mounted() {
            await this.getAttaches(this.personnage.id);
            await this.getConvictions(this.personnage.id);
        }
    }
</script>