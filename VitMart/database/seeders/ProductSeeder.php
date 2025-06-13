<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            ['id' => "OB1", 'name' => 'Bodrex', 'price' => 12500],
            ['id' => "OB2", 'name' => 'Entro Stop', 'price' => 16000],
            ['id' => "OB3", 'name' => 'Hansaplast', 'price' => 11500],
            ['id' => "OB4", 'name' => 'Hot In Cream', 'price' => 23000],
            ['id' => "OB5", 'name' => 'Koyo Cabe', 'price' => 17000],
            ['id' => "OB6", 'name' => 'Minyak Kayu Putih', 'price' => 30000],
            ['id' => "OB7", 'name' => 'Mylanta', 'price' => 85000],
            ['id' => "OB8", 'name' => 'OBH Combi', 'price' => 27500],
            ['id' => "OB9", 'name' => 'Sangobion', 'price' => 26000],
            ['id' => "OB10", 'name' => 'Tolak Angin', 'price' => 5000],
            ['id' => "OB11", 'name' => 'Antimo', 'price' => 7000],
            ['id' => "OB12", 'name' => 'Oskadon', 'price' => 3000],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(['id' => $product['id']], $product);
        }
    }
}
