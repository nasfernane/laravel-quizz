<header class="header">
    <div class="header__user">
        <img class="header__userLogo" src="img/logo.png" alt="Logo Simplon">
        <span class="header__userName">
            @if (session()->has('name'))
                {{session('name')}}
            @endif
        </span>
    </div>
    
    <div class="header__navBar">
        <a class="header__navBar__link" href="/lexicon">Lexique</a>
        <a class="header__navBar__link" href="/quizz">Quizz</a>
        @if (session()->has('idUser'))
            @if (session('role') === 'admin')
                <div class="header__navBar__admin">
                    <a class="header__navBar__link" href="/admin">Utilisateurs</a>
                    <a class="header__navBar__link" href="/themes">Themes</a>
                </div>
                
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