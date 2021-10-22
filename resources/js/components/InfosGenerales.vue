<template>
    <b-collapse :open="false">
        <template #trigger>
            <b-button
                :label="labelbouton"
                type="is-danger"
            />
        </template>
        <div class="notification">
            <div class="content">
                <div class="columns is-mobile">
                    <div class="column is-4">
                        <h2 class="mb-4 is-size-6">{{ Infos_générales[0].nom }}</h2>
                        <p class="mb-4 is-size-6">{{ Infos_générales[0].niveau }}</p>

                        <h2 class="mb-4 is-size-6">{{ Infos_générales[1].nom }}</h2>
                        <p class="mb-4 is-size-6">{{ Infos_générales[1].niveau }}</p>

                        <h2 class="mb-4 is-size-6">{{ Infos_générales[2].nom }}</h2>
                        <p class="mb-4 is-size-6">{{ Infos_générales[2].niveau }}</p>
                    </div>
                    <div class="column is-4">
                        <h2 class="mb-4 is-size-6">{{ Infos_générales[3].nom }}</h2>
                        <p class="mb-4 is-size-6">{{ Infos_générales[3].niveau }}</p>

                        <h2 class="mb-4 is-size-6">{{ Infos_générales[4].nom }}</h2>
                        <p class="mb-4 is-size-6">{{ Infos_générales[4].niveau }}</p>

                        <h2 class="mb-4 is-size-6">{{ Infos_générales[5].nom }}</h2>
                        <p class="mb-4 is-size-6">{{ Infos_générales[5].niveau }}</p>
                    </div>
                    <div class="column is-4">
                        <h2 class="mb-4 is-size-6">{{ Infos_générales[6].nom }}</h2>
                        <p class="mb-4 is-size-6">{{ Infos_générales[6].niveau }}</p>

                        <h2 class="mb-4 is-size-6">{{ Infos_générales[7].nom }}</h2>
                        <p class="mb-4 is-size-6">{{ Infos_générales[7].niveau }}</p>

                        <h2 class="mb-4 is-size-6">{{ Infos_générales[8].nom }}</h2>
                        <p class="mb-4 is-size-6">{{ Infos_générales[8].niveau }}</p>
                    </div>
                </div>
            </div>
        </div>
    </b-collapse>
</template>

<script>
import CaracteristiquesMixin from '../mixins/caracteristiquesMixin.vue'

    export default {
        data() {
            return {
                Infos_générales : []
            }
        },
        computed: {
            labelbouton() {
                return "Infos générales personnage : " + this.personnage.nom 
            }
        },
        mixins: [CaracteristiquesMixin],
        props: {
            personnage: {
                type: Object
            },
        },
        async mounted () {
            await this.getCaracteristiquesLevels(this.personnage.id, 'Infos_générales', 'Infos_générales');
        },
    }
</script>