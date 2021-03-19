@extends('base');

@section('content');
<div class="loginContainer">
    
    <form action="/loguser" method="POST" class="loginForm" >
        @csrf
        <h1>Se connecter</h1>
        <div class="loginForm__field">
            <label for="loginFormEmail">Votre adresse e-mail</label>
            <input id="loginFormEmail" class="loginForm__field--email" type="email" placeholder="ex: maxime@leforestier.fr" name="email">
        </div>

        <div class="loginForm__field">
            <label for="loginFormPw">Votre mot de passe</label>
            <input type="password" id="loginFormPw" class="loginForm__field--pw" autocomplete="off" placeholder="*********" name="password">
        </div>

        <button class="loginForm__btn" type="submit">Se connecter</button>
        <p class="loginForm__link">Besoin d'un compte ? <a href="/signup">S'inscrire</a></p>
    </form>  
</div>
@stop