@extends('layouts.app')

@section('content')

    <section id="about" class="about" style="padding: 150px 0px">
      <div class="container">
        <div class="row" data-aos="fade-up" data-aos-delay="300">
          <div class="col-12 order-2 order-lg-1 mt-3 mt-lg-0 d-flex">
            <div class="m-auto">
              <h3 class="text-center fw-bold">{{ $blog->title }}</h3>
            </div>
          </div>
        </div>
      </div> 
    </section>

    <section class="features">
      <div class="container px-5" data-aos="fade-up">

        <div class="row lexend">
          <div class="col-12">
            <p class="mb-3" style="font-size: 13px">{{ $blog->blog_category->name }} | 
              {{ $blog->created_at->format('F') }} {{ \Carbon\Carbon::parse($blog->created_at->format('Y-m-d'))->daysInMonth }},
              {{ $blog->created_at->format('Y') }}
            </p>
            <p class="mb-3 h3 text-dark fw-bold">{{ $blog->title }}</p>
            <p class="mb-3" style="font-size: 13px">Ditulis oleh {{ $blog->user->name }}</p>
            <p class="text-dark" style="text-align: justify;">{{ $blog->desc }}</p>
          </div>
        </div>
        
      </div>
    </section>

    <section id="komentar" class="lexend">
      <div class="container px-5" data-aos="fade-up">
        <div class="row">
          <div class="col-6">
            <button class="btn rounded-circle me-3" style="width: 42px; height: 42px">
              <i class="bi bi-heart"></i>
            </button>
            <span>{{ $blog->likes }} likes</span>
          </div>
          <div class="col-6">
            <a href="#" class="text-dark mx-2"><i class="bi bi-facebook"></i></a>
            <a href="#" class="text-dark mx-2"><i class="bi bi-twitter"></i></a>
            <a href="#" class="text-dark mx-2"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
        
        <hr><br>
        
        <form action="">
          <p class="h5 fw-bold">{{ $blog->comments->count() }} comments</p>
          <textarea class="col-12 form-control border-0 p-3 my-3 br-3" name="komentar" id="" rows="10" placeholder="Write a response..." style="background-color: #F2F4F8"></textarea>
          <div class="d-flex">
            <button class="btn ms-auto px-4 fw-normal br-5" style="width: fit-content">Submit</button>
          </div>
        </form>
        
        <div class="row">
          @foreach($comments as $comment)
          <div class="col-7 mb-4">
            <div class="d-flex">
              <img class="rounded-circle me-3" src="{{ asset('assets/img/post.jpg')}}" alt="" style="width: 50px; height: 50px">
              <div>
                <p class="m-0">{{ $comment->user->name }}</p>
                <p class="m-0">{{ Carbon\Carbon::parse($comment->created_at)->diff(Carbon\Carbon::now())->format('%y Tahun %m Bulan %d Hari %h Jam %i Menit yang lalu') }}</p>
              </div>
            </div>
            <br>
            <p>{{ $comment->comment }}</p>
            <div class="d-flex">
              <div class="ms-auto">
                <a href="#" class="text-dark mx-2"><i class="bi bi-heart"></i></a>  
                <span>16</span>
                <a href="#" class="text-dark mx-2"><i class="bi bi-chat-left"></i></a>  
                <span>12</span>
              </div>
            </div>
          </div>
          @endforeach

          <div class="d-flex justify-content-center mt-5" style="background-color: white">
            {!! $comments->links() !!}
          </div>
        </div>

      </div>
    </section>

@endsection