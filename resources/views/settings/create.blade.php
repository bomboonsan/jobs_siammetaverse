<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('งานทั้งหมด') }}
        </h2>
    </x-slot>

    <div class="container my-9 mx-auto max-w-screen-xl px-4">
        <h2 class="text-xl mb-5 mt-3">Create Setting</h2>

        <form action="{{ route('storesetting') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-wrap mb-5 w-full">
                <input type="text" name="key" class="w-full rounded-lg border border-neutral-300/50 shadow placeholder:text-neutral-300" placeholder="Key"></input>
            </div>
            <div class="input-wrap mb-5 w-full">
                <input type="text" name="value" class="w-full rounded-lg border border-neutral-300/50 shadow placeholder:text-neutral-300" placeholder="value"></input>
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
    </div><!--container-->

</x-app-layout>
