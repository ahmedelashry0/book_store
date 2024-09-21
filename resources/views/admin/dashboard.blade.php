@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin Dashboard</h1>
        <div class="row">
            <div class="col-md-12">
                <h3>Manage Books</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->quantity }}</td>
                            <td>
                                <a href="{{ route("admin.edit",$book->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ url('admin/book/delete/'.$book->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <h3>Add New Book</h3>
                <form action="{{ route("admin.add") }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Book Title" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="author" class="form-control" placeholder="Author" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="quantity" class="form-control" placeholder="Quantity" required>
                    </div>
                    <button type="submit" class="btn btn-success">Add Book</button>
                </form>
            </div>
        </div>
    </div>
@endsection
