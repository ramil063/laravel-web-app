<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuItemPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $refs = [
            [
                'id' => 1,
                'menu_item_id' => 1,
                'page_id' => 1,
            ],
            [
                'id' => 2,
                'menu_item_id' => 2,
                'page_id' => 2,
            ],
            [
                'id' => 3,
                'menu_item_id' => 3,
                'page_id' => 3,
            ],
        ];
        DB::table('menu_item_pages')->insert($refs);
    }
}
