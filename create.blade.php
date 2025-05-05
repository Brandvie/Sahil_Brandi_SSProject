@extends("layouts.app")

@section("title", "Add New Author")

@section("content")
<h1>Add New Author</h1>

<form action="{{ route("authors.store") }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Author Name</label>
        <input type="text" class="form-control @error("name") is-invalid @enderror" id="name" name="name" value="{{ old("name") }}" required>
        @error("name")
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="bio" class="form-label">Biography</label>
        <textarea class="form-control @error("bio") is-invalid @enderror" id="bio" name="bio" rows="5">{{ old("bio") }}</textarea>
        @error("bio")
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Save Author</button>
    <a href="{{ route("authors.index") }}" class="btn btn-secondary">Cancel</a>
</form>

<h1>Add New Book</h1>

<form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="title" class="form-label">Book Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="author_name" class="form-label">Author Name</label>
        <input type="text" class="form-control @error('author_name') is-invalid @enderror" id="author_name" name="author_name" value="{{ old('author_name') }}" required>
        @error('author_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Category</label>
        <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
            <option value="">Select a category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="cover_image_path" class="form-label">Book Cover Image</label>
        <input type="file" class="form-control @error('cover_image_path') is-invalid @enderror" id="cover_image_path" name="cover_image_path">
        @error('cover_image_path')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Save Book</button>
</form>

@endsection

