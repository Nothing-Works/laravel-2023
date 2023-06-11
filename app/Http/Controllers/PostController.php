<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use function request;
use function view;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            'posts' => Post::latest()->filter(request(['search']))->with('category', 'author')->get(),
            'categories' => Category::all()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', ['post' => $post]);
    }
}
