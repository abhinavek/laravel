<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    public function getIndex()
    {
        //echo "single";
        $posts = Post::orderBy('id','desc')->paginate(5);
        return view('pages/home')->withPosts($posts); //.can be use instead of /
    }
    public function getHome()
    {
        return view('pages/home'); //.can be use instead of /
    }
    public function getContact()
    {
        return view('pages/contact'); //.can be use instead of /
    }
    public function getAbout()
    {
        return view('pages/about');
    }
    public function postContact(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'name'=>'required',
            'subject'=>'required',
            'message'=>'required',
            ]);
        $data = array('email'=> $request->email,
            'name'=>$request->name,
            'subject'=>$request->subject,
            'messagebody'=>$request->message);
        Mail::send('mail.contactform',$data,function ($message) use ($data){
            $message->from($data['email']);
            $message->to('abhinavek@gmail.com');
            $message->subject($data['subject']);
        });
        if (Mail::failures()) {
            // return response showing failed emails
            Session::flash('failed','Message not sent. Please try again');
            return view('pages/contact');
        }
        else
        {
            Session::flash('success','Message sent successfully');
            return view('pages/contact');
        }
    }
}