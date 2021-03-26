@extends('base')

@section('content')
@include ('../commons/header')

<h1>{{ $name }}</h1>


<form method="POST" action="/addDefinition">

    @csrf
    <input type="hidden" name="idWord" value="{{ $id }}">
    <label for="auteur">Votre nom</label>
    <input id="auteur" name="author" type="text" required>
    <label for="text">ajoutez votre définition</label>
    <textarea name="definition" id="text" cols="30" rows="10" required></textarea>

    <button>ajouter</button>

</form>