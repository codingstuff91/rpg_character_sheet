<template>
    <!-- modal affichage description caracteristique -->
    <b-modal v-model="isCardModalActive" full-screen>
        <div class="card">
            <div class="card-content">
                <div class="content" v-html="description_caracteristique">
                </div>
                <footer class="modal-card-foot">
                    <b-button
                        label="Close"
                        @click="isCardModalActive = false" />
                </footer>
            </div>
        </div>
    </b-modal>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            isCardModalActive : false,
            description_caracteristique : ''
        }
    },
    methods: {
        getDescription(caracteristique_id) {
            axios.get('/description/' + caracteristique_id).then(response => {
                this.description_caracteristique = response.data
                this.isCardModalActive = true
            })
        }
    },
    mounted () {
        console.log('coucou depuis le mixin des descriptions');;
    },

}
</script>

<style lang="scss" scoped>

</style>