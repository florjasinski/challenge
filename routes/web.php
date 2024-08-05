<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\ContactController;
use App\Models\Category;
use App\Models\User;


Route::get('/posts', [PostController::class, 'index']);

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');




Route::get('contacts/{contact:id}', [ContactController::class, 'show']);



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

Route::get('/', [SessionController::class, 'create']);
Route::post('/', [SessionController::class, 'store']);



Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('admin/posts/create', [AdminPostController::class, 'create']);
Route::post('admin/posts', [AdminPostController::class, 'store']);
Route::get('admin/posts', [AdminPostController::class, 'index']);
Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);


Route::get('admin/contacts/{contact}/edit', [ContactController::class, 'edit']);
//Route::patch('admin/contacts/{contact}', [ContactController::class, 'update']);
Route::get('admin/contacts/{contact}/add', [ContactController::class, 'create']);
Route::post('admin/contacts', [ContactController::class, 'store']);