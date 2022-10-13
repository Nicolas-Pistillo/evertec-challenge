<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductsSeeder::class);

        User::create([
            'name'  => 'Nicolas Pistillo',
            'email' => 'admin@admin.com',
            'password' => Hash::make('ecommerce')
        ]);
    }
}
