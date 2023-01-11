@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <div class="card p-5">
            <div class="d-flex justify-content-between mb-3">
                <div>
                    <h3>Data Vocabulary Field</h3>
                </div>
                <div></div>
                <div>
                    <a href="/admin/vocabulary/field/create">
                        <button type="button" class="btn btn-primary">
                            Tambah Data
                        </button>
                    </a>
                </div>
            </div>
            <table id="myTable" class="w-100">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Word</th>
                        <th>Sound</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($vocab_fields as $data)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->vocabularies->name }}</td>
                            <td>{{ $data->word }}</td>
                            <td onclick="playPause({{$data->id}})">
                                <audio id="mySound{{$data->id}}" src="{{Storage::disk('local')->exists('public/vocabularies/'. $data->sound) ? Storage::url('public/vocabularies/' . $data->sound) : '/assets/sound/no-sound.mp3'}}" type="audio/mpeg"></audio>
                                <i id="icon{{$data->id}}" class="mdi mdi-play-circle fs-2"></i>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="/admin/vocabulary/field/{{$data->id}}/edit" class="h3">
                                        <i class="fas fa-edit m-1"></i>
                                    </a>
                                    <p id="{{ $data->id }}" class="d-none">
                                        {{ $data->word }}
                                    </p>

                                    <a href="#" class="h3" data-bs-toggle="modal" data-bs-target="#hapus"
                                        onclick='hapus("{{ $data->id }}")'>
                                        <i class="fas fa-trash-alt m-1"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr style="text-align: center">
                            <td>No Data</td>
                            <td>No Data</td>
                            <td>No Data</td>
                            <td>No Data</td>
                            <td>No Data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Vocabulary Field</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="post" id="formHapus">
                        @csrf
                        @method('DELETE')

                        <div class="form-group">
                            <input type="hidden" class="d-none" id="dId" name="id" required>
                            <p id="dhapus"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
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

        function hapus(id) {
            var data = (document.getElementById(id).textContent).split(",")
            document.getElementById("dId").value            = id
            document.getElementById("dhapus").textContent   = 'Apakah anda yakin ingin menghapus "' + data[0] + '"?'
            document.getElementById('formHapus').action     = "/admin/vocabulary/field/" + id;
        }
    </script>
@endsection
