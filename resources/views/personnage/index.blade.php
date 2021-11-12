@extends('layouts.app')

@section('content')

    <div class="container mx-auto">
        <h1 class="title has-text-centered has-text-danger pt-4">Personnages disponibles</h1>
        <div class="columns">
            @foreach ($personnages as $perso)

                <div class="column is-1/4">
                    <article class="message is-danger">
                        <div class="message-header">
                        <p>{{ $perso->nom }}</p>
                        </div>
                        <div class="message-body">
                            <a href="/character/{{ $perso->id }}">Feuille personnage</a>
                        </div>
                    </article>
                </div>
    
            @endforeach
        </div>
    </div>


@endsection