@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <div class="card p-5">
            <div class="d-flex justify-content-between mb-3">
                <div>
                    <h3>Data Kategori Blog</h3>
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
                    @forelse ($blogCats as $blogCat)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td id="n{{$blogCat->id}}">{{ $blogCat->name }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="#" class="h3" data-bs-toggle="modal" data-bs-target="#edit"
                                        onclick='edit("{{ $blogCat->id }}")'>
                                        <i class="fas fa-edit m-1"></i>
                                    </a>
                                    <a href="#" class="h3" data-bs-toggle="modal" data-bs-target="#hapus"
                                        onclick='hapus("{{ $blogCat->id }}")'>
                                        <i class="fas fa-trash-alt m-1"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No Data</td>
                            <td>No Data</td>
                            <td>No Data</td>
                      </tr>
                    @endforelse 
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kategori Blog</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="material-icons">x</i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        @csrf

                        <div class="form-group">
                            <p>Nama Kategori Blog</p>
                            <input type="text" class="form-control" name="name" id="nameAdd" required>
                            @error('name')
                                <span class="error">*{{ $message }}</span>
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
                    <h5 class="modal-title">Edit Kategori Blog</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="material-icons">x</i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="formEdit">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <p>Nama kategori Blog</p>
                            <input type="text" class="form-control" name="nameEdit" id="eNamaEdit" required>
                            @error('nameEdit')
                                <span class="error">*{{ $message }}</span>
                            @enderror

                            <input type="hidden" class="form-control" name="id" id="ID" required>
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
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori Blog</h5>
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
    @if (count($errors) > 0)
        @php $bag = $errors->getBag($__errorArgs[1] ?? 'default'); @endphp
        @if ($bag->has('nameEdit'))
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#edit').modal('show');
                    $("#eNamaEdit").val(<?= json_encode(old('nameEdit')) ?>);
                    $("#ID").val(<?= json_encode(old('id')) ?>);
                    $('#formEdit').attr('action', `/admin/blog/category/${$("#ID").val()}`);
                });
            </script>
        @elseif ($bag->has('name'))
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#tambah').modal('show');
                    $("#nameAdd").val(<?= json_encode(old('name')) ?>);
                });
            </script>
        @endif
    @endif
    
    <script type="text/javascript">
        function edit(id){
            $('#formEdit').attr('action', `/admin/blog/category/${id}`);
            $("#eNamaEdit").val($("#n"+id).text());
            $("#ID").val(id);
        }

        function hapus(id){
            $('#formHapus').attr('action', `/admin/blog/category/${id}`);
            $("#dhapus").text("Apakah anda yakin ingin menghapus "+$("#n"+id).text()+"?");
        }
    </script>
@endsection
