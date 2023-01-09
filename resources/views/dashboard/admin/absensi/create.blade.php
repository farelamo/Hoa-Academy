@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <form action="/admin/absensi" method="post">
            @csrf
    
            <div class="card pt-5">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col">
                            <div class="form-group">
                                <div class="col">
                                    <label class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" name="date" placeholder="Tanggal Absensi" value="{{ old('date') }}">
                                    @error('date')
                                        <div class="error">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <div class="col">
                                    <label class="form-label">Waktu</label>
                                    <input type="time" class="form-control" name="time" placeholder="Waktu Mulai Absensi" value="{{ old('time') }}">
                                    @error('time')
                                        <div class="error">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2 px-3">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Course</label>
                                <select class="form-control form-select" name="course_id">
                                    <option value="">Pilih Course</option>
                                    @forelse ($courses as $course)
                                        @if (old('course_id') == $course->id)
                                            <option value="{{ $course->id }}" selected>{{ $course->title }}</option>
                                        @else
                                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                                        @endif
                                    @empty
                                        <option value="">No Data</option>
                                    @endforelse
                                </select>
                                @error('course')
                                    <div class="error">*{{ $message }}</div>
                                @enderror
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
