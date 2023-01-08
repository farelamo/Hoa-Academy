@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <div class="card p-5">
            <div class="d-flex justify-content-between mb-3">
                <div>
                    <h3>Data Course</h3>
                    <span style="color:red">
                        <marquee class="move-text justify-content-center">
                            Course yang tidak punya gambar dan chapter tidak akan terpublish
                        </marquee>
                    </span>
                </div>
                <div></div>
                <div>
                    <a href="/admin/course/create">
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
                        <th>Nama Kelas</th>
                        <th>Tipe</th>
                        <th>Tipe HSK</th>
                        <th>Level</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($course as $data)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-left">
                                <span>
                                    <img src="{{ Storage::url('public/course/' . $data->image) }}" class="rounded" alt="" style="width:25px">
                                </span>
                                <span id="n{{$data->id}}">{{ $data->title }}</span>
                            </td>
                            <td>{{ $data->type }}</td>
                            <td>{{ $data->hsk_type }}</td>
                            <td>{{ $data->level }}</td>
                            <td>
                                @if (strlen($data->price) > 5)
                                    Rp. {{ implode(".", str_split($data->price, 3)) }}
                                @else
                                    Rp. {{ substr($data->price,0,2).'.'.substr($data->price,2) }}
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="#" onclick="updateImage({{ $data->id }})" class="h3" data-bs-toggle="modal" data-bs-target="#image">
                                        <i class="fas fa-image m-1"></i>
                                    </a>
                                    <a href="/admin/course/{{$data->id}}/edit" class="h3">
                                        <i class="fas fa-edit m-1"></i>
                                    </a>
                                    <p id="{{ $data->id }}" class="d-none">
                                        {{ $data->title }}
                                    </p>

                                    <a href="#" class="h3" data-bs-toggle="modal" data-bs-target="#hapus"
                                        onclick='hapus("{{ $data->id }}")'>
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

    <div class="modal fade" id="image" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Gambar</h5>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="post" id="editImage" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
      
                        <div class="form-group">
                            <label class="form-label">Upload Gambar</label>
                          <input type="file" class="form-control" id="ii" name="image">
                          @error('image')
                            <div class="error">*{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-12">
                          <input type="text" class="form-control visually-hidden" id="ID" name="id" required>
                        </div>
                        <div class="modal-footer px-0 py-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success" name="submit" value="update"><i
                                    class="fa fa-save"></i><span> Save</span></button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Course</h5>
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
            document.getElementById('formHapus').action     = "/admin/course/" + id;
        }
    </script>

    @if (count($errors) > 0)
    <script type="text/javascript">
        $(document).ready(function() {
            
            $('#image').modal('show');
            $("#ID").val(<?= json_encode(old('id')) ?>);
            $('#editImage').attr('action', `/admin/course/${$("#ID").val()}/update/image`);
        });
    </script>
    @endif

    <script>
    function updateImage(id) {
        $('#editImage').attr('action', `/admin/course/${id}/update/image`)
        $('#ID').val(id)
    }
    </script>
@endsection
