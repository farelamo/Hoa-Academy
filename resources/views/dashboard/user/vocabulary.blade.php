@extends('dashboard.layouts.app')

@section('content')
    <div class="container mt--6">
      <div class="row">

        <div class="col-12">
          <div class="header">
            <div class="header-body">
              <div class="row align-items-center py-4">
                <div class="col">
                  <h2 class="text-brown d-inline-block mb-0">Daftar Vocabulary</h2>
                </div>
              </div>
            </div>
          </div>
          <div id="btnvcb" class="row m-0">
            @forelse($vocabCats as $vc)
              <span class="p-0 mb-2 me-2" style="width: auto">
                <input class="d-none" type="checkbox" name="ukuran" onchange="vocabToggle(this, {{ $vc->id }})" id="v{{ $vc->id }}" />
                <label for="v{{ $vc->id }}" class="mb-0">
                  <a class="btn btn-brown text-white px-3 py-2 border-0 shadow-none" style="">
                    {{ $vc->name }}
                  </a>
                </label> 
              </span>   
            @empty
              <h1 class="py-4 fw-bold text-center">Belum Ada Vocabulary</h1>
            @endforelse

            <div class="d-flex justify-content-center mt-4">
              {!! $vocabCats->links() !!}
            </div>
          </div>
          
        </div>

        @foreach ($vocabCats as $vc)
        <div id="t{{ $vc->id }}" class="col-md-6" style="display: none">
          <div class="header">
            <div class="header-body">
              <div class="row align-items-center py-4">
                <div class="col">
                  <h2 class="text-brown d-inline-block mb-0">{{ $vc->name }}</h2>
                </div>
              </div>
            </div>
          </div>
          <div class="table-v">
            <table style="border: 2px solid transparent;">
              <tr>
                <th>Terjemaah</th>
                <th>Pengucapan</th>
                <th>Arti</th>
                <th>Contoh</th>
              </tr>
              @forelse ($vc->vocabulary_fields as $vocField)
                <tr>
                  <td>{{ $vocField->word }}</td>
                  <td>{{ $vocField->vocal }}</td>
                  <td>{{ $vocField->mean }}</td>
                  <td onclick="playPause({{$vocField->id}})">
                    <audio id="mySound{{$vocField->id}}" src="{{Storage::disk('local')->exists('public/vocabularies/'. $vocField->sound) ? Storage::url('public/vocabularies/' . $vocField->sound) : '/assets/sound/no-sound.mp3'}}" type="audio/mpeg"></audio>
                    <i id="icon{{$vocField->id}}" class="mdi mdi-play-circle fs-2"></i>
                  </td>
                </tr>
              @empty
                <h1 class="py-4 fw-bold text-center">Belum Ada Vocabulary</h1>
              @endforelse
            </table>
          </div>
        </div>
        @endforeach
        

      </div>
    </div>

@endsection

@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/5.1.0/mediaelement.min.js" integrity="sha512-R7YELuFaYjrPINkF91+XWOrlfkhmSt0nRGL4Fv6io4dC4GxMomcEJejdhtIAzMWg9J+Eu+1S2eWg4O04ZJl1DA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript">

    function playPause(id) {
      var audio = document.getElementById(`mySound${id}`)

      if (!audio.paused) {
        audio.pause();
        document.getElementById(`icon${id}`).classList.remove('mdi-pause-circle');
        document.getElementById(`icon${id}`).classList.add('mdi-play-circle');
      } else {
        audio.play();
        document.getElementById(`icon${id}`).classList.remove('mdi-play-circle');
        document.getElementById(`icon${id}`).classList.add('mdi-pause-circle');
      }
    }
    
    function vocabToggle(val,id){
      if(val.checked){
        $("#t"+id).css({"display": "block"});
      }
      else{
        $("#t"+id).css({"display": "none"});
      }
    }
  </script>
@endsection