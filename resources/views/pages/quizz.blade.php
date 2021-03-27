@extends('base')


<!-- Contenu principal -->
@section('content')
    @include ('../commons/header')
    <div class="quizzContainer">
        
        @isset ($words)
            @foreach ($words as $word)
                <div class="quizzContainer__word">
                    <p class="quizzContainer__word__name">{{$word->name}}</p>
                    <div class="quizzContainer__word__definition">{{$word->content}}</div>
                    <img class="quizzContainer__word__questionMark" src="/img/question.png" alt="Question Mark">
                     <!-- Sprint 2 seif  -->
                    <form class="quizzContainer__word__insert" action="/quizz" method="POST" style="display: none;">
                    @csrf
                            <!-- auteur -->
                            <label for="input-auteur">Ton nom</label>
                            <input id="input-auteur" type="text" name="auteur" autocomplete="off" required>
                            <!-- définition -->
                        <label for="input-definition">Ta définition</label>
                            <input id="input-definition" type="text" name="definition" autocomplete="off" required>                        
                            <input type="hidden" value="{{$word->idWord}}" name="idWord">                        
                            <button class="test">Ajouter</button>
                        
                    </form>
                    <!-- Sprint 2  -->
                    
                    
                    <div class="quizzContainer__word__options">
                        <div class="quizzContainer__word__options--show">
                            <p>Tu sais pas ?</p>
                            <button class="quizzContainer__word__btn--show">Voir la définition</button>
                        </div>

                        <!-- Sprint 2  -->
                        <div class="quizzContainer__word__options">
                            <p>Tu veux contribuer ?</p>
                            <button class="quizzContainer__word__btn--addDefinition">Ajouter une définition</button>
                        </div>
                        <!-- Sprint 2  -->

                        <div class="quizzContainer__word__options--next">
                            <p>Tu sais ?</p>
                            @if ($loop->last)
                                <button class="quizzContainer__word__btn--next"><a href="/">Terminer le quizz</a></button>
                            @else 
                                <button class="quizzContainer__word__btn--next">Passer au suivant</button>
                            @endif
                        </div>  
                    </div>               
                </div>
            @endforeach
        @endisset
    </div>
@endsection
