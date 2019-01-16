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


/* Route to home */
Route::get('/', 'PagesController@getIndex');

/* Route for blog with slugs*/
/* The reason we donot use ::resource(blog) is that we want to associate slug with the blog
   Where as ::resource will assoniate /{blog} with the blog */
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])
        ->where('slug', '[\w\d\-\_]+');

/* Routes to blog list */
Route::get('blog', ['as'=>'blog.index', 'uses'=>'BlogController@getIndex']);

/* Routes to pages linked from Navbar */

Route::get('/contact', 'PagesController@getContact');
Route::post('/contact', 'PagesController@postContact');

Route::get('/faq', 'PagesController@getFaq');

Route::get('/categories', 'PagesController@getCategories');

//Creating routes automatically for /post url for all the functions in the PostController
Route::resource('post', 'PostController');

/* Automaticaly created when ran make:auth artisan command */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/* solution for logout 'methodnotallowedhttpexception no message laravel' error */
Route::get('logout', 'Auth\LoginController@logout');

/* Categories Route except create route*/
Route::resource('categories', 'CategoryController', ['except'=>['create']]);

/* Tags Route except create route*/
Route::resource('tags', 'TagController', ['except'=>['create']]);

/* Comments Route */
/* The reason we donot use ::resource(comments) is that we want to */
/*associate post_id with the commentsWhere as ::resource will assoniate /{comment} with the comments */
Route::post('comment/{post_id}', ['as' => 'comments.store', 'uses' => 'CommentsController@store']);

