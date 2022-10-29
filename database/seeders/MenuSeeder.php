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
                'title' => 'Верхнее меню',
                'position' => 'top',
                'description' => 'Верхнее меню',
            ],
            [
                'id' => 2,
                'title' => 'Нижнее меню',
                'position' => 'bottom',
                'description' => 'Нижнее меню',
            ],
            [
                'id' => 3,
                'title' => 'Левое меню',
                'position' => 'left',
                'description' => 'Левое меню',
            ],
            [
                'id' => 4,
                'title' => 'Правое меню',
                'position' => 'right',
                'description' => 'Правое меню',
            ],
        ];
        DB::table('menus')->insert($menus);
    }
}
