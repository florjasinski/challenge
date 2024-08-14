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



Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/api/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact:id}', [ContactController::class, 'show']);
    Route::get('api/contacts/{contact}', [ContactController::class, 'create']);
    Route::post('api/contacts', [ContactController::class, 'store']);
    Route::get('/api/contacts/{contact}/edit', [ContactController::class, 'edit']);
    Route::put('/api/contacts/{contact}', [ContactController::class, 'update']);
});