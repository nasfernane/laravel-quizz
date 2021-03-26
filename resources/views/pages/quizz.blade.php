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
                    
                    
                    <div class="quizzContainer__word__options">
                        <div class="quizzContainer__word__options--show">
                            <p>Tu sais pas ?</p>
                            <button class="quizzContainer__word__btn--show">Voir la définition</button>
                        </div>
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
