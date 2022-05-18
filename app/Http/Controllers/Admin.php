<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;

class Admin extends Controller
{
    public function index() 
    {        
        return view('admin.index');
    }
    public function jobs() 
    {
        $data['posts'] = Post::orderBy('id','desc')->paginate(15);
        $data['categorys'] = Category::orderBy('id','desc')->paginate(15);
        return view('admin.jobs' , $data);
    }
    public function categories() 
    {
        $data['posts'] = Post::orderBy('id','desc')->paginate(15);
        $data['categorys'] = Category::orderBy('id','desc')->paginate(15);
        return view('admin.category' , $data);
    }
    public function createCategories() 
    {
        $data['posts'] = Post::orderBy('id','desc')->paginate(15);
        $data['categorys'] = Category::orderBy('id','desc')->paginate(15);
        return view('admin.create-category' , $data);
    }
}
