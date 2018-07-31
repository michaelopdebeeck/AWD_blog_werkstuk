<?php

// User routes
Route::group(['namespace' => 'User'], function() {
    Route::get('/', 'IndexController@index')->name('home');
    Route::get('blogpost/{slug?}', 'BlogpostController@index')->name('blogpost');

    Route::get('blogpost/tag/{tag}', 'IndexController@tag')->name('tag');
    Route::get('blogpost/categorie/{categorie}', 'IndexController@categorie')->name('categorie');
});



//Admin routes
Route::group(['namespace' => 'Admin'], function() {
    Route::get('admin', 'IndexController@index')->name('admin');
    Route::resource('admin/blogpost', 'BlogpostController');
    Route::resource('admin/tag', 'TagController');
    Route::resource('admin/categorie', 'CategorieController');
    Route::resource('admin/user', 'UserController');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
