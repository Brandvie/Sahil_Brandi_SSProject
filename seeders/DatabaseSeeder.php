<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application\'s database.
     */
    public function run(): void
    {
        // Call the CategorySeeder
        $this->call([
            CategorySeeder::class,
            // Add other seeders here if needed in the future
        ]);

        // Example of using factories if needed later:
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     \'name\' => \'Test User\',
        //     \'email\' => \'test@example.com\',
        // ]);
    }
}

