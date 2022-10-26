<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menuItems = [
            [
                'id' => 1,
                'title' => 'Главная',
                'menu_id' => 1,
            ],
            [
                'id' => 2,
                'title' => 'Новости',
                'menu_id' => 1,
            ],
            [
                'id' => 3,
                'title' => 'Статьи',
                'menu_id' => 1,
            ],
        ];
        DB::table('menu_items')->insert($menuItems);
    }
}
