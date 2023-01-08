@extends('layouts.app')

@section('content')

    <section id="about" class="about" style="padding: 150px 0px">
      <div class="container">
        <div class="row" data-aos="fade-up" data-aos-delay="300">
          <div class="col-lg-7 order-2 order-lg-1 mt-3 mt-lg-0 d-flex">
            <div class="my-auto">
              <h3 class="py-4 fw-bold">Blog Hoa Academy</h3>  
              <p class="text-dark fs-6 m-0" style="line-height:normal">
                Tambah Pengetahuan Seputar Dunia Mandarin Disini.<br> 
                Mulai dari gaya hidup, hack life dan lain sebagainya.
              </p>
            </div>
          </div>
          <div class="row col-lg-5 order-1 order-lg-2 text-center">
            <img src="assets/img/6736903.png" alt="" class="img-fluid my-auto" style="max-width: 500px">
          </div>
        </div>
      </div> 
    </section>

    <!-- ======= Features Section ======= -->
    <section class="features">
      <div class="container px-5" data-aos="fade-up">

        <div class="row">
          @forelse ($blogs as $blog)
          <div class="col-md-3 mb-4">
            <a href="/blog/{{ $blog->id }}">
              <div class="shadow-none card border-0 lexend">
                <img class="card-img-top br-5 img-cover" src="{{ Storage::disk('local')->exists('public/blog/'. $blog->image) ? Storage::url('public/blog/' . $blog->image) : 'assets/img/post.jpg'}}" alt="Card image cap" style="max-height: 20rem; height: 15rem">
                <div class="card-body p-0">
                  <p class="my-3" style="font-size: 12px">{{ $blog->blog_category->name }} | 
                    {{ $blog->created_at->format('F') }} {{ \Carbon\Carbon::parse($blog->created_at->format('Y-m-d'))->daysInMonth }},
                    {{ $blog->created_at->format('Y') }}
                  </p>
                  <p class="my-3 h5 fw-bold" style="font-size: 18px">
                    <p class="text-dark">{{ $blog->title }}</p> 
                  </p>
                  <p class="my-3" style="font-size: 13px">
                    <p class="text-dark">{{ $blog->short_desc }}</p> 
                  </p><br>
                </div>
              </div>
            </a>
          </div>
          @empty
            <h1 class="py-4 fw-bold text-center">Belum Ada Blog</h1>
          @endforelse

          <div class="d-flex justify-content-center" style="background-color: white">
            {!! $blogs->links() !!}
          </div>
        </div>
      </div>
    </section>
@endsection