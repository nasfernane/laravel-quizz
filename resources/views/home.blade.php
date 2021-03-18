@include ('commons.header')

<div class="homeContainer">
    <header class="homeContainer__header">
        <p class="homeContainer__header__userName">
            @if (session()->has('name'))
                {{session('name')}}
            @endif
        </p>
        <form action="/logout" method="POST" 
        class="homeContainer__header__form">
            @csrf
            <button  class="homeContainer__header__form--btn">Se déconnecter</button>
        </form>
    </header>

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
    </section>
    
</div>

@include ('commons.footer')
    
