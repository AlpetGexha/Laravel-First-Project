<?php

namespace Database\Seeders;

use App\Http\Livewire\Category\Postcategory;
use App\Models\Category;
use App\Models\Post;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f = Faker::create();
        $datas = [];
        foreach (range(0, 1000) as $index) {
            $datas[] = [
                'title' => $f->sentence,
                'body' => 'dajshdjkashjkdahjlsdhjklas hjlkDHJLASHJLKDhjlasdh jklhjlkfhjldsfhjkld hjklsfhjldsfhjlkadhjlsfhljadshjlfadshjldfshjladfshjkladfhjklsadfhjklsadfhjklshjladfkshjladfkshjlkadfshjlkadfshjlkadfslhjkdfash jlkadfshjlafdhjlskadfhjlshjlafkdshjlkadfs hjlkadfshjldfshjladfhjlshjladfslhjkds',
                'photo' => 'post_images/xoN3JKM5rJJTWwStpcx9yalN1pxzava7LYBlpSjY.jpg',
                'user_id' => 1,
                'slug' => 'ezdasdasdas',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        $chunk  = array_chunk($datas, 1000);
        foreach ($chunk as $data) {
            Post::insert($data);
        }

        $datas2 = [];
        foreach (range(0, 1000) as $index) {
            $datas2[] = [
                'category_id' => 13,
                'post_id' => rand(11000, 13000),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // //       Poste per categori
        // $chunk2  = array_chunk($datas2, 1000);
        // foreach ($chunk2 as $data) {
        //     Postcategory::insert($data);
        // }

        $category_data = [];
        foreach (range(0, 2000) as $index) {
            $category_data[] = [
                'category' => $f->sentence,
                'slug' => $f->slug,
                'is_active' => $f->randomElement([0, 1]),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        // post
        $category_chunk  = array_chunk($category_data, 1000);
        foreach ($category_chunk as $data) {
            Category::insert($data);
        }

        // $category_chang = array_chang
    }
}
