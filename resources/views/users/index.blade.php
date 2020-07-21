@extends('layouts.app')

@section('content')
    
    <div class="container">
        <h1>List of Users</h1>

        <table id="customers">
            <th>Id</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Updated At</th>

            @foreach($users as $user)
                <tr>
                    <td> {{ $user->id }}</td>
                    <td> {{ $user->name }}</td>
                    <td> {{ $user->username }}</td>
                    <td> {{ $user->email }}</td>
                    <td> {{ $user->created_at }}</td>
                    <td> {{ $user->updated_at}}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="paginationLink">
        {{ $users->links() }}
    </div>
@endsection
