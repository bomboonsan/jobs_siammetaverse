@extends('layouts.frontend')
 
@section('title', 'HOME PAGE')

@section('content')


            <main class="container max-w-screen-xl mx-auto">
                <div class="post_page_wrapper flex flex-wrapp gap-8">
                    <div class="basis-full hidden md:block md:basis-1/2">
                        <div class="post-left-content w-full py-4 px-5 md:sticky md:top-2">
                            <h1 class="text-3xl font-bold text-neutral-700 mb-4">โพสงานของคุณให้โลกได้รับรู้</h1>
                            <p class="text-base text-neutral-600 font-light mb-4">
                                blank
                            </p>
                            <h2 class="text-xl font-bold text-neutral-600 mb-1">ขั้นตอนที่ 1</h2>
                            <p class="text-base text-neutral-600 font-light mb-9">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, reprehenderit!
                            </p>
                            <h2 class="text-xl font-bold text-neutral-600 mb-1">ขั้นตอนที่ 2</h2>
                            <p class="text-base text-neutral-600 font-light mb-9">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, reprehenderit!
                            </p>
                            <div class="text-center mb-3">
                                <a class="inline-block text-white text-lg font-bold bg-blue-700 rounded-lg py-2 px-6 hover:bg-blue-800 md:block md:text-2xl md:py-3 md:font-medium shadow-lg shadow-blue-500/40 md:shadow-2xl" href="#">
                                    ติดต่อเรา
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="basis-full md:basis-1/2">
                        <div class="form-post-area bg-white px-4 py-4 md:px-9 md:py-9 rounded-2xl shadow-xl overflow-hidden">
                            @if ($errors->any())
                                <div class="p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif
                            <h2 class="mb-4 font-bold text-black text-2xl">แก้ไขงาน หมายเลข {{ $post[0]->id }}</h2>
                            <form class="flex flex-wrap" action="{{ route('posts.update',$post[0]->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')  {{-- <<<<<<<<<<<<<<<<<<<<<<<<<< สำหรับแก้ไข --}}
                                <div class="basis-full mb-6">
                                    <label for="exampleFormControlTextarea2" class="block mb-2 text-base text-neutral-800 font-bold">หัวข้อ*</label>
                                    <input type="text" name="name" class="w-full rounded-lg border border-neutral-300/50 shadow placeholder:text-neutral-300" value="{{ $post[0]->name }}"></input>
                                </div>
                                <div class="basis-full mb-6">
                                    <label for="exampleFormControlTextarea3" class="block mb-2 text-base text-neutral-800 font-bold">รูปภาพหน้าปก*</label>
                                    <img class="mt-2 mb-5 w-2/4" src="{{url($post[0]->thumbnail)}}" alt="">     
                                    <input type="file" name="thumbnail" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"  placeholder="image"></input>          
                                </div>
                                <div class="basis-full mb-6">
                                    <label for="exampleFormControlTextarea2" class="block mb-2 text-base text-neutral-800 font-bold">รายละเอียดงาน*</label>
                                    <textarea id="editor1" class="ckeditor rounded-lg border border-neutral-300/50 shadow" name="description">{!! $post[0]->description !!}</textarea>
                                </div>                                
                                <div class="basis-1/2 pr-8 mb-6 w-full">
                                    <label for="exampleFormControlTextarea3" class="block mb-2 text-base text-neutral-800 font-bold">ราคาเริ่มต้น (บาท)*</label>
                                    <input type="number" class="px-5 py-1.5 w-full border-1 border-neutral-300 rounded-lg shadow text-center" name="price" id="exampleFormControlTextarea3" rows="2"  value="{{ $post[0]->price }}"></input>
                                </div>
                                <div class="basis-1/2 mb-6 w-full">
                                    <label for="exampleFormControlTextarea3" class="block mb-2 text-base text-neutral-800 font-bold">เลือกหมวดหมู่งาน*</label>
                                    <select name="category_id" class="form-select appearance-none
                                        block
                                        w-full
                                        px-4
                                        md:px-5
                                        py-1.5
                                        text-base
                                        font-normal
                                        text-gray-400
                                        bg-white bg-clip-padding bg-no-repeat
                                        border border-solid border-gray-300
                                        rounded-lg
                                        shadow
                                        transition
                                        ease-in-out
                                        m-0
                                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                                        <option selected>เลือกหมวดหมู่งาน</option>   
                                        @foreach ($categorys as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>                                    
                                </div>

                                {{-- NEW --}}                               

                                <div class="basis-full mb-3 pt-6">
                                    <h2 class="contact text-black text-lg md:text-xl font-bold">ช่องทางติดต่อ</h2>
                                </div>
                                <div class="basis-full mb-6">
                                    <input type="text" name="author_name" class="px-5 py-3 w-full border-1 border-neutral-200 rounded-lg shadow" id="exampleFormControlInput1" value="{{ $post[0]->author_name }}">
                                </div>
                                <div class="basis-full mb-6">
                                    <div class="flex flex-wrap items-center mb-3">
                                        <div class="flex-initial mr-4 flex-initial text-5xl text-[#333] hover:text-blue-600">
                                            <i class="fa-brands fa-facebook-square w-16"></i>
                                        </div>
                                        <div class="flex-1">
                                            <input type="text" name="author_facebook" class="px-5 py-2 w-full border-1 border-neutral-200 rounded-lg shadow" id="exampleFormControlInput1" value="{{ $post[0]->author_facebook }}">
                                        </div>
                                    </div><!--contact-item-->
                                    <div class="flex flex-wrap items-center mb-3">
                                        <div class="flex-initial mr-4 flex-initial text-5xl text-[#333] hover:text-blue-600">
                                            <i class="fa-brands fa-line w-16"></i>
                                        </div>
                                        <div class="flex-1">
                                            <input type="text" name="author_line" class="px-5 py-2 w-full border-1 border-neutral-200 rounded-lg shadow" id="exampleFormControlInput1" value="{{ $post[0]->author_line }}">
                                        </div>
                                    </div><!--contact-item-->
                                    <div class="flex flex-wrap items-center mb-3">
                                        <div class="flex-initial mr-4 flex-initial text-5xl text-[#333] hover:text-blue-600">
                                            <i class="fa-solid fa-square-envelope w-16"></i>
                                        </div>
                                        <div class="flex-1">
                                            <input type="text" name="author_email" class="px-5 py-2 w-full border-1 border-neutral-200 rounded-lg shadow" id="exampleFormControlInput1" value="{{ $post[0]->author_email }}">
                                        </div>
                                    </div><!--contact-item-->
                                    <div class="flex flex-wrap items-center mb-3">
                                        <div class="flex-initial mr-4 flex-initial text-5xl text-[#333] hover:text-blue-600">
                                            <i class="fa-solid fa-square-phone w-16"></i>
                                        </div>
                                        <div class="flex-1">
                                            <input type="text" name="author_telephone" class="px-5 py-2 w-full border-1 border-neutral-200 rounded-lg shadow" id="exampleFormControlInput1" value="{{ $post[0]->author_telephone }}">
                                        </div>
                                    </div><!--contact-item-->
                                    
                                </div>
                                <div class="basis-full mb-6"></div>
                                <div class="basis-full">
                                    <button type="submit" class="bg-blue-700 text-white text-xl font-medium px-4 py-2 rounded-lg hover:bg-blue-800 md:text-center md:text-2xl w-full">ส่งข้อมูล</button>
                                </div>                                
                            </form>                            
                            <script src="//cdn.ckeditor.com/4.18.0/basic/ckeditor.js"></script>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('.ckeditor').ckeditor();
                                    
                                });                               
                                
                            </script>
                        </div>
                    </div>
                </div>                
            </main>
@stop