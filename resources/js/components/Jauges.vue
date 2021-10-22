<template>
    <b-tab-item label="Jauges">
        <!-- Affichage des jauges variables -->
        <div class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center my-4">
            <h2 class="is-size-5">Santé</h2>
            <b-rate icon-pack="fas"
                size="is-medium"
                :max="sante_max"
                spaced="true" 
                custom-text="Dégats contondants"
                v-model="sante_actuelle">
            </b-rate>
            <b-rate icon-pack="fas"
                size="is-medium"
                :max="sante_max"
                spaced="true" 
                custom-text="Dégats aggravés"
                v-model="sante_actuelle">
            </b-rate>
        </div>
        <div class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center mt-4">
            <h2 class="has-text-centered mb-4 is-size-5">Volonté</h2>
            <b-rate icon-pack="fas"
                size="is-medium"
                :max="volonte_max"
                spaced="true" 
                v-model="sante_actuelle">
            </b-rate>
        </div>
        <div class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center mt-4">
            <h2 class="has-text-centered mb-4 is-size-5">Soif</h2>
            <b-rate icon-pack="fas"
                size="is-medium"
                :max="soif_max"
                spaced="true" 
                v-model="soif">
            </b-rate>
        </div>
    </b-tab-item>
</template>
<script>
    export default {
        data() {
            return {
               sante_max : 7,
               sante_actuelle : 2,
               volonte_max : 6,
               volonte_actuelle : 5,
               soif_max : 5,
               soif : 3
            }
        },
        props: {
            personnage: {
                type: Object
            },
        },
        methods: {
            /**
             * TO DO : creation requete axios
             */
            getJaugeValue(personnage_id, caracteristique, data) {
                
            }
        },
        async mounted() {
            await this.getJaugeValue(this.personnage.id, 'Soif', 'soif')
            await this.getJaugeValue(this.personnage.id, 'Santé', 'sante_actuelle')
            await this.getJaugeValue(this.personnage.id, 'Volonté', 'volonte_actuelle')
        },
    }
</script>

<style lang="scss" scoped>

</style>