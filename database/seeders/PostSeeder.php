<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::query()->create([
            'user' => 1,
            'post_title' => 'First Post',
            'post_content' => 'Post content/body will be here'
        ]);
    }
}
