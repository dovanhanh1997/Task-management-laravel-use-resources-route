@extends('layout/app')
@section('content')
    <form action="/customers/{{$id}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="delete">
        <h2>Do you want to delete this customer id: {{$id}}</h2> <br>
        <button type="submit">OK</button>
        <a href="/customers">Cancel</a>
    </form>
@endsection
