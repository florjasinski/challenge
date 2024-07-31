<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Models\Category;
use App\Models\User;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
})->name('category');

Route::get('authors/{author:username}', function (User $author) {
    return view('posts.index', [
        'posts' => $author->posts,
        'categories' => Category::all()
    ]);
});

Route::get('register', [SessionController::class, 'create']);
Route::post('register', [SessionController::class, 'store']);
Route::post('logout', [SessionController::class, 'destroy']);
Route::get('login', [SessionController::class, 'create']);
