<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getSingle($slug) {
        // Get from database based on slug
        $post= Post::where('slug', '=', $slug)->first();

        // Return the view
        return view('blog.single')->withPost($post);
    }

    // Get blog list
    public function getIndex() {
        $posts = Post::paginate(3);
        return view('blog.index')->withPosts($posts);
    }
}
