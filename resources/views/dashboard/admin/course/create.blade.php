@extends('dashboard.layouts.app')

@push('head')
    <style>
        .select_box {
            border-radius: 8px
        }

        .error {
            color: red
        }

        #short_desc {
            min-height: 50px;
            resize: none
        }

        #desk {
            min-height: 150px;
            resize: none
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="card p-5">
            <div class="d-flex justify-content-between mb-3">
                <div>
                    <h3>Tambah Course</h3>
                </div>
            </div>
            <div class="card-body">
                <form action="/admin/course" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="title" class="form-label">Nama Course</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ old('title') }}">
                            @error('title')
                                <div class="error">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="level" class="form-label">Level</label>
                            <input type="number" class="form-control px-4" min="1" id="level" name="level"
                                value="{{ old('level') }}">
                            @error('level')
                                <div class="error">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="level" class="form-label">Tipe HSK</label>
                            <select name="hsk_type" class="form-select select_box tipe">
                                <option value="">-- Pilih Tipe HSK --</option>
                                @if (old('hsk_type'))
                                    @if (old('hsk_type') == '1')
                                        <option value="1" selected>1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    @elseif (old('hsk_type') == '2')
                                        <option value="1">1</option>
                                        <option value="2" selected>2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    @elseif (old('hsk_type') == '3')
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3" selected>3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    @elseif (old('hsk_type') == '4')
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4" selected>4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    @elseif (old('hsk_type') == '5')
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5" selected>5</option>
                                        <option value="6">6</option>
                                    @else
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6" selected>6</option>
                                    @endif
                                @else
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                @endif
                            </select>
                            @error('hsk_type')
                                <div class="error">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="price" class="form-label">Harga</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">Rp</span>
                                <input type="number" class="form-control" id="price" min="0" name="price"
                                    value="{{ old('price') }}">
                            </div>
                            @error('price')
                                <div class="error">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="meet_times" class="form-label">Kali Pertemuan</label>
                            <input type="number" class="form-control px-4" id="meet_times" min="1" name="meet_times"
                                value="{{ old('meet_times') }}">
                            @error('meet_times')
                                <div class="error">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="duration" class="form-label">Durasi Belajar/hari (Jam)</label>
                            <input type="number" class="form-control px-4" id="duration" min="1" name="duration"
                                value="{{ old('duration') }}">
                            @error('duration')
                                <div class="error">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="group_link" class="form-label">Link Group</label>
                            <input type="text" class="form-control" id="group_link" name="group_link"
                                value="{{ old('group_link') }}">
                            @error('group_link')
                                <div class="error">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="meet_link" class="form-label">Link Meet</label>
                            <input type="text" class="form-control px-4" id="meet_link" name="meet_link"
                                value="{{ old('meet_link') }}">
                            @error('meet_link')
                                <div class="error">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3 mx-1">
                        <label for="type" class="form-label">Tipe Kelas</label>
                        <select name="type" class="form-select select_box tipe" id="tipe_kelas">
                            <option value="0">-- Pilih Tipe Kelas --</option>
                            @if (old('type'))
                                @if (old('type') == 'regular')
                                    <option value="regular" selected>Regular</option>
                                    <option value="business">Business</option>
                                @elseif (old('type') == 'business')
                                    <option value="business" selected>Business</option>
                                    <option value="regular">Regular</option>
                                @endif
                            @else
                                <option value="regular">Regular</option>
                                <option value="business">Business</option>
                            @endif
                        </select>
                        @error('type')
                            <div class="error">*{{ $message }}</div>
                         @enderror
                    </div>
                    <div class="row mb-3 mx-1" id="tipe_bisnis" style="display: none">
                        <label for="business_type" class="form-label">Tipe Kelas Bisnis</label>
                        <select name="business_type" class="form-select select_box bisnis" id="valBisnis">
                            <option value="">-- Pilih Tipe Kelas Bisnis --</option>
                            @if (old('business_type'))
                                @if (old('business_type') == 'elementary')
                                    <option value="elementary" selected>Elementary</option>
                                    <option value="intermediate">Intermediate</option>
                                    <option value="advance">Advance</option>
                                @elseif (old('business_type') == 'intermediate')
                                    <option value="elementary">Elementary</option>
                                    <option value="intermediate" selected>Intermediate</option>
                                    <option value="advance">Advance</option>
                                @elseif (old('business_type') == 'advance')
                                    <option value="elementary">Elementary</option>
                                    <option value="intermediate">Intermediate</option>
                                    <option value="advance" selected>Advance</option>
                                @else
                                    <option value="elementary">Elementary</option>
                                    <option value="intermediate">Intermediate</option>
                                    <option value="advance">Advance</option>
                                @endif
                            @else
                                <option value="elementary">Elementary</option>
                                <option value="intermediate">Intermediate</option>
                                <option value="advance">Advance</option>
                               @endif
                        </select>
                        @error('business_type')
                               <div class="error">*{{ $message }}</div>
                           @enderror
                    </div>
                    <div class="mb-3">
                        <label for="short_desc" class="form-label">Deskripsi Singkat</label>
                        <textarea class="form-control" name="short_desc" id="short_desc">{{ old('short_desc') }}</textarea>
                        @error('short_desc')
                            <div class="error">*{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="desc" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="desc" id="desk">{{ old('desc') }}</textarea>
                        @error('desc')
                            <div class="error">*{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @if (old('tipe_kelas') == 'business')
        <script type="text/javascript">
            $('#tipe_kelas').val("business")
            $('#tipe_bisnis').show()
        </script>
    @elseif (old('tipe_kelas') == 'regular')
        <script type="text/javascript">
            $('#tipe_kelas').val("regular")
        </script>
    @endif

    @if (count($errors) > 0)
        @php $bag = $errors->getBag($__errorArgs[1] ?? 'default'); @endphp
        @if ($bag->has('business_type'))
            <script type="text/javascript">
                $('#tipe_kelas').val('business')
                $('#tipe_bisnis').show()
                $('#valBisnis').val("")
            </script>
        @elseif ($bag->has('tipe_kelas'))
            <script>
                $('#tipe').val("3")
                $('#tipe_bisnis').hide()
                $('#valBisnis').val("")
            </script>
        @endif
    @endif

    <script>
        $("#tipe_kelas").change(function(){
            console.log($('#tipe_kelas').val());
            
            if ($('#tipe_kelas').val() == 'business'){
                $('#tipe_bisnis').show()
                $('#valBisnis').val("")
            }else {
                $('#tipe_bisnis').hide()
                $('#valBisnis').val("")
            }
        })
    </script>
@endsection
