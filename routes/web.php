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
    return view('pages/home');
});


/* Routes to pages linked from Navbar */

Route::get('/contact', function() {
    return view('pages.contact');
});

Route::get('/faq', function() {
    return view('pages.faq');
});
Route::get('/categories', function() {
    return view('pages.categories');
});

//Creating routes automatically for /post url for all the functions in the PostController
Route::resource('post', 'PostController');