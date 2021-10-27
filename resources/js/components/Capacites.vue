<template>
    <b-tab-item label="Capacités">
        <!-- Affichage des compétences -->
        <h1 class="has-text-centered is-size-4">Compétences</h1>
        <div class="columns is-mobile">
            <div class="column is-4">
                <h2 class="has-text-centered mb-4 is-size-5">Talents</h2>
                <div :class="box_style" v-for="capacite in capacites_talents" :key="capacite.id">
                    <h3 class="has-text-centered" @click="getDescription(capacite.id)">{{ capacite.nom }}</h3>
                    <b-rate 
                        icon-pack="fas" 
                        :icon="icon"
                        spaced
                        :size="size"
                        v-model="capacite.niveau">
                    </b-rate>
                </div>
            </div>
        </div>
    </b-tab-item>
</template>

<script>
import CaracteristiquesMixin from '../mixins/caracteristiquesMixin.vue'

    export default {
        data() {
            return {
                capacites_talents : [],
                capacites_competences : [],
                capacites_connaissances : [],
                size : 'is-medium',
                icon : 'tint',
                box_style : 'my-4 is-flex is-flex-direction-column is-justify-content-center is-align-items-center'
            }
        },
        props: {
            personnage: {
                type: Object,
            },
        },
        mixins: [CaracteristiquesMixin],
        async mounted(){
            await this.getCaracteristiquesLevels(this.personnage.id, 'Capacités_talents', 'capacites_talents')
        }
    }
</script>