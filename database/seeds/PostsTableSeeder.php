<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 4)->create()->each(function ($u) {
            $u->assignRole('writer');

            $post1 = factory(App\Post::class)->make();
            $post2 = factory(App\Post::class)->make();
            $post3 = factory(App\Post::class)->make();
            $post4 = factory(App\Post::class)->make();
            $post5 = factory(App\Post::class)->make();

            $u->posts()->savemany([
                $post1,
                $post2,
                $post3,
                $post4,
                $post5,
            ]);
        });
    }
}
