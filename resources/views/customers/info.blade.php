@extends('layout/app')

@section('content')

    Information of Customer have id: <?php echo $id; ?>

    <table border="1">
        <thead>
        <tr>
            <th>Name</th>
            <th>Number Phone</th>
            <th>Email</th>
            <th>Id</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dataArray as $value)
            @if($value['Id'] == $id)
                <tr>
                    <td>{{$value['Name']}}</td>
                    <td>{{$value['Number']}}</td>
                    <td>{{$value['Email']}}</td>
                    <td>{{$value['Id']}}</td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
@endsection
