@extends('layouts.app')

@section('content')

<div class="container">
    
    <h1>Edition de description de caracteristique</h1>

    <h2>Choix de la caracteristiques à éditer :</h2>

    <edit-description :caracteristiques="{{ $caracteristiques }}"/>

</div>
    
@endsection