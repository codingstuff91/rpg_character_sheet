<template>
    <b-navbar>
        <template #brand>
            <b-navbar-item>
                <b-icon
                    icon="ankh"
                    type="is-danger"
                    size="is-large">
                </b-icon>
                <h3 class="title">Vamp Perso</h3>
            </b-navbar-item>
        </template>
        <template #start>
            <b-navbar-item href="#">
                Accueil
            </b-navbar-item>
        </template>
    </b-navbar>
</template>

<style scoped>
.title{
    font-family: 'Vampiro One', cursive;
    color:#f14668;
}
</style>