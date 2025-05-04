<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("books", function (Blueprint $table) {
            $table->id();
            $table->string("title"); // Required. Title of the book.
            $table->foreignId("author_id")->constrained("authors")->onDelete("cascade"); // Required. Foreign Key referencing authors.id.
            $table->foreignId("category_id")->constrained("categories")->onDelete("cascade"); // Required. Foreign Key referencing categories.id.
            $table->string("isbn")->nullable()->unique(); // Nullable, Unique. International Standard Book Number.
            $table->text("description")->nullable(); // Nullable. Synopsis or description of the book.
            $table->integer("publication_year")->nullable(); // Nullable. Year the book was published.
            $table->string("cover_image_path")->nullable(); // Nullable. Path to the stored cover image file.
            $table->text("esoteric_keywords")->nullable(); // Nullable. Comma-separated or JSON keywords.
            $table->string("spiritual_focus")->nullable(); // Nullable. E.g., "Mindfulness", "Chakras".
            $table->text("manifestation_techniques")->nullable(); // Nullable. Description of techniques discussed.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::dropIfExists("books");
    }
};

