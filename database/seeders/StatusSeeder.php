<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'id' => 1,
                'title' => 'Опубликовано',
                'code' => 'published',
            ],
            [
                'id' => 2,
                'title' => 'На модерации',
                'code' => 'moderating',
            ],
            [
                'id' => 3,
                'title' => 'Отклонено',
                'code' => 'rejected',
            ],
        ];
        DB::table('d_statuses')->insert($statuses);
    }
}
