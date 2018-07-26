<?php

// User routes
Route::group(['namespace' => 'User'], function() {
    Route::get('/', 'IndexController@index');
    Route::get('blogpost', 'BlogpostController@index')->name('blogpost');
});



//Admin routes
Route::group(['namespace' => 'Admin'], function() {
    Route::resource('admin/blogpost', 'BlogpostController');
    Route::resource('admin/tag', 'TagController');
    Route::resource('admin/categorie', 'CategorieController');
});



Route::get('admin', function() {
    return view('admin.admin');
})->name('admin');
