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
          @php
          $quest = [
            ['id'=>'1', 'question'=>'Please choose the best word(s) to complete the sentence: If today is "xingqiliu" tomorrow is _____?', 'A'=>'Kepala', 'B'=>'Kaki', 'C'=>'Tangan', 'D'=>'Lidah', 'E'=>'Alis'],
            ['id'=>'2', 'question'=>'Please choose the best word(s) to complete the sentence: If today is "xingqiliu" tomorrow is _____?', 'A'=>'Kepala', 'B'=>'Kaki', 'C'=>'Tangan', 'D'=>'Lidah', 'E'=>'Alis'],
            ['id'=>'3', 'question'=>'Please choose the best word(s) to complete the sentence: If today is "xingqiliu" tomorrow is _____?', 'A'=>'Kepala', 'B'=>'Kaki', 'C'=>'Tangan', 'D'=>'Lidah', 'E'=>'Alis'],
            ['id'=>'4', 'question'=>'Please choose the best word(s) to complete the sentence: If today is "xingqiliu" tomorrow is _____?', 'A'=>'Kepala', 'B'=>'Kaki', 'C'=>'Tangan', 'D'=>'Lidah', 'E'=>'Alis'],
            ['id'=>'5', 'question'=>'Please choose the best word(s) to complete the sentence: If today is "xingqiliu" tomorrow is _____?', 'A'=>'Kepala', 'B'=>'Kaki', 'C'=>'Tangan', 'D'=>'Lidah', 'E'=>'Alis'],
            ['id'=>'6', 'question'=>'Please choose the best word(s) to complete the sentence: If today is "xingqiliu" tomorrow is _____?', 'A'=>'Kepala', 'B'=>'Kaki', 'C'=>'Tangan', 'D'=>'Lidah', 'E'=>'Alis']
          ]
          @endphp
          @foreach ($quest as $q)
          @php $qid="q".$q['id']; @endphp
          <div class="col-md-6 mb-4">
            <div class="card shadow-none br-3">
              <div class="card-body p-3">
                <p class="col-12 btn text-white text-start border-0 fw-normal" style="background-color: #C07555">{{ $q['id'] }}. {{ $q['question'] }}</p>
                <div class="p-3">
                  <input type="radio" name="{{ $qid }}" id="{{ $qid }}a" value="A"><label class="ms-2 text-dark" for="{{ $qid }}a">{{ $q['A'] }}</label><br>
                  <input type="radio" name="{{ $qid }}" id="{{ $qid }}b" value="B"><label class="ms-2 text-dark" for="{{ $qid }}b">{{ $q['B'] }}</label><br>
                  <input type="radio" name="{{ $qid }}" id="{{ $qid }}c" value="C"><label class="ms-2 text-dark" for="{{ $qid }}c">{{ $q['C'] }}</label><br>
                  <input type="radio" name="{{ $qid }}" id="{{ $qid }}d" value="D"><label class="ms-2 text-dark" for="{{ $qid }}d">{{ $q['D'] }}</label><br>
                  <input type="radio" name="{{ $qid }}" id="{{ $qid }}e" value="E"><label class="ms-2 text-dark" for="{{ $qid }}e">{{ $q['E'] }}</label><br>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>

        <div class="d-flex">
          <a class="btn ms-auto my-3" href="quiz-end" style="background-color: #C07555">Selesai</a>
        </div>
        
      </div>
    </section><!-- End Services Section -->

@endsection