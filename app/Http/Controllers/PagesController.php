<?php
/**
 * Created by PhpStorm.
 * User: Mubashir
 * Date: 12/17/2018
 * Time: 9:48 PM
 */

namespace App\Http\Controllers;
use App\Post;

class PagesController extends Controller {

    public function getIndex()
    {
        $posts=Post::orderBy('created_at', 'desc')->get();
        return view('pages/home')->withPosts($posts);
    }

    public function getContact()
    {
        return view('pages/contact');
    }

    public function getFaq()
    {
        return view('pages/faq');
    }

    public function getCategories()
    {
        return view('pages/categories');
    }
}