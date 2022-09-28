<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name'          => 'Blue Bag',
            'category'      => 'accesories',
            'description'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat placeat, a explicabo eligendi voluptatibus.',
            'price'         => 1500.50,
            'image'         => 'https://fakestoreapi.com/img/81fPKd-2AYL._AC_SL1500_.jpg'
        ]);

        Product::create([
            'name'          => 'XL T-Shirt',
            'category'      => 'clothes',
            'description'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat placeat, a explicabo eligendi voluptatibus.',
            'price'         => 2841.75,
            'image'         => 'https://fakestoreapi.com/img/71-3HjGNDUL._AC_SY879._SX._UX._SY._UY_.jpg'
        ]);

        Product::create([
            'name'          => 'Silver Ring',
            'category'      => 'jewelery',
            'description'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat placeat, a explicabo eligendi voluptatibus.',
            'price'         => 7430,
            'image'         => 'https://fakestoreapi.com/img/71YAIFU48IL._AC_UL640_QL65_ML3_.jpg'
        ]);
    }
}
