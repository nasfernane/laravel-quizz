<header class="header">
    <p class="header__userName">
        @if (session()->has('name'))
            {{session('name')}}
        @endif
    </p>
    <form action="/logout" method="POST" 
    class="header__form">
        @csrf
        <button  class="header__form--btn">Se déconnecter</button>
    </form>
 </header>