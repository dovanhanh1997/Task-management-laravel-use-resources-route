@extends('layout/app')

@section('content')
    <h1>Customer List</h1>
    <table border="1">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Number Phone</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dataArray as $key => $value)
            @if($value != null)
                <tr>
                    <td>{{$value['Id']}}</td>
                    <td>{{$value['Name']}}</td>
                    <td>{{$value['Number']}}</td>
                    <td>{{$value['Email']}}</td>
                    <td>
                        <a href="customers/{{$value['Id']}}">Show</a> | <a
                            href="customers/{{$value['Id']}}/edit">Edit</a> | <a
                            href="customers/{{$value['Id']}}/delete">Delete</a>
                    </td>
                </tr>
        @endif
        @endforeach
    </table>
@endsection


