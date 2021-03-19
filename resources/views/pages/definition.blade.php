@extends('base');

@section('content');
<h1>definition</h1>
@if(isset($definitions))
    @foreach ($definitions as $definition) 
            <p>{{ $definition->content }}</p>
    @endforeach
@endif
<button onclick="window.location.href ='/quizz';">continuer le quizz</button>
@stop