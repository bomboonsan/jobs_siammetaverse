@extends('layouts.frontend')
 
{{-- @section('title', 'HOME PAGE') --}}
@section('title', $post[0]->name)

@section('content')

            <main class="container max-w-screen-xl mx-auto flex flex-wrap">
                <div class="content-area basis-full md:basis-8/12 py-3 px-3 md:py-4 md:px-4">
                    <article class="post bg-white rounded-lg md:rounded-2xl shadow-lg overflow-hidden">
                        <div class="post-media w-full mb-5">
                            <img class="w-full" src="{{url($post[0]->thumbnail)}}" alt="">
                        </div><!-- post-media -->
                        <div class="post-body py-3 px-4 md:py-6 md:px-9">
                            <div class="post-header relative px-0 md:px-5 mb-5 md:mb-9 pb-4 md:pb-9 md:border-b md:border-neutral-300">
                                {{-- <span class="post-cat inline-block py-1 px-3 rounded-lg bg-sky-100 text-sky-700 font-medium font-light mb-3 text-sm">
                                    <a class="text-blue-700 font-medium" href="#">กราฟฟิกดีไซเนอร์</a>
                                </span> --}}
                                @foreach ($categorys as $category)
                                <span class="post-cat inline-block py-1 px-4 rounded-lg bg-sky-100 text-sky-700 font-medium font-light mb-3 mr-3 text-sm hover:bg-sky-200/60">
                                    <a class="text-blue-700 font-medium" href="{{url('/category/'.$category->slug)}}">{{ $category->name }}</a>
                                </span>
                                @endforeach
                                <h1 class="post-title text-lg md:text-2xl text-blue-700 md:font-bold">
                                    {{ $post[0]->name }}
                                </h1>
                                
                            </div><!-- post-header -->
                            <div class="post-content px-0 md:px-5 text-neutral-700 font-light">
                                {{-- <p class="text-base md:text-lg font-light mb-4">
                                    {{url($post[0]->thumbnail)}}
                                </p> --}}
                                {!! $post[0]->description !!} {{-- แสดงผล HTML --}}
                            </div><!-- post-content -->
                            @if (Route::has('login'))

                            @auth                              
                            <div class="post-control px-0 md:px-5 text-neutral-700 font-light mt-6 mb-3 text-right">
                                <form action="{{ route('posts.destroy',$post[0]->id) }}" method="POST">     
                                    <a class="inline-block relative py-0.5 px-4 rounded-lg bg-yellow-200/60 text-yellow-700 font-medium shadow hover:shadow-md hover:bottom-0.5 transition-all" href="{{url('/job/'.$post[0]->id.'/edit')}}">
                                        แก้ไข
                                    </a>                     
                                    @csrf
                                    @method('DELETE')                        
                                    <button onclick="return confirm('คุณต้องการลบหัวข้องานนี้ใช่ไหม')" type="submit" class="inline-block ml-3 relative py-0.5 px-4 rounded-lg bg-red-200/60 text-red-700 font-medium shadow hover:shadow-md hover:bottom-0.5 transition-all">ลบ</button>
                                </form>
                            </div>
                            @else
                            @endauth
                            @endif
                            <div class="job-contact px-0 pb-4 md:px-5">
                                <h2 class="job-contact-title text-lg text-black mb-3 mt-4 md:font-bold">ช่องทางติดต่อ</h2>
                                <p class="text-sm mb-4">คุณ {{ $post[0]->author_name }}</p>
                                <div class="list-contacts flex flex-wrap gap-4">
                                    <div class="job-contact-item flex-initial text-4xl text-neutral-500 hover:text-blue-900">
                                        <a href="{{ $post[0]->author_facebook }}" target="_blank">
                                            <i class="fa-brands fa-facebook-square"></i>
                                        </a>
                                    </div><!-- job-contact-item -->
                                    <div class="job-contact-item flex-initial text-4xl text-neutral-500 hover:text-blue-900">
                                        <a href="{{ $post[0]->author_line }}" target="_blank">
                                            <i class="fa-brands fa-line"></i>
                                        </a>
                                    </div><!-- job-contact-item -->
                                    <div class="job-contact-item flex-initial text-4xl text-neutral-500 hover:text-blue-900">
                                        <a href="mailto:{{ $post[0]->author_email }}" target="_blank">
                                            <i class="fa-solid fa-square-envelope"></i>
                                        </a>
                                    </div><!-- job-contact-item -->
                                    <div class="job-contact-item flex-initial text-4xl text-neutral-500 hover:text-blue-900">
                                        <a href="tel:{{ $post[0]->author_telephone }}">
                                            <i class="fa-solid fa-square-phone"></i>
                                        </a>
                                    </div><!-- job-contact-item -->
                                </div><!-- list-contacts -->
                            </div><!-- job-contact -->
                        </div><!-- post-body -->
                    </article>
                </div><!-- content-area -->
                <div class="sidebar-area basis-full md:basis-4/12 py-3 px-3 md:py-4 md:px-4">
                    <aside class="widget bg-white rounded-lg md:rounded-2xl shadow-lg py-4 px-4 sticky top-2 md:px-8 md:py-8">
                        {{-- <h2 class="text-2xl font-bold text-blue-600 mb-4">Lorem ipsum dolor sit amet.</h2> --}}
                        <p class="text-neutral-500 text-base md:text-lg">
                            คุณจะมีส่วนช่วยในการขยายสังคม metaverse หากคุณแจ้งให้ผู้รับงานทราบว่าคุณพบตำแหน่งที่คุณกำลังมองหาบน jobs.siammetaverse.org
                        </p>
                        <p class="py-4">
                            <a class="block py-2 px-2 text-center bg-blue-700 text-white font-bold rounded-lg shadow-xl text-lg md:text-xl" href="#">
                                ติดต่อจ้างงาน
                            </a>                            
                        </p>
                    </aside>
                </div>
            </main>
@stop