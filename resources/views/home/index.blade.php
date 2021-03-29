@extends('layouts.base')

<!-- Titre -->
@section('title', ' | Home')

<!-- Contenu principal -->
@section('content')
    <div class="homeContainer">
        <section class="homeContainer__main">
            <button class="homeContainer__main__btn">
                <a href="/lexicon">Voir le lexique</a>
            </button>
            
            <button class="homeContainer__main__btn">
                <a href="/quizz">Faire un quizz</a>
            </button>
            @if (session('role') !== null && session('role') === 'admin')
            <button class="homeContainer__main__btn">
                <a href="/categories">Gérer les thèmes</a>
            </button>
            <button class="homeContainer__main__btn">
                <a href="/validation">Valider les réponses</a>
            </button>
            @else 
            <button class="homeContainer__main__btn">
                <a href="/login">Se connecter</a>
            </button>
            <button class="homeContainer__main__btn">
                <a href="/signup">Créer un compte</a>
            </button>
            @endif
        </section>
    </div>
@endsection




    
