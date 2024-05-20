<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;



Route::get('/', function () {


    return view('posts', [
        'posts' => Post::all()
    ]);
});


Route::get('posts/{post}', function ($slug) {

    $post = Post::findOrFail($slug);
    return view('post', [
        'post' => $post
    ]);
});