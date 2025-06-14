<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            //Obat-Obatan
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

            //Minuman
            ['id' => "MI1",  'name' => 'Cocacola', 'price' => 10000],
            ['id' => "MI2",  'name' => 'Fanta', 'price' => 17000],
            ['id' => "MI3",  'name' => 'Golda', 'price' => 6500],
            ['id' => "MI4",  'name' => 'Le Mineral', 'price' => 9500],
            ['id' => "MI5",  'name' => 'Mizone', 'price' => 8000],
            ['id' => "MI6",  'name' => 'Pocari Sweat','price' => 9500],
            ['id' => "MI7",  'name' => 'Teh Pucuk Harum','price' => 5500],
            ['id' => "MI8",  'name' => 'Sprite', 'price' => 9000],
            ['id' => "MI9",  'name' => 'Starbuck', 'price' => 18500],
            ['id' => "MI10", 'name' => 'Ultra Milk', 'price' => 8500],
            ['id' => "MI11", 'name' => 'You C1000', 'price' => 13000],
            ['id' => "MI12", 'name' => 'Pepsi', 'price' => 10500],

            //Makanan
            ['id' => "MA1", 'name' => "Big Babol", 'price' => 13500],
            ['id' => "MA2", 'name' => "Chitato", 'price' => 20000],
            ['id' => "MA3", 'name' => "Kacang 2 Kelinci", 'price' => 35000],
            ['id' => "MA4", 'name' => "Khong Guan", 'price' => 140000],
            ['id' => "MA5", 'name' => "Monde", 'price' => 170000],
            ['id' => "MA6", 'name' => "Nano-Nano", 'price' => 10000],
            ['id' => "MA7", 'name' => "Pringles", 'price' => 30000],
            ['id' => "MA8", 'name' => "SilverQueen", 'price' => 30000],
            ['id' => "MA9", 'name' => "Kanzler Chicken Nuggget", 'price' => 65000],
            ['id' => "MA10", 'name' => "Oreo Supreme", 'price' => 650000],
            ['id' => "MA11", 'name' => "Tango", 'price' => 7000],
            ['id' => "MA12", 'name' => "Roma Kelapa", 'price' => 14500],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(['id' => $product['id']], $product);
        }
    }
}
