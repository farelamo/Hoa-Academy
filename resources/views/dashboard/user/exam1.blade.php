@extends('dashboard.layouts.app')

@section('content')
    <div class="container mt--6">
      <div class="row">

        <div class="col-12">
          <div class="header">
            <div class="header-body">
              <div class="row align-items-center py-4">
                <div class="col">
                  <h2 class="text-brown d-inline-block mb-0">Exam 1 - Anggota Tubuh</h2>
                </div>
                <div class="col d-flex m-0">
                  <a href="#" class="text-brown ms-auto">29:30:15</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        @php
          $quest = [
            ['id'=>'1', 'question'=>'Arti dari tóu adalah...', 'A'=>'Kepala', 'B'=>'Kaki', 'C'=>'Tangan', 'D'=>'Lidah', 'E'=>'Alis'],
            ['id'=>'2', 'question'=>'Arti dari tóu adalah...', 'A'=>'Kepala', 'B'=>'Kaki', 'C'=>'Tangan', 'D'=>'Lidah', 'E'=>'Alis'],
            ['id'=>'3', 'question'=>'Arti dari tóu adalah...', 'A'=>'Kepala', 'B'=>'Kaki', 'C'=>'Tangan', 'D'=>'Lidah', 'E'=>'Alis'],
            ['id'=>'4', 'question'=>'Arti dari tóu adalah...', 'A'=>'Kepala', 'B'=>'Kaki', 'C'=>'Tangan', 'D'=>'Lidah', 'E'=>'Alis'],
            ['id'=>'5', 'question'=>'Arti dari tóu adalah...', 'A'=>'Kepala', 'B'=>'Kaki', 'C'=>'Tangan', 'D'=>'Lidah', 'E'=>'Alis'],
            ['id'=>'6', 'question'=>'Arti dari tóu adalah...', 'A'=>'Kepala', 'B'=>'Kaki', 'C'=>'Tangan', 'D'=>'Lidah', 'E'=>'Alis']
          ]
        @endphp
        @foreach ($quest as $q)
        @php $qid="q".$q['id']; @endphp
        <div class="col-md-6 question">
          <div class="card shadow-none">
            <div class="card-body p-3">
              <p class="col-12 btn text-white text-start border-0">{{ $q['id'] }}. {{ $q['question'] }}</p>
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
    </div>
@endsection