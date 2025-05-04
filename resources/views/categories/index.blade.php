@extends("layouts.app")

@section("title", "Categories")

@section("content")
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Categories</h1>
    <a href="{{ route("categories.create") }}" class="btn btn-primary">Add New Category</a>
</div>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
                <td>{{ Str::limit($category->description, 100) }}</td>
                <td>
                    <a href="{{ route("categories.show", $category) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route("categories.edit", $category) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route("categories.destroy", $category) }}" method="POST" class="d-inline" onsubmit="return confirm("Are you sure you want to delete this category?");">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">No categories found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{-- Pagination Links --}}
<div class="d-flex justify-content-center">
    {{ $categories->links() }}
</div>

@endsection

