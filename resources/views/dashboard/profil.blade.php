@extends('dashboard.layouts.app')

@section('content')
    <div class="container mt--6">
      <div class="row">
        
        <div class="col-12">
          <div class="shadow-none card">
            <div class="card-body py-4 px-4">
              <div class="row">
                <div class="col-md-2 d-flex">
                  <img src="assets/img/users/profil.jpg" class="rounded-circle mx-auto" style="width: 150px; height:150px; object-fit: cover;">
                </div>
                <div class="col-md-4 d-flex">
                  <div class="my-auto">
                    <h2 class="text-dark m-0">Ammar Hisyam</h2>
                    <h3 class="text-muted px-0"><i class="text-brown fa fa-star"></i> 8000 Point</h3>
                    <h3 class="text-muted px-0"><i class="text-brown fa fa-envelope"></i> ammarhisyam@gmail.com</h3>
                  </div>
                </div>
                <div class="col-md-2 ml-auto d-flex">
                  <button type="button" class="col-12 btn btn-brown my-auto" style="height: fit-content">Edit profil</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="shadow-none card">
            <div class="card-body p-3 text-center">
              <p class="text-muted h2">Belajar</p>
              <p class="text-dark h1">3</p>
              <p class="text-muted h2">Kelas Course</p>
            </div>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="shadow-none card">
            <div class="card-body p-3 text-center">
              <p class="text-muted h2">Memenangkan</p>
              <p class="text-dark h1">3</p>
              <p class="text-muted h2">Challenge</p>
            </div>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="shadow-none card">
            <div class="card-body p-3 text-center">
              <p class="text-muted h2">Menghadiri</p>
              <p class="text-dark h1">3</p>
              <p class="text-muted h2">Event</p>
            </div>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="shadow-none card">
            <div class="card-body p-3 text-center">
              <p class="text-muted h2">Sertifikat</p>
              <p class="text-dark h1">3</p>
              <p class="text-muted h2">Lulus Course</p>
            </div>
          </div>
        </div>

      </div>
    </div>
    
    <div class="container pt-4 pb-6">
      <div class="row">

        <div class="col-md-6">
          <div class="header">
          	<div class="header-body">
              <div class="align-items-center py-4">
                <h2 class="text-brown d-inline-block mb-0">Progress Belajar</h2>
              </div>
            </div>
          </div>
          <div class="card shadow-none">
            <div class="card-body p-3">
              <div class="chart">
                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
              </div>
            </div>
          </div>
        </div>

        {{-- <div class="col-md-3">
          <div class="header">
            <div class="header-body">
              <div class="align-items-center py-4">
                <h2 class="text-brown d-inline-block mb-0">Reminder Course</h2>
              </div>
            </div>
          </div>

          @forelse ($continue_courses as $continue_course)
            <div class="card mb-2 shadow-none" style="border-radius: 20px">
              <div class="card-body row m-0 p-3">
                
                <div class="col-12 row m-0 p-0">
                  <img class="col-4 p-0" src="{{ Storage::disk('local')->exists('public/course/'. $continue_course->image) ? Storage::url('public/course/' . $continue_course->image) : '/assets/img/Image Course.png'}}">
                  <div class="col pe-0">
                    <h2 class="text-dark m-0" style="line-height: normal;">{{ $continue_course->title }}</h2>
                    <div class="text-muted">
                      <p class="m-0 font-weight-bold" style="font-size: 10px">{{ $continue_course->type }}</p>
                      <p class="m-0 font-weight-bold" style="font-size: 10px">
                        <i class="fa fa-clock"></i>{{ $continue_course->meet_times }}x Pertemuan 
                        <i class="fa fa-user ml-2"></i> {{ $continue_course->users->count() }} Peserta
                      </p>
                    </div>
                  </div>
                </div>
              
              </div>
            </div>
          @empty
            <h1 class="py-4 fw-bold text-center">Belum Ada Progress Course</h1>
          @endforelse
        </div> --}}

        <div class="col-md-3">
          <div class="header">
            <div class="header-body">
              <div class="align-items-center py-4">
                <h2 class="text-brown d-inline-block mb-0">Reminder Exam</h2>
              </div>
            </div>
          </div>
          <?php  for($i =1; $i<=3; $i++){ ?>
          <div class="card mb-2 shadow-none" style="border-radius: 20px">
            <div class="card-body row m-0 p-3">
              
              <div class="col-12 row m-0 p-0">
                <img class="col-4 p-0" src="../assets/img/Image Course.png">
                <div class="col pe-0">
                  <h2 class="text-dark m-0" style="line-height: normal;">How to learn a bahasa</h2>
                  <div class="text-muted">
                    <p class="m-0 font-weight-bold" style="font-size: 10px">Jack will</p>
                    <p class="m-0 font-weight-bold" style="font-size: 10px">
                      <i class="fa fa-clock"></i> 2h 25m 
                      <i class="fa fa-user ml-2"></i> 400
                    </p>
                  </div>
                </div>
              </div>
             
            </div>
          </div>
          <?php } ?>
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