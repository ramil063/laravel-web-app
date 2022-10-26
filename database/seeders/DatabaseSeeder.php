<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            MenuSeeder::class,
            PageSeeder::class,
            MenuItemSeeder::class,
            RubricSeeder::class,
            StatusSeeder::class,
            TagSeeder::class,
            MenuItemPageSeeder::class,
            UserSeeder::class
        ]);
        Post::factory(100)->create();
    }
}
