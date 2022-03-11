<template>
    <b-navbar>
        <template #brand>
            <img src="/img/vampire.png" alt="logo">
            <b-navbar-item>
                <h3 class="title">Vamp Perso</h3>
            </b-navbar-item>
        </template>
        <template #end>
            <b-navbar-item tag="div">
                <div>
                    <a href="/" class="button mr-2">
                        <img src="/img/home.png" class="mr-2">
                        <strong>Accueil</strong>
                    </a>
                    <a href="/character/all" class="button is-danger">
                        <img src="/img/character.png" class="mr-2">
                        <strong>Personnages</strong>
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