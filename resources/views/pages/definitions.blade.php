@extends('base')

<!-- Titre -->
@section('title', $definitionList[0]->name)

<!-- Contenu principal -->
@section('content')
    @include ('../commons/header')

    <!-- cette page reprend les memes noms de classe et le meme format que "lexicon.blade.php" pour recuperer son css sur "_lexicon.scss"  -->
    <div class="lexiconContainer">

        <!-- terme -->
        <h1>{{ $definitionList[0]->name }}</h1>
    

        <table class="lexiconContainer__wordsArray">
            <!-- ajout sprint 2 mathieu pour ajouter une définition à un mot -->
            <!-- ajoute une definition -->
            <h2>Ajoutez une définition</h2>
            <form method="POST" action="/addDefinition">

                @csrf
                <input type="hidden" name="idWord" value="{{ $definitionList[0]->idWord }}">
                <label for="auteur">Votre nom</label>
                <input id="auteur" name="author" type="text" required>
                <label for="text">ajoutez votre définition</label>
                <textarea name="definition" id="text" cols="30" rows="10" required></textarea>
            
                <button>ajouter</button>
            
            </form>
            <!-- fin ajout mathieu -->
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
                @endforeach
            </tbody>
        </table>
    </div>

@endsection