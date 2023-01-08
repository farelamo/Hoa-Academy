@extends('layouts.app')

@section('content')

    <section id="about" class="about" style="padding: 150px 0px">
      <div class="container">
        <div class="row" data-aos="fade-up" data-aos-delay="300">
          <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex">
            <div class="my-auto">
              <h3 class="py-4">Biaya Kursus <br> di Hoa Academy</h3>  
              <p class="text-dark fs-6 m-0" style="line-height:normal">Pilih paket kursus sebagai investasi belajar <br> yang sesuai dengan kebutuhan Anda.</p>
              <br>
              <a class="btn btn-lg scrollto fs-6 my-3 px-4" href="#features">Pilih Kursus</a>
            </div>
          </div>
          <div class="row col-lg-6 order-1 order-lg-2 text-center">
            <img src="assets/img/course.png" alt="" class="img-fluid my-auto">
          </div>
        </div>
      </div> 
    </section>

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container px-5" data-aos="fade-up">

        <div class="section-title">
          <h2>Langganan</h2>
          <p>Pilih paket sesuai dengan keinginanmu</p>
        </div>

        <div class="row">
          @forelse ($courses as $course)
          <div class="col-md-3 mb-4">
            <div class="shadow-none card">
              <div class="card-body text-center py-5">
                <p class="h4 fw-bold" style="min-height: 100px">{{ $course->title }}</p><br>
                <p class="fw-bold">HSK {{ $course->hsk_type }} <br> {{ $course->meet_times }}x pertemuan</p><br>
                <p class="h4 fw-bold">
                  @if (strlen($course->price) > 5)
                    Rp. {{ implode(".", str_split($course->price, 3)) }}
                  @else
                    Rp. {{ substr($course->price,0,2).'.'.substr($course->price,2) }}
                  @endif
                </p><br>
                <a class="col-10 btn btn-lg " href="/dashboard/course/{{$course->id}}">Pilih Kursus</a>
              </div>
            </div>
          </div>
          @empty
            <h1 class="py-4 fw-bold text-center">Belum Ada Course</h1>
          @endforelse

          <div class="d-flex justify-content-center" style="background-color: white">
            {!! $courses->links() !!}
          </div>
        </div>
      </div>
    </section>
@endsection