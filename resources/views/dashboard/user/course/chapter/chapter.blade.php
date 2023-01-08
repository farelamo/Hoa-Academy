@extends('dashboard.layouts.app')

@section('content')
    <div class="container mt--6">
      <div class="row">
            <div class="container px-0" data-aos="fade-up">
                <div class="card border-0 lexend">
                    <div class="card-body p-4">
                        {!! $chapter->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection