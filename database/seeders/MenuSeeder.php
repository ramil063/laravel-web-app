<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'id' => 1,
                'position' => 'top',
                'description' => 'Верхнее меню',
            ],
            [
                'id' => 2,
                'position' => 'bottom',
                'description' => 'Нижнее меню',
            ],
            [
                'id' => 3,
                'position' => 'left',
                'description' => 'Левое меню',
            ],
            [
                'id' => 4,
                'position' => 'right',
                'description' => 'Правое меню',
            ],
        ];
        DB::table('menus')->insert($menus);
    }
}
