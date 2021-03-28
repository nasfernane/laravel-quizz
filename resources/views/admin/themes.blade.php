@extends('layouts.base')

<!-- Titre -->
@section('title', ' | Themes')

<!-- Contenu principal -->
@section('content')
    <div class="themeContainer">
        <div class="themeContainer__addTheme">
            <!-- <button class="themeContainer__addWord__btn">
                Ajouter un terme
            </button> -->
            <form class="themeContainer__addThemeForm" action="/addtheme" method="POST">
                @csrf
                <label for="addTheme">Ajouter un nouveau thème : </label>
                <input id="addTheme" type="text" name="addTheme" required autocomplete="off">
                <button>Ajouter</button>
            </form>
        </div>
        <h1>Themes</h1>

        <table class="themeContainer__wordsArray">
            <thead class="themeContainer__wordsArray--header">
                <tr>
                    <th colspan="1">Terme</th>
                    <th colspan="1">Themes</th>
                </tr>
            </thead>
            <tbody class="themeContainer__wordsArray--body">
                @foreach($words as $word)
                    <tr>
                        <td class="wordCell">{{$word->name}}</td>
                        <td class="themesCell">
                        <form action="/modifytheme" method="POST">
                            @csrf
                            @foreach ($themes as $theme)
                                <div class="themesField">
                                    @if ($theme->categoryName === $word->categoryName)
                                    <input type="radio" value="{{ $theme->categoryName }}" id="{{ $theme->categoryName }}" name="theme" checked>
                                    @else
                                    <input type="radio" value="{{ $theme->categoryName }}" id="{{ $theme->categoryName }}" name="theme">
                                    @endif
                                    <label for="{{ $theme->categoryName }}">{{ $theme->categoryName }}</label>
                                </div>                             
                            @endforeach
                            <input type="hidden" value="{{$word->idWord}}" name="idWord">
                            <button type="submit"><img src="img/update.png" alt="Update Button"></button>
                        </form>
                        </td>
                        <!-- <td class="deleteCell">
                            
                        </td> -->
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
@endsection