@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <form action="/admin/blog/{{$blog->id}}" method="post">
            @csrf
            @method('PUT')
    
            <div class="card pt-5">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col">
                            <div class="form-group">
                                <div class="col">
                                    <label class="form-label">Judul</label>
                                    <input type="text" class="form-control" name="title" placeholder="Judul Blog" value="{{ old('title') ? old('title') : $blog->title }}">
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
                                    <input type="text" class="form-control" name="shortDesc" placeholder="Desc Singkat" value="{{ old('shortDesc') ? old('shortDesc') : $blog->short_desc }}">
                                    @error('shortDesc')
                                        <div class="error">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2 px-3">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Kategori Blog</label>
                                <select class="form-control form-select" name="blogCat">
                                    <option value="">Pilih Kategori Blog</option>
                                    @forelse ($blogCats as $blogCat)
                                        @if ((old('blogCat') ? old('blogCat') : $blog->blog_category_id) == $blogCat->id)
                                            <option value="{{ $blogCat->id }}" selected>{{ $blogCat->name }}</option>
                                        @else
                                            <option value="{{ $blogCat->id }}">{{ $blogCat->name }}</option>
                                        @endif
                                    @empty
                                        <option value="">No Data</option>
                                    @endforelse
                                </select>
                                @error('blogCat')
                                    <div class="error">*{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row px-3">
                        <div class="form-group">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="desc" style="resize: none; height: 20rem">{{ old('desc') ? old('desc') : $blog->desc  }}</textarea>
                            @error('desc')
                                <div class="error">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-end">
                            <button class="btn btn-success" type="submit">
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
