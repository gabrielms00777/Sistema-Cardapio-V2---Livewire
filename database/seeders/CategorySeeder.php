<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory(10)->create();
        $categories = [
            ['name' => 'Bebidas'],
            ['name' => 'Sobremesas'],
            ['name' => 'Pratos Principais'],
            ['name' => 'Entradas'],
            ['name' => 'Saladas'],
            ['name' => 'Sanduíches'],
            ['name' => 'Massas'],
            ['name' => 'Pizzas'],
            ['name' => 'Acompanhamentos'],
            ['name' => 'Cafés e Chás'],
        ];

        Category::query()->insert($categories);

        // foreach ($categories as $category) {
        //     Category::create($category);
        // }
    }
}
