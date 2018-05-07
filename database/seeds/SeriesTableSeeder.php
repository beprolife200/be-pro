<?php

use Illuminate\Database\Seeder;
use BePro\Series\Series;

class SeriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $serieses = [
            [
                'name' => '版本控制 Git',
                'slug' => 'version-control-git',
                'description' => ' ',
            ], [
                'name' => '物件導向 OOP',
                'slug' => 'object-oriented-programming',
                'description' => ' '
            ], [
                'name' => 'HTML & CSS 101',
                'slug' => 'html-css-101',
                'description' => ' '
            ], [
                'name' => 'Bootstrap 101',
                'slug' => 'bootstrap-101',
                'description' => ' '
            ], [
                'name' => 'Javascript 101',
                'slug' => 'javascript-101',
                'description' => ' '
            ], [
                'name' => 'Webpack 101',
                'slug' => 'webpack-101',
                'description' => ' '
            ], [
                'name' => 'PHP && MySQL',
                'slug' => 'php-mysql-101',
                'description' => ' '
            ], [
                'name' => 'Node.js and Express',
                'slug' => 'node-express-101',
                'description' => ' '
            ]
        ];

        foreach ($serieses as $series) {
            Series::create([
                'name' => $series['name'],
                'slug' => $series['slug'],
                'description' => $series['description']
            ]);
        }
    }
}
