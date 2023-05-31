@extends('layout')
@section('content')
<form action="{{route('login.store')}}" class='col-6' method="post">
    @csrf
    <input class='form-control' name='email' type="email" placeholder="Email">
    <input class='btn btn-success' type="submit" value="Send code">
    <a class='btn btn-danger' href="{{URL::to('/')}}">Back</a>
</form>
@endsection