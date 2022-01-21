@php


function checkRouteActive($route){
  if(Route::current()->uri == $route) return 'active';
}
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
  @include('subadmin.template.section.assets')
</head>

<body class="g-sidenav-show  bg-gray-100">
   @include('subadmin.template.section.sidebar')

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
     @include('subadmin.template.section.header')
    <!-- End Navbar -->

    <div class="container-fluid py-4">
       @include('pengajar.template.utils.notif')
     @yield('content')

    </div>
  </main>
  <!--   Core JS Files   -->
  @include('subadmin.template.section.js')
</body>

</html>