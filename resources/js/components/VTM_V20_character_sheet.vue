<template>
    <div class="container is-widescreen">
        <Navbar/>
        <div class="row justify-content-center">
            <h2>Personnage : </h2>
            <b-tabs>
                <b-tab-item label="Attributs / Capacités">
                <h1 class="has-text-centered is-size-4">Attributs</h1>
                    <div class="columns is-mobile">
                        <div class="column is-4">
                            <h2 class="has-text-centered mb-4 is-size-5">Physiques</h2>
                            <h3 class="has-text-centered" @click="isCardModalActive = true">Force</h3>
                            <b-rate icon-pack="fas" v-model="force"></b-rate>
                            <h3 class="has-text-centered">Dexterité</h3>
                            <b-rate icon-pack="fas" v-model="dexterite"></b-rate>
                            <h3 class="has-text-centered">Vigueur</h3>
                            <b-rate icon-pack="fas" v-model="vigueur"></b-rate>
                        </div>
                        <div class="column is-4">
                            <h2 class="has-text-centered mb-4 is-size-5">Sociaux</h2>
                            <h3 class="has-text-centered">Charisme</h3>
                            <b-rate icon-pack="fas" v-model="charisme"></b-rate>
                            <h3 class="has-text-centered">Manipulation</h3>
                            <b-rate icon-pack="fas" v-model="manipulation"></b-rate>
                            <h3 class="has-text-centered">Apparence</h3>
                            <b-rate icon-pack="fas" v-model="apparence"></b-rate>
                        </div>
                        <div class="column is-4">
                            <h2 class="has-text-centered mb-4 is-size-5">Mentaux</h2>
                            <h3 class="has-text-centered">Charisme</h3>
                            <b-rate icon-pack="fas" v-model="charisme"></b-rate>
                            <h3 class="has-text-centered">Manipulation</h3>
                            <b-rate icon-pack="fas" v-model="manipulation"></b-rate>
                            <h3 class="has-text-centered">Apparence</h3>
                            <b-rate icon-pack="fas" v-model="apparence"></b-rate>
                        </div>
                    </div>
                </b-tab-item>

                <b-tab-item label="Avantages">
                    
                </b-tab-item>

                <b-tab-item label="Vertus">

                </b-tab-item>
            </b-tabs>
        </div>
        <b-modal v-model="isCardModalActive" full-screen>
            <div class="card">
                <div class="card-content">
                    <div class="content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Phasellus nec iaculis mauris. <a>@bulmaio</a>.
                        <a>#css</a> <a>#responsive</a>
                        <br>
                        <small>11:09 PM - 1 Jan 2016</small>
                    </div>
                    <footer class="modal-card-foot">
                        <b-button
                            label="Close"
                            @click="isCardModalActive = false" />
                    </footer>
                </div>
            </div>
        </b-modal>
    </div>
</template>

<script>
import Navbar from './Navbar.vue';
    export default {
        data() {
            return {
                force: 3,
                dexterite : 2,
                vigueur : 4,
                manipulation : 2,
                charisme : 3,
                apparence : 3,
                isCardModalActive : false
            }
        },
        components: {
            Navbar,
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
