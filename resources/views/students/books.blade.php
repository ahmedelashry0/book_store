@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Available Books</h1>
        <div class="row">
            @foreach ($books as $book)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">Author: {{ $book->author }}</p>
                            <p class="card-text">Quantity: {{ $book->quantity }}</p>
                            @if ($book->quantity > 0)
                                <form action="{{ url('student/book/borrow/'.$book->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Borrow</button>
                                </form>
                            @else
                                <button class="btn btn-secondary" disabled>Out of Stock</button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
