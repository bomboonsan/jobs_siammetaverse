@extends('layouts.frontend')
 
@section('title', 'HOME PAGE')

@section('content')
        <main class="container max-w-screen-xl mx-auto mb-9">

            <form action="{{ route('category.update',$categorys[0]->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')  {{-- <<<<<<<<<<<<<<<<<<<<<<<<<< สำหรับแก้ไข --}}
                <div class="input-wrap mb-5 w-full">
                    <p class="text-sm mb-1 text-neutral-400">ชื่อหมวดหมู่</p>
                    <input type="text" name="name" class="w-full rounded-lg border border-neutral-300/50 shadow placeholder:text-neutral-300" value="{{ $categorys[0]->name }}"></input>
                </div>
                <div class="input-wrap mb-5 w-full">
                    <p class="text-sm mb-1 text-neutral-400">permalink</p>
                    <input type="text" name="slug" class="w-full rounded-lg border border-neutral-300/50 shadow placeholder:text-neutral-300" value="{{ $categorys[0]->slug }}"></input>
                </div>
                <div class="input-wrap mb-5 w-full">
                    <img class="mt-2 mb-5 w-2/4" src="{{url($categorys[0]->thumbnail)}}" alt="">     
                    <span class="sr-only">Choose File</span>
                    <input type="file" name="thumbnail" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"  placeholder="image"></input>
                </div>
                <div class="input-wrap mb-5 w-full">
                    <textarea class="ckeditor rounded-lg border border-neutral-300/50 shadow" name="description">{!! $categorys[0]->description !!}</textarea>
                </div>  
                <div class="submit-btn input-wrap mb-5 w-full">
                    <button type="submit" class="bg-blue-100/50 hover:bg-blue-100 text-blue-500 text-lg font-medium px-3 py-0.5 rounded-lg">Submit</button>
                </div>
                <script src="//cdn.ckeditor.com/4.18.0/basic/ckeditor.js"></script>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('.ckeditor').ckeditor();
                    });
                </script>
            </form>                
        </main>
@stop