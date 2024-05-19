<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\Post;


Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact', [
        'jobs' => Job::all()
    ]);
});




Route::get('posts/{post}', function ($slug) {

    $post = Post::find($slug);

    return view('posts', [
        'post' => $post
    ]);
    
});




