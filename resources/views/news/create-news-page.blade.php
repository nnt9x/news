@extends('layout/master')

@section('title','Trang chủ')

@section('content')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

    <style>
        .ck-editor__editable[role="textbox"] {
            /* Editing area */
            min-height: 300px;
        }
    </style>
    <h1>Tạo bản tin</h1>
    <form method="POST">
        @csrf
        <input name="title" class="form-control mt-3 mb-3" placeholder="Tiêu đề"/>
        <textarea id="editor" class="form-control mt-3" name="content"></textarea>
        <button type="submit" class="btn btn-primary btn-lg mt-3">Lưu</button>
    </form>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection
