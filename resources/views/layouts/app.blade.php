<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/output.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta3/css/all.css">
  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])


@livewireStyles
@stack('styles')
</head>

<body class="font-sans antialiased">
  <div class="w-full layout-wrapper active">
    <div class="w-full flex relative">
      <x-sidebar />
      <div class="body-wrapper dark:bg-darkblack-500 flex-1 overflow-x-hidden">
        <x-header />
        {{ $slot }}
      </div>
    </div>
  </div>
  <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('assets/js/aos.js') }}"></script>
  <script src="{{ asset('assets/js/slick.min.js') }}"></script>

  <script src="{{ asset('assets/js/quill.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="{{ asset('assets/js/chart.js') }}"></script>
  
  @livewireScripts
  @stack('modals')
  @stack('scripts')


  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <x-livewire-alert::scripts />
  <script>
    $(".card-slider").slick({
           dots: true,
           infinite: true,
           autoplay: true,
           speed: 500,
           fade: true,
           cssEase: "linear",
           arrows: false,
         });
         function totalEarn() {
           const ctx_bids = document.getElementById("totalEarn").getContext("2d");
           const bitsMonth = [
             "Jan",
             "Feb",
             "Mar",
             "Afril",
             "May",
             "Jan",
             "Feb",
             "Mar",
             "Afril",
             "May",
             "Feb",
             "Mar",
             "Afril",
             "May",
           ];
           const bitsData = [
             0, 10, 0, 65, 0, 25, 0, 35, 20, 100, 40, 75, 50, 85, 60,
           ];
           const totalEarn = new Chart(ctx_bids, {
             type: "line",
             data: {
               labels: bitsMonth,
               datasets: [
                 {
                   label: "Visitor",
                   data: bitsData,
                   backgroundColor: () => {
                     const chart = document
                       .getElementById("totalEarn")
                       .getContext("2d");
                     const gradient = chart.createLinearGradient(0, 0, 0, 450);
                     gradient.addColorStop(0, "rgba(34, 197, 94,0.41)");
                     gradient.addColorStop(0.2, "rgba(255, 255, 255, 0)");
   
                     return gradient;
                   },
                   borderColor: "#2F438D",
                   pointRadius: 0,
                   pointBackgroundColor: "#fff",
                   pointBorderColor: "#2F438D",
                   borderWidth: 1,
                   fill: true,
                   fillColor: "#fff",
                   tension: 0.4,
                 },
               ],
             },
             options: {
               layout: {
                 padding: {
                   bottom: -20,
                 },
               },
               maintainAspectRatio: false,
               responsive: true,
               scales: {
                 x: {
                   grid: {
                     display: false,
                     drawBorder: false,
                   },
                   ticks: {
                     display: false,
                   },
                 },
                 y: {
                   grid: {
                     display: false,
                     drawBorder: false,
                   },
                   ticks: {
                     display: false,
                   },
                 },
               },
   
               plugins: {
                 legend: {
                   position: "top",
                   display: false,
                 },
                 title: {
                   display: false,
                   text: "Visitor: 2k",
                 },
                 tooltip: {
                   enabled: false,
                 },
               },
             },
           });
         }
         totalEarn();
         function totalSpendingChart() {
           let ctx_bids = document
             .getElementById("totalSpending")
             .getContext("2d");
           let bitsMonth = [
             "Jan",
             "Feb",
             "Mar",
             "Afril",
             "May",
             "Jan",
             "Feb",
             "Mar",
             "Afril",
             "May",
             "Feb",
             "Mar",
             "Afril",
             "May",
           ];
           let bitsData = [
             0, 10, 0, 65, 0, 25, 0, 35, 20, 100, 40, 75, 50, 85, 60,
           ];
           let totalEarn = new Chart(ctx_bids, {
             type: "line",
             data: {
               labels: bitsMonth,
               datasets: [
                 {
                   label: "Visitor",
                   data: bitsData,
                   backgroundColor: () => {
                     const chart = document
                       .getElementById("totalEarn")
                       .getContext("2d");
                     const gradient = chart.createLinearGradient(0, 0, 0, 450);
                     gradient.addColorStop(0, "rgba(34, 197, 94,0.41)");
                     gradient.addColorStop(0.2, "rgba(255, 255, 255, 0)");
   
                     return gradient;
                   },
                   borderColor: "#2F438D",
                   pointRadius: 0,
                   pointBackgroundColor: "#fff",
                   pointBorderColor: "#2F438D",
                   borderWidth: 1,
                   fill: true,
                   fillColor: "#fff",
                   tension: 0.4,
                 },
               ],
             },
             options: {
               layout: {
                 padding: {
                   bottom: -20,
                 },
               },
               maintainAspectRatio: false,
               responsive: true,
               scales: {
                 x: {
                   grid: {
                     display: false,
                     drawBorder: false,
                   },
                   ticks: {
                     display: false,
                   },
                 },
                 y: {
                   grid: {
                     display: false,
                     drawBorder: false,
                   },
                   ticks: {
                     display: false,
                   },
                 },
               },
   
               plugins: {
                 legend: {
                   position: "top",
                   display: false,
                 },
                 title: {
                   display: false,
                   text: "Visitor: 2k",
                 },
                 tooltip: {
                   enabled: false,
                 },
               },
             },
           });
         }
         totalSpendingChart();
         function totalGoal() {
           let ctx_bids = document.getElementById("totalGoal").getContext("2d");
           let bitsMonth = [
             "Jan",
             "Feb",
             "Mar",
             "Afril",
             "May",
             "Jan",
             "Feb",
             "Mar",
             "Afril",
             "May",
             "Feb",
             "Mar",
             "Afril",
             "May",
           ];
           let bitsData = [
             0, 10, 0, 65, 0, 25, 0, 35, 20, 100, 40, 75, 50, 85, 60,
           ];
           let totalEarn = new Chart(ctx_bids, {
             type: "line",
             data: {
               labels: bitsMonth,
               datasets: [
                 {
                   label: "Visitor",
                   data: bitsData,
                   backgroundColor: () => {
                     const chart = document
                       .getElementById("totalGoal")
                       .getContext("2d");
                     const gradient = chart.createLinearGradient(0, 0, 0, 450);
                     gradient.addColorStop(0, "rgba(34, 197, 94,0.41)");
                     gradient.addColorStop(0.2, "rgba(255, 255, 255, 0)");
   
                     return gradient;
                   },
                   borderColor: "#2F438D",
                   pointRadius: 0,
                   pointBackgroundColor: "#fff",
                   pointBorderColor: "#2F438D",
                   borderWidth: 1,
                   fill: true,
                   fillColor: "#fff",
                   tension: 0.4,
                 },
               ],
             },
             options: {
               layout: {
                 padding: {
                   bottom: -20,
                 },
               },
               maintainAspectRatio: false,
               responsive: true,
               scales: {
                 x: {
                   grid: {
                     display: false,
                     drawBorder: false,
                   },
                   ticks: {
                     display: false,
                   },
                 },
                 y: {
                   grid: {
                     display: false,
                     drawBorder: false,
                   },
                   ticks: {
                     display: false,
                   },
                 },
               },
   
               plugins: {
                 legend: {
                   position: "top",
                   display: false,
                 },
                 title: {
                   display: false,
                   text: "Visitor: 2k",
                 },
                 tooltip: {
                   enabled: false,
                 },
               },
             },
           });
         }
         totalGoal();
   
   
         let revenueFlowElement = document
                 .getElementById("revenueFlow")
                 .getContext("2d");
         let month = [
           "Jan",
           "Feb",
           "Mar",
           "April",
           "May",
           "Jun",
           "July",
           "Aug",
           "Sep",
           "Oct",
           "Nov",
           "Dec",
         ];
         let dataSetsLight = [
           {
             label: "My First Dataset",
             data: [1, 5, 2, 2, 6, 7, 8, 7, 3, 4, 1, 3],
             backgroundColor: [
               "rgba(237, 242, 247, 1)",
               "rgba(237, 242, 247, 1)",
               "rgba(237, 242, 247, 1)",
               "rgba(237, 242, 247, 1)",
               "rgba(237, 242, 247, 1)",
               "rgba(250, 204, 21, 1)",
               "rgba(237, 242, 247, 1)",
               "rgba(237, 242, 247, 1)",
               "rgba(237, 242, 247, 1)",
               "rgba(237, 242, 247, 1)",
               "rgba(237, 242, 247, 1)",
               "rgba(237, 242, 247, 1)",
             ],
             borderWidth: 0,
             borderRadius: 5,
           },
           {
             label: "My First Dataset 2",
             data: [5, 2, 4, 2, 5, 8, 3, 7, 3, 4, 1, 3],
             backgroundColor: [
               "rgba(237, 242, 247, 1)",
               "rgba(237, 242, 247, 1)",
               "rgba(237, 242, 247, 1)",
               "rgba(237, 242, 247, 1)",
               "rgba(237, 242, 247, 1)",
               "rgba(255, 120, 75, 1)",
               "rgba(237, 242, 247, 1)",
               "rgba(237, 242, 247, 1)",
               "rgba(237, 242, 247, 1)",
               "rgba(237, 242, 247, 1)",
               "rgba(237, 242, 247, 1)",
               "rgba(237, 242, 247, 1)",
             ],
             borderWidth: 0,
             borderRadius: 5,
           },
           {
             label: "My First Dataset 3",
             data: [2, 5, 3, 2, 5, 6, 9, 7, 3, 4, 1, 3],
             backgroundColor: [
               "rgba(237, 242, 247, 1)",
               "rgba(237, 242, 247, 1)",
               "rgba(237, 242, 247, 1)",
               "rgba(237, 242, 247, 1)",
               "rgba(237, 242, 247, 1)",
               "rgba(74, 222, 128, 1)",
               "rgba(237, 242, 247, 1)",
               "rgba(237, 242, 247, 1)",
               "rgba(237, 242, 247, 1)",
               "rgba(237, 242, 247, 1)",
               "rgba(237, 242, 247, 1)",
               "rgba(237, 242, 247, 1)",
             ],
             borderWidth: 0,
             borderRadius: 5,
           },
         ];
         let dataSetsDark = [
           {
             label: "My First Dataset",
             data: [1, 5, 2, 2, 6, 7, 8, 7, 3, 4, 1, 3],
             backgroundColor: [
               "rgba(42, 49, 60, 1)",
               "rgba(42, 49, 60, 1)",
               "rgba(42, 49, 60, 1)",
               "rgba(42, 49, 60, 1)",
               "rgba(42, 49, 60, 1)",
               "rgba(250, 204, 21, 1)",
               "rgba(42, 49, 60, 1)",
               "rgba(42, 49, 60, 1)",
               "rgba(42, 49, 60, 1)",
               "rgba(42, 49, 60, 1)",
               "rgba(42, 49, 60, 1)",
               "rgba(42, 49, 60, 1)",
             ],
             borderWidth: 0,
             borderRadius: 5,
           },
           {
             label: "My First Dataset 2",
             data: [5, 2, 4, 2, 5, 8, 3, 7, 3, 4, 1, 3],
             backgroundColor: [
               "rgba(42, 49, 60, 1)",
               "rgba(42, 49, 60, 1)",
               "rgba(42, 49, 60, 1)",
               "rgba(42, 49, 60, 1)",
               "rgba(42, 49, 60, 1)",
               "rgba(255, 120, 75, 1)",
               "rgba(42, 49, 60, 1)",
               "rgba(42, 49, 60, 1)",
               "rgba(42, 49, 60, 1)",
               "rgba(42, 49, 60, 1)",
               "rgba(42, 49, 60, 1)",
               "rgba(42, 49, 60, 1)",
             ],
             borderWidth: 0,
             borderRadius: 5,
           },
           {
             label: "My First Dataset 3",
             data: [2, 5, 3, 2, 5, 6, 9, 7, 3, 4, 1, 3],
             backgroundColor: [
               "rgba(42, 49, 60, 1)",
               "rgba(42, 49, 60, 1)",
               "rgba(42, 49, 60, 1)",
               "rgba(42, 49, 60, 1)",
               "rgba(42, 49, 60, 1)",
               "rgba(74, 222, 128, 1)",
               "rgba(42, 49, 60, 1)",
               "rgba(42, 49, 60, 1)",
               "rgba(42, 49, 60, 1)",
               "rgba(42, 49, 60, 1)",
               "rgba(42, 49, 60, 1)",
               "rgba(42, 49, 60, 1)",
             ],
             borderWidth: 0,
             borderRadius: 5,
           },
         ]
         let revenueFlow = new Chart(revenueFlowElement, {
           type: "bar",
           data: {
             labels: month,
             datasets: dataSetsLight,
           },
           options: {
             maintainAspectRatio: false,
             scales: {
               y: {
                 beginAtZero: true,
                 grid: {
                   color: "rgb(243 ,246, 255 ,1)",
                 },
                 gridLines: {
                   zeroLineColor: "transparent",
                 },
                 ticks: {
                   callback(value) {
                     return `${value}% `;
                   },
                 },
               },
               x: {
                 grid: {
                   color: "rgb(243 ,246, 255 ,1)",
                 },
                 gridLines: {
                   zeroLineColor: "transparent",
                 },
               },
             },
             plugins: {
               legend: {
                 display: false,
               },
             },
             x: {
               stacked: true,
   
             },
             y: {
               stacked: true,
             },
           },
         });
         //pie chart
         let pieChart = document.getElementById("pie_chart").getContext("2d");
   
         const data = {
           labels: [10, 20, 30],
           datasets: [
             {
               label: "My First Dataset",
               data: [15, 20, 35, 40],
               backgroundColor: ["#1A202C", "#61C660", "#F8CC4B", "#EDF2F7"],
               borderColor: ["#ffffff", "#ffffff", "#ffffff", "#1A202C"],
               hoverOffset: 18,
               borderWidth: 0,
             },
           ],
         };
         const customDatalabels = {
           id: "customDatalabels",
           afterDatasetsDraw(chart, args, pluginOptions) {
             const {
               ctx,
               data,
               chartArea: { top, bottom, left, right, width, height },
             } = chart;
             ctx.save();
             data.datasets[0].data.forEach((datapoint, index) => {
               const { x, y } = chart
                       .getDatasetMeta(0)
                       .data[index].tooltipPosition();
               ctx.font = "bold 12px sans-serif";
               ctx.fillStyle = data.datasets[0].borderColor[index];
               ctx.textAlign = "center";
               ctx.textBaseline = "middle";
               ctx.fillText(`${datapoint}%`, x, y);
             });
           },
         };
         const config = {
           type: "doughnut",
           data,
           options: {
             maintainAspectRatio: false,
             layout: {
               padding: {
                 left: 10,
                 right: 10,
                 top: 10,
                 bottom: 10,
               },
             },
             plugins: {
               legend: {
                 display: false,
               },
             },
           },
           plugins: [customDatalabels],
         };
   
         let pieChartConfiig = new Chart(pieChart, config);
   
         //chart dark mode
         let themeToggleSwitch = document.getElementById('theme-toggle');
   
         //onclick
         if(themeToggleSwitch){
           themeToggleSwitch.addEventListener('click', function() {
             if(document.documentElement.classList[0]==='dark' || localStorage.theme === 'dark'){
               revenueFlow.data.datasets = dataSetsDark;
               revenueFlow.options.scales.y.ticks.color = 'white';
               revenueFlow.options.scales.x.ticks.color = 'white';
               revenueFlow.options.scales.x.grid.color = '#222429';
               revenueFlow.options.scales.y.grid.color = '#222429';
               revenueFlow.update();
             }else{
               revenueFlow.data.datasets = dataSetsLight;
               revenueFlow.options.scales.y.ticks.color = 'black';
               revenueFlow.options.scales.x.ticks.color = 'black';
               revenueFlow.options.scales.x.grid.color = 'rgb(243 ,246, 255 ,1)';
               revenueFlow.options.scales.y.grid.color = 'rgb(243 ,246, 255 ,1)';
               revenueFlow.update();
             }
           
           });
           
         }
   
   
         //initial load
         if (localStorage.theme === 'dark' || (window.matchMedia('(prefers-color-scheme: dark)').matches)) {
           revenueFlow.data.datasets=dataSetsDark;
           revenueFlow.options.scales.y.ticks.color='white';
           revenueFlow.options.scales.x.ticks.color='white';
           revenueFlow.options.scales.x.grid.color='#222429';
           revenueFlow.options.scales.y.grid.color='#222429';
   
         } else {
           revenueFlow.data.datasets=dataSetsLight;
           revenueFlow.options.scales.y.ticks.color='black';
           revenueFlow.options.scales.x.ticks.color='black';
           revenueFlow.options.scales.x.grid.color='rgb(243 ,246, 255 ,1)';
           revenueFlow.options.scales.y.grid.color='rgb(243 ,246, 255 ,1)';
         }
         revenueFlow.update();
  </script>
</body>

</html>