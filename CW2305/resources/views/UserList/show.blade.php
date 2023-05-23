@extends('layout')
@section('content')
@if (isset($user)) 
<h2>{{$user->name}}</h2>
<ul>
    <li>Age: {{$user->age}}</li>
    <li>Email: {{$user->email}}</li>
    <li>Phone: {{$user->phone}}</li>
</ul>
<a class='btn btn-danger' href="{{URL::to('userList')}}">Back</a>
@endif
@endsection