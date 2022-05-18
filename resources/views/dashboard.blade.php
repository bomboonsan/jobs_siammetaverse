<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div> --}}    

    <div class="container my-7 mx-auto max-w-screen-xl">
        <div class="flex flex-wrap">
            <div class="basis-full md:basis-1/3 p-4">
                <div class="admin-widget p-4 h-full w-full bg-white rounded-xl shadow-lg">
                    <h2 class="admin-widget-title text-lg pb-2 mb-2 border-b border-neutral-300/30">หัวข้องานทั้งหมด</h2>
                    <canvas id="myChart"></canvas>
                </div><!--admin-widget-->  
            </div><!--basis-->
            
        </div>
        
    </div><!-- container -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const labels = [
          'January',
          'February',
          'March',
          'April',
          'May',
          'June',
        ];
      
        const data = {
          labels: labels,
          datasets: [{
            label: 'My First dataset',
            backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
            ],
            data: [0, 10, 5, 2, 20, 30, 45],
          }]
        };
      
        const config = {
          type: 'doughnut',
          data: data,
          options: {}
        };
    </script>
    <script>
        const myChart = new Chart(
          document.getElementById('myChart'),
          config
        );
    </script>
</x-app-layout>
