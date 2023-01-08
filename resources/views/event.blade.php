@extends('layouts.app')

@section('content')

    <section id="about" class="about" style="padding: 150px 0px">
      <div class="container">
        <div class="row" data-aos="fade-up" data-aos-delay="300">
          <div class="col-lg-7 order-2 order-lg-1 mt-3 mt-lg-0 d-flex">
            <div class="my-auto">
              <h3 class="py-4">Kembangkan Jaringan dan <br> Belajar dari Mentor Terbaik</h3>  
              <p class="text-dark fs-6 m-0" style="line-height:normal">
                Tingkatkan kemampuan berbahasa mandarin sekaligus membuka jaringan <br>
                dengan mentor terbaik melalui seminar atau workshop yang diselenggarakan <br>
                oleh partner Hoa Academy
              </p>
            </div>
          </div>
          <div class="row col-lg-5 order-1 order-lg-2 text-center">
            <img src="assets/img/3187908.png" alt="" class="img-fluid my-auto">
          </div>
        </div>
      </div> 
    </section>

    <!-- ======= Features Section ======= -->
    <section class="features">
      <div class="container px-5" data-aos="fade-up">

        <div class="section-title">
          <h2>Event</h2>
          <p>Upcoming event</p>
          <h5 class="text-muted">Jangan ketinggalan event-event yang akan datang. Pilihlah sesuai dengan minat Anda <br> dan silakan hadir di kota terdekat Anda.</h5>
        </div>

        <div class="row">
          @forelse($event_seminars as $seminar)
            <div class="col-md-4 mb-4">
              <div class="shadow-none card br-3 lexend">
                <img class="card-img-top br-3 br-b-0 img-cover" src="{{ Storage::disk('local')->exists('public/event/'. $seminar->image) ? Storage::url('public/event/' . $seminar->image) : 'assets/img/seminar.jpg'}}" alt="Card image cap" style="max-height: 20rem; height: 19rem">
                <p class="p-3 m-0">{{ \Carbon\Carbon::parse(\Carbon\Carbon::now()->format('Y-m-d'))->diffInDays($seminar->date); }} hari lagi | SEMINAR</p>
                <div class="card-body text-center">
                  <p class="h4 fw-bold m-0">{{ $seminar->title }}</p><br>
                  <p class="m-0">{{ $seminar->short_desc }}</p><br>
                  <a class="btn mb-2" href="/event/{{ $seminar->id }}">Selengkapnya</a>
                </div>
              </div>
            </div>
          @empty
            <h1 class="py-4 fw-bold text-center">Belum Ada Seminar</h1>
          @endforelse
        </div>
        <div class="d-flex">
          <a class="btn mb-2 ms-auto" href="#">Lihat seminar lainnya</a>
        </div>
      </div>
    </section><!-- End Services Section -->

    <section class="features" style="background-color: #FFEEE7;">
      <div class="container px-5" data-aos="fade-up">

        <div class="section-title">
          <h2>Test</h2>
          <p>Chinese Test Online</p>
          <h5 class="text-muted">Asah kemampuan bahasa mandarin Anda</h5>
          <br>
          <div class="row">
            <h1 class="py-4 fw-bold text-center">Coming Soon</h1>
          </div>
          {{-- <div class="row">
            <div class="col-3">
              <div class="card br-2" style="border: 2px solid #C9896E !important; background-color: transparent">
                <div class="card-body py-4">
                  <h6 class="card-title fw-bold">Dasar 1</h6>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="card br-2" style="border: 2px solid #C9896E !important; background-color: transparent">
                <div class="card-body py-4">
                  <h6 class="card-title fw-bold">Dasar 2</h6>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="card br-2" style="border: 2px solid #C9896E !important; background-color: transparent">
                <div class="card-body py-4">
                  <h6 class="card-title fw-bold">Menengah</h6>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="card br-2" style="border: 2px solid #C9896E !important; background-color: transparent">
                <div class="card-body py-4">
                  <h6 class="card-title fw-bold">Tinggi</h6>
                </div>
              </div>
            </div>
          </div> --}}
        </div>

      </div>
    </section>

    <section class="features">
      <div class="container px-5" data-aos="fade-up">

        <div class="section-title">
          <h2>Kompetisi Kreatif</h2>
          <p>Upcoming Challenge</p>
          <h5 class="text-muted">Asah kemampuan Anda dengan mengikuti Hoa Challenges</h5>
        </div>
          
        <div class="row">
          @forelse($event_lombas as $lomba)
            <div class="col-md-4 mb-4">
              <div class="shadow-none card br-3 lexend">
                <img class="card-img-top br-3 br-b-0" src="{{ Storage::disk('local')->exists('public/blog/'. $lomba->image) ? Storage::url('public/blog/' . $lomba->image) : 'assets/img/post.jpg'}}" alt="Card image cap">
                <p class="p-3 m-0">{{ \Carbon\Carbon::parse(\Carbon\Carbon::now()->format('Y-m-d'))->diffInDays($lomba->date) }} hari lagi | LOMBA</p>
                <div class="card-body text-center">
                  <p class="h4 fw-bold m-0">{{ $lomba->title }}</p><br>
                  <p class="m-0">{{ $lomba->short_desc }}</p><br>
                  <a class="btn mb-2" href="/event/{{ $lomba->id }}">Selengkapnya</a>
                </div>
              </div>
            </div>
          @empty
            <h1 class="py-4 fw-bold text-center">Belum Ada Lomba</h1>
          @endforelse
        </div>
        <div class="d-flex">
          <a class="btn mb-2 ms-auto" href="#">Lihat lomba lainnya</a>
        </div>
      </div>
    </section>

@endsection