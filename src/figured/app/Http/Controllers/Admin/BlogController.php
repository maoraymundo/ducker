<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Config;
use Auth;
use Illuminate\Http\Request;

use App\User;
use App\Blog;

class BlogController extends Controller
{
    public function __construct() {}

    public function index() {
        $blogs = Blog::where('user_id', Auth::user()->id)->get();

        return view('admin.dashboard', [
            'blogs' => $blogs, 
            'statusOptions' => Config::get('constants.blogStatus'),
        ]);
    }

    public function add() {

        return view('admin.blog.post', [
            'statusOptions' => Config::get('constants.blogStatus'),
            'blog' => new Blog()
        ]);
    }

    public function post(Request $request) {
        $validate = $request->validate([
                'title' => 'required',
                'mce_0' => 'required',
            ]);

        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->content = $request->input('mce_0');
        $blog->status = $request->input('status');
        $blog->save();

        $blog->user()->associate(Auth::user());
        $blog->save();

        return redirect()->route('get.admin.blog.edit', ['id' => $blog->_id]);
    }

    public function edit($id) {

        $blog = Blog::find($id);

        return view('admin.blog.post', [
            'statusOptions' => Config::get('constants.blogStatus'),
            'blog' => $blog,
        ]);
    }

    public function put(Request $request, $id) {

        $validate = $request->validate([
                'title' => 'required',
                'mce_0' => 'required',
            ]);

        $blog = Blog::find($id);
        $blog->title = $request->input('title');
        $blog->content = $request->input('mce_0');
        $blog->status = $request->input('status');
        $blog->save();

        return redirect()->route('get.admin.blog.edit', ['id' => $blog->_id]);
    }

    public function findBlog($id) {
        return response()->json(['data' => Blog::find($id)]);
    }
}
