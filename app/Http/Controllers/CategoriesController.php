<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::latest()->paginate(999);
    
        return view('category.index',compact('categorys'))
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
        return view('category.create');
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
            'slug' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('thumbnail')) {
            $destinationPath = 'upload/category/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $full_path = $destinationPath.$profileImage;
            $input['thumbnail'] = "$full_path";
        }
        
        // $input['created_at'] = Carbon::now();
        $input['created_at'] = Carbon::now();
        $input['updated_at'] = Carbon::now();

        // dd($input);
        // Category::create($input);
        Category::insert([
            'name' => $input['name'],
            'slug' => $input['slug'],
            'thumbnail' => $input['thumbnail'],
            'description' => $input['description'],
            'created_at' => $input['created_at'],
            'updated_at' => $input['updated_at'],
        ]);

     
        return redirect()->route('Category')
                        ->with('success','Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //

        $slug = $slug; // ดึงค่า slug
        $data['categorys'] = Category::where('slug',  $slug)->get(); // หา slug ที่ตรงกันใน database แล้วดึงมาทั้งหมดจาก get()
        $cat_id = $data['categorys'][0]->id;
        // dd($cat_id);
        // $data['posts'] = Post::where('id','desc')->paginate(15);
        $data['posts'] = Post::where('category_id',  $cat_id)->get();
        $data['counter'] = Post::where('category_id',  $cat_id)->count();
        // dd($data);
        return view('category.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
        $slug = $slug;
        $data['categorys'] = Category::where('slug',  $slug)->get();

        return view('category.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'slug' => 'required',
            // 'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('thumbnail')) {
            $destinationPath = 'upload/category/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['thumbnail'] = "$profileImage";
        }else{
            unset($input['thumbnail']);
        }
          
        $category->update($input);
    
        return redirect()->route('adminCategory')
                        ->with('success','category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
     
        return redirect()->route('adminCategory')
                        ->with('success','posts deleted successfully');
    }
}
