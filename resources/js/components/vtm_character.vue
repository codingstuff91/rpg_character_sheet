<template>
    <div class="container is-widescreen">
        <Navbar/>
        <div class="row justify-content-center">
            <h2>Personnage : </h2>
            <b-tabs>
                <Attributs :personnage="personnage"/>

                <Capacites :personnage="personnage"/>
            </b-tabs>
        </div>

    </div>
</template>

<script>
import axios from 'axios';
import Navbar from './Navbar.vue';
import Attributs from './Attributs.vue';
import Capacites from './Capacites.vue';

    export default {
        data() {
            return {

            }
        },
        components: {
            Navbar,
            Attributs,
            Capacites
        },
        props: {
            personnage: {
                type: Object
            },
        },
        methods: {

        },
        async mounted(){

        }
    }
</script>
