<template>
    <b-tab-item label="Attributs">
        <!-- Affichage des attributs -->
        <h1 class="has-text-centered is-size-4">Attributs</h1>
        <div class="columns is-mobile">
            <div class="column is-4">
                <h2 class="has-text-centered mb-4 is-size-5">Physiques</h2>
                <div class="my-4" v-for="attribut in attributs_physiques" :key="attribut.id">
                    <h3 class="has-text-centered" @click="getDescription(attribut.id)">{{ attribut.nom }}</h3>
                    <b-rate icon-pack="fas" v-model="attribut.niveau"></b-rate>
                </div>
            </div>
            <div class="column is-4">
                <h2 class="has-text-centered mb-4 is-size-5">Sociaux</h2>
                <div class="my-4" v-for="attribut in attributs_sociaux" :key="attribut.id">
                    <h3 class="has-text-centered" @click="getDescription(attribut.id)">{{ attribut.nom }}</h3>
                    <b-rate icon-pack="fas" v-model="attribut.niveau"></b-rate>
                </div>
            </div>
            <div class="column is-4">
                <h2 class="has-text-centered mb-4 is-size-5">Mentaux</h2>
                <div class="my-4" v-for="attribut in attributs_mentaux" :key="attribut.id">
                    <h3 class="has-text-centered" @click="getDescription(attribut.id)">{{ attribut.nom }}</h3>
                    <b-rate icon-pack="fas" v-model="attribut.niveau"></b-rate>
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
                attributs_physiques : [],
                attributs_sociaux : [],
                attributs_mentaux: [],
            }
        },
        props: {
            personnage: {
                type: Object,
            },
        },
        mixins: [CaracteristiquesMixin],
        methods: {
            getDescription(attribut_id) {
                this.$emit('get_description',attribut_id)
            }
        },
        async mounted(){
            await this.getCaracteristiquesLevels(this.personnage.id, 'Attributs_physiques', 'attributs_physiques')
            await this.getCaracteristiquesLevels(this.personnage.id, 'Attributs_mentaux', 'attributs_mentaux')
            await this.getCaracteristiquesLevels(this.personnage.id, 'Attributs_sociaux', 'attributs_sociaux')
        }
    }
</script>