@extends('base')

<!-- Titre -->
@section('title', 'Admin')

<!-- Contenu principal -->
@section('content')
<div class="adminContainer">
@include ('../commons/header')
    <h1>Utilisateurs</h1>
    <div class="adminContainer__usersTitle">
        <span>Nom de l'utilisateur</span>
        <span>Adresse e-mail</span>
        <span>Rôle</span>
        <span class="emptySpan"></span>
    </div>
    <div class="adminContainer__usersList">
        @foreach ($users as $user)
            <div class="adminContainer__usersList__user">
                <span class="adminContainer__usersList__user--name">
                    {{$user->name}}
                </span> 
                
                <span class="adminContainer__usersList__user--email">
                    {{$user->email}}
                </span>
                <span class="adminContainer__usersList__user--role">
                    {{$user->role}}
                </span>
                <div class="adminContainer__usersList__user--modify">
                    <form action="/togglerole" method="POST">
                        @csrf
                        <input type="hidden" value="{{$user->idUser}}" name="idUser">
                        <input type="hidden" value="{{$user->role}}" name="role">                      
                        <button type="submit" title="Changer le rôle de l'utilisateur"><img src="img/togglerole.png" alt="Changer Rôle Utilisateur"></button>
                    </form>
                    <form action="/deleteuser" method="POST">
                        @csrf
                        <input type="hidden" value="{{$user->idUser}}" name="idUser">                       
                        <button type="submit" title="Supprimer ce mot"><img src="img/delete.png" alt="Delete Button"></button>
                    </form>
                </div>
                
            </div>
        @endforeach
    </div>
</div>
@endsection