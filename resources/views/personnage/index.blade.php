@extends('layouts.app')

@section('content')

    <div class="container mx-auto">
        <h1 class="main-title has-text-centered has-text-danger pt-4">Personnages disponibles</h1>
        <div class="columns">
            @foreach ($personnage_joueur as $perso)
                <div class="column is-1/4">
                    <div class="box is-flex is-flex-direction-column ml-2">
                        <h3 class="is-size-5 my-2 has-text-weight-bold has-text-centered">
                            <span class="icon">
                                <img src="{{ asset('img/vampire.png') }}">
                            </span>
                            {{ $perso->nom }}
                        </h3>
                        <h4 class="is-size-6 mb-2 has-text-centered">
                            <span class="icon">
                                <i class="fas fa-user"></i>
                            </span>
                            {{ $perso->user->name }}</h4>
                        @if ($perso->user_id == auth()->user()->id || auth()->user()->role == "mj")
                            <a href="/character/{{ $perso->id }}" class="button is-danger is-rounded is-small">Fiche perso</a>
                        @endif
                    </div>
                </div>                
            @endforeach
            @foreach ($personnages as $perso)
                <div class="column is-1/4">
                    <div class="box is-flex is-flex-direction-column ml-2">
                        <h3 class="is-size-5 my-2 has-text-weight-bold has-text-centered">
                            <span class="icon">
                                <img src="{{ asset('img/vampire.png') }}">
                            </span>
                            {{ $perso->nom }}
                        </h3>
                        <h4 class="is-size-6 mb-2 has-text-centered">
                            <span class="icon">
                                <i class="fas fa-user"></i>
                            </span>

                            {{ $perso->user->name }}</h4>
                            
                        @if ($perso->user_id == auth()->user()->id || auth()->user()->role == "mj")
                            <a href="/character/{{ $perso->id }}" class="button is-danger is-rounded is-small">Fiche perso</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection