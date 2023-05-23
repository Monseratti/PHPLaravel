@extends('layout')
@section('content')
    <form action="{{route('userList.store')}}" class='col-6' method="post">
        @csrf
        <input class='form-control' name='name' placeholder="Name">
        <input class='form-control' name='email' type='email' placeholder="Email">
        <input class='form-control' name='phone' type='tel' placeholder="Phone">
        <input class='form-control' name='age' type="number" placeholder="Age">
        <input class='btn btn-success' type="submit" value="Create">
        <a class='btn btn-danger' href="{{URL::to('userList')}}">Back</a>
    </form>
@endsection