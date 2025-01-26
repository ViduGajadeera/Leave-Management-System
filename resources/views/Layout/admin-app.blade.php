<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    
    <style>
        .nav {
            
            overflow: hidden;
            position: fixed;
            background-color: #D84040;
            height: 50px;
        }
        body{
            background-color: #EEEEEE;
        }
        .nav-tab{
            color:black !important;
            height: 50px;
        }
      
        .coner2{
          margin-left: 1000px;;
        }
    </style>

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    @yield('styles')

   

 
</head>
<body>

@if (!session()->has('id'))
    <script>
        window.location.href = "{{ url('/') }}";
    </script>
@endif


<div class="container-fluid">
    <div class="row">
        <!-- nav bar -->
        <ul class="nav nav-tabs nav">
  <li class="nav-item">
    <a aria-current="page" href="{{ route('admin-home') }}" class="nav-link {{ request()->is('admin-home') ? 'active' : '' }} nav-tab">Home</a>
  </li>
  <li class="nav-item">
    <a  href="{{ route('request-leave-admin') }}" class="nav-link {{ request()->is('request-leave-admin') ? 'active' : '' }} nav-tab">Request-Leave</a>
  </li>
 
  </li>
  <li class="nav-item">
    <a  href="{{ route('reports') }}" class="nav-link {{ request()->is('reports') ? 'active' : '' }} nav-tab">Reports</a>
  </li>



  <!--<li class="nav-item">
    <a  href="" class="nav-link {{ request()->is('') ? 'active' : '' }} nav-tab">Profile</a>
  </li>-->



  <li class="nav-item coner2">
    <a  href="{{route('logout')}}" class="nav-link {{ request()->is('logout') ? 'active' : '' }} nav-tab">Log Out</a>
  </li>



 
  


</ul>

        <!-- Main Content -->
        <div class="col" id="app">
            @yield('content')
        </div>
    </div>
</div>

@yield('scripts')



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
