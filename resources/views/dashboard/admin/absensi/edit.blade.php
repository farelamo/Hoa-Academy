@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <form action="/admin/absensi/{{$absensi->id}}" method="post">
            @csrf
            @method('PUT')
            
            <div class="card pt-5">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col">
                            <div class="form-group">
                                <div class="col">
                                    <label class="form-label">Waktu</label>
                                    <input type="time" class="form-control" name="time" placeholder="Waktu Mulai Absensi" value="{{ old('time') ?? $absensi->time }}">
                                    @error('time')
                                        <div class="error">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
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
