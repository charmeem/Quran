<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Create a variable and store all post in it
        $posts= Post::all();

        //Redirect to view and pass in the above variable
        return view('posts.index')->withPosts($posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate the request
        $this->validate($request,[
            'title'=>'required|max:255',
            'body' =>'required'
            ]);

        // Store into database
        $post=new Post;

        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();

        // Using Sessions, print flash messages
        Session::flash('success', 'The post is succesfully saved! ');

        //Redirect to show method of controller page
        // post->id is for including id in the route url, see php artisan route:list
        return redirect()->route('post.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);  // REading post of particular $id from database
//        return view('posts.show')->withPost($post);
        return view('posts.show', compact('post')); // I prefer this being more clean!!

    }

    /**
     * GET Edit page
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * PUT Edited page to Database
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
