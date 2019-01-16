<?php

use App\Http\Resources\Post\PostCollection;
use App\Http\Resources\Post\PostResource;
use App\Post;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/* Route to find all posts through api */
Route::get('/posts', function(){
    return PostCollection::collection(Post::all());
});

/* Route to find one post as in show method of controller */
Route::get('posts/{id}', function($id){
    return new PostResource(Post::find($id));
});

