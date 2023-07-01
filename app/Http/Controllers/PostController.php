<?php

namespace App\Http\Controllers;

use App\Models\Post;
use function request;
use function view;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(request([
                'search', 'category', 'author',
            ]))
                ->with('category', 'author')
                ->paginate(6)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post->load('comments.author')]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $attributes['user_id'] = auth()->id();

        Post::create($attributes);

        return redirect('/');
    }

    public function create()
    {
        return view('posts.create');
    }
}
