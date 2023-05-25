@extends('layout')
@section('content')
<form action="{{route('articles.store')}}" class='col-6' method="post" enctype="multipart/form-data">
    @csrf
    <input class='form-control' id='summary' name='summary' placeholder="Summary" oninput="Validate()">
    <input class='form-control' id='short_description' name='short_description' placeholder="Short description" oninput="Validate()">
    <textarea class='form-control' id='full_text' name="full_text" placeholder='Atricle text' cols="30" rows="10" oninput="Validate()"></textarea>
    <input type="file" accept="image/png, image/jpeg" name="image" id="">
    <input class='btn btn-success' disabled id="createBtn" type="submit" value="Create">
    <a class='btn btn-danger' href="{{URL::to('articles')}}">Back</a>
</form>
@endsection
@section('Scripts')
    <script>
        function Validate(){
            let btn = document.getElementById("createBtn");
            let summary = document.getElementById('summary').value;
            let sText = document.getElementById('short_description').value;
            let fText = document.getElementById('full_text').value;
            let isValid = false;
            if( (summary.length>0 && summary.length<50)
                &&(sText.length>0 && sText.length<150)
                &&(fText.length>0 && fText.length<5000)){
                isValid = true;
            }
            if(btn.hasAttribute('disabled')&&isValid){
                btn.removeAttribute('disabled');
            }
            else if(!btn.hasAttribute('disabled')&&!isValid){
                btn.setAttribute('disabled',true);
            }
        }
    </script>
@endsection