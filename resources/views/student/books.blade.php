@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($books as $book)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            @if ($book->quantity > 0)
                                    @csrf
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
