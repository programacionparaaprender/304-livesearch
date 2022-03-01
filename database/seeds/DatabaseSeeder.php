<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        //\App\Models\Post::factory(100)->create();
        factory(User::class)->times(100)->create();
        //factory(Post::class)->times(100)->create();
    }
}
