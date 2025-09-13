<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil kategori berdasarkan nama
        $electronics = Category::where('name', 'Electronics')->first();
        $furniture = Category::where('name', 'Furniture')->first();

        // Pastikan category ada
        if ($electronics && $furniture) {
            Item::create([
                'name' => 'Smartphone',
                'description' => 'Latest model with high performance',
                'status' => 'available',
                'category_id' => $electronics->id,
            ]);

            Item::create([
                'name' => 'Desk',
                'description' => 'Wooden office desk',
                'status' => 'available',
                'category_id' => $furniture->id,
            ]);
        }
    }
}