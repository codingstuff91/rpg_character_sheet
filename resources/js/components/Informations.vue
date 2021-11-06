<template>
    <b-tab-item label="Infos générales">
        <!-- Affichage des alliés -->
        <b-collapse
            class="panel"
            animation="slide"
            v-model="isInfosTabOpen">
            <template #trigger>
                <div
                    class="panel-heading is-flex is-justify-content-space-between is-align-items-center"
                    role="button"
                    aria-controls="contentIdForA11y2">
                    <strong>Infos générales</strong>
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
    </b-tab-item>
</template>
<script>
import axios from 'axios'
import CaracteristiquesMixin from '../mixins/caracteristiquesMixin.vue'

    export default {
        data() {
            return {
                generalInformations : [],
                isInfosTabOpen : true
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