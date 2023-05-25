@extends('layout')
@section('content')
<a class='btn btn-danger m-3' href="{{URL::to('articles')}}">Back</a>
@if (isset($article))
    <div class='m-3'>
        <blockquote class="blockquote mb-0">
            <h2>{{$article->summary}}</h2>
            <footer class="blockquote-footer"><cite title="Source title">{{$article->short_description}}</cite></footer>
          </blockquote>
        <p>{{$article->full_text}}</p>
    </div>
@endif
@endsection