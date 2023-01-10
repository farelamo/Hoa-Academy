@extends('dashboard.layouts.app')

@push('head')
  <style>
    .course:hover {
      background-color: #FFEEE7;
    }

    .masuk:hover {
      background-color: #FFFFFF
    }
  </style>
@endpush

@section('content')
    <div class="container mt--6">
      <div class="row">
        <section class="features">
            <div class="container px-5" data-aos="fade-up">
              <div class="row">
                @forelse ($finish_courses as $finish_course)
                <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                  <div class="shadow-none card br-3 lexend course">
                    <img class="card-img-top br-3 br-b-0 img-cover" src="{{ Storage::disk('local')->exists('public/course/'. $finish_course->image) ? Storage::url('public/course/' . $finish_course->image) : '/assets/img/post.jpg'}}" alt="Card image cap" style="max-height: 20rem; height: 19rem">
                    <p class="p-3 m-0 text-muted font-weight-bold">{{ $finish_course->type }} | HSK {{ $finish_course->hsk_type }}</p>
                    <div class="card-body text-center">
                      <p class="h4 fw-bold m-0">{{ $finish_course->title }}</p><br>
                      <p class="m-0 text-muted font-weight-bold">{{ substr($finish_course->short_desc, 0, 100) }}...</p><br>
                      <a class="btn mb-2 masuk" href="/dashboard/course/{{ $finish_course->id }}">masuk course</a>
                    </div>
                  </div>
                </div>
                @empty
                  <h1 class="py-4 fw-bold text-center">Belum Ada Progress Course</h1>
                @endforelse
      
                <div class="d-flex justify-content-center" style="background-color: white">
                  {!! $finish_courses->links() !!}
                </div>
              </div>
            </div>
          </section>
      </div>
    </div>

@endsection