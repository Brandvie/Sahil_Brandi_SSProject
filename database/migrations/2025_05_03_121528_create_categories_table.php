<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Required, Unique. E.g., "Tarot", "Astrology"
            $table->text('description')->nullable(); // Nullable. Brief description of the category.
            $table->timestamps();
        });

        // Insert default categories
        DB::table('categories')->insert([
            ['name' => 'Spirituality', 'description' => 'Topics related to spiritual growth and practices.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Manifestation', 'description' => 'Guides and resources on manifesting goals and desires.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Self-Improvement', 'description' => 'Materials focused on personal development and growth.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Meditation', 'description' => 'Resources for meditation techniques and practices.', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};

