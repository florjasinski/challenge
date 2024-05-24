<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use Spatie\YamlFrontMatter\YamlFrontMatter;



Route::get('/', function () {

    \Illuminate\Support\Facades\DB::listen(function ($query) {
        logger($query->sql);
    });


    return view('posts', [
        'posts' => Post::all()
    ]);
});


Route::get('posts/{post:slug}', function ($id) {

    $post = Post::findOrFail($id);
    return view('post', [
        'post' => $post
    ]);
});

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});