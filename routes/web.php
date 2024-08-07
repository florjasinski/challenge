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





Route::get('/', [SessionController::class, 'create']);
Route::post('/', [SessionController::class, 'store']);


Route::get('/contacts', [ContactController::class, 'index'])->middleware('token.valid');

Route::get('contacts/{contact:id}', [ContactController::class, 'show']);


Route::get('admin/contacts/{contact}/add', [ContactController::class, 'create']);
Route::post('admin/contacts', [ContactController::class, 'store']);
Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit']);
Route::put('/contacts/{contact}', [ContactController::class, 'update']);


