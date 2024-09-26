<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            'Creatina',
            'Proteinas',
            'Pre-entrenos',
            'Quemadores',
            'Aminoacidos',
            'Multivitamínicos',
        ])->each(function($category) {
            Category::firstOrCreate(['name' => $category]);
        });
    }
}
