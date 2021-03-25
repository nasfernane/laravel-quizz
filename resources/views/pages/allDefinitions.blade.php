@extends('base')

@section('content')
@include ('../commons/header')
<div class="lexiconContainer">
    
<table class="lexiconContainer__wordsArray">
        <thead class="lexiconContainer__wordsArray--header">
            <tr>
                <th colspan="1">Terme</th>
                <th colspan="1">Définition</th>
            </tr>
        </thead>
        <tbody class="lexiconContainer__wordsArray--body">
            @foreach($listDefinitions as $element)
                <tr>                    
                    <td class="wordCell">{{$element->name}} </td>
                    <td class="contentCell">{{ $element->content }}</td>
                    @if($element->is_valid === 0 )
                    <td class="deleteCell">
                        <form action="/validDefinition" method="POST">
                            @csrf
                            <input type="hidden" value=" {{$element->idDefinition}} " name="idDefinition">
                            <button type="submit" title="Valider la réponse "><img src="img/validation.png" width="30rem" alt="Valid Button"></button>
                        </form>
                    </td>
                    @else
                    <td class="deleteCell">
                        <form action="/removeValidation" method="POST">
                            @csrf
                            <input type="hidden" value=" {{$element->idDefinition}} " name="idDefinition">
                            <button type="submit" title="Enlever la validation "><img src="img/invalid.png" width="30rem"  alt="Invalid Button"></button>
                        </form>
                    </td>
                    @endif
                    <td class="deleteCell">
                    <button class="addComment" title="Ajouter un commentaire "><img src="img/add_icon.png" width="30rem"  alt="add Button"></button>
                    </td>    
                    <td class="deleteCell">
                       <form class="commentForm" action="/addComment" method="POST">
                            @csrf
                            <input type="hidden" value=" {{$element->idDefinition}} " name="idDefinition">
                            
                        </form>
                    </td> 
                    
                </tr> 
            @endforeach
        </tbody>
    </table>
</div>

<script>
    const commentForm = document.querySelectorAll(".commentForm")
    const buttonAddComment = document.querySelectorAll(".addComment")
    buttonAddComment.forEach( (buttonAdd)=>{
        buttonAdd.addEventListener("click", function (){
        const form =this.parentNode.nextSibling.nextSibling.childNodes[1];
        form.insertAdjacentHTML("afterbegin",`<input id="comment" type="text" name="comment" required autocomplete="off"><button  type="submit" title="Ajouter un commentaire">Send</button>`)
        buttonAdd.style="display :none;"
        })
    })
    
</script>
@stop