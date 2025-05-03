@extends("layouts.app")

@section("title", "Authors")

@section("content")
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Authors</h1>
    <a href="{{ route("authors.create") }}" class="btn btn-primary">Add New Author</a>
</div>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Bio Snippet</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($authors as $author)
            <tr>
                <th scope="row">{{ $author->id }}</th>
                <td>{{ $author->name }}</td>
                <td>{{ Str::limit($author->bio, 100) }}</td>
                <td>
                    <a href="{{ route("authors.show", $author) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route("authors.edit", $author) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route("authors.destroy", $author) }}" method="POST" class="d-inline" onsubmit="return confirm("Are you sure you want to delete this author? This might also affect associated books.");">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">No authors found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{-- Pagination Links --}}
<div class="d-flex justify-content-center">
    {{ $authors->links() }}
</div>

@endsection

