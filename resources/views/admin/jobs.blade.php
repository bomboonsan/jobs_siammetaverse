<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('งานทั้งหมด') }}
        </h2>
    </x-slot>

    <div class="container my-9 mx-auto max-w-screen-xl px-4">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-1 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            หัวข้องาน
                        </th>
                        <th scope="col" class="px-6 py-3">
                            หมวดหมู่
                        </th>
                        <th scope="col" class="px-6 py-3">
                            โพสเมื่อ
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ราคา
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-1" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <td class="px-1 py-4">
                            {{ $post->id }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            <p class="text-base"><a class="text-sm" href="{{url('/job/'.$post->id)}}">{{ $post->name }}</a></p>
                            <p class="mt-1">                                
                                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">     
                                    <a class="text-blue-700 text-xs font-medium hover:text-blue-800" href="{{url('/job/'.$post->id)}}/edit">แก้ไข</a>                   
                                    @csrf
                                    @method('DELETE')                        
                                    <button onclick="return confirm('คุณต้องการลบหัวข้องานนี้ใช่ไหม')" type="submit" class="text-red-700 text-xs font-medium hover:text-red-800 ml-7">ลบ</button>
                                </form>
                            </p>                            
                        </th>
                        <td class="px-6 py-4">
                            {{ $post->category_id }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $post->created_at }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $post->price }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{url('/job/'.$post->id)}}/edit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" target="_blank">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><!--container-->

</x-app-layout>
