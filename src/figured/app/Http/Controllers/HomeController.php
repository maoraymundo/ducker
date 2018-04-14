<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with(['user'])->where('status', '2')->get();

        return view('home.home', [
            'blogs' => $blogs
        ]);
    }

    public function blog($id)
    {
        $blog = Blog::find($id);

        return view('home.blog', [
            'blog' => $blog
        ]);
    }
}
