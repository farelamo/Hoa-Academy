@extends('dashboard.layouts.app')

@push('head')
    <style>
        .select_box {
            border-radius: 8px
        }

        .error {
            color: red
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="card p-5">
            <div class="d-flex justify-content-between mb-3">
                <div>
                    <h3>Tambah Vocabulary Field</h3>
                </div>
            </div>
            <div class="card-body">
                <form action="/admin/vocabulary/field" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="word" class="form-label">Tulisan</label>
                            <input type="text" class="form-control" id="word" name="word"
                                value="{{ old('word') }}">
                            @error('word')
                            <div class="error">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="vocal" class="form-label">Pelafalan</label>
                            <input type="text" class="form-control" id="vocal" name="vocal"
                                value="{{ old('vocal') }}">
                            @error('vocal')
                            <div class="error">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="mean" class="form-label">Terjemahan</label>
                                <input type="text" class="form-control" id="mean" name="mean"
                                    value="{{ old('mean') }}">
                                @error('mean')
                                    <div class="error">*{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="sound" class="form-label">Suara</label>
                                <input type="file" class="form-control px-4" id="sound" name="sound"
                                    value="{{ old('sound') }}">
                                @error('sound')
                                    <div class="error">*{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="form-label">Jenis Vocabulary</label>
                            <select name="vocabulary_id" class="form-select select_box">
                                <option value="">-- Pilih Jenis Vocabulary --</option>
                                @foreach ($vocabs as $vocab)
                                    @if (old('vocabulary_id') == $vocab->id)
                                        <option value="{{ $vocab->id }}" selected>{{ $vocab->name }}</option>
                                    @else
                                        <option value="{{ $vocab->id }}">{{ $vocab->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('vocabulary_id')
                                <div class="error">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label class="form-label">Kategori Vocabulary</label>
                            <select name="vocabulary_category_id" class="form-select select_box">
                                <option value="">-- Pilih Kategori Vocabulary --</option>
                                @foreach ($vocabCats as $vocabCat)
                                    @if (old('vocabulary_category_id') == $vocabCat->id)
                                        <option value="{{ $vocabCat->id }}" selected>{{ $vocabCat->name }}</option>
                                    @else
                                        <option value="{{ $vocabCat->id }}">{{ $vocabCat->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('vocabulary_category_id')
                                <div class="error">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
