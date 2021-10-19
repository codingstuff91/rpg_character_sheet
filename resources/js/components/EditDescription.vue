<template>
    <div>
        <select name="" id="" v-model="caracteristique_id">
            <option v-for="item in caracteristiques" :key="item.id" :value="item.id">{{ item.nom }}</option>
        </select>
        <quill-editor ref="myQuillEditor" v-model="description"/>
        <button @click="updateDescription">Update</button>
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
        updateDescription(){
            alert('prout')
        }
    },
}
</script>