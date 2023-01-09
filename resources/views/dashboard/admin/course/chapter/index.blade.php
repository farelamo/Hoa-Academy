@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <div class="card p-5">
            <div class="d-flex justify-content-between mb-3">
                <div>
                    <h3>Data Chapter</h3>
                </div>
                <div></div>
                <div>
                    <a href="/admin/chapter/create">
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
                        <th>Judul</th>
                        <th>Course</th>
                        <th>Urutan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($chapters as $chapter)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td id="n{{$chapter->id}}">{{ $chapter->title }}</td>
                            <td>{{ $chapter->course->title }}</td>
                            <td>{{ $chapter->ordinal }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="/admin/chapter/{{$chapter->id}}/edit" class="h3">
                                        <i class="fas fa-edit m-1"></i>
                                    </a>
                                    <p id="{{ $chapter->id }}" class="d-none">
                                        {{ $chapter->title }}
                                    </p>

                                    <a href="#" class="h3" data-bs-toggle="modal" data-bs-target="#hapus"
                                        onclick='hapus("{{ $chapter->id }}")'>
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
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Chapter</h5>
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
        function hapus(id) {
            var data = (document.getElementById(id).textContent).split(",")
            document.getElementById("dId").value            = id
            document.getElementById("dhapus").textContent   = 'Apakah anda yakin ingin menghapus "' + data[0] + '"?'
            document.getElementById('formHapus').action     = "/admin/chapter/" + id;
        }
    </script>
@endsection
