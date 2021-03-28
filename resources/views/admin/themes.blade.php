@extends('layouts.base');

<!-- Titre -->
@section('title', 'Themes')

<!-- Contenu principal -->
@section('content');
    <div class="themeContainer">
        <h1>Themes</h1>
        @if(isset($words))
            @foreach ($words as $word).
                    <div class="themeContainer__word">
                        <p>{{ $definition->content }}</p>
                        <select name="theme" id="select-{{$word}}" class="themeContainer__word__select">
                            
                        </select>
                    </div>
                    
            @endforeach
        @endif
        <button onclick="window.location.href ='/quizz';">continuer le quizz</button>
    </div>
@endsection