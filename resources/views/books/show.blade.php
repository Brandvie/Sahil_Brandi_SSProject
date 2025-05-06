@extends("layouts.app")

@section("title", "Book: " . $book->title)

@section("content")
<div class="container">
    <div class="book-details">
        <h1>{{ $book->title }}</h1>
        <p><strong>Author:</strong> {{ $book->author->name }}</p>
        <p><strong>Category:</strong> {{ $book->category->name }}</p>
        <p><strong>Description:</strong> {{ $book->description }}</p>
        <p><strong>Publication Year:</strong> {{ $book->publication_year }}</p>
        <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
    </div>
</div>
@endsection

