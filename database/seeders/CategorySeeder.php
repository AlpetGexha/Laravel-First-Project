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
        $datas = [];
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
            $datas[] = [
                'category' => $category,
                'slug' => Str::slug($category),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        $chunk  = array_chunk($datas, 50);
        foreach ($chunk as $data) {
            Category::insert($data);
        }
    }
}
