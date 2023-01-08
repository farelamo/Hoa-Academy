@extends('dashboard.layouts.app')

@section('content')
    <div class="container mt--6">
      <div class="row">

        <div class="col-12">
          <div class="header">
            <div class="header-body">
              <div class="row align-items-center py-4">
                <div class="col">
                  <h2 class="text-brown d-inline-block mb-0">Daftar Exam</h2>
                </div>
              </div>
            </div>
          </div>
          <div id="btnvcb" class="row m-0">
            @php
              $exa = [
                ['id'=>'1', 'name'=>'Anggota Tubuh'],
                ['id'=>'2', 'name'=>'Profesi'],
                ['id'=>'3', 'name'=>'Perlengkapan Sekolah'],
                ['id'=>'4', 'name'=>'Bintang'],
                ['id'=>'5', 'name'=>'Waktu'],
                ['id'=>'6', 'name'=>'Kata Sifat'],
                ['id'=>'7', 'name'=>'Buah'],
                ['id'=>'8', 'name'=>'Hewan'],
                ['id'=>'9', 'name'=>'Kata Ganti Orang'],
                ['id'=>'10', 'name'=>'Menyapa'],
                ['id'=>'11', 'name'=>'Makanan'],
                ['id'=>'12', 'name'=>'Lainnya']
              ]
            @endphp
            @foreach ($exa as $ex)
            <span class="p-0 mb-2 me-2" style="width: auto">
              <input class="d-none" type="radio" name="ukuran" onchange="vocabToggle(this,{{ $ex['id'] }})" id="v{{ $ex['id'] }}" />
              <label for="v{{ $ex['id'] }}" class="mb-0">
                <a class="btn btn-brown text-white px-3 py-2 border-0 shadow-none" style="">
                  {{ $ex['name'] }}
                </a>
              </label> 
            </span>     
            @endforeach
          </div>
          
        </div>

        @foreach ($exa as $ex)
        <div id="t{{ $ex['id'] }}" class="te col-12" style="display: none">
          <div class="header">
            <div class="header-body">
              <div class="row align-items-center py-4">
                <div class="col">
                  <h2 class="text-brown d-inline-block mb-0">{{ $ex['name'] }}</h2>
                </div>
              </div>
            </div>
          </div>
          <div class="table-x">
            <table>
              @php
                $ex2 = [
                  ['id'=>'1', 'level'=>'Basic', 'name'=>'Exam 1 - '.$ex["name"]],
                  ['id'=>'2', 'level'=>'Basic', 'name'=>'Exam 2 - '.$ex["name"]],
                  ['id'=>'3', 'level'=>'Basic', 'name'=>'Exam 3 - '.$ex["name"]],
                  ['id'=>'4', 'level'=>'Basic', 'name'=>'Exam 4 - '.$ex["name"]],
                  ['id'=>'5', 'level'=>'Intermediate', 'name'=>'Final Exam']
                ]
              @endphp
              @foreach ($ex2 as $e2)
              <tr>
                <td class="fw-bold text-sm text-brown">{{ $e2['level'] }}</td>
                <td class="fw-bold">{{ $e2['name'] }}</td>
                <td>10 soal</td>
                <td>30 menit</td>
                <td>Belum lulus</td>
                <td><a href="exam1" class="text-muted">lanjutkan <i class="fa fa-chevron-right"></i></a></td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
        @endforeach
        

      </div>
    </div>

@endsection

@section('script')
  <script type="text/javascript">
    function vocabToggle(val,id){
      $(".te").css({"display": "none"});
      if(val.checked){
        $("#t"+id).css({"display": "block"});
        //alert("t"+id)
      }
      else{
        $("#t"+id).css({"display": "none"});
        //alert("t"+id)
      }
    }
  </script>
@endsection