@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">{{ $book->title }}</h2>
                        <p class="card-text"><strong>Author:</strong> {{ $book->author }}</p>
                        <p class="card-text"><strong>Quantity Available:</strong> {{ $book->quantity }}</p>

                        <p class="card-text">
                            <strong>Description:</strong>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut orci vel risus fringilla gravida non at risus. <!-- You can later replace this with real book descriptions -->
                        </p>

                        @if ($book->quantity > 0)
                            <form action="{{ url('book/borrow/' . $book->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Borrow Book</button>
                            </form>
                        @else
                            <button class="btn btn-secondary" disabled>Out of Stock</button>
                        @endif
                    </div>
                </div>

                <a href="{{ route('students.dashboard') }}" class="btn btn-secondary">Back to Books List</a>
            </div>
        </div>
    </div>
@endsection
