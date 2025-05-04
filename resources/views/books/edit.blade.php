@extends("layouts.app")

@section("title", "Edit Book: " . $book->title)

@section("content")
<h1>Edit Book: {{ $book->title }}</h1>

<form action="{{ route("books.update", $book) }}" method="POST" enctype="multipart/form-data"> {{-- Add enctype for potential file uploads --}}
    @csrf
    @method("PUT")
    <div class="row">
        <div class="col-md-8">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error("title") is-invalid @enderror" id="title" name="title" value="{{ old("title", $book->title) }}" required>
                @error("title")
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="author_name" class="form-label">Author</label>
                    <input type="text" class="form-control @error('author_name') is-invalid @enderror" id="author_name" name="author_name" value="{{ old('author_name', $book->author->name) }}" required>
                    @error('author_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-select @error("category_id") is-invalid @enderror" id="category_id" name="category_id" required>
                        <option value="" disabled>Select a Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old("category_id", $book->category_id) == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error("category_id")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="isbn" class="form-label">ISBN</label>
                    <input type="text" class="form-control @error("isbn") is-invalid @enderror" id="isbn" name="isbn" value="{{ old("isbn", $book->isbn) }}">
                    @error("isbn")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="publication_year" class="form-label">Publication Year</label>
                    <input type="number" class="form-control @error("publication_year") is-invalid @enderror" id="publication_year" name="publication_year" value="{{ old("publication_year", $book->publication_year) }}" min="1000" max="{{ date("Y") }}">
                    @error("publication_year")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error("description") is-invalid @enderror" id="description" name="description" rows="5">{{ old("description", $book->description) }}</textarea>
                @error("description")
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            {{-- Placeholder for Cover Image Upload/Display --}}
            {{-- <div class="mb-3">
                <label for="cover_image_path" class="form-label">Cover Image</label>
                <input class="form-control @error("cover_image_path") is-invalid @enderror" type="file" id="cover_image_path" name="cover_image_path">
                @if($book->cover_image_path)
                    <img src="{{ asset("storage/" . $book->cover_image_path) }}" alt="Cover Image" class="img-thumbnail mt-2" width="150">
                @endif
                @error("cover_image_path")
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> --}}

            <div class="mb-3">
                <label for="esoteric_keywords" class="form-label">Esoteric Keywords (comma-separated)</label>
                <input type="text" class="form-control @error("esoteric_keywords") is-invalid @enderror" id="esoteric_keywords" name="esoteric_keywords" value="{{ old("esoteric_keywords", $book->esoteric_keywords) }}">
                @error("esoteric_keywords")
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="spiritual_focus" class="form-label">Spiritual Focus</label>
                <input type="text" class="form-control @error("spiritual_focus") is-invalid @enderror" id="spiritual_focus" name="spiritual_focus" value="{{ old("spiritual_focus", $book->spiritual_focus) }}">
                @error("spiritual_focus")
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="manifestation_techniques" class="form-label">Manifestation Techniques</label>
                <textarea class="form-control @error("manifestation_techniques") is-invalid @enderror" id="manifestation_techniques" name="manifestation_techniques" rows="3">{{ old("manifestation_techniques", $book->manifestation_techniques) }}</textarea>
                @error("manifestation_techniques")
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Update Book</button>
    <a href="{{ route("books.index") }}" class="btn btn-secondary">Cancel</a>
</form>

@endsection

