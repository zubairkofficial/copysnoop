<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>cms dashboard
    </title>
   
    <link rel="stylesheet" href="{{ asset('user/assets/css/bootstrap.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('user/assets/css/custom.css') }}">
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    
 
    @livewireStyles
    @stack('styles') 
</head>

<body>




    <div class="wrapper">


        <div class="body-overlay"></div>

        <x-user-sidebar />



        <!-- Page Content  -->
        <div id="content">

           <x-user-header />


            {{ $slot }}

        </div>
    </div>
    
    <script src="{{ asset("user/assets/js/jquery-3.3.1.slim.min.js") }}"></script>
            <script src="{{ asset('user/assets/js/popper.min.js') }}"></script>
            <script src="{{ asset('user/assets/js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('user/assets/js/jquery-3.3.1.min.js') }}"></script>
            

 <script type="text/javascript">
                $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
				$('#content').toggleClass('active');
            });
			
			 $('.more-button,.body-overlay').on('click', function () {
                $('#sidebar,.body-overlay').toggleClass('show-nav');
            });
			
        });

    $(document).ready(function() {
        $('#toggleLink').click(function() {
            $('#chevronIcon').toggleClass('rotate');
        });
    });
     

    $(document).ready(function () {
    $("#sidebarCollapse").on("click", function () {
      $(this).toggleClass("active");
      rotateIcon();
    });

    function rotateIcon() {
      var icon = $("#sidebarCollapse i");
      if ($("#sidebarCollapse").hasClass("active")) {
        icon.css("transform", "rotate(180deg)");
      } else {
        icon.css("transform", "rotate(0deg)");
      }
    }
  });
</script>
@livewireScripts
@stack('modals')
@stack('scripts')


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-livewire-alert::scripts />




</body>

</html>