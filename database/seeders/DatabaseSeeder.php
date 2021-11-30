<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tour;
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
        $this->call(UserSeeder::class);
        Post::factory(50)->create();
        Tour::factory(50)->create();
    }
}
