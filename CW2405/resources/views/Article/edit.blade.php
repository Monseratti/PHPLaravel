@extends('layout')
@section('content')
<form action="{{route('articles.update',$article->id)}}" class='col-6' method="post">
    @csrf
    <input class='form-control' id='summary' name='summary' placeholder="Summary" oninput="Validate()" value={{$article->summary}}>
    <input class='form-control' id='short_description' name='short_description' placeholder="Short description" oninput="Validate()" value={{$article->short_description}}>
    <textarea class='form-control' id='full_text' name="full_text" placeholder='Atricle text' cols="30" rows="10" oninput="Validate()">{{$article->full_text}}</textarea>
    <input class='btn btn-warning' disabled id="createBtn" type="submit" value="Edit">
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