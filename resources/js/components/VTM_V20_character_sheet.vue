<template>
    <div class="container is-widescreen">
        <Navbar/>
        <div class="row justify-content-center">
            <b-button type="is-primary">Primary</b-button>

            <b-tabs>
                <b-tab-item label="Attributs">
                    <div class="columns is-mobile">
                        <div class="column is-vcentered">
                            <h2>Physiques</h2>
                        </div>
                        <div class="column is-vcentered">
                            <h2>Sociaux</h2>
                        </div>
                        <div class="column is-vcentered">
                            <h2>Mentaux</h2>
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
