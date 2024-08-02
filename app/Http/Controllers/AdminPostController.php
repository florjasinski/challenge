<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'posts' => Post::latest()->paginate(20)
        ]);
    }

    public function create()
    {

        if (auth()->guest()) {
            return redirect('/login');
        }
        return view('posts.create');
    }

    public function store()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', 'exists:categories,id']
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('admin.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'image',
            'slug' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', 'exists:categories,id']
        ]);

        if (request()->hasFile('thumbnail')) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return redirect('/admin/posts');
    }
}
