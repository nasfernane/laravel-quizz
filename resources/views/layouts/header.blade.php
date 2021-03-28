<header class="header">
    <div class="header__user">
        <img class="header__userLogo" src="/img/logo.png" alt="Logo Simplon">
        <span class="header__userName">
            @if (session()->has('name'))
                {{session('name')}}
            @else
                Visiteur
            @endif
        </span>
    </div>
    
    <div class="header__navBar">
        <a class="header__navBar__link" href="/lexicon">Lexique</a>
        <a class="header__navBar__link" href="/quizz">Quizz</a>
        @if (session()->has('idUser'))
            @if (session('role') === 'admin')
                <div class="header__navBar__admin">
                    <span>Admin &#x2192;</span>
                    <a class="header__navBar__link" href="/users">Utilisateurs</a>
                    <a class="header__navBar__link" href="/themes">Themes</a>
                    <a class="header__navBar__link" href="/validation">Validation</a>
                </div>
                
            @endif
            <form class="header__navBar__form" method="POST" action="/logout">
                @csrf
                <button class="header__navBar__btn header__navBar__btn--logout">Se déconnecter</button>
            </form>
            
        @else
            <form class="header__navBar__form" method="GET" action="/login">
                <button  action="/login" class="header__navBar__btn header__navBar__btn--login">Se connecter</button>
            </form>
        @endif
    </div>
    
        
 </header>