@extends('base')

<!-- Titre -->
@section('title', 'Home')

<!-- Contenu principal -->
@section('content')
    <div class="homeContainer">
    @include ('../commons/header')

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
            <button class="homeContainer__main__btn">
                <a href="/allDefinitions">Valider les réponses</a>
            </button>
        </section>
    </div>
@endsection




    
