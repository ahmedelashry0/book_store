@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Borrowed Books</h1>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Borrow Date</th>
                <th>Return Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($borrowedBooks as $borrow)
                <tr>
                    <td>{{ $borrow->book->title }}</td>
                    <td>{{ $borrow->book->author }}</td>
                    <td>{{ $borrow->borrow_date }}</td>
                    <td>{{ $borrow->return_date ? $borrow->return_date : 'Not Returned' }}</td>
                    <td>
                        @if (!$borrow->return_date)
                            <form action="{{ url('book/return/'.$borrow->book->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Return</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
