<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('งานทั้งหมด') }}
        </h2>
    </x-slot>

    <div class="container my-9 mx-auto max-w-screen-xl px-4">
        SETTING
        @foreach ($settings as $setting)
            <form class="flex flex-wrap" action="{{ route('updatesetting',$setting->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')  {{-- <<<<<<<<<<<<<<<<<<<<<<<<<< สำหรับแก้ไข --}}
                <div class="basis-full mb-6">
                    <label for="exampleFormControlTextarea2" class="block mb-2 text-base text-neutral-800 font-bold">{{ $setting->key }}</label>
                    <input type="text" name="value" class="w-full rounded-lg border border-neutral-300/50 shadow placeholder:text-neutral-300" value="{{ $setting->value }}"></input>
                </div>
                <div class="submit-btn input-wrap mb-5 w-full">
                    <button type="submit" class="bg-blue-100/50 hover:bg-blue-100 text-blue-500 text-lg font-medium px-3 py-0.5 rounded-lg">Submit</button>
                </div>
            </form>
        @endforeach
    </div><!--container-->

</x-app-layout>
