@extends('dashboard.layouts.app')

@push('head')
  <style>
    .course:hover {
      background-color: #FFEEE7;
    }
  </style>
@endpush

@section('content')
    <div class="container mt--6">
      <div class="row">

        <div class="col-md-7">
          <div class="header">
            <div class="header-body">
              <div class="row align-items-center py-4">
                <div class="col">
                  <h2 class="text-brown d-inline-block mb-0">Featured Course</h2>
                </div>
                @if ($featured_courses->count() > 0)
                  <div class="col d-flex m-0">
                    <a href="/course" class="btn text-brown ms-auto">lihat semua</a>
                  </div>
                @endif
              </div>
            </div>
          </div>
          <div class="row">
            @forelse ($featured_courses as $featured_course)
            <div class="col-md-4">
              <div class="card shadow-none course" style="height: fit-content">
                <div class="card-body p-3">
                  <p class="text-brown text-sm fw-bold m-0">{{ $featured_course->type }}</p>
                  <p class="h2 text-dark pr-4" style="line-height: normal;">  </p>
                  <br>
                  <div class="row m-0">
                    <span class="col text-brown text-center text-sm p-0">{{ $featured_course->chapters->count() }} Chapter</span>
                    <span class="col-1 text-brown text-center text-sm mx-auto p-0">|</span>
                    <span class="col text-brown text-center text-sm p-0">{{ $featured_course->duration }} Jam Belajar</span>
                  </div>
                  <a href="/dashboard/course/{{$featured_course->id}}" class="col-12 btn btn-white text-brown shadow-none mt-2">Ambil Course</a>
                </div>
              </div>
            </div>
            @empty
              <h1 class="py-4 fw-bold text-center">Belum Ada Course</h1>
            @endforelse
          </div>

          <div class="header">
            <div class="header-body">
              <div class="row align-items-center py-4">
                <div class="col">
                  <h2 class="text-brown d-inline-block mb-0">Continuous Course</h2>
                </div>
                @if ($continue_courses->count() > 0)
                  <div class="col d-flex m-0">
                    <a href="/dashboard/course/progress" class="btn text-brown ms-auto">lihat semua</a>
                  </div>
                @endif
              </div>
            </div>
          </div>
          <div class="row">
            @forelse ($continue_courses as $continue_course)
            <div class="col-12">
              <div class="card shadow-none course">
                <div class="card-body p-3 row">
                  <img class="col-3 col-md-2" src="{{ Storage::disk('local')->exists('public/course/'. $continue_course->image) ? Storage::url('public/course/' . $continue_course->image) : '/assets/img/Image Course.png'}}">
                  <div class="col">
                    <p class="text-brown text-sm fw-bold m-0">{{ $continue_course->type }}</p>
                    <p class="h2 text-dark pr-4" style="line-height: normal;">{{ $continue_course->title }}</p>
                  </div>
                  <div class="col d-flex">
                    <div class="ms-auto">
                      <div class="row">
                        <table style="width:100%">
                          <tr>
                            @php
                              $last     = $continue_course->users()->wherePivot('user_id', Auth::user()->id)->first()->pivot->last_chapter;
                              $total    = $continue_course->users()->wherePivot('user_id', Auth::user()->id)->first()->pivot->total_chapter;
                              $progress = round(($last/$total)*100);
                            @endphp
                            <td style="min-width: 100px">
                              <div class="progress progress-xs mb-0">
                                <div class="progress-bar bg-brown" role="progressbar" 
                                  aria-valuenow="{{$last}}" 
                                  aria-valuemin="0" aria-valuemax="{{$total}}" 
                                  style="width: {{$progress}}%;">
                                </div>
                              </div>
                            </td>
                            <td>
                              <span class="col-4 text-brown font-weight-bold" style="font-size: 12px">{{$progress}}%</span>
                            </td>
                          </tr>
                        </table>
                      </div>
                      <br>
                      <div class="d-flex">
                        <a class="ms-auto text-muted" href="/dashboard/course/{{$continue_course->id}}">lanjutkan <i class="fa fa-chevron-right"></i></a>
                      </div>
                        
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @empty
              <h1 class="py-4 fw-bold text-center">Belum Ada Progress Course</h1>
            @endforelse
          </div>
        </div>

        <div class="col-md-5">
          <div class="card">
            <div class="card-header bg-transparent" style="border-bottom: 0px">
              <div class="row align-items-center">
                <div class="col">
                  <h2 class="mb-0 text-brown">Completed Course</h2>
                </div>
                @if ($finish_courses->count() > 0)
                  <div class="col d-flex m-0">
                    <a href="/dashboard/course/finished" class="btn btn-light-brown ml-auto">lihat semua</a>
                  </div>
                @endif
              </div>
            </div>
            <div class="card-body row">
              @forelse ($finish_courses as $finish_course)
              <a href="/dashboard/course/{{$finish_course->id}}">
                <div class="col-12 row m-0 mb-4">
                  <div class="col-12 row m-0 p-0 course">
                    <img class="col-3 p-0" src="{{ Storage::disk('local')->exists('public/course/'. $finish_course->image) ? Storage::url('public/course/' . $finish_course->image) : '/assets/img/Image Course.png'}}">
                    <div class="col pe-0">
                      <h2 class="text-brown m-0" style="line-height: normal;">{{ $finish_course->title }}</h2>
                      {{-- <div style="float: right;">
                        <a  class="text-yellow" href="#"><i class="fa fa-star"></i></a>
                      </div> --}}
                      <br>
                      <div class="text-muted">
                        <p class="m-0 font-weight-bold" style="font-size: 10px">{{ $finish_course->type }}</p>
                        <p class="m-0 font-weight-bold" style="font-size: 10px">
                          <i class="fa fa-clock"></i> {{ $finish_course->meet_times }}x Pertemuan 
                          <i class="fa fa-user ml-2"></i> {{ $finish_course->users->count() }} Peserta
                        </p>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </a>
              @empty
              <h1 class="py-4 fw-bold text-center">Belum Ada Course Yang Selesai</h1>
              @endforelse
            </div>
          </div>
        </div>

      </div>
    </div>

@endsection