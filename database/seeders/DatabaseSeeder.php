<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Customer;
use App\Models\Post;
use App\Models\User;
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
        // \App\Models\User::factory(1)->create();

        User::factory(2)->create()->each(function ($u) {
            $u->posts()->saveMany(Post::factory(5)->create()->each(function ($p) {
                $p->comments()->saveMany(Comment::factory(2)->create());
            }));
        });

        Customer::factory(3)->create();
    }
}
