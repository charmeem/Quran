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

Route::group(['middleware'=>['web']], function(){

    Route::get('/', 'PagesController@getIndex');

    /* Route for blog with slugs*/
    Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])
            ->where('slug', '[\w\d\-\_]+');

    /* Routes to pages linked from Navbar */

    Route::get('/contact', 'PagesController@getContact');

    Route::get('/faq', 'PagesController@getFaq');

    Route::get('/categories', 'PagesController@getCategories');

    //Creating routes automatically for /post url for all the functions in the PostController
    Route::resource('post', 'PostController');

});