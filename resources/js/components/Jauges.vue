<template>
    <b-tab-item label="Jauges">
        <template #header>
            <img src="/img/gauge.png" class="mr-2" alt="">
            <span> Jauges</span>
        </template>
        <!-- Jauges de soif -->
        <b-collapse
            class="panel"
            animation="slide"
            :open="jaugeSanteVisible">
            <template #trigger>
                <div
                    class="panel-heading is-flex is-justify-content-space-between is-align-items-center"
                    role="button"
                    aria-controls="contentIdForA11y2">
                    <strong>Soif / Sang</strong>
                    <img src="/img/bloody.png">                    
                </div>
            </template>
            <div class="panel-block is-flex is-flex-direction-column is-justify-content-center">
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
                                type="is-danger"
                                class="text_description"
                                rounded>
                                {{ infos_puissance_sang[5].nom }}
                            </b-button>
                            <h2 class="is-size-5 has-text-centered text_description">{{ infos_puissance_sang[5].niveau }}</h2>

                            <!-- Degats régénérés -->
                            <b-button 
                                icon-left="question-circle" 
                                type="is-danger"
                                class="mt-4 text_description"
                                rounded>
                                {{ infos_puissance_sang[3].nom }}
                            </b-button>
                            <h2 class="is-size-5 has-text-centered text_description">{{ infos_puissance_sang[3].niveau }}</h2>
                            
                            <!-- Valeur coup de sang -->
                            <b-button 
                                icon-left="question-circle" 
                                type="is-danger"
                                class="mt-4 text_description"
                                rounded>
                                {{ infos_puissance_sang[2].nom }}
                            </b-button>
                            <h2 class="is-size-5 has-text-centered text_description">{{ infos_puissance_sang[2].niveau }}</h2>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div :class="style">
                            <!-- Penalité pour se nourrir -->
                            <b-button 
                                icon-left="question-circle" 
                                type="is-danger"
                                class="text_description"
                                rounded>
                                {{ infos_puissance_sang[6].nom }}
                            </b-button>
                            <h2 class="is-size-5 has-text-centered text_description">{{ infos_puissance_sang[6].niveau }}</h2>

                            <!-- Bonus aux pouvoirs -->
                            <b-button 
                                icon-left="question-circle" 
                                type="is-danger"
                                class="mt-4 text_description"
                                rounded>
                                {{ infos_puissance_sang[4].nom }}
                            </b-button>
                            <h2 class="is-size-5 has-text-centered text_description">{{ infos_puissance_sang[4].niveau }}</h2>

                            <!-- Score de fléau -->
                            <b-button 
                                icon-left="question-circle" 
                                type="is-danger"
                                class="mt-4 text_description"
                                rounded>
                                {{ infos_puissance_sang[7].nom }}
                            </b-button>
                            <h2 class="is-size-5 has-text-centered text_description">{{ infos_puissance_sang[7].niveau }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </b-collapse>        
        <!-- Jauge de santé -->
        <b-collapse
            class="panel"
            animation="slide"
            :open="jaugeSanteVisible">
            <template #trigger>
                <div
                    class="panel-heading is-flex is-justify-content-space-between is-align-items-center"
                    role="button"
                    aria-controls="contentIdForA11y2">
                    <strong>Santé</strong>
                    <img src="/img/health.png">
                </div>
            </template>
            <div class="panel-block is-flex is-flex-direction-column is-justify-content-center">
                <h1 class="title is-size-4">Dégats superficiels</h1>
                <b-button
                    class="mr-2"
                    type="is-danger"
                    has-icon
                    icon-left="ban"
                    size="is-small"
                    rounded
                    @click="resetDegatsContondants">
                    Reset
                </b-button>
                <b-rate 
                    icon-pack="fas" 
                    :max="degats_contondants_max"
                    icon='fist-raised'
                    spaced
                    :size="size"
                    @change="updateDegatsContondants"
                    v-model="degats_contondants">
                </b-rate>

                <h1 class="title is-size-4">Dégats aggravés</h1>
                <b-button
                    class="mr-2"
                    type="is-danger"
                    has-icon
                    icon-left="ban"
                    size="is-small"
                    rounded
                    @click="resetDegatsAggraves">
                    Reset
                </b-button>
                <b-rate 
                    icon-pack="fas" 
                    :max="degats_aggraves_max"
                    icon="skull-crossbones"
                    spaced
                    :size="size"
                    @change="updateDegatsAggraves"
                    v-model="degats_aggraves">
                </b-rate>
            </div>
        </b-collapse>
        <!-- Jauge de volonté -->
        <b-collapse
            class="panel"
            animation="slide"
            :open="jaugeVolonteVisible">
            <template #trigger>
                <div
                    class="panel-heading is-flex is-justify-content-space-between is-align-items-center"
                    role="button"
                    aria-controls="contentIdForA11y2">
                    <strong>Volonté</strong>
                    <img src="/img/leadership.png" class="ml-4" alt="">
                </div>
            </template>
            <div class="panel-block is-flex is-flex-direction-column is-justify-content-center">
                <h1 class="title is-size-4">Jauge de volonté</h1>
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
            </div>
        </b-collapse>
        <!-- Jauge humanité -->
        <b-collapse
            class="panel"
            animation="slide"
            :open="jaugeVolonteVisible">
            <template #trigger>
                <div
                    class="panel-heading is-flex is-justify-content-space-between is-align-items-center"
                    role="button"
                    aria-controls="contentIdForA11y2">
                    <strong>Humanité</strong>
                    <img src="/img/angel.png" class="ml-4" alt="">
                </div>
            </template>
            <div class="panel-block is-flex is-flex-direction-column is-justify-content-center">
                <!-- score humanité -->
                <h1 class="title is-size-4">Humanité</h1>
                <b-rate 
                    icon-pack="fas" 
                    :max="humanite_max"
                    icon='cross'
                    spaced
                    show-score="true"
                    :size="size"
                    disabled
                    v-model="scores[0].niveau">
                </b-rate>
                <b-notification
                    type="is-warning"
                    aria-close-label="Close notification"
                    has-icon
                    role="alert">
                    <p class="my-2"><span class="has-text-weight-bold">Humanité à 0 =></span> Le personnage devient une bete sanguinaire</p>
                    <p class="my-2"><span class="has-text-weight-bold">Perte d'1 point d'humanité =></span> Echec au jet de remords</p>
                </b-notification>
                <!-- Score de fletrissures -->
                <h1 class="title is-size-4">Fletrissures</h1>
                <b-button
                    class="mr-2"
                    type="is-danger"
                    has-icon
                    icon-left="ban"
                    size="is-small"
                    rounded
                    @click="resetScoreFletrissures">
                    Reset
                </b-button>
                <b-rate 
                    icon-pack="fas" 
                    :max="fletrissures_max"
                    icon='fist-raised'
                    spaced
                    :size="size"
                    @change="updateScoreFletrissures"
                    v-model="scores[1].niveau">
                </b-rate>
                <b-notification
                    type="is-warning"
                    aria-close-label="Close notification"
                    has-icon
                    role="alert">
                    <p class="my-2"><span class="has-text-weight-bold">Gain de flétrissures =></span> Le personnage agit contre une de ses convictions</p>
                    <p class="my-2"><span class="has-text-weight-bold">+1 flétrissure =></span> Si Acte bestial</p>
                </b-notification>
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
                jaugeSanteVisible: false,
                jaugeVolonteVisible: false,
                degats_contondants : 0,
                degats_contondants_max : 0,
                degats_aggraves : 2, 
                degats_aggraves_max : 7,
                size : 'is-large',
                jauge_degats_contondants_id : 0,
                jauge_degats_aggraves_id : 0,
                volonte : 7,
                volonte_max : 10,
                jauge_volonte_id : 0,
                humanite_max : 10,
                humanite : 7,
                scores : [],
                soif_max : 5,
                soif : 0,
                infos_puissance_sang : [],
                closable : false,
                style : 'is-flex is-flex-direction-column is-justify-content-center is-align-items-center'
            }
        },
        computed: {
            fletrissures_max() {
                return this.humanite_max - this.scores[0].niveau
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
            updateDegatsContondants(new_value){
                axios.post(`/character/${this.personnage.id}/${this.jauge_degats_contondants_id}/update_jauge_level`, {
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
            updateDegatsAggraves(new_value){
                axios.post(`/character/${this.personnage.id}/${this.jauge_degats_aggraves_id}/update_jauge_level`, {
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
            resetDegatsContondants(){
                this.updateDegatsContondants(0)
                this.degats_contondants = 0
            },
            resetDegatsAggraves(){
                this.updateDegatsAggraves(0)
                this.degats_aggraves = 0
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
            },
            updateScoreFletrissures(new_value){
                axios.post(`/character/${this.personnage.id}/${this.scores[1].id}/update`, {
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
            resetScoreFletrissures(){
                this.updateScoreFletrissures(0)
                this.scores[1].niveau = 0
            },
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
            await this.getJaugeValue(this.personnage.id, 'Dégats Contondants', 'degats_contondants', 'degats_contondants_max', 'jauge_degats_contondants_id')
            await this.getJaugeValue(this.personnage.id, 'Dégats Aggravés', 'degats_aggraves', 'degats_aggraves_max', 'jauge_degats_aggraves_id')
            await this.getJaugeValue(this.personnage.id, 'Volonté', 'volonte', 'volonte_max', 'jauge_volonte_id')
            await this.getCaracteristiquesLevels(this.personnage.id, 'Humanité', 'scores')
            await this.getInfosSang(this.personnage.id, 'Sang')

        },
    }
</script>

<style scoped>
.section_header{
    font-family: 'Vampiro One', cursive;
    color:#f14668;
}
</style>