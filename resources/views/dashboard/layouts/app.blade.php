<!DOCTYPE html>
<html>

<head>
  @include('dashboard.partials.head')
  @stack('head')
</head>

<body >

  <!-- Sidenav -->
  @include('dashboard.partials.sidebar')

  <div class="main-content" id="panel">
    <!-- Topnav -->
    @include('dashboard.partials.navbar')
    
    <!-- Header -->
    <div class="header pt-4 {{ Request::is('admin/*') ? 'pb-1' : 'pb-6' }}">
    	
      <div class="container-fluid">
      	<div class="header-body">

        </div>
      </div>
    </div>
    
    {{-- sweet alert --}}
    @include('sweetalert::alert')

    <!-- Page content -->
    @yield('content')
    
    <!-- @include('dashboard.partials.footer') -->
  </div>

  
  <!-- Argon Scripts -->
  @include('dashboard.partials.script')
  @yield('script')

</body>

</html> 