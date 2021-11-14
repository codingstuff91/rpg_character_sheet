<template>
    <div class="container mx-auto">
        <h1 class="has-text-centered pt-2 is-size-4 my-4">Ajout nouvelle discipline</h1>
        
        <!-- Affichage des messages erreur -->
        <b-message v-for="error in errors" :key="error" type="is-danger">
            {{error[0]}}
        </b-message> 

        <div class="columns">
            <div class="column is-one-third">
                <b-field label="Nom">
                    <b-input v-model="discipline.nom"></b-input>
                </b-field>
            </div>
            <div class="column is-one-third">
                <b-field label="Pouvoir">
                    <b-input v-model="discipline.pouvoir"></b-input>
                </b-field>
            </div>
            <div class="column is-one-third">
                <b-field label="Niveau">
                    <b-input v-model="discipline.niveau"></b-input>
                </b-field>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <b-field label="Description">
                    <quill-editor v-model="discipline.description"/>
                </b-field>
            </div>
        </div>
        <div class="columns">
            <div class="column is-one-third">
                <b-field label="Cout">
                    <b-input v-model="discipline.cout"></b-input>
                </b-field>
            </div>
            <div class="column">
                <b-field label="Groupement de dés">
                    <b-input v-model="discipline.groupement_des"></b-input>
                </b-field>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <b-field label="Systeme">
                    <b-input v-model="discipline.systeme"></b-input>
                </b-field>
            </div>
            <div class="column">
                <b-field label="Durée">
                    <b-input v-model="discipline.duree"></b-input>
                </b-field>
            </div>
        </div>

        <b-button type="is-success" @click="create_discipline">Confirmer</b-button>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        data() {
            return {
                discipline: {
                    nom : "",
                    niveau : 0,
                    pouvoir : "",
                    description : "",
                    cout : "",
                    groupement_des : "",
                    systeme : "",
                    duree : ""
                },
                errors : []
            }
        },
        methods: {
            create_discipline() {
                axios.post('/discipline', {
                    discipline : this.discipline
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
    }
</script>