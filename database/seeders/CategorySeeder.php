<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categorys = [
            'Programim',
            'Sport',
            'IT',
            'Teknollogji',
            'Lajme',
            'Kosovë',
            'Botë',
            'Sport',
            'Eksperti',
            'Ekonomi',
            'Stili',
            'Shëndetësi',
        ];

        foreach ($categorys as $category) {
            Category::create([
                'category' => Str::title($category),
                'slug' => Str::slug($category, '-'),
                'is_active' => 1
            ]);
        }
    }
}
