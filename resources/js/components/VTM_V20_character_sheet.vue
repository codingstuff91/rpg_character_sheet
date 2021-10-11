<template>
    <div class="container is-widescreen">
        <Navbar/>
        <div class="row justify-content-center">
            <b-tabs>
                <b-tab-item label="Attributs">
                    <div class="columns is-mobile">
                        <div class="column is-4">
                            <h2 class="has-text-centered">Physiques</h2>
                        </div>
                        <div class="column is-4">
                            <h2 class="has-text-centered">Sociaux</h2>
                        </div>
                        <div class="column is-4">
                            <h2 class="has-text-centered">Mentaux</h2>
                        </div>
                    </div>
                </b-tab-item>

                <b-tab-item label="Capacités">

                </b-tab-item>

                <b-tab-item label="Avantages">
                    
                </b-tab-item>

                <b-tab-item label="Vertus">

                </b-tab-item>
            </b-tabs>
        </div>
    </div>
</template>

<script>
import Navbar from './Navbar.vue';
    export default {
        components: {
            Navbar,
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
