@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <div class="card p-5">
            <div class="d-flex justify-content-between mb-3">
                <div>
                    <h3>Data Vocabulary Category</h3>
                </div>
                <div></div>
                <div>
                    <button type="button" class="btn btn-primary" 
                            data-bs-toggle="modal" data-bs-target="#tambah">
                        Tambah Data
                    </button>
                </div>
            </div>
            <table id="myTable" class="w-100">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vocabCategories as $vocabCategory)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $vocabCategory->name }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="#" class="h3" data-bs-toggle="modal" data-bs-target="#edit"
                                        onclick='edit("{{ $vocabCategory->id }}")'>
                                        <i class="fas fa-edit m-1"></i>
                                    </a>
                                    <p id="{{ $vocabCategory->id }}" class="d-none">
                                        {{ $vocabCategory->name }}
                                    </p>

                                    <a href="#" class="h3" data-bs-toggle="modal" data-bs-target="#hapus"
                                        onclick='hapus("{{ $vocabCategory->id }}")'>
                                        <i class="fas fa-trash-alt m-1"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Vocabulary Category</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="material-icons">x</i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        @csrf

                        <div class="form-group">
                            <p>Nama Category</p>
                            <input type="text" class="form-control" name="name" required>
                            @error('name')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Vocabulary Category</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="material-icons">x</i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="formEdit">
                        @csrf
                        @method('PUT')

                        <input type="hidden" class="d-none" id="eId" name="id" required>
                        <div class="form-group">
                            <p>Nama Category</p>
                            <input type="text" class="form-control" name="name" id="eNama" required>
                            @error('name')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Vocabulary Category</h5>
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
        function edit(id) {
            var data = (document.getElementById(id).textContent).split(",")
            document.getElementById("eId").value = id;
            document.getElementById("eNama").value = data[0].trim()
            document.getElementById('formEdit').action = "/admin/vocabulary/category/" + id;
        }

        function hapus(id) {
            var data = (document.getElementById(id).textContent).split(",")
            document.getElementById("dId").value = id
            document.getElementById("dhapus").textContent = 'Apakah anda yakin ingin menghapus "' + data[0] + '"?'
            document.getElementById('formHapus').action = "/admin/vocabulary/category/" + id;
        }
    </script>
@endsection
