@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin Dashboard</h1>
        <!-- Search Form -->
        <div class="row mb-4">
            <div class="col-md-12">
                <form action="{{ route('admin.users') }}" method="GET" class="form-inline">
                    <div class="form-group">
                        <label for="search">Search by ID:</label>
                        <input type="text" name="search" id="search" class="form-control ml-2" placeholder="Enter User ID">
                    </div>
                    <button type="submit" class="btn btn-primary ml-2">Search</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Manage Users</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <a href="{{ route("admin.user.view",$user->id) }}" class="btn btn-primary">View</a>
                                <form action="{{ url('admin/user/delete/'.$user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
