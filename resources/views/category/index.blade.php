@extends('layouts.frontend')
 
@section('title', 'HOME PAGE')

@section('content')
            <main class="container max-w-screen-xl mx-auto mb-9">               
                <div class="mb-9">
                    <h2>หมวดหมู่งานทั้งหมด</h2>
                </div>
                <div class="front-list-category mb-6">
                    <ul class="flex flex-wrap gap-4">
                        @foreach ($categorys as $category)
                        <li>
                            <a class="mr-3 mb-3 px-4 py-1 border-2 border-neutral-300/59 text-neutral-400 font-medium rounded-lg hover:text-white hover:bg-blue-600" href="{{url('/category/'.$category->slug)}}">{{ $category->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>                
            </main>
@stop