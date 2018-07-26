<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('user.blog');
});

Route::get('blogpost', function() {
    return view('user.blogpost');
})->name('blogpost');

Route::get('admin', function() {
    return view('admin.admin');
})->name('admin');

Route::get('admin/blogpost', function() {
    return view('admin.blogpost.blogpost');
})->name('newBlogpost');

Route::get('admin/tag', function() {
    return view('admin.tag.tag');
})->name('tag');

Route::get('admin/categorie', function() {
    return view('admin.categorie.categorie');
})->name('categorie');
