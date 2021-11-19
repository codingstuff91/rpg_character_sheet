@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <img class="mx-auto pt-4" src="{{ asset('img/vampire.png') }}" alt="">
    <h1 class="text-center is-size-2 my-4 has-text-weight-bold">ERREUR</h1>
    <p class="text-center is-size-4">Vous n'avez pas les autorisations pour</p>
    <p class="text-center is-size-4">consulter ce personnage</p>
    <div class="mt-4" style="display:flex; justify-content : center;">
        <button class="button is-danger is-large has-text-weight-bold has-text-white"><a href="/character/all" class="has-text-white is-size-6">Liste des personnages disponibles</a></button>
    </div>
</div>
@endsection