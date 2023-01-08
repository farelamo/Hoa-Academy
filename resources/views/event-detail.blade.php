@extends('layouts.app')

@section('content')

    <section id="about" class="about" style="padding: 150px 0px">
      <div class="container">
        <div class="row" data-aos="fade-up" data-aos-delay="300">
          <div class="col-12 order-2 order-lg-1 mt-3 mt-lg-0 d-flex">
            <div class="m-auto">
              <h3 class="text-center">Event Hoa Academy</h3>  
              <p class="text-dark text-center fs-6 m-0" style="line-height:normal">
                Tingkatkan kemampuan berbahasa mandarin dengan mengikuti event
              </p>
            </div>
          </div>
        </div>
      </div> 
    </section>

    <section class="features">
      <div class="container px-5" data-aos="fade-up">

        <div class="row">
          <div class="col-md-3 d-flex">
            <img src="{{ Storage::disk('local')->exists('public/event/'. $event->image) ? Storage::url('public/event/' . $event->image) : 'assets/img/seminar.jpg'}}" class="rounded mx-auto w-100 img-cover" style="max-height: 20rem; height: 15rem">
          </div>
          <div class="col-md-5 d-flex">
            <div class="my-auto">
              <p>{{$event->type == 0 ? 'LOMBA' : 'SEMINAR'}}</p>
              <h2 class="h2 text-dark fw-bold">{{ $event->title }}</h2>
              <p class="text-muted font-weight-bold">
                Diselenggarakan oleh Hoa Academy Terbuka hingga {{ date('d', strtotime($event->date)) }} {{ \Carbon\Carbon::createFromFormat('Y-m-d', $event->date)->locale('id_ID')->monthName }} {{ date('Y', strtotime($event->date)) }}
              </p>
            </div>
          </div>
          <div class="col-md-2 d-flex ms-auto">
            <a href="/event/{{ $event->id }}/join" class="col-12 btn btn-brown my-auto" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              Ikuti Event
            </a>
            <form id="logout-form" action="/event/{{ $event->id }}/join" method="POST" style="display: none;">
              @csrf
              @method('PUT')
            </form>
          </div>
        </div>

        <br><br>

        <div class="row lexend">
          <div class="col-md-9">
            <p class="h3 text-dark fw-bold">Deskripsi</p>
            <p class="text-dark" style="text-align: justify;">
              {{ $event->desc }}
            </p>
          </div>
          <div class="col-md-2 ms-auto">
            <div class="text-center">
              <p class="h5 fw-bold">Jadwal<br>Pelaksanaan</p>
              <p style="font-size: 14px">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $event->date)->locale('id_ID')->dayName }}, 
                {{ date('d', strtotime($event->date)) }} {{ \Carbon\Carbon::createFromFormat('Y-m-d', $event->date)->locale('id_ID')->monthName }} {{ date('Y', strtotime($event->date)) }}<br>{{ $event->start }} - {{ $event->end }} WIB</p>
              <br>
              <p class="h5 fw-bold">Lokasi</p>
              <p style="font-size: 14px">{{ $event->meet_type == 1 ? 'Online' : 'Offline' }}<br>{{ $event->meet_type == 1 ? $event->link : $event->location }}</p>
            </div>
          </div>
        </div>
        
      </div>
    </section><!-- End Services Section -->

@endsection