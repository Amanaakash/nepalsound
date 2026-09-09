<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = array(
            array(
                'title' => 'Blog',
                'slug' => \Str::slug('Blog'),
                'unique_id' => env("APPLICATION_SERIAL", 2081) . "" . date("dHis") . rand(0000, 9999),
                'status' => 1
            ),
            array(
                'title' => 'Press Release',
                'slug' => \Str::slug('Press Release'),
                'unique_id' => env("APPLICATION_SERIAL", 2081) . "" . date("dHis") . rand(0000, 9999),
                'status' => 1
            ),
            array(
                'title' => 'Articles',
                'slug' => \Str::slug('Articles'),
                'unique_id' => env("APPLICATION_SERIAL", 2081) . "" . date("dHis") . rand(0000, 9999),
                'status' => 1
            ),
            array(
                'title' => 'Poem',
                'slug' => \Str::slug('Poem'),
                'unique_id' => env("APPLICATION_SERIAL", 2081) . "" . date("dHis") . rand(0000, 9999),
                'status' => 1
            ),
            array(
                'title' => 'Book',
                'slug' => \Str::slug('Book'),
                'unique_id' => env("APPLICATION_SERIAL", 2081) . "" . date("dHis") . rand(0000, 9999),
                'status' => 1
            ),
        );

        DB::table('blog_categories')->insert($category);
    }
}
