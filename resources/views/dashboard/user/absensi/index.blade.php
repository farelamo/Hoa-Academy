@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <form action="/dashboard/absensi" method="post">
            @csrf
    
            <div class="card pt-5">
                <div class="card-body">
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
                    <div class="row mb-2">
                        <div class="col">
                            <div class="form-group">
                                <div class="col">
                                    <label class="form-label">Masukkan Kode</label>
                                    <input type="code" class="form-control" name="code" placeholder="Kode Absensi" value="{{ old('code') }}">
                                    @error('code')
                                        <div class="error">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-end">
                            <button class="btn btn-success" type="submit">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
