<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory; // Importar Factory

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        DB::table('posts')->truncate();

        User::factory(10)->create()->each(function ($user) {
            $user->posts()->save(Post::factory()->make());
        });
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        // \Illuminate\Database\Eloquent\Factories\Factory::factoryForModel(User::class)->count(10)->create();
        // \Illuminate\Database\Eloquent\Factories\Factory::factoryForModel(Post::class)->count(10)->create();
    }
}
