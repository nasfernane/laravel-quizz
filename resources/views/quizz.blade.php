@include ('commons.header')

<div class="quizzContainer">

    <h1>QUIZZ</h1>
    <div class="wordContainer">
        {{ $word->name }}
    </div>

    <div class="buttonContainer">

        <button class="jeSais" onclick="window.location.href ='/quizz';">Je sais</button>

        <form class="jeSaisPas" method="POST" action="/definition">
        @csrf
            <input type="hidden" name="idWord" value="{{ $word->idWord }}">
            <button type="submit">Je sais pas</button>
        </form>
        
    </div>


</div>


@include ('commons.footer')