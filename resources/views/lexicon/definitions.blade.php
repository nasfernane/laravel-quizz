@extends('layouts.base')

<!-- Titre -->
@section('title', $word->name)

<!-- Contenu principal -->
@section('content')
    @include ('layouts.header')

    <!-- cette page reprend les memes noms de classe et le meme format que "lexicon.blade.php" pour recuperer son css sur "_lexicon.scss"  -->
    <div class="lexiconContainer">

        <!-- terme -->
        <h1>{{ $word->name }}</h1>

        <!-- ajout sprint 2 mathieu pour ajouter une définition à un mot -->
            <!-- ajoute une definition -->        
            <form class="lexiconContainer__addDefinitionForm" method="POST" action="/addDefinition">
            @csrf
                <span>Envie d'ajouter une définition ?</span>
                <div class="lexiconContainer__addDefinitionForm__field">
                    <label for="auteur">Ton nom</label>
                    <input id="auteur" name="author" type="text" autocomplete="off" required>
                </div>
                <div class="lexiconContainer__addDefinitionForm__field">
                    <label for="text">Ta définition</label>
                    <input name="definition" id="text" autocomplete="off" required></input>
                </div>
                <input type="hidden" name="idWord" value="{{ $word->idWord }}">
                <button class="lexiconContainer__addDefinitionForm__btn">Ajouter</button>
        </form>
            <!-- fin ajout mathieu -->
    

        <table class="lexiconContainer__wordsArray">
            
            @isset ($definitionList[0])
                <thead class="lexiconContainer__wordsArray--header">
                    <tr>
                        <th colspan="1">Auteur</th>
                        <th colspan="1">Définition</th>
                    </tr>
                </thead>
            @endisset
            <tbody class="lexiconContainer__wordsArray--body">
                    @forelse($definitionList as $definition)
                        <tr>
                            <td class="wordCell">
                                @if ($definition->author !== null)
                                    {{ $definition->author }}
                                @else
                                    <i class="fas fa-user"></i>
                                @endif 
                            </td>                       
                            <!-- modif sprint 2 mathieu -->
                            <!-- <td class="contentCell">{{ $definition->content }}</td> -->
                            <td class="contentCell">
                            @if ($definition->content)
                                {{ $definition->content }}
                            @else
                                <i style="color:rgb(58, 58, 156)" class="fas fa-exclamation-circle"></i> Aucune définition n'est disponible pour le moment. 
                                <a style="color:rgb(144, 144, 144)" href="/addDefinition/{{ $definition->idWord }}/{{$definition->name}}">Ajoutez une définition</a>
                            @endif  
                            </td>
                            <!-- fin modif -->
                            
                            <td style="color:green" class="deleteCell">
                                @if ($definition->is_valid === 1)
                                    <i class="fas fa-check-circle"></i>
                                @endif
                            </td>
                        </tr> 
                    @empty
                        <p>Ce terme ne dipose pas encore d'une définition.</p>
                    @endforelse
            </tbody>
        </table>
    </div>

@endsection