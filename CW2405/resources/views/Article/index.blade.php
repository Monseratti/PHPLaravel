@extends('layout')
@section('content')
<a href="{{URL::to('articles/create')}}" class='btn btn-success m-3'>Create</a>
    @if (count($articles)>0)
    <div class="container">
      <div class="row justify-content-center align-items-center g-2">    
        @foreach ($articles as $article)
          <div class="card col-3 m-3">
            <div class="card-body">
              <h4 class="card-title">{{$article->summary}}</h4>
              <p class="card-text">{{$article->short_description}}</p>
            </div>
            <div class='d-flex'>
              <a href="{{URL::to('articles/'.$article->id)}}" class='btn btn-info me-3'>Info</a>
              <a href="{{URL::to('articles/'.$article->id.'/edit')}}" class='btn btn-warning me-3'>Edit</a>
              <form method="post" class='me-3' action="{{route('articles.destroy',$article->id)}}">
                @csrf
                @method('DELETE')
                <button class='btn btn-danger'>Delete</button>
              </form>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    @endif
@endsection

