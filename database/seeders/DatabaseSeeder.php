<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        User::truncate();
//        Category::truncate();
//        Post::truncate();
        $user = User::factory()->create([
            'name' => 'Andy Song',
            'username' => 'andysong'
        ]);
        Post::factory(20)->create([
            'user_id' => $user->id
        ]);
//        $user = User::factory()->create();
//        $personal = Category::create([
//            'name' => 'Personal',
//            'slug' => 'personal',
//        ]);
//        $work = Category::create([
//            'name' => 'Work',
//            'slug' => 'work',
//        ]);
//        $family = Category::create([
//            'name' => 'Family',
//            'slug' => 'family',
//        ]);
//        Post::create([
//            'user_id' => $user->id,
//            'category_id' => $family->id,
//            'title' => 'My Family Post',
//            'slug' => 'my-family-post',
//            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
//            Quisquam, voluptatum.',
//            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
//            Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit.
//            Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit.
//            Quisquam, voluptatum.</p>',
//        ]);
//        Post::create([
//            'user_id' => $user->id,
//            'category_id' => $work->id,
//            'title' => 'My Work Post',
//            'slug' => 'my-work-post',
//            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
//            Quisquam, voluptatum.',
//            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
//            Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit.
//            Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit.
//            Quisquam, voluptatum.</p>',
//        ]);
//        Post::create([
//            'user_id' => $user->id,
//            'category_id' => $personal->id,
//            'title' => 'My Personal Post',
//            'slug' => 'my-personal-post',
//            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
//            Quisquam, voluptatum.',
//            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
//            Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit.
//            Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit.
//            Quisquam, voluptatum.</p>',
//        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
