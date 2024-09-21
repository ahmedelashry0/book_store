@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Student Details</h1>

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $user->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
        </table>

        <a href="{{ route("admin.users") }}" class="btn btn-primary">Back to Students List</a>
    </div>
@endsection
