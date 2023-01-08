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
        
        <div class="col-12 mb-5">
          <div class="row justify-content-center">
            <div class="col-md-12 col-lg-3 d-flex">
              <img src="{{ Storage::disk('local')->exists('public/course/'. $course->image) ? Storage::url('public/course/' . $course->image) : '/dashboard/assets/img/course/1.jpg'}}" class="rounded mx-auto w-100 img-cover">
            </div>
            <div class="col-md-5 d-flex mt-4 mt-lg-0">
              <div class="my-auto">
                <h2 class="h1 text-dark">{{ $course->title }}</h2>
                <p class="h3 text-muted px-0">
                  <i class="text-brown fa fa-medal mr-2"></i> HSK {{ $course->hsk_type }}
                  <i class="text-brown fa fa-clock ml-2"></i> {{ $course->duration }} Jam Belajar
                </p>
                <p class="h3 text-muted px-0"><i class="text-brown fa fa-desktop mr-1"></i> {{ $course->meet_times }}x Pertemuan</p>
                <p class="text-muted font-weight-bold">{{ $course->short_desc }}</p>
                <p class="h2 text-dark">
                  @if (strlen($course->price) > 5)
                    Rp. {{ implode(".", str_split($course->price, 3)) }}
                  @else
                    Rp. {{ substr($course->price,0,2).'.'.substr($course->price,2) }}
                  @endif
                </p>
              </div>
            </div>
            <div class="col-md-2 d-flex">
              @if ($check->count() == 0)
                <div class="row">
                  <button type="button" class="col-12 btn btn-brown my-auto ml-lg-3" style="height: fit-content">Gabung Course</button> 
                </div>
              @elseif ($check->count() > 0)
                <div class="row">
                  <div class="col-12 col-sm-12 mt-md-5 mb-lg-n2">
                    <a href="{{ $course->group_link }}" target="_blank" class="col-12 btn btn-brown my-auto" style="height: fit-content">Grup Kelas</a>
                  </div>
                  @if ($course->users()->wherePivot('user_id', Auth::user()->id)->first()->pivot->finished == false)
                    <div class="col-12 mt-3 col-sm-12 mt-md-n6 mt-lg-n5">
                      <a href="{{ $course->meet_link }}" target="_blank" class="col-12 btn btn-white my-auto" style="height: fit-content">Pertemuan</a>
                    </div>
                  @endif
                </div>
              @endif
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="shadow-none card">
            <div class="card-body p-4">
              <p class="text-dark h1">Deskripsi</p>
              <p class="text-dark font-weight-bold" style="text-align: justify;">{{ $course->desc }}</p>
            </div>
          </div>
        </div>

        <div class="col-12 mt-5">
          <p class="text-dark h1 text-center font-weight-bold">Silabus</p>
          <p class="text-dark h2 text-center text-muted font-weight-bold mb-5">Materi yang akan anda pelajari pada kelas ini</p>

          @if ($check->count() == 0)
            @forelse ($course->chapters as $chapter)
            <div class="shadow-none card course">
              <div class="card-body p-4">
                <p class="text-dark h1">{{ $chapter->title }}</p>
                <p class="text-dark font-weight-bold text-muted" style="text-align: justify;">{{ $chapter->short_desc }}</p>
              </div>
            </div>
            @empty
              <h1 class="py-4 fw-bold text-center">Belum Ada Materi</h1>
            @endforelse
          @elseif ($check->count() > 0)
          @forelse ($course->chapters as $chapter)
            <a href="/dashboard/course/{{$course->id}}/chapter/{{$chapter->id}}">
              <div class="shadow-none card course">
                <div class="card-body p-4">
                  <p class="text-dark h1">{{ $chapter->title }}</p>
                  <p class="text-dark font-weight-bold text-muted" style="text-align: justify;">{{ $chapter->short_desc }}</p>
                </div>
              </div>
            </a>
          @empty
            <h1 class="py-4 fw-bold text-center">Belum Ada Materi</h1>
          @endforelse
          @endif
        </div>
      </div>
    </div>
      
@endsection