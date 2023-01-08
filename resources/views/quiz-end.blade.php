@extends('layouts.app')

@section('content')

    <section id="about" class="about" style="padding: 150px 0px">
      <div class="container">
        <div class="row" data-aos="fade-up" data-aos-delay="300">
          <div class="col-12 order-2 order-lg-1 mt-3 mt-lg-0 d-flex">
            <div class="m-auto">
              <h3 class="text-center">Quiz Dev Hoa Academy</h3>  
              <p class="text-dark text-center fs-6 m-0" style="line-height:normal">
                Basic Test 1
              </p>
            </div>
          </div>
        </div>
      </div> 
    </section>

    <section class="features">
      <div class="container px-5" data-aos="fade-up">

        <div class="row lexend">
          <div class="col-md-10">
            <p class="h3 text-dark fw-bold">Basic Test 1</p>
            <p class="text-dark">
              Anda telah menjawab 7 dari 30 pertanyaan dengan benar (23.33%)
            </p>
            <p class="text-dark">
              Level Anda kira-kira Basic 1
            </p>
            <a class="btn my-3 fw-normal br-2" href="quiz-start">Ulangi Test</a>
            <a class="btn my-3 fw-normal br-2" href="quiz-start">Lihat Jawaban</a>
          </div>
        </div>
        
      </div>
    </section><!-- End Services Section -->

@endsection