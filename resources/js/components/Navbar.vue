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
                Home
            </b-navbar-item>
            <b-navbar-item href="#">
                Documentation
            </b-navbar-item>
            <b-navbar-dropdown label="Info">
                <b-navbar-item href="#">
                    About
                </b-navbar-item>
                <b-navbar-item href="#">
                    Contact
                </b-navbar-item>
            </b-navbar-dropdown>
        </template>

        <template #end>
            <b-navbar-item tag="div">
                <div class="buttons">
                    <a class="button is-primary">
                        <strong>Sign up</strong>
                    </a>
                    <a class="button is-light">
                        Log in
                    </a>
                </div>
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