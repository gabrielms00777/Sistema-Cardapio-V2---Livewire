<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@admin',
            'role' => 'admin',
            'password' => 'admin',
        ]);

        $this->call([
            TableSeeder::class,
            CategorySeeder::class,
            MenuItemSeeder::class,
        ]);
    }
}
