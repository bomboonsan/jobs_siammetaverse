<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ตั้งค่าเว็บไซต์') }}
        </h2>
    </x-slot>

    <div class="container my-9 mx-auto max-w-screen-xl px-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @foreach ($settings as $setting)
            <form id="formsetting_{{ $setting->id }}" class="w-full" action="{{ route('setting.update',$setting->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')  {{-- <<<<<<<<<<<<<<<<<<<<<<<<<< สำหรับแก้ไข --}}
                <div class="flex flex-wrap items-center mb-6">
                    <p class="text-xl flex-initail md:basis-1/6 mr-3">{{ $setting->key }}</p>
                    <input type="text" name="value" class="flex-auto rounded-lg border border-neutral-300/50 shadow placeholder:text-neutral-300" value="{{ $setting->value }}"></input>
                    <div class="flex-initail submit-btn input-wrap">
                        <button type="submit" class="bg-blue-700 text-white text-lg font-medium px-3 py-1.5 rounded-xl ml-3">แก้ไข</button>
                    </div>
                </div> 
            </form>
        @endforeach
    </div><!--container-->

</x-app-layout>
