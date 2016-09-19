<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Mail;
class PageController extends Controller
{
    //
    public function getIndex(){

    	$posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.index')->withPosts($posts);

    }

    public function getAbout(){

    	return view('pages.about');

    }

    public function getContact(){

    	return view('pages.contact');

    }

    public function postContact(Request $request){

        $this->validate($request, [
            'subject'=>'required|min:3',
            'email'=>'required|email',
            'body'=>'min:10'
            ]);
        $data = array(
            'subject'=>$request->subject,
            'email'=>$request->email,
            'body'=>$request->body
            );
        Mail::send('emails.contact', $data, function ($message) use($data) {
            $message->from($data['email']);
            $message->to('info@supremumlogic.com');
            $message->subject($data['subject']);
        });
        Session::flash('success','Your Email was sent!');

        return redirect('/');

    }
}
