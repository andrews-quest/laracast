<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Category;
use Spatie\YamlFrontMatter\YamlFrontMatter;


Route::get('/', function () {
    
    DB::listen(function($query){
        logger($query->sql, $query->bindings);
    });
     
    return view('posts', [
        'posts' => Post::latest()->with('category')->get()
    ]);
});

Route::get('/posts/{post:slug}', function (Post $post) {

    return view('post', [
        'post' => $post
    ]);

}); 
//-> where('post', '[A-z]+');

Route::get('/categories/{category:slug}', function(Category $category){
    return view('posts', [
        'posts' => $category->posts
    ]);
});