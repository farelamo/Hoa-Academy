@extends('dashboard.layouts.app')

@section('content')
    <div class="container mt-6">
      <div class="row">
        <div class="col-12">
          <div class="shadow-none card border-2">
            <div class="card-body py-4 px-4">
              <div class="row">
                <div class="col-md-8 my-auto p-5">
                  <h1 class="text-dark px-0">Selamat Datang, {{ Auth::user()->name }}</h1>
                  <h3 class="text-muted px-0 text-lg">
                    Keep spirit and never give up !
                  </h3>
                </div>
                <div class="col-md-4 ml-auto">
                  <img src="{{ asset('assets/img/welcome.png') }}" class="w-100">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="container pt-4 pb-6">
      <div class="row">

      </div>
    </div>    
@endsection