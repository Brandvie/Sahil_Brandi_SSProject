use App\Models\Category;
use App\Models\Book;
use Illuminate\Http\Request;

public function create()
{
    $categories = Category::all(); // Fetch all categories from the database
    return view('books.create', compact('categories'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
    ]);

    Book::create($validated);

    return redirect()->route('books.index')->with('success', 'Book created successfully!');
}

<!-- filepath: c:\Users\sahil\Downloads\esoteric_library_mysql\esoteric-library\resources\views\books\create.blade.php -->
<form action="{{ route('books.store') }}" method="POST">
    @csrf

    <!-- Other book fields -->
    <div class="form-group">
        <label for="title">Book Title</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" name="author" id="author" class="form-control" required>
    </div>

    <!-- Dropdown for Categories -->
    <div class="form-group">
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" class="form-control" required>
            <option value="" disabled selected>Select a category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Create Book</button>
</form>