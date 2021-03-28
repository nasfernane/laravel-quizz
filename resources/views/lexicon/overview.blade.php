@extends('layouts.base')

<!-- Titre -->
@section('title', ' | Lexique')

<!-- Contenu principal -->
@section('content')
    <div class="lexiconContainer">
        <div class="lexiconContainer__addWord">
            <!-- <button class="lexiconContainer__addWord__btn">
                Ajouter un terme
            </button> -->
            <form class="lexiconContainer__addWordForm" action="/addword" method="POST">
                @csrf
                <div class="lexiconContainer__addWordForm__field lexiconContainer__addWordForm__field--word">
                    <label for="addWord--name">Terme</label>
                    <input id="addWord--name" class="lexiconContainer__addWordForm--name" type="text" name="word" required autocomplete="off">
                </div>

                <div class="lexiconContainer__addWordForm__field lexiconContainer__addWordForm__field--definition">
                    <label for="addWord--definition">Définition</label>
                    <input id="addWord--definition" class="lexiconContainer__addWordForm--definition" type="text" name="definition" autocomplete="off">
                </div>
                
                <button>Ajouter</button>
            </form>
        </div>
        <h1>Lexique</h1>

        <table class="lexiconContainer__wordsArray">
            <thead class="lexiconContainer__wordsArray--header">
                <tr>
                    <th colspan="1">Terme</th>
                    <th colspan="1">Définition</th>
                </tr>
            </thead>
            <tbody class="lexiconContainer__wordsArray--body">
                @foreach($listWords as $element)
                    <tr>
                        <td class="wordCell"><a href="/definitionsList/{{ $element->idWord }}">{{$element->name}}</a></td>
                        <td class="contentCell">
                            @if ($element->content !== null)
                                {{ $element->content }}
                            @else 
                                <span class="contentCell--empty">
                                    Ce terme ne dispose pas encore d'une définition &#x2192; 
                                    <a href="/definitionsList/{{ $element->idWord }}">En ajouter une</a>
                                </span>
                            @endif
                        </td>
                        <td class="deleteCell">
                            <form action="/deleteword" method="POST">
                                @csrf
                                <input type="hidden" value=" {{$element->idWord}} " name="idWord">
                                <input type="hidden" value=" {{$element->idDefinition}} " name="idDefinition">
                                @if (session('role') === 'admin')
                                    <button type="submit" title="Supprimer ce mot"><img src="img/delete.png" alt="Delete Button"></button>
                                @endif
                            </form>
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
@endsection