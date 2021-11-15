<template>
    <div class="container mx-auto">
        <h1 class="has-text-centered pt-2 is-size-4 my-4">Edition de discipline</h1>
        
        <!-- Affichage des messages erreur -->
        <b-message v-for="error in errors" :key="error" type="is-danger">
            {{error[0]}}
        </b-message> 

        <div class="columns">
            <div class="column is-one-third">
                <b-field label="Nom">
                    <b-input v-model="edited_disciplines.nom"></b-input>
                </b-field>
            </div>
            <div class="column is-one-third">
                <b-field label="Pouvoir">
                    <b-input v-model="edited_disciplines.pouvoir"></b-input>
                </b-field>
            </div>
            <div class="column is-one-third">
                <b-field label="Niveau">
                    <b-input v-model="edited_disciplines.niveau"></b-input>
                </b-field>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <b-field label="Description">
                    <quill-editor v-model="edited_disciplines.description"/>
                </b-field>
            </div>
        </div>
        <div class="columns">
            <div class="column is-one-third">
                <b-field label="Cout">
                    <b-input v-model="edited_disciplines.cout"></b-input>
                </b-field>
            </div>
            <div class="column">
                <b-field label="Groupement de dés">
                    <b-input v-model="edited_disciplines.groupement_des"></b-input>
                </b-field>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <b-field label="Systeme">
                    <b-input v-model="edited_disciplines.systeme"></b-input>
                </b-field>
            </div>
            <div class="column">
                <b-field label="Durée">
                    <b-input v-model="edited_disciplines.duree"></b-input>
                </b-field>
            </div>
        </div>

        <b-button type="is-success" @click="edit_discipline">Mettre à jour</b-button>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        data() {
            return {
                edited_disciplines : {},
                errors : []
            }
        },
        props: ['discipline'],
        methods: {
            getDiscipline(){

            },
            edit_discipline() {
                axios.patch('/discipline/' + this.edited_disciplines.id, {
                    discipline : this.edited_disciplines
                })
                .then(response => {
                    this.$buefy.toast.open({
                        message: response.data,
                        type: 'is-success'
                    })
                })
                .catch(error => {
                    for (const [key, value] of Object.entries(error.response.data.errors)) {
                        this.errors.push(value)
                    }
                })
            }
        },
        mounted(){
            this.edited_disciplines = this.$props.discipline
        }
    }
</script>