@extends('layout/app')

@section('content')
    <div>
        <form action="/customers" method="post">
            @csrf
            Create Customer <br>
            Name: <input type="text" name="name">
            Number: <input type="number" name="number">
            Email: <input type="email" name="email">
            Id: <input type="number" name="id">

            <button type="submit">Create</button>

        </form>
    </div>
@endsection
