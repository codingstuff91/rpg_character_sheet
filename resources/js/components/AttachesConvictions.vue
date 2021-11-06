<template>
    <b-tab-item label="Attaches / Convictions">
        <!-- Affichage des Infos générales -->
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
                attaches : []
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
            }
        },
        async mounted() {
            await this.getAttaches(this.personnage.id);
        }
    }
</script>