@extends('base')

@section('content')
@include ('../commons/header')


{{-- cette page reprend les memes noms de classe et le meme format que --}}
{{-- "lexicon.blade.php" pour recuperer son css sur "_lexicon.scss" --}}
<div class="lexiconContainer">

    {{-- terme  --}}
    <h1>{{ $definitionList[0]->name }}</h1>
  

    <table class="lexiconContainer__wordsArray">
        <thead class="lexiconContainer__wordsArray--header">
            <tr>
                <th colspan="1">Auteur</th>
                <th colspan="1">Définition</th>
            </tr>
        </thead>
        <tbody class="lexiconContainer__wordsArray--body">
            @foreach($definitionList as $definition)
                <tr>
                    <td class="wordCell">
                        @if ($definition->author !== null)
                            {{ $definition->author }}
                        @else
                            <i class="fas fa-user"></i>
                        @endif 
                    </td>
                    <td class="contentCell">{{ $definition->content }}</td>
                    <td style="color:green" class="deleteCell">
                        @if ($definition->is_valid === 1)
                            <i class="fas fa-check-circle"></i>
                        @endif
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>
</div>

@stop