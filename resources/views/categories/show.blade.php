@extends("layouts.app")

@section("title", "Category: " . $category->name)

@section("content")
<div class="card">
    <div class="card-header">
        <h1>{{ $category->name }}</h1>
    </div>
    <div class="card-body">
        <p><strong>Description:</strong></p>
        <p>{{ $category->description ?? "No description provided." }}</p>
        
        <hr>
        
        {{-- Placeholder for listing books in this category --}}
        <h5>Books in this Category:</h5>
        @if($category->books && $category->books->count() > 0)
            <ul>
                @foreach($category->books as $book)
                    <li><a href="{{ route("books.show", $book) }}">{{ $book->title }}</a></li>
                @endforeach
            </ul>
        @else
            <p>No books found in this category yet.</p>
        @endif

    </div>
    <div class="card-footer text-muted">
        <a href="{{ route("categories.edit", $category) }}" class="btn btn-warning">Edit Category</a>
        <a href="{{ route("categories.index") }}" class="btn btn-secondary">Back to Categories List</a>
        <form action="{{ route("categories.destroy", $category) }}" method="POST" class="d-inline float-end" onsubmit="return confirm("Are you sure you want to delete this category?");">
            @csrf
            @method("DELETE")
            <button type="submit" class="btn btn-danger">Delete Category</button>
        </form>
    </div>
</div>

@endsection

