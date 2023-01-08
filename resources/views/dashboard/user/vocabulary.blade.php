@extends('dashboard.layouts.app')

@section('content')
    <div class="container mt--6">
      <div class="row">

        <div class="col-12">
          <div class="header">
            <div class="header-body">
              <div class="row align-items-center py-4">
                <div class="col">
                  <h2 class="text-brown d-inline-block mb-0">Daftar Kosa Kata</h2>
                </div>
              </div>
            </div>
          </div>
          <div id="btnvcb" class="row m-0">
            @php
              $vocab = [
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
            @foreach ($vocab as $vc)
            <span class="p-0 mb-2 me-2" style="width: auto">
              <input class="d-none" type="checkbox" name="ukuran" onchange="vocabToggle(this,{{ $vc['id'] }})" id="v{{ $vc['id'] }}" />
              <label for="v{{ $vc['id'] }}" class="mb-0">
                <a class="btn btn-brown text-white px-3 py-2 border-0 shadow-none" style="">
                  {{ $vc['name'] }}
                </a>
              </label> 
            </span>     
            @endforeach
          </div>
          
        </div>

        @foreach ($vocab as $vc)
        <div id="t{{ $vc['id'] }}" class="col-md-6" style="display: none">
          <div class="header">
            <div class="header-body">
              <div class="row align-items-center py-4">
                <div class="col">
                  <h2 class="text-brown d-inline-block mb-0">{{ $vc['name'] }}</h2>
                </div>
              </div>
            </div>
          </div>
          <div class="table-v">
            <table style="border: 2px solid transparent;">
              <tr>
                <th>Terjemaah</th>
                <th>Hànzì</th>
                <th>Pīnyīn</th>
              </tr>
              <tr>
                <td>Kepala</td>
                <td>头</td>
                <td>Tóu</td>
              </tr>
              <?php  for($i =1; $i<=5; $i++){ ?>
              <tr>
                <td>Terjemaah</td>
                <td>Terjemaah</td>
                <td>Terjemaah</td>
              </tr>
              <?php } ?>
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