<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::truncate();

        $blog =  [
            [
              'category_id' => '1',
              'title' => 'Hacking',
              'slug'=>'hacking',
              'content' => 'Loream ipsum hacing is a new trend loream ipsum',
               'author'=>'Sumon' 
            ],
            [
                'category_id' => '2',
                'title' => 'Blockchain',
                'slug'=>'blockchain',
                'content' => 'Loream ipsum blockchaine is a new trend loream ipsum',
                'author'=>'Han' 
            ],
            [
                'category_id' => '1',
                'title' => 'W3Technology',
                'slug' => 'w3technology',
                'content' => 'Loream ipsum w3technology is a new trend loream ipsum',
                'author'=>'Han' 
            ],
          ];

          Blog::insert($blog);
    }
}
