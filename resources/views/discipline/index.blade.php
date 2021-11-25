@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="title mt-4 text-center">Liste des disciplines</h1>

    <div class="is-flex is-justify-content-center">
        <a href="{{ route('discipline.create') }}" class="button is-success my-2">Ajouter une discipline</a>
    </div>

    <table class="table table-hover mx-auto">
        <thead>
            <tr>
                <th>EDITER</th>
                <th>NOM</th>
                <th>POUVOIR</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($disciplines as $discipline)
                <tr>
                    <td><a href="{{ route('discipline.edit', $discipline->id) }}">Editer</a></td>
                    <td>{{ $discipline->nom }}</td>
                    <td>{{ $discipline->pouvoir }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
    
@endsection