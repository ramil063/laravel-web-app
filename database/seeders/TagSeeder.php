<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                'id' => 1,
                'title' => 'Главное',
                'code' => 'main',
            ],
            [
                'id' => 2,
                'title' => 'Новости',
                'code' => 'news',
            ],
            [
                'id' => 3,
                'title' => 'Статьи',
                'code' => 'posts',
            ],
        ];
        DB::table('d_tags')->insert($tags);
    }
}
