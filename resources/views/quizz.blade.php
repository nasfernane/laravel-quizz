@include ('commons.header')

<div class="quizzContainer">
    @isset ($words)
        @foreach ($words as $word)
            <div class="quizzContainer__word">
                <p class="quizzContainer__word__name">{{$word->name}}</p>
                <p class="quizzContainer__word__definition">{{$word->content}}</p>
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

@include ('commons.footer')