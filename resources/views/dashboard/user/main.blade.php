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
        <div class="col-12">
          <div class="shadow-none card border-2">
            <div class="card-body py-4 px-4">
              <div class="row">
                <div class="col-md-8 my-auto p-5">
                  <h1 class="text-dark px-0">Selamat Datang, {{Auth::user()->name}}</h1>
                  <h3 class="text-muted px-0 text-lg">
                    Progressmu sejauh ini sudah sangat baik, yuk kembangkan kembali agar lebih mahir
                  </h3>
                </div>
                <div class="col-md-4 ml-auto">
                  <img src="{{ asset('assets/img/welcome.png')}}" class="w-100">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="container pt-0 pb-6">
      <div class="row">

        <div class="col-lg-3 col-12">
          <div class="header">
            <div class="header-body">
              <div class="align-items-center py-4">
                <h2 class="h1 text-brown d-inline-block mb-0">Aktivitas</h2>
              </div>
            </div>
          </div>
          <div class="card shadow-none">
            <div class="card-body p-0">
              <div class="vanilla-calendar mx-auto rounded"></div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-12">
          <div class="header">
          	<div class="header-body">
              <div class="align-items-center py-4">
                <h2 class="h1 text-brown d-inline-block mb-0">Progress Belajar</h2>
              </div>
            </div>
          </div>
          <div class="card shadow-none">
            {{-- <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                  <h6 class="mb-0">Revenue</h6>
                  <button
                      type="button"
                      class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center"
                      data-bs-toggle="tooltip"
                      data-bs-placement="bottom"
                      title=""
                      data-bs-original-title="See which ads perform better"
                  >
                    <i class="fas fa-info" aria-hidden="true"></i>
                  </button>
              </div>
            </div> --}}
            <div class="card-body p-3">
              <div class="chart rounded">
                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-12">
          <div class="header">
            <div class="header-body">
              <div class="align-items-center py-4">
                <h2 class="h1 text-brown d-inline-block mb-0">Course</h2>
              </div>
            </div>
          </div>
          @forelse ($continue_courses as $continue_course)
            <a href="/dashboard/course/{{$continue_course->id}}">
              <div class="card mb-2 shadow-none course">
                <div class="card-body row m-0 p-3">
                  
                  <div class="col-12 row m-0 p-0">
                    <img class="col-4 p-0" src="{{ Storage::disk('local')->exists('public/course/'. $continue_course->image) ? Storage::url('public/course/' . $continue_course->image) : '/assets/img/Image Course.png'}}">
                    <div class="col pe-0">
                      <h2 class="text-dark m-0" style="line-height: normal;">{{ substr($continue_course->title, 0, 20) }}...</h2>
                      <div class="text-muted">
                        <p class="m-0 font-weight-bold" style="font-size: 10px">{{ $continue_course->type }}</p>
                        <p class="m-0 font-weight-bold" style="font-size: 10px">
                          <i class="fa fa-clock" style="margin-right:0.2rem"></i>{{ $continue_course->meet_times }}x Pertemuan 
                          <i class="fa fa-user ml-2"></i> {{ $continue_course->users->count() }} Peserta
                        </p>
                      </div>
                    </div>
                  </div>
                
                </div>
              </div>
            </a>
          @empty
            <h1 class="py-4 fw-bold text-center">Belum Ada Progress Course</h1>
          @endforelse
        </div>

      </div>
    </div>    
@endsection

@section('script')
  <script type="text/javascript">
    const calendar = new VanillaCalendar('.vanilla-calendar');
    calendar.init();

    var ctx1 = document.getElementById("chart-line").getContext("2d");
    // var ctx2 = document.getElementById("chart-pie").getContext("2d");
    // var ctx3 = document.getElementById("chart-bar").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, '#A1300030');
    gradientStroke1.addColorStop(0.2, '#E0BAAA20');
    gradientStroke1.addColorStop(0, '#E0BAAA10'); //purple colors

    var gradientStroke2 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, '#A1300030');
    gradientStroke2.addColorStop(0.2, '#E0BAAA20');
    gradientStroke2.addColorStop(0, '#E0BAAA10'); //purple colors

    // Line chart
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["31 Januari", "1 Februari", "2 Februari", "3 Februari", "4 Februari", "5 Februari","6 Februari"],
        datasets: [
          {
            label: "Bahasa Cina",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 2,
            pointBackgroundColor: "#E0BAAA",
            borderColor: "#A13000",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: false,
            data: [0, 10, 20, 30, 40, 30, 40],
            maxBarThickness: 6
          },
          {
            label: "Bahasa Mandarin",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 10,
            pointBackgroundColor: "#A13000",
            borderColor: "#E0BAAA",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [0, 0, 0, 0, 0, 10, 20],
            maxBarThickness: 6
          }
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#9ca2b7'
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: true,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#9ca2b7',
              padding: 10
            }
          },
        },
      },
    });
  </script>
@endsection