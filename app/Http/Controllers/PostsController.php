<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(30);
    
        return view('posts.index',compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorys = Category::latest()->paginate(200);
        return view('posts.create',compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required',
            'category_id' => 'required',
            'author_name' => 'required',
            'author_facebook' => 'required',
            'author_line' => 'required',
            'author_email' => 'required',
            'author_telephone' => 'required',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('thumbnail')) {
            $destinationPath = 'upload/post/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $full_path = $destinationPath.$profileImage;
            $input['thumbnail'] = "$full_path";
        }
        
        // $input['created_at'] = Carbon::now();
        $input['created_at'] = Carbon::now();
        $input['updated_at'] = Carbon::now();

        // dd($input);
        // Post::create($input);
        Post::insert([
            'name' => $input['name'],
            'thumbnail' => $input['thumbnail'],
            'description' => $input['description'],
            'price' => $input['price'],
            'author_name' => $input['author_name'],
            'author_facebook' => $input['author_facebook'],
            'author_line' => $input['author_line'],
            'author_email' => $input['author_email'],
            'author_telephone' => $input['author_telephone'],
            'category_id' => $input['category_id'],
            'created_at' => $input['created_at'],
        ]);

     
        return redirect()->route('posts.index')
                        ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $id)
    {
        //
        // $job_slug = $job_slug; // ดึงค่า slug 
        // $job = Job::where('job_slug',  $job_slug)->get(); // หา slug ที่ตรงกันใน database แล้วดึงมาทั้งหมดจาก get()
        $post = Post::find($id);
        $cat_id = $post[0]->category_id;
        $data['post'] = Post::find($id);
        $data['categorys'] = Category::where('id',  $cat_id)->get();
        // return view('posts.show',compact('post'));
        return view('posts.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $id)
    {
        //
        $post = Post::find($id);
        $cat_id = $post[0]->category_id;
        $data['post'] = Post::find($id);
        $data['categorys'] = Category::where('id',  $cat_id)->get();

        return view('posts.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Post $post)
    public function update(Request $request, Post $post)
    {
        //
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            // 'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required',
            'category_id' => 'required',
            'author_name' => 'required',
            'author_facebook' => 'required',
            'author_line' => 'required',
            'author_email' => 'required',
            'author_telephone' => 'required',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $post->update($input);
    
        return redirect()->route('posts.index')
                        ->with('success','posts updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
     
        return redirect()->route('posts.index')
                        ->with('success','posts deleted successfully');
    }
}
