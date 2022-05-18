<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,300;0,400;0,500;0,700;1,200;1,400&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="bg-[#F7F7FB]">        
        <header class="site-header mb-8">
            <nav class="bg-white border-gray-200 px-2 sm:px-2 py-2.5 rounded shadow-lg shadow-blue-300/20 md:py-3">
                <div class="container max-w-screen-xl flex flex-wrap justify-between items-center mx-auto relative">
                    <a href="{{ route('frontpage') }}" class="flex items-center">
                        {{-- <span class="self-center text-2xl font-light whitespace-nowrap"><span class="font-semibold text-blue-700">JOBS</span> | siammetaverse</span> --}}
                        <img class="h-14 md:h-24 rounded-lg shadow-lg relative hover:shadow-3xl hover:bottom-1" src="https://i.ibb.co/dPgHTS0/job-logo.jpg" alt="">
                    </a>
                    <div class="hidden flex md:order-2">
                    <button data-collapse-toggle="mobile-menu-3" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-3" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                    </div>
                    <div class="relative top-1/3 right-0 px-6 py-4 sm:block md:py-0 md:absolute">
                        <a href="{{ route('posts.create') }}" class="font-medium text-xl text-blue-50 bg-blue-700 px-7 py-3 rounded-3xl shadow-lg relative hover:bg-blue-800 hover:bottom-0.5"><i class="fa-solid fa-circle-plus mr-4"></i>POST A JOB</a>
                        @if (Route::has('login'))
                        @auth
                        <a href="{{ url('/dashboard') }}" class="font-medium text-xl text-blue-50 bg-green-500 px-7 py-3 rounded-3xl shadow-lg relative hover:bg-green-600 hover:bottom-0.5 ml-5"><i class="fa-solid fa-screwdriver-wrench"></i></a>
                        @else
                        @endauth
                        @endif
                    </div>
                </div>                    
            </nav>
        </header>
        @yield('content')
        <footer class="site-footer | bg-white mt-8 border-t border-neutral-300 py-4 md:py-9 ">
            <div class="container max-w-screen-xl mx-auto flex flex-wrap px-5 md:px-0">
                <div class="basis-full md:basis-2/5 mb-3 px-3">
                    <h2 class="text-blue-700 text-2xl font-bold mb-3">
                        เกี่ยวกับเรา
                    </h2>
                    <p class="text-neutral-600 font-light text-sm">
                        Siam Metaverse เราคือแหล่งรวมข่าวสารสาระความรู้ที่สำคัญเกี่ยวกับเทคโนโลยี Metaverse และ การพัฒนาระบบ Metaverse ซึ่งเราจะช่วยรวบรวมข้อมูลข่าวสารเพื่อให้ท่านได้อัพเดทและค้นหาข้อมูลทางเทคโนโลยี Metaverse เพื่อคนไทย ในภาษาไทย เรารวบรวมข้อมูลส่วนใหญ่จากเว็บไซต์และเว็บบอร์ดต่างประเทศนำมาแปลส่งตรงถึงคุณ
                    </p>
                </div>
                <div class="basis-full basis-2/5"></div>
                <div class="basis-full md:basis-1/5 mb-3 px-3 md:text-right">
                    <div class="contact-link md:inline-block text-center md:text-left">
                        <ul>
                            <li class="text-lg py-2">
                                <a class="flex flex-wrap md:items-center" href="https://www.facebook.com/groups/1308181312939007/?ref=share">
                                    <i class="fa-brands fa-facebook flex-initial w-9 mr-1 text-[#2374E1] font-bold text-2xl"></i>
                                    <span class="flex-initial text-neutral-500 font-light text-base">Metaverse Thailand</span>
                                </a>
                            </li>
                            <li class="text-lg py-2">
                                <a class="flex flex-wrap md:items-center" href="https://t.me/Metaverse_TH">
                                    <i class="fa-brands fa-telegram flex-initial w-9 mr-1 text-[#DF0023] font-bold text-2xl"></i>
                                    <span class="flex-initial text-neutral-500 font-light text-base">Metaverse Thailand</span>
                                </a>
                            </li>
                            <li class="text-lg py-2">
                                <a class="flex flex-wrap md:items-center" href="https://line.me/ti/g2/2XEW7GsbUIjAzJGIJnyA9hufQ8piqZB4VPI2YA?utm_source=invitation&utm_medium=link_copy&utm_campaign=default">
                                    <i class="fa-brands fa-line flex-initial w-9 mr-1 text-[#52CBFF] font-bold text-2xl"></i>
                                    <span class="flex-initial text-neutral-500 font-light text-base">Siam Metaverse</span>
                                </a>
                            </li>                            
                        </ul>
                    </div>
                </div>
                <div class="copyright-wrap w-full border-t border-neutral-300 py-3 md:py-4 flex flex-wrap">
                    <div class="basis-full md:basis-1/2 px-3 md:px-0 text-neutral-600 text-lg uppercase text-center md:text-left">
                        <img class="h-10 rounded-lg" src="https://i.ibb.co/dPgHTS0/job-logo.jpg" alt="">
                    </div>
                    <div class="basis-full md:basis-1/2 px-3 md:px-0 text-neutral-600 text-lg uppercase text-center md:text-right">
                        © 2021 siammetaverse.com
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
