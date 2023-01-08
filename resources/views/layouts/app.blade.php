<!DOCTYPE html>
<html lang="en">

<head>
  @include('partials.head')
</head>

<body style="background-image: url({{ asset('assets/img/bg/bgx.png')}}); background-position: 33px -260px;">

  <!-- ======= Header ======= -->
  @include('partials.header')
  @yield('head')
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  
  @yield('hero')
  <!-- End Hero -->

  <main id="main">
    @include('sweetalert::alert')
    @yield('content')
    
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('partials.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('partials.script')
  @yield('scripts')
</body>

</html>