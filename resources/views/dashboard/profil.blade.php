@extends('dashboard.layouts.app')

@section('content')
    <div class="container mt--6">
      <div class="row">
        
        <div class="col-12">
          <div class="shadow-none card">
            <div class="card-body py-4 px-4">
              <div class="row">
                <div class="col-md-2 d-flex">
                  <img src="{{ Storage::disk('local')->exists('public/users/'. Auth::user()->picture) ? Storage::url('public/users/' . Auth::user()->picture) : asset('dashboard/assets/img/users/profil.jpg')}}" class="rounded-circle mx-auto" style="width: 150px; height:150px; object-fit: cover;">
                </div>
                <div class="col-md-4 d-flex">
                  <div class="my-auto">
                    <h2 class="text-dark m-0">{{ Auth::user()->name }}</h2>
                    <h3 class="text-muted px-0"><i class="text-brown fa fa-star mr-2"></i>{{ Auth::user()->poin }} Point</h3>
                    <h3 class="text-muted px-0"><i class="text-brown fa fa-envelope mr-2"></i>{{ Auth::user()->email }}</h3>
                  </div>
                </div>
                <div class="col-md-2 ml-auto d-flex">
                  <button type="button" class="col-12 btn btn-brown my-auto" style="height: fit-content"
                    data-bs-toggle="modal" data-bs-target="#editProfil">
                    Edit profil
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        @if (Auth::user()->role == 'user')
          <div class="col-6 col-md-3">
            <div class="shadow-none card">
              <div class="card-body p-3 text-center">
                <p class="text-muted h2">Belajar</p>
                <p class="text-dark h1">{{ $total_course }}</p>
                <p class="text-muted h2">Kelas Course</p>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="shadow-none card">
              <div class="card-body p-3 text-center">
                <p class="text-muted h2">Memenangkan</p>
                <p class="text-dark h1">0</p>
                <p class="text-muted h2">Challenge</p>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="shadow-none card">
              <div class="card-body p-3 text-center">
                <p class="text-muted h2">Menghadiri</p>
                <p class="text-dark h1">{{ $total_events }}</p>
                <p class="text-muted h2">Event</p>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="shadow-none card">
              <div class="card-body p-3 text-center">
                <p class="text-muted h2">Sertifikat</p>
                <p class="text-dark h1">{{ $total_finish_course }}</p>
                <p class="text-muted h2">Lulus Course</p>
              </div>
            </div>
          </div>
        @endif

        {{-- Admin Role --}}
        
        <form method="post" action="/profil/small-update" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="row mb-2">
            <div class="col">
                <div class="form-group">
                    <div class="col">
                      <label class="form-label">Ubah Gambar Profile <span style="color: red">*Jika perlu</span></label>
                      <input type="file" class="form-control" name="picture">
                      @error('picture')
                        <div class="error">*{{ $message }}</div>
                      @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="col">
                        <label class="form-label">Ubah Password <span style="color: red">*Jika perlu</span></label>
                        <input type="text" class="form-control" name="password" placeholder="Ubah Password" value="{{ old('password') }}">
                        @error('password')
                            <div class="error">*{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
          </div>

          <div class="row">
            <div class="col d-flex justify-content-end">
                <button class="btn btn-success" type="submit">Simpan</button>
            </div>
          </div>
        </form>

        <div class="modal fade" id="editProfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Edit Profile</h5>
                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                          <i class="material-icons">x</i>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form method="post">
                          @csrf
                          @method('PUT')

                          <div class="row mb-2">
                            <div class="col">
                                <div class="form-group">
                                    <div class="col">
                                        <label class="form-label">Nama</label>
                                        <input type="text" id="eName" class="form-control" name="name" placeholder="Nama" value="{{ old('name') ?? Auth::user()->name }}">
                                        @error('name')
                                            <div class="error">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                          </div>

                          <div class="row mb-2 px-3">
                            <div class="col">
                                <div class="form-group pr-3">
                                  <label class="form-label">Usia</label>
                                  <input type="number" id="eAge" class="form-control" name="age" min="10" placeholder="Usia" value="{{ old('age') ?? Auth::user()->age }}">
                                  @error('age')
                                      <div class="error">*{{ $message }}</div>
                                  @enderror
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group pl-3">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <select class="form-control form-select" name="gender" id="eGender">
                                        <option value="" selected>Pilih Jenis Kelamin</option>
                                        @if (old('gender') || Auth::user()->gender)
                                            @if ((old('gender') || Auth::user()->gender) == 'man')
                                                <option value="man" selected>Pria</option>
                                                <option value="woman">Wanita</option>
                                            @elseif ((old('gender') || Auth::user()->gender) == 2)
                                                <option value="man">Pria</option>
                                                <option value="woman" selected>Wanita</option>
                                            @else 
                                                <option value="man">Pria</option>
                                                <option value="woman">Wanita</option>
                                            @endif
                                        @else
                                            <option value="man">Pria</option>
                                            <option value="woman">Wanita</option>
                                        @endif
                                    </select>
                                    @error('gender')
                                        <div class="error">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                          </div>

                          <div class="row mb-2">
                            <div class="col">
                                <div class="form-group">
                                    <div class="col">
                                        <label class="form-label">Birth Date</label>
                                        <input type="date" id="eBirth" class="form-control" name="birth_date" placeholder="Tanggal Lahir" value="{{ old('birth_date') ?? Auth::user()->birth_date }}">
                                        @error('birth_date')
                                            <div class="error">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <div class="col">
                                        <label class="form-label">Profesi</label>
                                        <input type="text" id="eProfesi" class="form-control" name="profession" placeholder="Profesi" value="{{ old('profession') ?? Auth::user()->profession }}">
                                        @error('profession')
                                            <div class="error">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                          </div>

                          <div class="row px-3">
                            <div class="form-group">
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control" id="eAddress" name="address" style="resize: none; height: 7rem">{{ old('address') ?? Auth::user()->address }}</textarea>
                                @error('address')
                                    <div class="error">*{{ $message }}</div>
                                @enderror
                            </div>
                          </div>

                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                              <button type="submit" class="btn btn-primary">Update Profil</button>
                          </div>
                      </form>
                  </div>

              </div>
          </div>
        </div>
      </div>
    </div>
    
    {{-- <div class="container pt-4 pb-6">
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

        <div class="col-md-3">
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
        </div>

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
    </div>     --}}
@endsection

{{-- @section('script')
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
@endsection --}}

@section('script')
    @if (count($errors) > 0)
    @php $bag = $errors->getBag($__errorArgs[1] ?? 'default'); @endphp
      @if (!$bag->has('password') && !$bag->has('picture'))
        <script>
            $(document).ready(function() {
                $('#editProfil').modal('show')
                $("#eName").val(<?= json_encode(old('name')) ?>)
                $("#eAge").val(<?= json_encode(old('age')) ?>)
                $("#eGender").val(<?= json_encode(old('gender')) ?>)
                $("#eBirth").val(<?= json_encode(old('birth_date')) ?>)
                $("#eProfesi").val(<?= json_encode(old('profession')) ?>)
                $("#eAddress").val(<?= json_encode(old('address')) ?>)
            })
        </script>
      @endif
    @endif
@endsection