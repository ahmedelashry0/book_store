@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Borrowed Books List</h1>

        @if($borrowedBooks->isEmpty())
            <p>No books are currently borrowed.</p>
        @else
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Borrowed By</th>
                    <th>Borrowed At</th>
                    <th>Return Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($borrowedBooks as $borrowedBook)
                    <tr>
                        <td>{{ $borrowedBook->book->title }}</td>
                        <td>{{ $borrowedBook->user->name }}</td>
                        <td>{{ $borrowedBook->borrow_date }}</td>
                        <td>{{ $borrowedBook->return_date ?? 'Not returned yet' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
