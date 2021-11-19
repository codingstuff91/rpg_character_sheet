<template>
    <b-tab-item label="Avantages / Handicaps">
        <div class="columns is-mobile">
            <b-modal v-model="descriptionModal" full-screen>
                <div class="card">
                    <div class="card-content">
                        <div class="content has-text-justify" v-html="description">
                        </div>
                        <footer class="modal-card-foot">
                            <b-button
                                label="Fermer"
                                @click="descriptionModal = false" />
                        </footer>
                    </div>
                </div>
            </b-modal>
            <div class="column">
                <h1 class="has-text-centered is-size-4">Avantages</h1>
                <div :class="btn_wrapper" v-for="item in avantages" :key="item.nom">
                    <h2 class="is-size-6 has-text-centered">{{ item.nom }} niveau : {{ item.niveau }}</h2>
                    <b-button 
                    type="is-danger"
                    @click="getDescription(item.description)"
                    class="mt-2" 
                    rounded
                    size="is-small">
                        Description complète
                    </b-button>
                </div>
            </div>
            <div class="column">
                <h1 class="has-text-centered is-size-4">Handicaps</h1>
                <div :class="btn_wrapper" v-for="item in handicaps" :key="item.nom">
                    <h2 class="is-size-6 has-text-centered">{{ item.nom }} niveau : {{ item.niveau }}</h2>
                    <b-button 
                    type="is-danger"
                    @click="getDescription(item.description)"
                    class="mt-2" 
                    rounded
                    size="is-small">
                        Description complète
                    </b-button>
                </div>
            </div>
        </div>
    </b-tab-item>
</template>

<script>
    export default {
        data() {
            return {
                avantages : [],
                handicaps : [],
                description: '',
                btn_wrapper : 'mt-4 is-flex is-flex-direction-column is-justify-content-center is-align-items-center',
                descriptionModal : false
            }
        },
        methods: {
            getAvantagesHandicaps(personnage_id) {
                axios.get(`/character/${personnage_id}/avantages_handicaps`).then(response => {
                    console.log(response.data.avantage);
                    this.avantages = response.data.avantage
                    this.handicaps = response.data.handicap
                })
            },
            getDescription(description){
                this.description = description
                this.descriptionModal = true
            }
        },
        props: {
            personnage: {
                type: Object,
            },
        },
        async mounted () {
            await this.getAvantagesHandicaps(this.personnage.id)
        },
    }
</script>