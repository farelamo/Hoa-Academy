@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <div class="card p-5">
            <div class="d-flex justify-content-between mb-3">
                <div>
                    <h3>Data Absensi</h3>
                </div>
                <div></div>
                <div>
                    <a href="/admin/absensi/create" class="btn btn-primary">
                        Tambah Data
                    </a>
                </div>
            </div>
            <table id="myTable" class="w-100">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Course</th>
                        <th>Code</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($absensis as $absensi)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td id="n{{$absensi->id}}">{{ $absensi->course->title }}</td>
                            <td>{{ $absensi->code }}</td>
                            <td>{{ $absensi->date }}</td>
                            <td>{{ $absensi->time }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="/admin/absensi/{{ $absensi->id }}/edit" class="h3">
                                        <i class="fas fa-edit m-1"></i>
                                    </a>
                                    <a href="#" class="h3" data-bs-toggle="modal" data-bs-target="#hapus"
                                        onclick='hapus("{{ $absensi->id }}")'>
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
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Absensi</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="post" id="formHapus">
                        @csrf
                        @method('DELETE')

                        <div class="form-group">
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
    <script>
        function hapus(id){
            $('#formHapus').attr('action', `/admin/absensi/${id}`);
            $("#dhapus").html("Apakah anda yakin ingin menghapus absensi kelas <b>"+$("#n"+id).text()+"</b>?");
        }
    </script>
@endsection
