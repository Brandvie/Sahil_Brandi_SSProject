@extends("layouts.app")

@section("title", "Book: " . $book->title)

@section("content")
<div class="card">
    <div class="card-header">
        <h1>{{ $book->title }}</h1>
        <small>By <a href="{{ route("authors.show", $book->author) }}">{{ $book->author->name ?? "Unknown Author" }}</a> in <a href="{{ route("categories.show", $book->category) }}">{{ $book->category->name ?? "Uncategorized" }}</a></small>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <p><strong>Description:</strong></p>
                <p>{{ $book->description ?? "No description provided." }}</p>
                
                <hr>
                
                <p><strong>ISBN:</strong> {{ $book->isbn ?? "N/A" }}</p>
                <p><strong>Publication Year:</strong> {{ $book->publication_year ?? "N/A" }}</p>
                
                @if($book->esoteric_keywords)
                <p><strong>Esoteric Keywords:</strong> {{ $book->esoteric_keywords }}</p>
                @endif
                @if($book->spiritual_focus)
                <p><strong>Spiritual Focus:</strong> {{ $book->spiritual_focus }}</p>
                @endif
                @if($book->manifestation_techniques)
                <p><strong>Manifestation Techniques:</strong></p>
                <p>{{ $book->manifestation_techniques }}</p>
                @endif
            </div>
            <div class="col-md-4">
                {{-- Placeholder for Cover Image --}}
                {{-- @if($book->cover_image_path)
                    <img src="{{ asset("storage/" . $book->cover_image_path) }}" alt="Cover Image" class="img-fluid img-thumbnail">
                @else
                    <div class="text-center text-muted border p-5">No Cover Image</div>
                @endif --}}
                <div class="text-center text-muted border p-5">Cover Image Placeholder</div>
            </div>
        </div>
    </div>
    <div class="card-footer text-muted">
        <a href="{{ route("books.edit", $book) }}" class="btn btn-warning">Edit Book</a>
        <a href="{{ route("books.index") }}" class="btn btn-secondary">Back to Books List</a>
        <form action="{{ route("books.destroy", $book) }}" method="POST" class="d-inline float-end" onsubmit="return confirm("Are you sure you want to delete this book?");">
            @csrf
            @method("DELETE")
            <button type="submit" class="btn btn-danger">Delete Book</button>
        </form>
    </div>
</div>

@endsection

