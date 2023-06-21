<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/admin/posts/create', [PostController::class, 'create'])->middleware('admin');
Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post}', [PostController::class, 'show']);
Route::post('/posts/{post}/comments', [PostCommentController::class, 'store']);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts.index', [
        'posts' => $category->posts->load(['category', 'author']),
        'currentCategory' => $category
    ]);
})->name('category');

Route::get('/authors/{author:username}', function (User $author) {
    return view('posts.index', [
        'posts' => $author->posts->load(['category', 'author'])
    ]);
});

Route::post('/newsletter', NewsletterController::class);
