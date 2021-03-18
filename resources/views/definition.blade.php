<h1>definition</h1>
@if(isset($definitions))
    @foreach ($definitions as $definition) 
            {{ $definition->content }}
    @endforeach
@endif
<button onclick="window.location.href ='/quizz';">continuer le quizz</button>