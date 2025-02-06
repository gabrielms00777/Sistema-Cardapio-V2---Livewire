<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // MenuItem::factory(10)->create();

        $products = [
            // Bebidas
            [
                'category_id' => 1,
                'name' => 'Refrigerante',
                'description' => 'Refrigerante gelado de 350ml.',
                'price' => 500,
                'image' => 'https://picsum.photos/150',
            ],
            [
                'category_id' => 1,
                'name' => 'Suco Natural',
                'description' => 'Suco natural de laranja ou abacaxi.',
                'price' => 700,
                'image' => 'https://picsum.photos/150',
            ],
            [
                'category_id' => 1,
                'name' => 'Água Mineral',
                'description' => 'Garrafa de água mineral 500ml.',
                'price' => 300,
                'image' => 'https://picsum.photos/150',
            ],

            // Sobremesas
            [
                'category_id' => 2,
                'name' => 'Pudim',
                'description' => 'Pudim de leite condensado.',
                'price' => 800,
                'image' => 'https://picsum.photos/150',
            ],
            [
                'category_id' => 2,
                'name' => 'Mousse de Chocolate',
                'description' => 'Mousse cremoso de chocolate.',
                'price' => 900,
                'image' => 'https://picsum.photos/150',
            ],
            [
                'category_id' => 2,
                'name' => 'Sorvete',
                'description' => 'Sorvete de creme ou chocolate.',
                'price' => 600,
                'image' => 'https://picsum.photos/150',
            ],

            // Pratos Principais
            [
                'category_id' => 3,
                'name' => 'Filé Mignon',
                'description' => 'Filé mignon grelhado com batatas.',
                'price' => 4500,
                'image' => 'https://picsum.photos/150',
            ],
            [
                'category_id' => 3,
                'name' => 'Frango Grelhado',
                'description' => 'Peito de frango grelhado com legumes.',
                'price' => 3000,
                'image' => 'https://picsum.photos/150',
            ],
            [
                'category_id' => 3,
                'name' => 'Peixe Assado',
                'description' => 'Peixe assado com molho especial.',
                'price' => 4000,
                'image' => 'https://picsum.photos/150',
            ],

            // Entradas
            [
                'category_id' => 4,
                'name' => 'Bolinho de Bacalhau',
                'description' => 'Bolinho de bacalhau crocante.',
                'price' => 1200,
                'image' => 'https://picsum.photos/150',
            ],
            [
                'category_id' => 4,
                'name' => 'Bruschetta',
                'description' => 'Bruschetta com tomate e manjericão.',
                'price' => 1000,
                'image' => 'https://picsum.photos/150',
            ],
            [
                'category_id' => 4,
                'name' => 'Carpaccio',
                'description' => 'Carpaccio de carne com rúcula.',
                'price' => 1500,
                'image' => 'https://picsum.photos/150',
            ],

            // Saladas
            [
                'category_id' => 5,
                'name' => 'Salada Caesar',
                'description' => 'Salada Caesar com frango grelhado.',
                'price' => 1800,
                'image' => 'https://picsum.photos/150',
            ],
            [
                'category_id' => 5,
                'name' => 'Salada Grega',
                'description' => 'Salada Grega com queijo feta e azeitonas.',
                'price' => 1600,
                'image' => 'https://picsum.photos/150',
            ],
            [
                'category_id' => 5,
                'name' => 'Salada de Frutas',
                'description' => 'Salada de frutas frescas.',
                'price' => 1200,
                'image' => 'https://picsum.photos/150',
            ],

            // Sanduíches
            [
                'category_id' => 6,
                'name' => 'Hambúrguer Clássico',
                'description' => 'Hambúrguer com queijo e salada.',
                'price' => 2000,
                'image' => 'https://picsum.photos/150',
            ],
            [
                'category_id' => 6,
                'name' => 'Sanduíche de Frango',
                'description' => 'Sanduíche de frango grelhado.',
                'price' => 1800,
                'image' => 'https://picsum.photos/150',
            ],
            [
                'category_id' => 6,
                'name' => 'Sanduíche Vegetariano',
                'description' => 'Sanduíche vegetariano com abobrinha e queijo.',
                'price' => 1500,
                'image' => 'https://picsum.photos/150',
            ],

            // Massas
            [
                'category_id' => 7,
                'name' => 'Espaguete à Bolonhesa',
                'description' => 'Espaguete com molho à bolonhesa.',
                'price' => 2500,
                'image' => 'https://picsum.photos/150',
            ],
            [
                'category_id' => 7,
                'name' => 'Lasanha',
                'description' => 'Lasanha de carne com queijo derretido.',
                'price' => 3000,
                'image' => 'https://picsum.photos/150',
            ],
            [
                'category_id' => 7,
                'name' => 'Penne ao Molho Rosa',
                'description' => 'Penne com molho rosé e bacon.',
                'price' => 2800,
                'image' => 'https://picsum.photos/150',
            ],

            // Pizzas
            [
                'category_id' => 8,
                'name' => 'Pizza Margherita',
                'description' => 'Pizza Margherita com mussarela e manjericão.',
                'price' => 3500,
                'image' => 'https://picsum.photos/150',
            ],
            [
                'category_id' => 8,
                'name' => 'Pizza Calabresa',
                'description' => 'Pizza de calabresa com cebola.',
                'price' => 3800,
                'image' => 'https://picsum.photos/150',
            ],
            [
                'category_id' => 8,
                'name' => 'Pizza Quatro Queijos',
                'description' => 'Pizza com quatro tipos de queijo.',
                'price' => 4000,
                'image' => 'https://picsum.photos/150',
            ],

            // Acompanhamentos
            [
                'category_id' => 9,
                'name' => 'Batata Frita',
                'description' => 'Porção de batata frita crocante.',
                'price' => 1000,
                'image' => 'https://picsum.photos/150',
            ],
            [
                'category_id' => 9,
                'name' => 'Arroz Branco',
                'description' => 'Arroz branco soltinho.',
                'price' => 800,
                'image' => 'https://picsum.photos/150',
            ],
            [
                'category_id' => 9,
                'name' => 'Purê de Batata',
                'description' => 'Purê de batata cremoso.',
                'price' => 900,
                'image' => 'https://picsum.photos/150',
            ],

            // Cafés e Chás
            [
                'category_id' => 10,
                'name' => 'Café Expresso',
                'description' => 'Café expresso forte e encorpado.',
                'price' => 500,
                'image' => 'https://picsum.photos/150',
            ],
            [
                'category_id' => 10,
                'name' => 'Cappuccino',
                'description' => 'Cappuccino cremoso com chocolate.',
                'price' => 700,
                'image' => 'https://picsum.photos/150',
            ],
            [
                'category_id' => 10,
                'name' => 'Chá de Camomila',
                'description' => 'Chá de camomila relaxante.',
                'price' => 400,
                'image' => 'https://picsum.photos/150',
            ],
        ];

        MenuItem::insert($products);
        // foreach ($products as $product) {
        //     Product::create($product);
        // }

    }
}
