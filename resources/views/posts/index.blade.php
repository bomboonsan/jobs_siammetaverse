@extends('layouts.frontend')
 
@section('title', 'HOME PAGE')

@section('content')
            <main class="container max-w-screen-xl mx-auto mb-9">
                <h2 class="text-3xl font-bold text-blue-700">หัวข้องานทั้งหมด</h2>
                <div class="jobs-all-list grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-7 pt-9">  
                    @foreach ($posts as $post)
                    <div class="jobs-item w-full bg-white rounded-lg shadow hover:shadow-lg hover:scale-[1.003] overflow-hidden relative hover:md:shodown-2xl transition-all">
                        {{-- <div class="job-item-thumbnail mb-8 relative w-full">
                            <a href="{{url('/view/'.$post->id)}}" class="relative">
                            <img class="w-full top-0 h-auto aspect-video" src="{{url($post->thumbnail)}}" alt="">
                            </a>
                            <img class="item-avatar block absolute w-16 h-16 rounded-full shadow-lg" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSWDGL-6ZdKn31umHjbxRA6twySHbALSURWNA&usqp=CAU" alt="">
                        </div> --}}
                        <a title="{{ $post->name }}" class="text-blue-700 text-base font-medium hover:text-blue-800" href="{{url('/job/'.$post->id)}}">
                        <div class="job-thumbnail bg-cover bg-center aspect-video w-full relative" style="background-image: url({{url($post->thumbnail)}})">
                            <div class="bg-blue-0 aspect-video opacity-20 hover:opacity-0 transition-all hover:cursor-pointer"></div>
                        </div>
                        </a>
                        <div class="job-item-content w-full relative">                            
                            <h3 class="job-item-title py-2 px-4"><a title="{{ $post->name }}" class="text-blue-700 text-base font-medium hover:text-blue-800" href="{{url('/job/'.$post->id)}}">{{ $post->name }}</a></h3>
                            <span class="job-item-price block text-sm font-light text-neutral-600 px-4 pb-3">ราคาเริ่มต้น <span class="font-medium text-neutral-600 px-1">{{ $post->price }}</span> บาท</span>
                        </div>
                    </div><!-- jobs-item -->
                    @endforeach
                </div><!--- jobs-all-list -->
                <div class="pagination-wrap pt-6 px-4">
                    {!! $posts->links() !!}
                </div>     
            </main>
@stop