<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eager load relationships for efficiency
        $books = Book::with(["category", "author"])
                     ->orderBy("title")
                     ->paginate(10);
        return view("books.index", compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get(); // Fetch all categories
        return view('books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'isbn' => 'nullable|string|max:20|unique:books,isbn',
            'description' => 'nullable|string',
            'publication_year' => 'nullable|integer|min:1000|max:' . date('Y'),
            'esoteric_keywords' => 'nullable|string',
            'spiritual_focus' => 'nullable|string|max:255',
            'manifestation_techniques' => 'nullable|string',
            'cover_image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);

        // Handle file upload
        $coverImagePath = null;
        if ($request->hasFile('cover_image_path')) {
            $coverImagePath = $request->file('cover_image_path')->store('book_covers', 'public');
        }

        // Find or create the author
        $author = Author::firstOrCreate(['name' => $request->input('author_name')]);

        // Prepare book data
        $bookData = $request->except('author_name', 'cover_image_path');
        $bookData['author_id'] = $author->id;
        $bookData['cover_image_path'] = $coverImagePath;

        // Create the book
        Book::create($bookData);

        return redirect()->route('books.index')
                         ->with('success', 'Book added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        // Eager load relationships
        $book->load(["category", "author"]);
        return view("books.show", compact("book"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::orderBy("name")->get();
        $authors = Author::orderBy("name")->get();
        return view("books.edit", compact("book", "categories", "authors"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            "title" => "required|string|max:255",
            "author_name" => "required|string|max:255", // Validate author name
            "category_id" => "required|exists:categories,id",
            "isbn" => "nullable|string|max:20|unique:books,isbn," . $book->id,
            "description" => "nullable|string",
            "publication_year" => "nullable|integer|min:1000|max:" . date("Y"),
            "esoteric_keywords" => "nullable|string",
            "spiritual_focus" => "nullable|string|max:255",
            "manifestation_techniques" => "nullable|string",
        ]);

        // Find or create the author by name
        $author = Author::firstOrCreate([
            'name' => $request->input('author_name')
        ]);

        // Update the book with the new author_id
        $bookData = $request->except('author_name');
        $bookData['author_id'] = $author->id;

        $book->update($bookData);

        return redirect()->route("books.index")
                         ->with("success", "Book updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        // Add logic to delete associated cover image if implemented
        
        $book->delete();

        return redirect()->route("books.index")
                         ->with("success", "Book deleted successfully.");
    }

    /**
     * Example method to demonstrate firstOrCreate functionality.
     */
    public function example()
    {
        $author = Author::firstOrCreate(['name' => 'Sun Zu']);
        dd($author);
    }
}

// Migration for books table
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('author_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('isbn')->unique()->nullable();
            $table->text('description')->nullable();
            $table->integer('publication_year')->nullable();
            $table->string('cover_image_path')->nullable();
            $table->text('esoteric_keywords')->nullable();
            $table->string('spiritual_focus')->nullable();
            $table->text('manifestation_techniques')->nullable();
            $table->timestamps();
        });

        // Describe the books table
        DB::statement('DESCRIBE books;');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}

