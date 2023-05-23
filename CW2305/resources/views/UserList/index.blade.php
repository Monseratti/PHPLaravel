@extends('layout')
@section('content')
<a href="{{URL::to('userList/create')}}" class='btn btn-success me-3'>Create</a>
@if (count($userList)>0)
<table class="table table-dark">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Age</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Operations</th>
        </tr>
    </thead>
    <tbody >
        @foreach ($userList as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->age}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>
                <td>
                    <div class='d-flex'>
                        <a href="{{URL::to('userList/'.$user->id)}}" class='btn btn-info me-3'>Info</a>
                        <a href="{{URL::to('userList/'.$user->id.'/edit')}}" class='btn btn-warning me-3'>Edit</a>
                        <form method="post" class='me-3' action="{{route('userList.destroy',$user->id)}}">
                            @csrf
                            @method('DELETE')
                            <button class='btn btn-danger'>Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$userList->links()}}
{{-- <nav>
    <ul class="pagination justify-content-center">
    </ul>
</nav> --}}
@endif
@endsection
@section('Scripts')
{{-- <script>
    $(document).ready(function () {
        var rowsShown = 10;
        var rowsTotal = $('table tbody tr').length;
        var numPages = Math.ceil(rowsTotal / rowsShown);
        if (numPages==1) return;
        for (i = 1; i <= numPages; i++) {
            var pageNum = i - 1;
            $('.pagination').append('<li class="page-item"><a class="page-link" href="#" rel="' + pageNum + '">' + i + '</a></li> ');
        }
        $('table tbody tr').hide();
        $('table tbody tr').slice(0, rowsShown).show();
        $('.pagination li:first-child').addClass('active');
        $('.pagination a').bind('click', function () {
            $('.pagination li').removeClass('active');
            $(this).parent().addClass('active');
            var currPage = $(this).attr('rel');
            var startItem = currPage * rowsShown;
            var endItem = startItem + rowsShown;
            $('table tbody tr').css('opacity', '0.0').hide().slice(startItem, endItem).
                css('display', 'table-row').animate({ opacity: 1 }, 300);
        });
    });
</script> --}}
@endsection