@extends('layouts.frontend')
 
@section('title', 'HOME PAGE')

@section('content')
            <main class="container max-w-screen-lg mx-auto mb-9 px-5 lg:px-0">
                <div class="home-cover-content pt-9 mb-9">
                    <p class="text-4xl text-center font-medium text-neutral-900">
                        <span class="uppercase font-extrabold text-blue-700">JOBS | siammetaverse</span><br>
                        <span class="text-xl">พื้นที่รวบรวมเหล่านักพัฒนา และกราฟิกดีไซน์เนอร์</span><br>
                        {{-- นักออกแบบกราฟิก นักพัฒนา<br> --}}
                        
                    </p>
                </div><!-- home-cover-content -->

                <div class="job-category my-9">
                    <h2 class="text-lg text-neutral-800 font-medium mb-6"> หมวดหมู่งาน <a class="relative bottom-0.5 inline-block text-xs px-3 py-1 bg-yellow-300 text-black ml-3 rounded-lg " href="{{ route('Category') }}">ดูทั้งหมด</a></h2>
                    <div class="front-list-category mb-6">
                        <ul class="flex flex-wrap gap-4">
                            @foreach ($categorys as $category)
                            <li>
                                <a class="mr-3 mb-3 px-4 py-1 border-2 border-neutral-300/59 text-neutral-400 font-medium rounded-lg hover:text-white hover:bg-blue-600" href="{{url('/category/'.$category->slug)}}">{{ $category->name }}</a>
                            </li>
                            @endforeach           
                        </ul>
                    </div>
                </div><!-- job-category -->

                <div class="jobs-all-list grid grid-cols-2 lg:grid-cols-3 gap-7 pt-9">
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
                <div class="view-more mt-12 mb-3">
                    <a class="block py-1 md:py-4 px-3 rounded-lg md:rounded-2xl md:font-bold text-center text-lg md:text-xl bg-blue-700 hover:bg-blue-800 text-white transition-all" href="{{url('/posts/')}}">
                        หัวข้องานทั้งหมด
                    </a>
                </div>
            </main>
@stop