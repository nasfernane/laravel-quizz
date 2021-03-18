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
    <h1>Home</h1>
</div>

@include ('commons.footer')
    
