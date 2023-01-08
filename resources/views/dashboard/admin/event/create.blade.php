@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <form action="/admin/event" method="post">
            @csrf
    
            <div class="card pt-5">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col">
                            <div class="form-group">
                                <div class="col">
                                    <label class="form-label">Judul</label>
                                    <input type="text" class="form-control" name="title" placeholder="Judul Event" value="{{ old('title') }}">
                                    @error('title')
                                        <div class="error">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <div class="col">
                                    <label class="form-label">Deskripsi Singkat</label>
                                    <input type="text" class="form-control" name="short_desc" placeholder="Desc Singkat" value="{{ old('short_desc') }}">
                                    @error('short_desc')
                                        <div class="error">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2 px-3">
                        <div class="col">
                            <div class="form-group pr-3">
                                <label class="form-label">Tipe Event</label>
                                <select class="form-control form-select" name="type" id="type">
                                    <option value="" selected>Pilih Tipe Event</option>
                                    @if (old('type'))
                                        @if (old('type') == 0)
                                            <option value="0" selected>Lomba</option>
                                            <option value="1">Seminar</option>
                                        @elseif (old('type') == 1)
                                            <option value="0">Lomba</option>
                                            <option value="1" selected>Seminar</option>
                                        @endif
                                    @else
                                        <option value="0">Lomba</option>
                                        <option value="1">Seminar</option>
                                    @endif
                                </select>
                                @error('type')
                                    <div class="error">*{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group pl-3">
                                <label class="form-label">Tipe Pertemuan</label>
                                <select class="form-control form-select" id="tipe" name="meet_type">
                                    <option value="3" selected>Pilih Tipe Pertemuan</option>
                                    @if (old('meet_type'))
                                        @if (old('meet_type') == 1)
                                            <option value="1" selected>Online</option>
                                            <option value="2">Offline</option>
                                        @elseif (old('meet_type') == 2)
                                            <option value="1">Online</option>
                                            <option value="2" selected>Offline</option>
                                        @else 
                                            <option value="1">Online</option>
                                            <option value="2">Offline</option>
                                        @endif
                                    @else
                                        <option value="1">Online</option>
                                        <option value="2">Offline</option>
                                    @endif
                                </select>
                                @error('meet_type')
                                    <div class="error">*{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <div class="form-group">
                                <div class="col">
                                    <label class="form-label">Date</label>
                                    <input type="date" class="form-control" name="date" placeholder="Tanggal Event" value="{{ old('date') }}">
                                    @error('date')
                                        <div class="error">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <div class="col">
                                    <label class="form-label">Maximal Peserta</label>
                                    <input type="number" class="form-control" name="max" min="0" placeholder="Maximal Peserta" value="{{ old('max') }}">
                                    @error('max')
                                        <div class="error">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <div class="form-group">
                                <div class="col">
                                    <label class="form-label">Jam Dimulai</label>
                                    <input type="time" class="form-control" name="start" placeholder="Jam Dimulai" value="{{ old('start') }}">
                                    @error('start')
                                        <div class="error">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <div class="col">
                                    <label class="form-label">Jam Berakhir</label>
                                    <input type="time" class="form-control" name="end" placeholder="Jam Berakhir" value="{{ old('end') }}">
                                    @error('end')
                                        <div class="error">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row px-3" id="meet_link" style="display: none">
                        <div class="form-group">
                            <label class="form-label">Link Event</label>
                            <input type="text" class="form-control" id="valLink" name="link" placeholder="Link Event" value="{{ old('link') }}">
                            @error('link')
                                <div class="error">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row px-3" id="meet_location" style="display: none">
                        <div class="form-group">
                            <label class="form-label">Lokasi Event</label>
                            <input type="text" class="form-control" name="location" id="valLocation" placeholder="Lokasi Event" value="{{ old('location') }}">
                            @error('location')
                                <div class="error">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row px-3">
                        <div class="form-group">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="desc" style="resize: none; height: 20rem">{{ old('desc') }}</textarea>
                            @error('desc')
                                <div class="error">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-end">
                            <button class="btn btn-success" type="submit">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    @if (old('meet_type') == 1)
        <script type="text/javascript">
            $('#tipe').val("1")
            $('#meet_location').hide()
            $('#valLocation').val("")
            $('#meet_link').show()
        </script>
    @elseif (old('meet_type') == 2)
        <script type="text/javascript">
            $('#tipe').val("2")
            $('#meet_location').show()
            $('#meet_link').hide()
            $('#valLink').val("")
        </script>
    @endif

    @if (old('type') == 0)
        <script type="text/javascript">
            $('#type').val("0")
        </script>
    @elseif (old('type') == 1)
        <script type="text/javascript">
            $('#type').val("1")
        </script>
    @endif

    @if (count($errors) > 0)
        @php $bag = $errors->getBag($__errorArgs[1] ?? 'default'); @endphp
        @if ($bag->has('link'))
            <script type="text/javascript">
                $('#tipe').val("1")
                $('#meet_location').hide()
                $('#valLocation').val("")
                $('#meet_link').show()
            </script>
        @elseif ($bag->has('location'))
            <script type="text/javascript">
                $('#tipe').val("2")
                $('#meet_location').show()
                $('#meet_link').hide()
                $('#valLink').val("")
            </script>
        @elseif ($bag->has('meet_type'))
            <script>
                $('#tipe').val("3")
                $('#meet_location').hide()
                $('#valLocation').val("")
                $('#meet_link').hide()
                $('#valLink').val("")
            </script>
        @endif
    @endif
    <script>
        $("#tipe").change(function(){
            if ($('#tipe').val() == 3){
                $('#meet_location').hide()
                $('#valLocation').val("")
                $('#meet_link').hide()
                $('#valLink').val("")
            }
            console.log($('#tipe').val());
            if ($('#tipe').val() == 1) {
                $('#meet_location').hide()
                $('#valLocation').val("")
                $('#meet_link').show()
            }else if($('#tipe').val() == 2){
                $('#meet_location').show()
                $('#meet_link').hide()
                $('#valLink').val("")
            }
        })
    </script>
@endsection
