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
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
    <div class="container">
        <div class="card p-5">
            <div class="d-flex justify-content-between mb-3">
                <div>
                    <h3>Tambah Chapter</h3>
                </div>
            </div>
            <div class="card-body">
                <form action="/admin/chapter" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <div class="col">
                            <label for="title" class="form-label">Nama Chapter</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ old('title') }}">
                            @error('title')
                                <div class="error">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="form-label">Course</label>
                            <select name="course_id" class="form-select select_box tipe">
                                <option value="">-- Pilih Course --</option>
                                @forelse ($courses as $course)
                                    @if (old('course_id'))
                                        @if (old('course_id') == $course->id)
                                            <option value="{{ $course->id }}" selected>{{ $course->title }}</option>
                                        @else
                                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                                        @endif
                                    @else
                                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                                    @endif
                                @empty
                                    <option value="">Belum ada data</option>
                                @endforelse
                            </select>
                            @error('course_id')
                                <div class="error">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="ordinal" class="form-label">Urutan Chapter</label>
                            <input type="number" class="form-control px-4" min="1" id="ordinal" name="ordinal"
                                value="{{ old('ordinal') }}">
                            @error('ordinal')
                                <div class="error">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="short_desc" class="form-label">Deskripsi Singkat</label>
                        <textarea class="form-control" name="short_desc" id="short_desc">{{ old('short_desc') }}</textarea>
                        @error('short_desc')
                            <div class="error">*{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" name="content" id="summernote">{{ old('content') }}</textarea>
                        @error('content')
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>        
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js" integrity="sha512-6F1RVfnxCprKJmfulcxxym1Dar5FsT/V2jiEUvABiaEiFWoQ8yHvqRM/Slf0qJKiwin6IDQucjXuolCfCKnaJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $.ajax({
            url: 'https://api.github.com/emojis',
            async: false 
        }).then(function(data) {
            window.emojis = Object.keys(data);
            window.emojiUrls = data; 
        })
        
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'untuk emoji diawali tanda : (titik dua) lalu diikuti alphabet bebas',
                tabsize: 2,
                height: 400,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                hint: {
                    match: /:([\-+\w]+)$/,
                    search: function (keyword, callback) {
                        callback($.grep(emojis, function (item) {
                            return item.indexOf(keyword)  === 0;
                        }));
                    },
                    template: function (item) {
                        var content = emojiUrls[item];
                        return '<img src="' + content + '" width="20" /> :' + item + ':';
                    },
                    content: function (item) {
                        var url = emojiUrls[item];
                        if (url) {
                            return $('<img />').attr('src', url).css('width', 20)[0];
                        }
                        return '';
                    }
                }
            })

            $('.note-editor .note-btn.btn.dropdown-toggle').on('click', function() {
                $(this).toggleClass('show');
                $(this).next().toggleClass('show');
            });

            $('.note-editor .dropdown-item, .note-editor .note-color-btn, .note-editor .note-btn-group.note-align .note-btn.btn')
                .on('click', function() {
                    $('.note-editor .show').removeClass('show');
            });
            // $('.dropdown-bs-toggle').dropdown()
        })

        
    </script>
    
@endsection
