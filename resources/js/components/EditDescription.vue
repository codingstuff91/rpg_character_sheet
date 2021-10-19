<template>
    <div>
        <h1>Edition de description de caracteristique</h1>

        <h2>Choix de la caracteristiques à éditer :</h2>

        <select name="" id="" v-model="caracteristique_id">
            <option v-for="item in caracteristiques" :key="item.id" :value="item.id">{{ item.nom }}</option>
        </select>
        <quill-editor ref="myQuillEditor" v-model="description"/>
        <button @click="updateDescription(caracteristique_id,description)">Update</button>
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