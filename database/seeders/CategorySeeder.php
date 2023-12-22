<?php

namespace Database\Seeders;
use  App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Category::truncate();

        $category =  [
            [
              'category_name' => 'Story'
            ],
            [
                'category_name' => 'Novel'
            ],
            [
                'category_name' => 'Literature'
            ],
          ];

          Category::insert($category);
    }
}
