<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class Front extends Controller
{
    //  FRONT
    public function index() {
        $data['posts'] = Post::orderBy('id','desc')->paginate(24);
        $data['categorys'] = Category::orderBy('id','desc')->paginate(15);        
        
        // return view('home' , $data);
        return view('front',$data);
    }
}