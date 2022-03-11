<template>
    <b-tab-item label="Disciplines">
        <template #header>
            <img src="/img/punch.png" class="mr-2" alt="">
            <span>Disciplines</span>
        </template>
        <b-modal v-model="descriptionModal" full-screen>
            <div class="card">
                <div class="card-content">
                    <div class="content has-text-justify" v-html="disciplineDescription">
                    </div>
                    <footer class="modal-card-foot">
                        <b-button
                            label="Fermer"
                            @click="descriptionModal = false" />
                    </footer>
                </div>
            </div>
        </b-modal>
        <b-message 
            v-for="(discipline,index) in disciplines" :key="index"
            :title="discipline[0].nom" 
            type="is-danger"
        >
            <div class="my-4" v-for="pouvoir in discipline" :key="pouvoir.nom">
                <h2 class="title is-size-5">{{pouvoir.pouvoir}} (niveau {{pouvoir.niveau}})</h2>
                <p class="is-size-6 my-2"><span class="has-text-weight-bold">Coût : </span>{{pouvoir.cout}}</p>
                <p class="is-size-6 my-2"><span class="has-text-weight-bold">Groupement de dès : </span>{{pouvoir.groupement_des}}</p>
                <p class="is-size-6 my-2"><span class="has-text-weight-bold">Systeme : </span> {{pouvoir.systeme}}</p>
                <p class="is-size-6 my-2"><span class="has-text-weight-bold">Durée : </span>{{pouvoir.duree}}</p>
                
                <p class="is-size-6 my-2">
                    <b-button 
                    type="is-danger"
                    class="mt-2" 
                    @click="displayDisciplineDescription(pouvoir.description)"
                    rounded
                    size="is-small">
                        Description complète
                    </b-button>
                </p>
            </div>
        </b-message>
    </b-tab-item>
</template>

<script>
    export default {
        data() {
            return {
                isOpen : true,
                disciplines : [],
                descriptionModal : false,
                disciplineDescription : ''
            }
        },
        props: {
            personnage: {
                type: Object,
            },
        },
        methods: {
            getDisciplines(personnage_id){
                axios.get(`/character/${personnage_id}/disciplines`).then(response => {
                    this.disciplines = response.data
                })
            },
            displayDisciplineDescription(description){
                this.disciplineDescription = description
                this.descriptionModal = true
            }
        },
        async mounted() {
            await this.getDisciplines(this.personnage.id) ;
        },
    }
</script>