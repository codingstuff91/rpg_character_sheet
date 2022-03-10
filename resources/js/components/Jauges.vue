<template>
    <b-tab-item label="Jauges">
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
                </div>
            </template>
            <div class="panel-block is-flex is-flex-direction-column is-justify-content-center">
                <h1 class="title is-size-4">Dégats contondants / superficiels</h1>
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
            }
        },
        async mounted() {
            await this.getJaugeValue(this.personnage.id, 'Dégats Contondants', 'degats_contondants', 'degats_contondants_max', 'jauge_degats_contondants_id')
            await this.getJaugeValue(this.personnage.id, 'Dégats Aggravés', 'degats_aggraves', 'degats_aggraves_max', 'jauge_degats_aggraves_id')
            await this.getJaugeValue(this.personnage.id, 'Volonté', 'volonte', 'volonte_max', 'jauge_volonte_id')
        },
    }
</script>