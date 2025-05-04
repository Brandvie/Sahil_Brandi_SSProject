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
        $categories = Category::orderBy("name")->get();
        $authors = Author::orderBy("name")->get();
        return view("books.create", compact("categories", "authors"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|string|max:255",
            "author_id" => "required|exists:authors,id",
            "category_id" => "required|exists:categories,id",
            "isbn" => "nullable|string|max:20|unique:books,isbn",
            "description" => "nullable|string",
            "publication_year" => "nullable|integer|min:1000|max:" . date("Y"),
            // Add validation for image upload if implemented later
            // "cover_image_path" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "esoteric_keywords" => "nullable|string",
            "spiritual_focus" => "nullable|string|max:255",
            "manifestation_techniques" => "nullable|string",
        ]);

        // Handle file upload if implemented
        // $path = null;
        // if ($request->hasFile("cover_image_path")) {
        //     $path = $request->file("cover_image_path")->store("covers", "public");
        // }

        $bookData = $request->all();
        // $bookData["cover_image_path"] = $path;

        Book::create($bookData);

        return redirect()->route("books.index")
                         ->with("success", "Book added successfully.");
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
            "author_id" => "required|exists:authors,id",
            "category_id" => "required|exists:categories,id",
            "isbn" => "nullable|string|max:20|unique:books,isbn," . $book->id,
            "description" => "nullable|string",
            "publication_year" => "nullable|integer|min:1000|max:" . date("Y"),
            // Add validation for image upload if implemented later
            "esoteric_keywords" => "nullable|string",
            "spiritual_focus" => "nullable|string|max:255",
            "manifestation_techniques" => "nullable|string",
        ]);

        // Handle file upload update if implemented

        $bookData = $request->all();
        // Update path logic here if image upload is added

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
}

