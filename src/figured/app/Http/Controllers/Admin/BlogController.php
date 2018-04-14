<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class BlogController extends Controller
{



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function add() {

        $data['status_options'] = Config::get('constants.blogStatus');

        return view('admin.blog.post', $data);
    }
}
