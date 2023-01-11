  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <!-- <h1 class="text-light"><a href="index.html"><span>Ninestars</span></a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
         <a href="/"><img src="{{ asset('assets/img/logo.png') }}" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar lexend fw-bold">
        <ul>
          <a class="nav-link scrollto {{ ($title==='Home') ? 'active' : '' }}" href="/home">Beranda</a>
          <a class="nav-link scrollto {{ ($title==='Course') ? 'active' : '' }}" href="/course">Kursus</a>
          <a class="nav-link scrollto {{ ($title==='Event') ? 'active' : '' }}" href="/event">Event</a>
          {{-- <a class="nav-link scrollto {{ ($title==='Quiz') ? 'active' : '' }}" href="/quiz">Quiz</a> --}}
          <a class="nav-link scrollto {{ ($title==='Blog') ? 'active' : '' }}" href="/blog">Blog</a>
          <a style="width:300px"></a>
          {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                </ul>
              </li>
            </ul>
          </li> --}}
          @if (Auth::check())
            @if (Auth::user()->role == 'admin')
              <li><a class="btn signin scrollto m-2" href="/admin/main">Masuk Dashboard</a></li>
            @elseif(Auth::user()->role == 'user')
              <li><a class="btn signin scrollto m-2" href="/dashboard/main">Masuk Dashboard</a></li>
            @endif
          @endif

          @if (!Auth::check())
            <li><a class="btn signin scrollto m-2" href="/login">Masuk</a></li>
            <li><a class="btn signup scrollto m-2" href="/register">Daftar</a></li> 
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>