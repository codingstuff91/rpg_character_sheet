<template>
    <b-tab-item label="Attaches / Convictions">
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
                isConvictionsTabOpen : false,
                attaches : [],
                convictions : []
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