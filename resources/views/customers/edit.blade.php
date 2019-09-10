@extends('layout/app')

@section('content')
    <h2>Edit Customer has id: {{$id}}</h2><br>
    <form action="/customers/{{$id}}" method="post">
        @csrf
        <input name="_method" type="hidden" value="put" />
        @foreach($dataArray as $value)
            @if($value['Id'] == $id)
        Name: <input type="text" name="name" value="{{$value['Name']}}"> <br>
        Number: <input type="number" name="number" value="{{$value['Number']}}"> <br>
        Email: <input type="email" name="email" value="{{$value['Email']}}"> <br>
                <button type="submit">Edit</button>
            @endif
            @endforeach
    </form>

    @endsection
