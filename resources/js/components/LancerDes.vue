<template>
    <b-tab-item label="Lancer de dès">
        <b-collapse
            class="panel"
            animation="slide">
            <template #trigger>
                <div
                    class="panel-heading"
                    role="button"
                    aria-controls="contentIdForA11y2">
                    <strong>Lancer de dés</strong>
                </div>
            </template>
            <div class="panel-block is-flex is-flex-direction-column">
                <div class="columns is-mobile">
                    <div class="is-flex is-justify-content-center">
                        <h2 class="text-center title mr-4">Soif</h2>
                        <b-rate icon-pack="fas"
                            :size="size"
                            :max="soif_max"
                            icon="tint"
                            spaced
                            disabled
                            v-model="soif">
                        </b-rate>                    
                    </div>
                </div>
                <div class="is-flex is-justify-content-center is-align-items-end">
                    <div>
                        <b-field label="Nombre de D10">
                            <b-input v-model="nombre_des"></b-input>
                        </b-field>                        
                    </div>
                    <div class="ml-4">
                        <b-button type="is-success" icon-left="github-circle" @click="lancer_de_des">Lancer</b-button>
                    </div>
                </div>
                <div class="mt-4">
                    <h2 class="is-size-5">Résultats dés de sang</h2>
                </div>
                <div class="is-flex">
                    <div v-for="(resultat,index) in resultats_des_soif" :key="index">
                        <p :class="resultat == 10 || resultat == 1 ? 'failure' : 'success'">{{ resultat }}</p>
                        <p v-if="resultat == 10" class="title">Triomphe brutal</p>
                        <p v-if="resultat == 1" class="title">Echec bestial</p>
                    </div>
                </div>
                <div class="is-size-5 my-2">
                    <h2>Résultats jet de dés</h2>
                </div>
                <div class="is-flex">
                    <div v-for="(resultat,index) in resultats_des" :key="index">
                        <p :class="resultat >=6 ? 'is-size-5 success' : 'is-size-5 failure'">{{ resultat }}</p>
                    </div>
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
                nombre_des : 1,
                soif : 0,
                soif_max : 5,
                size : 'is-large',
                resultats_des : [],
                resultats_des_soif : []
            }
        },
        props: {
            personnage: {
                type: Object
            },
        },
        mixins: [CaracteristiquesMixin],
        methods: {
            lancer_de_des(){
                axios.post(`/character/lancer_des`, {
                    nombre_des : this.nombre_des,
                    nombre_des_soif : this.soif
                }).then(response => {
                    this.resultats_des_soif = response.data[0]
                    this.resultats_des = response.data[1]
                })
            },
            getInfosSang(personnage_id,caracteristique){
                axios.get(`/character/${personnage_id}/${caracteristique}/levels`).then(response => {
                    this.soif = response.data[0].niveau
                })
            },
        },
        async mounted() {
            await this.getInfosSang(this.personnage.id, 'Sang')
        }
    }
</script>
<style scoped>
.success{
    color : green;
    text-align: center;
    margin: 0 1rem;
    border-radius: 5px;
    background-color: lightgreen;
    padding : 5px;
    font-weight: 500;
}

.failure{
    color : #fff;
    text-align: center;
    margin: 0 1rem;
    border-radius: 5px;
    background-color: lightcoral;
    padding : 5px;
    font-weight: 500;
}
</style>