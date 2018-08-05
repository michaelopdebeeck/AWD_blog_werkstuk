<?php

// User routes
Route::group(['namespace' => 'User'], function() {
    Route::get('/', 'IndexController@index')->name('homepage');
    Route::get('blogpost/{slug?}', 'BlogpostController@index')->name('blogpost');

    Route::get('blogpost/tag/{tag}', 'IndexController@tag')->name('tag');
    Route::get('blogpost/categorie/{categorie}', 'IndexController@categorie')->name('categorie');

    Route::get('contact', 'ContactController@index')->name('contact');
    Route::get('over-mij', 'AboutController@index')->name('over-mij');
});

//Admin routes
Route::group(['namespace' => 'Admin'], function() {

    //Admin route
    Route::get('admin', 'IndexController@index')->name('admin');

    //User route
    Route::resource('admin/user', 'UserController');

    //Post route
    Route::resource('admin/blogpost', 'BlogpostController');

    //Tag route
    Route::resource('admin/tag', 'TagController');

    //Categorie route
    Route::resource('admin/categorie', 'CategorieController');

    //Role route
    Route::resource('admin/role', 'RoleController');

    //Permission route
    Route::resource('admin/permission', 'PermissionController');

    //Admin Auth Routes
    Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin/login', 'Auth\LoginController@login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
