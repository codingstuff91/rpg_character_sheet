<template>
    <div>

    </div>
</template>

<script>
import axios from 'axios'

    export default {
        methods: {
            getCaracteristiquesLevels(personnage_id, category_name, results){
                axios.get(`/character/${personnage_id}/${category_name}/levels`).then(response => {
                    this[results] =  response.data
                })
            },
        },
    }
</script>