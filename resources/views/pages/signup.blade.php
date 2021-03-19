@extends('base');

@section('content');
<div class="signUpContainer">
    
    <form action="/createuser" method="POST" class="signUpForm">
        @csrf   
        <h1>Prêt pour s'inscrire ?</h1>
        <div class="signUpForm__field">
            <label for="signUpFormEmail">Votre adresse e-mail</label>
            <input id="signUpFormEmail" class="signUpForm__field--email" type="email" placeholder="ex: maxime@leforestier.fr" name="email">
        </div>

        <div class="signUpForm__field">
            <label for="signUpFormName">Votre nom</label>
            <input type="text" id="signUpFormName" class="signUpForm__field--name" placeholder="ex: Maxime" name="user">
        </div>

        <div class="signUpForm__field">
            <label for="signUpFormPw">Votre mot de passe</label>
            <input type="password" id="signUpFormPw" class="signUpForm__field--pw" autocomplete="off" placeholder="*********" name="password">
        </div>

        <div class="signUpForm__field">
            <label for="signUpFormPwConfirm">Confirmation de votre mot de passe</label>
            <input type="password" id="signUpFormPwConfirm" class="signUpForm__field--pwConfirm" autocomplete="off" placeholder="*********" name="passwordconfirm">
        </div>

        <button class="signUpForm__btn" type="submit">Continuer</button>
        <p class="signUpForm__link"> Vous avez déjà un compte ? <a href="/login">Se connecter</a></p>
    </form>
</div>
@stop
