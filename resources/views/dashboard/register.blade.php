<!DOCTYPE html>
<html>

<head>
  @include('dashboard.partials.head')
</head>

<body class="bg-white">
  <!-- Navbar -->

  <!-- Main content -->
  <div class="main-content row m-0" style="min-height: 100vh">
    <!-- Header -->
    

    {{-- sweet alert --}}
    @include('sweetalert::alert')
    
    <!-- Page content -->
    <div class="container pb-5 my-auto">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6">
          <div class="row" style="height: 100%;">
            <img class="col-10 mx-auto my-md-auto my-5" src="{{ asset('assets/img/image 2.png') }}">
          </div>
        </div>
        <div class="col-md-6">
          <div class="card bg-light-brown border-0 mb-0">
            <div class="card-header bg-transparent border-0 pb-0">
              <div class="row">
                <img class="col-7 mx-auto" src="{{ asset('assets/img/logo.png') }}" style="max-height: 15rem; max-width: 10rem">  
              </div>
            </div>
            <div class="card-body px-lg-5">
              <h1 class="text-dark">Create your Account</h1>
              <div class="text-left text-muted mb-4" style="font-size: 14px">
                Fill form to continue
              </div>
              <form role="form" action="/register" method="post">
                @csrf

                <div class="form-group row">
                  <div class="col-md-6 mb-3 mb-md-0">
                    <label class="text-dark font-weight-bold">Name</label>
                    <input class="form-control" placeholder="Input your full name" type="text" name="name" value="{{ old('name') }}">
                    @error('name') 
                      <div class="error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="text-dark font-weight-bold">Email Adress</label>
                    <input class="form-control" placeholder="Input your email" type="email" name="email" value="{{ old('email') }}">
                    @error('email') 
                      <div class="error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-6 col-md-4 mb-3 mb-md-0">
                    <label class="text-dark font-weight-bold">Age</label>
                    <input class="form-control" placeholder="Input your age" type="number" name="age" value="{{ old('age') }}">
                    @error('age') 
                      <div class="error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-6 col-md-4 mb-3 mb-md-0">
                    <label class="text-dark font-weight-bold">Gender</label>
                    <select class="form-control form-select form-select-solid" tabindex="-1" aria-hidden="true" name="gender" value="{{ old('gender') }}">
                      <option value="man">Laki-laki</option>
                      <option value="woman">Perempuan</option>
                    </select>
                    @error('gender') 
                      <div class="error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-4">
                    <label class="text-dark font-weight-bold">Birthday</label>
                    <input class="form-control" type="date" name="birth_date" value="{{ old('birth_date') }}">
                    @error('birth_date') 
                      <div class="error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6 mb-3 mb-md-0">
                    <label class="text-dark font-weight-bold">Jobs</label>
                    <input class="form-control" placeholder="Input your job" type="text" name="profession" value="{{ old('profession') }}">
                    @error('profession') 
                      <div class="error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="text-dark font-weight-bold">Address</label>
                    <input class="form-control" placeholder="Input your address" type="text" name="address" value="{{ old('address') }}">
                    @error('address') 
                      <div class="error text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label class="text-dark font-weight-bold">Password</label>
                  <input class="form-control" placeholder="Input your password" type="password" name="password" value="{{ old('password') }}">
                  @error('password') 
                    <div class="error text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="text-center">
                  <button type="submit" class="col-12 btn btn-brown mb-3">Create an Account</button>
                </div>
              </form>
              <div class="text-center text-muted mb-4 font-weight-bold" style="font-size: 14px">
                Have an account ? <a href="login" class="text-brown">Login</a>
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