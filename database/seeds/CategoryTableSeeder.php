<?php

use Illuminate\Database\Seeder;
use BePro\Category\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => '通事',
                'slug' => 'communication',
                'description' => ' '
            ], [
                'name' => '前端',
                'slug' => 'front-end',
                'description' => ' '
            ], [
                'name' => '後端',
                'slug' => 'back-end',
                'description' => ' '
            ], [
                'name' => '設計',
                'slug' => 'design',
                'description' => ' '
            ], [
                'name' => '新聞',
                'slug' => 'news',
                'description' => ' '
            ]
        ];
        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => $category['slug'],
                'description' => $category['description']
            ]);
        }
    }
}
