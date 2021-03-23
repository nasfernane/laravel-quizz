<header class="header">
    <div class="header__user">
        <span class="header__userName">
            @if (session()->has('name'))
                {{session('name')}}
            @endif
        </span>
    </div>
    
    <div class="header__navBar">
        @if (session()->has('idUser'))
            @if (session('role') === 'admin')
                <a class="header__navBar__link" href="/admin">admin</a>
            @endif
            <form class="header__navBar__form" method="POST" action="/logout">
                @csrf
                <button class="header__navBar__btn header__navBar__btn--logout">Se déconnecter</button>
            </form>
            
        @else
            <form class="header__navBar__form" method="POST" action="/login">
                @csrf   
                <button  class="header__navBar__btn header__navBar__btn--login">Se connecter</button>
            </form>
        @endif
    </div>
    
        
 </header>