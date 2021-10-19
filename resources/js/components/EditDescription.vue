<template>
    <div>
        <h1 class="has-text-centered is-size-3 mb-4">Edition de description de caracteristique</h1>

        <h2 class="has-text-centered is-size-5 my-4">Choix de la caracteristiques à éditer :</h2>

        <b-field label="Description à éditer" class="has-text-centered my-4">
            <b-select placeholder="Choisir une caracteristiques" rounded v-model="caracteristique_id">
                <option v-for="item in caracteristiques" :key="item.id" :value="item.id">{{ item.nom }}</option>
            </b-select>
        </b-field>

        <div class="my-4">
            <quill-editor v-model="description"/>
        </div>

        <b-button expanded class="mt-4" type="is-success" @click="updateDescription(caracteristique_id,description)">Mettre à jour</b-button>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            description: "test pour voir",
            caracteristique_id : 0
        }
    },
    props: ['caracteristiques'],
    watch: {
        caracteristique_id(newValue) {
            this.getDescription(newValue)
        }
    },
    methods: {
        getDescription(id) {
            axios.get('/description/' + id).then(response => this.description = response.data)
        },
        updateDescription(id, description){
            axios.put('/description/'+ id +'/edit', {
                description : this.description
            }).then(response => {
                this.$buefy.toast.open({
                    message: response.data,
                    type: 'is-success'
                })
            })
        }
    },
}
</script>