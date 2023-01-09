<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{ asset('/dashboard/assets/img/brand/hoa.png')}}" class="navbar-brand-img" alt="logo" style="max-height: 50px;">
        </a>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav px-3">
            @if (Auth::user()->role == 'admin')
              <li class="nav-item">
                <a class="nav-link {{ ($title==='Dashboard') ? 'active' : '' }}" href="/admin/main">
                  <i class="mdi mdi-email-open"></i>
                  <span class="nav-link-text">Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ ($title==='absensi') ? 'active' : '' }}" href="/admin/absensi">
                  <i class="mdi mdi-fingerprint"></i>
                  <span class="nav-link-text">Absensi</span>
                </a>
              </li> 
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#course" class="nav-link collapsed {{ 
                  ($title==='course' || $title==='chapter') ? 'active' : '' }}" 
                  aria-controls="course" role="button" aria-expanded="false">

                  <i class="mdi mdi-book-open-page-variant text-sm"></i>
                  <span class="nav-link-text ms-1">Course</span>
                  <i class="mdi mdi-chevron-right text-sm ml-auto"></i>
                </a>
                <div class="collapse" id="course" style="">
                  <ul class="nav ms-4">
                    <li class="nav-item ">
                      <a class="nav-link pl-4" href="/admin/course">
                        <i class="mdi mdi-book-open-page-variant text-sm"></i>
                        <span class="sidenav-normal">Course</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="collapse" id="course" style="">
                  <ul class="nav ms-4">
                    <li class="nav-item">
                      <a class="nav-link pl-4" href="/admin/chapter">
                        <i class="mdi mdi-bookshelf text-sm"></i>
                        <span class="sidenav-normal">Chapter</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#vocab" class="nav-link collapsed {{ 
                  ($title==='vocabulary' || $title==='vocabulary_category' || $title==='vocabulary_fields' ) ? 'active' : '' }}" 
                  aria-controls="vocab" role="button" aria-expanded="false">

                  <i class="mdi mdi-account-tie-voice text-sm"></i>
                  <span class="nav-link-text ms-1">Vocabulary</span>
                  <i class="mdi mdi-chevron-right text-sm ml-auto"></i>
                </a>
                <div class="collapse" id="vocab" style="">
                  <ul class="nav ms-4">
                    <li class="nav-item ">
                      <a class="nav-link pl-4" href="/admin/vocabulary">
                        <i class="mdi mdi-account-tie-voice text-sm"></i>
                        <span class="sidenav-normal">Vocabulary</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="collapse" id="vocab" style="">
                  <ul class="nav ms-4">
                    <li class="nav-item">
                      <a class="nav-link pl-4" href="/admin/vocabulary/category">
                        <i class="mdi mdi-tag-faces text-sm"></i>
                        <span class="sidenav-normal">Vocabulary Category</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="collapse" id="vocab" style="">
                  <ul class="nav ms-4">
                    <li class="nav-item ">
                      <a class="nav-link pl-4" href="/admin/vocabulary/field">
                        <i class="mdi mdi-clipboard-list text-sm"></i>
                        <span class="sidenav-normal">Vocabulary Field</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#blog" class="nav-link collapsed {{ ($title==='blog' || $title==='blog_category') ? 'active' : '' }}" aria-controls="blog" role="button" aria-expanded="false">
                  <i class="mdi mdi-newspaper-variant-outline text-sm"></i>
                  <span class="nav-link-text ms-1">Blog</span>
                  <i class="mdi mdi-chevron-right text-sm ml-auto"></i>
                </a>
                <div class="collapse" id="blog" style="">
                  <ul class="nav ms-4">
                    <li class="nav-item ">
                      <a class="nav-link pl-4" href="/admin/blog">
                        <i class="mdi mdi-newspaper-variant-outline text-sm"></i>
                        <span class="sidenav-normal">Blog</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="collapse" id="blog" style="">
                  <ul class="nav ms-4">
                    <li class="nav-item">
                      <a class="nav-link pl-4" href="/admin/blog/category">
                        <i class="mdi mdi-tag-multiple-outline text-sm"></i>
                        <span class="sidenav-normal">Blog Category</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ ($title==='event') ? 'active' : '' }}" href="/admin/event">
                  <i class="mdi mdi-party-popper"></i>
                  <span class="nav-link-text">Event</span>
                </a>
              </li>
            @endif
            @if (Auth::user()->role == 'user')
              <li class="nav-item">
                <a class="nav-link {{ ($title==='Dashboard') ? 'active' : '' }}" href="/dashboard/main">
                  <i class="mdi mdi-email-open"></i>
                  <span class="nav-link-text">Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ ($title==='Course') ? 'active' : '' }}" href="/dashboard/course">
                  <i class="fa fa-book"></i>
                  <span class="nav-link-text">Course</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ ($title==='Exam') ? 'active' : '' }}" href="/dashboard/exam">
                  <i class="mdi mdi-book-open-page-variant"></i>
                  <span class="nav-link-text">Exam</span>
                </a>
              </li>
              
              {{-- <li class="nav-item">
                <a data-bs-toggle="collapse" href="#componentsExamples" class="nav-link collapsed" aria-controls="componentsExamples" role="button" aria-expanded="false">
                  <i class="ni ni-app  text-sm"></i>
                  <span class="nav-link-text ms-1">Dropdown</span>
                  <i class="mdi mdi-chevron-right text-sm ml-auto"></i>
                </a>
                <div class="collapse" id="componentsExamples" style="">
                  <ul class="nav ms-4">
                    <li class="nav-item ">
                      <a class="nav-link pl-4">
                        <i class="ni ni-app  text-sm"></i>
                        <span class="sidenav-normal">Link 1</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link pl-4">
                        <i class="ni ni-app  text-sm"></i>
                        <span class="sidenav-normal">Link 2</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li> --}}
            @endif
          </ul>
          <!-- Divider -->
        </div>
      </div>
    </div>
  </nav>