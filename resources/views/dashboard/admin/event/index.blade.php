@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <div class="card p-5">
            <div class="d-flex justify-content-between mb-3">
                <div>
                    <h3>Data Event</h3>
                    <span style="color:red">
                        <marquee class="move-text justify-content-center">
                            Event yang tidak punya gambar tidak akan terpublish
                        </marquee>
                    </span>
                </div>
                <div></div>
                <div>
                    <a href="/admin/event/create" class="btn btn-primary">
                        Tambah Data
                    </a>
                </div>
            </div>
            <table id="myTable" class="w-100">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Tipe</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($events as $event)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-left">
                                <span>
                                    <img src="{{ Storage::url('public/event/' . $event->image) }}" class="rounded" alt="" style="width:50px">
                                </span>
                                <span id="n{{$event->id}}">{{ $event->title }}</span>
                            </td>
                            <td>{{ $event->date }}</td>
                            <td>
                                @if ($event->type == 0)
                                    <button class="badge bg-primary" disabled>Lomba</button>
                                @endif
                                @if ($event->type == 1)
                                    <button class="badge bg-warning" disabled>Seminar</button>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="#" onclick="updateImage({{ $event->id }})" class="h3" data-bs-toggle="modal" data-bs-target="#image">
                                        <i class="fas fa-image m-1"></i>
                                    </a>
                                    <a href="/admin/event/{{ $event->id }}/edit" class="h3">
                                        <i class="fas fa-edit m-1"></i>
                                    </a>
                                    <a href="#" class="h3" data-bs-toggle="modal" data-bs-target="#hapus"
                                        onclick='hapus("{{ $event->id }}")'>
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
                            <td>No Data</td>
                            <td>No Data</td>
                      </tr>
                    @endforelse 
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
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Event</h5>
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
        <script type="text/javascript">
            $(document).ready(function() {
                
                $('#image').modal('show');
                $("#ID").val(<?= json_encode(old('id')) ?>);
                $('#editImage').attr('action', `/admin/event/${$("#ID").val()}/update/image`);
            });
        </script>
    @endif

    <script>
        function updateImage(id) {
            $('#editImage').attr('action', `/admin/event/${id}/update/image`)
            $('#ID').val(id)
        }
        function hapus(id){
            $('#formHapus').attr('action', `/admin/event/${id}`);
            $("#dhapus").text("Apakah anda yakin ingin menghapus "+$("#n"+id).text()+"?");
        }
    </script>
@endsection
