<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;





Route::get('/api/login', [SessionController::class, 'create']);
Route::post('/api/user', [SessionController::class, 'store']);




Route::get('/contacts', [ContactController::class, 'index'])->middleware(\App\Http\Middleware\AdminMiddleware::class)->name('contacts.index');


Route::get('contacts/{contact:id}', [ContactController::class, 'show'])->middleware(\App\Http\Middleware\AdminMiddleware::class);


Route::get('admin/contacts/{contact}/add', [ContactController::class, 'create'])->middleware(\App\Http\Middleware\AdminMiddleware::class);
Route::post('admin/contacts', [ContactController::class, 'store'])->middleware(\App\Http\Middleware\AdminMiddleware::class);
Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->middleware(\App\Http\Middleware\AdminMiddleware::class);
Route::put('/contacts/{contact}', [ContactController::class, 'update'])->middleware(\App\Http\Middleware\AdminMiddleware::class);

