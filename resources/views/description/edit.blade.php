@extends('layouts.app')

@section('content')

<div class="container">
    
    <edit-description :caracteristiques="{{ $caracteristiques }}"/>

</div>
    
@endsection