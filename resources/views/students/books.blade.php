@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <h1 class="mb-4">Available Books</h1>
        <div class="row">
            @foreach ($books as $book)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text"><strong>Author:</strong> {{ $book->author }}</p>
                            <p class="card-text"><strong>Quantity:</strong> {{ $book->quantity }}</p>

                            <a href="{{ url('book/details/' . $book->id) }}" class="btn btn-info">View Details</a>

                            @if ($book->quantity > 0)
                                <form action="{{ url('book/borrow/' . $book->id) }}" method="POST" class="mt-2">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Borrow Book</button>
                                </form>
                            @else
                                <button class="btn btn-secondary mt-2" disabled>Out of Stock</button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
