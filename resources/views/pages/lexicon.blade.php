@extends('base')

@section('content')
@include ('../commons/header')
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
                <input id="addWord--definition" class="lexiconContainer__addWordForm--definition" type="text" name="definition" required autocomplete="off">
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
                    <td class="wordCell">{{$element->name}} </td>
                    <td class="contentCell">{{ $element->content }}</td>
                    <td class="deleteCell">
                        <form action="/deleteword" method="POST">
                            @csrf
                            <input type="hidden" value=" {{$element->idWord}} " name="idWord">
                            <input type="hidden" value=" {{$element->idDefinition}} " name="idDefinition">
                            <button type="submit" title="Supprimer ce mot"><img src="img/delete.png" alt="Delete Button"></button>
                        </form>
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>
</div>
@stop