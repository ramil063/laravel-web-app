<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RubricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rubrics = [
            [
                'id' => 1,
                'title' => 'Главное',
                'code' => 'main',
            ],
            [
                'id' => 2,
                'title' => 'Интересное',
                'code' => 'interesting',
            ],
            [
                'id' => 3,
                'title' => 'Обучение',
                'code' => 'education',
            ],
        ];
        DB::table('d_rubrics')->insert($rubrics);
    }
}
