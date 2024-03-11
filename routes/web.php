<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;


Route::get('/', function () {
    $posts = [];

    $posts = Post::all();

    return view('posts', [
        'posts' => $posts
    ]);
});

Route::get('/posts/{post:slug}', function (Post $post) {

    return view('post', [
        'post' => $post
    ]);

}); 
//-> where('post', '[A-z]+');
