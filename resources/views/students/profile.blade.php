@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Your Profile</h1>

        <form action="{{ url('students/profile/update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password (Leave blank if not changing)</label>
                <input type="password" name="password" class="form-control" placeholder="New Password">
            </div>

            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
@endsection
