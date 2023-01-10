<nav class="navbar navbar-top navbar-expand navbar-dark border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center ml-md-auto ">
            
            
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                <i class="ni ni-bell-55" style="color: #686767;"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end py-0">
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">Kamu punya <strong class="text-primary">0</strong> notifikasi.</h6>
                </div>
                <!-- List group -->
                <div class="list-group list-group-flush">
                  <h4 class="py-4 fw-bold text-center">Belum Ada Notifikasi</h4>
                  {{-- <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="{{ asset('dashboard/assets/img/theme/team-1.jpg') }}" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="{{ asset('dashboard/assets/img/theme/team-2.jpg') }}" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>3 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                      </div>
                    </div>
                  </a> --}}
                </div>
                <!-- View all -->
                {{-- <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a> --}}
              </div>
            </li>
            
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="bg-dark sidenav-toggler-line"></i>
                  <i class="bg-dark sidenav-toggler-line"></i>
                  <i class="bg-dark sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{ asset('dashboard/assets/img/users/Ava.png') }}">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-dark font-weight-bold">{{Auth::user()->name}}</span>
                    <p class="text-sm text-muted m-0">{{Auth::user()->email}}</p>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome {{Auth::user()->name}} !</h6>
                </div>
                @if (Auth::user()->role == 'user')
                  @if (Auth::user()->courses()->wherePivot('finished', false)->count() > 0)
                    <a href="/dashboard/absensi" class="dropdown-item">
                      <i class="mdi mdi-fingerprint"></i>
                      <span>Absensi</span>
                    </a>
                  @endif
                @endif
                <a href="/dashboard/profil" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a href="#" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Edit password</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="/logout" class="dropdown-item" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="ni ni-user-run"></i>
                  Logout
                </a>
                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>