<?php
/**
 * Created by PhpStorm.
 * User: Mubashir
 * Date: 12/17/2018
 * Time: 9:48 PM
 */

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function postContact(Request $request)
    {
        $this->validate($request,[
           'email'=> 'required|email',
           'subject' => 'min:3',
           'message' => 'min:10'
        ]);

        $data = [
            'email'=> $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        ];

        Mail::send('emails.contact', $data, function($message) use ($data){
           $message->from($data['email']);
           $message->to('mmufti@hotmail.com');
           $message->subject($data['subject']);
        });
        return redirect('/');
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