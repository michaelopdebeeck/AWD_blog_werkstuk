<?php

// User routes
Route::group(['namespace' => 'User'], function() {
    Route::get('/', 'IndexController@index');
    Route::get('blogpost', 'BlogpostController@index')->name('blogpost');
});



//Admin routes
Route::group(['namespace' => 'Admin'], function() {
    Route::get('admin', 'IndexController@index')->name('admin');
    Route::resource('admin/blogpost', 'BlogpostController');
    Route::resource('admin/tag', 'TagController');
    Route::resource('admin/categorie', 'CategorieController');
    Route::resource('admin/user', 'UserController');
});



