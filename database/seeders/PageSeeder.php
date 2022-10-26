<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'id' => 1,
                'title' => 'Главная',
                'slug' => 'main',
            ],
            [
                'id' => 2,
                'title' => 'Новости',
                'slug' => 'news',
            ],
            [
                'id' => 3,
                'title' => 'Статьи',
                'slug' => 'posts',
            ],
        ];
        DB::table('pages')->insert($pages);
    }
}
