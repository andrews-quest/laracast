<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Spatie\YamlFrontMatter\YamlFrontMatter;


Route::get('/', function () {
    
    DB::listen(function($query){
        logger($query->sql, $query->bindings);
    });
     
    return view('posts', [
        'posts' => Post::latest()->with('category', 'author')->get(),
        'categories' => Category::all()
    ]);
})->name('home');

Route::get('/posts/{post:slug}', function (Post $post) {

    return view('post', [
        'post' => $post
    ]);

}); 
//-> where('post', '[A-z]+');

Route::get('/categories/{category:slug}', function(Category $category){
    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
})->name('category');

Route::get('/authors/{author:username}', function(User $author){
    //dd($author);
    return view('posts', [
        'posts' => $author->posts
    ]);
});