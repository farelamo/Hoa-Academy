@extends('layouts.app')

@section('hero')
  @include('partials.hero')
@endsection

@section('content')

    <!-- ======= Audio Section ======= -->
    <section id="audio" class="audio pt-0">
      <div class="container">

        <div class="row" data-aos="fade-up" data-aos-delay="300">
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box">
              <div class="rounded-circle me-3 pe-1" style="background-color: #0E0B9E;">
                <i class="mdi mdi-book-open-page-variant"></i>
              </div>
              <h3><a href="/course">Kursus Murah</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box">
              <div class="rounded-circle me-3 pe-1" style="background-color: #5D02F6;">
                <i class="mdi mdi-account-tie-voice"></i>
              </div>
              <h3><a href="/dashboard/vocabulary">Vocabulary Free</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box">
              <div class="rounded-circle me-3 pe-1" style="background-color: #035E1C;">
                <i class="mdi mdi-party-popper"></i>
              </div>
              <h3><a href="/event">Aneka Event</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box">
              <div class="rounded-circle me-3 pe-1" style="background-color: #AC061A;">
                <i class="mdi mdi-newspaper-variant-outline"></i>
              </div>
              <h3><a href="/blog">Blog Menarik</a></h3>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->

    <section id="about" class="about">
      <div class="container">
        <div class="row" data-aos="fade-up" data-aos-delay="300">
          <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
            <h3 class="py-4">Kenapa harus pilih dev hoa academy?</h3>
            <div class="row py-2">
              <div class="row col-2 text-center">
                <span class="m-auto" style="color: #5D02F6;">01</span>
              </div>
              <div class="col">
                <h4>Waktu yang fleksibel</h4>
                <p>Akses materi pembelajaran kapan saja dan seluang anda tanpa hambatan waktu.</p>
              </div>
            </div>
            <div class="row py-2">
              <div class="row col-2 text-center">
                <span class="m-auto" style="color: #035E1C;">02</span>
              </div>
              <div class="col">
                <h4>Akses yang mudah</h4>
                <p>Kini bisa login/daftar dengan akun google tanpa harus registrasi.</p>
              </div>
            </div>
            <div class="row py-2">
              <div class="row col-2 text-center">
                <span class="m-auto" style="color: #AC061A;">03</span>
              </div>
              <div class="col">
                <h4>Dapat diakses kapanpun</h4>
                <p>Tidak perlu resah menunggu untuk belajar. Sekarang bisa akses materi full 24 jam melalui website.</p>
              </div>
            </div>
          </div>
          <div class="row col-lg-6 order-1 order-lg-2 text-center">
            <img src="assets/img/image 15.png" alt="" class="img-fluid my-auto">
          </div>
        </div>
      </div> 
    </section>

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container px-5" data-aos="fade-up">

        <div class="section-title">
          <h2>Features</h2>
          <p>Ada fitur apa saja di dev hoa Academy?</p>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon">
                <img src="assets/img/image 16.png">
              </div>
              <h4 class="title"><a href="">Vocabulary</a></h4>
              <p class="description">vocabulary  merupakan fitur dimana kalian akan dilatih untuk memperlancar dalam mendengar, membaca dan berbicara bahasa china</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon">
                <img src="assets/img/image 17.png">
              </div>
              <h4 class="title"><a href="">Test Online</a></h4>
              <p class="description">Test online merupakan fitur tes agar kita bisa lebih mahir dan mengasah skill sesuai dengan apa yang telah kita pelajari</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon">
                <img src="assets/img/image 18.png">
              </div>
              <h4 class="title"><a href="">Materi Video</a></h4>
              <p class="description">Materi Video merupakan fitur agar kita bisa lebih paham dengan konsep visual dan lebih jelas dengan arahan mentor yang ada</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimoni</h2>
          <p>Apa yang mereka katakan <br>tentang Dev Hoa Academy?</p>
        </div>

        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item text-start row">
                <img src="{{ asset('assets/img/testimoni/stipen.jpg')}}" class="testimonial-img" alt="">
                <p class="text-start">
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Kelas ini bagus dan menarik karena suasana kekeluargaan membuat pembelajaran jadi nyaman.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <h3>Stiven Sugiono</h3>
                <h4>Universitas Brawijaya</h4>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item text-start row">
                <img src="{{ asset('assets/img/testimoni/hebet.jpg')}}" class="testimonial-img" alt="">
                <p class="text-start">
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Materinya mantep-mantep, daging semua. Sukses selalu HOA Academy !!
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <h3>Herbert Kustiono</h3>
                <h4>Universitas Brawijaya</h4>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item text-start row">
                <img src="{{ asset('assets/img/testimoni/renaldi.jpg')}}" class="testimonial-img" alt="">
                <p class="text-start">
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Terbantu banget sama vocabulary nya, awal2 coba yang gratis akhirnya jadi mahir pakenya :D
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <h3>Renaldy Sulistiawan</h3>
                <h4>Universitas Brawijaya</h4>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item text-start row">
                <img src="{{ asset('assets/img/testimoni/nopal.jpg')}}" class="testimonial-img" alt="">
                <p class="text-start">
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Awalnya ngira kalau coursenya bakal biasa, ternyata bagus juga. 
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <h3>M. Naupalix Ulinuha</h3>
                <h4>Universitas Brawijaya</h4>
              </div>
            </div>

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section>

@endsection