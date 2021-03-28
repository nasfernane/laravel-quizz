@extends('layouts.base')

<!-- Titre -->
@section('title', 'Home')

<!-- Contenu principal -->
@section('content')
    <div class="homeContainer">
    @include ('layouts.header')
        <section class="homeContainer__main">
            <button class="homeContainer__main__btn">
                <a href="/lexicon">Voir le lexique</a>
            </button>
            <button class="homeContainer__main__btn">
                <a href="/categories">Ajouter une catégorie</a>
            </button>
            <button class="homeContainer__main__btn">
                <a href="/quizz">Faire un quizz</a>
            </button>
            @if (session('role') !== null && session('role') === 'admin')
            <button class="homeContainer__main__btn">
                <a href="/validation">Valider les réponses</a>
            </button>
            @endif
        </section>
    </div>
@endsection




    
