@extends("layouts.app")

@section("title", "Author: " . $author->name)

@section("content")
<div class="card">
    <div class="card-header">
        <h1>{{ $author->name }}</h1>
    </div>
    <div class="card-body">
        <p><strong>Biography:</strong></p>
        <p>{{ $author->bio ?? "No biography provided." }}</p>
        
        <hr>
        
        {{-- Placeholder for listing books by this author --}}
        <h5>Books by this Author:</h5>
        @if($author->books && $author->books->count() > 0)
            <ul>
                @foreach($author->books as $book)
                    <li><a href="{{ route("books.show", $book) }}">{{ $book->title }}</a></li>
                @endforeach
            </ul>
        @else
            <p>No books found by this author yet.</p>
        @endif

    </div>
    <div class="card-footer text-muted">
        <a href="{{ route("authors.edit", $author) }}" class="btn btn-warning">Edit Author</a>
        <a href="{{ route("authors.index") }}" class="btn btn-secondary">Back to Authors List</a>
        <form action="{{ route("authors.destroy", $author) }}" method="POST" class="d-inline float-end" onsubmit="return confirm("Are you sure you want to delete this author? This might also affect associated books.");">
            @csrf
            @method("DELETE")
            <button type="submit" class="btn btn-danger">Delete Author</button>
        </form>
    </div>
</div>

@endsection

