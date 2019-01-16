<?php

namespace App\Http\Controllers;
use App\Category;
use App\Http\Resources\Post\PostCollection;
use App\Http\Resources\Post\PostResource;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Only Authenticated Users are allowed to access these resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Create a variable and store all post in it
//        $posts= Post::all();

        // Testing Pagination with latest post on the top
        $posts=Post::orderBy('id', 'desc')->paginate(3);

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
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
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
            'body' =>'required',
            'slug' =>'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' => 'required|max:255'
            ]);


        $post=new Post;

        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        // Store into database
        $post->save();

        /* Storing the tags that are coming in create post Request */
        $post->tags()->sync($request->tags, false);

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
        $selcat = $post->category_id;
        $categories = Category::all();
        $tags=Tag::all();

        return view('posts.edit', compact('post', 'categories', 'selcat', 'tags'));
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
      $post=Post::find($id);
      if($request->input('slug') === $post->slug) {
        // Validate the form input data ohne slug
        $this->validate($request,[
            'title'=>'required|max:255',
            'category_id'=>'required|integer',
            'body' =>'required',
        ]);
    } else {
         // Validate the form input data mit slug
         $this->validate($request,[
          'title'=>'required|max:255',
          'category_id'=>'required|integer',
          'body' =>'required',
          'slug' =>'required|alpha_dash|min:5|max:255|unique:posts,slug'
         ]);
    }
        // Save the input form data in the databse

        $post->title= $request->input('title');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');
        $post->slug = $request->input('slug');
        $post->save();

        /* Not including false as second argument */
        $post->tags()->sync($request->tags);

        // Prepare flash message
        Session::flash('success','The Post was saved successfully!');
        // Redirect the page back to the show page
        return redirect()->route('post.show', $post->id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=POST::find($id);
        $post->tags()->detach();

        $post->delete();

        return redirect()->route('post.index');
    }
}

