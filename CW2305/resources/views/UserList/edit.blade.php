@extends('layout')
@section('content')
    <form action="{{route('userList.update', $user->id)}}" class='col-6' method="post">
        @csrf
        @method('PUT')
        <input class='form-control' name='name' placeholder="Name" value="{{$user->name}}">
        <input class='form-control' name='email' type='email' placeholder="Email" value="{{$user->email}}">
        <input class='form-control' name='phone' type='tel' placeholder="Phone" value="{{$user->phone}}">
        <input class='form-control' name='age' type="number" placeholder="Age" value="{{$user->age}}">
        <input class='btn btn-warning' type="submit" value="Edit">
        <a class='btn btn-danger' href="{{URL::to('userList')}}">Back</a>
    </form>
@endsection