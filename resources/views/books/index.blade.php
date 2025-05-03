@extends("layouts.app")

@section("title", "Books")

@section("content")
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Books</h1>
    <a href="{{ route("books.create") }}" class="btn btn-primary">Add New Book</a>
</div>

{{-- Add search/filter form here later if needed --}}

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Category</th>
            <th scope="col">ISBN</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($books as $book)
            <tr>
                <th scope="row">{{ $book->id }}</th>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author->name ?? "N/A" }}</td>
                <td>{{ $book->category->name ?? "N/A" }}</td>
                <td>{{ $book->isbn ?? "N/A" }}</td>
                <td>
                    <a href="{{ route("books.show", $book) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route("books.edit", $book) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route("books.destroy", $book) }}" method="POST" class="d-inline" onsubmit="return confirm("Are you sure you want to delete this book?");">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">No books found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{-- Pagination Links --}}
<div class="d-flex justify-content-center">
    {{ $books->links() }}
</div>

@endsection

