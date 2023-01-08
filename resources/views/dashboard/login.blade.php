<!DOCTYPE html>
<html>

<head>
  @include('dashboard.partials.head')
</head>

<body class="bg-white">
  
  {{-- sweet alert --}}
  @include('sweetalert::alert')

  <!-- Navbar -->

  <!-- Main content -->
  <div class="main-content row m-0" style="min-height: 100vh">
    <!-- Header -->
    
    <!-- Page content -->
    <div class="container pb-5 my-auto">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6">
          <div class="row" style="height: 100%;">
            <img class="col-10 m-auto" src="{{ asset('assets/img/image 3.png') }}">
          </div>
        </div>
        <div class="col-lg-5 col-md-6">
          <div class="card bg-light-brown border-0 mb-0">
            <div class="card-header bg-transparent border-0 pb-0">
              <div class="row">
                <img class="col-7 mx-auto" src="{{ asset('assets/img/logo.png') }}" style="max-height: 15rem; max-width: 10rem">  
              </div>
            </div>
            <div class="card-body px-lg-5">
              <h1 class="text-dark">Sign in to Dev Hoa</h1>
              <div class="text-left text-muted mb-4" style="font-size: 14px">
                You’ve been missed back
              </div>
              <form action="/login" method="post">
                @csrf

                <div class="form-group mb-3">
                  <label class="text-dark font-weight-bold">Email Address</label>
                  <input class="form-control" placeholder="Input your email" type="email" style="border-radius: 12px;" name="email">
                  @error('email') 
                    <div class="error text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="text-dark font-weight-bold">Password</label>
                  <input class="form-control" placeholder="Input your password" type="password" style="border-radius: 12px;" name="password">
                  @error('password') 
                    <div class="error text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="text-center">
                  <button type="submit" class="col-12 btn btn-brown mb-3">Sign in</button>
                </div>
              </form>
              <div class="btn-wrapper text-center col-12 p-0">
                <a href="/google-login" class="btn btn-neutral btn-icon col-12 mb-4">
                  <span class="btn-inner--icon"><img src="{{ asset('dashboard/assets/img/icons/common/google.svg') }}"></span>
                  <span class="btn-inner--text text-dark">Sign in with Google</span>
                </a>
              </div>
              <div class="text-center text-muted mb-4 font-weight-bold" style="font-size: 14px">
                Don’t have account? <a href="register" class="text-brown">Register</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('dashboard/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
  <!-- Argon JS -->
  <script src="{{ asset('dashboard/assets/js/argon.js?v=1.2.0') }}"></script>
</body>

</html>