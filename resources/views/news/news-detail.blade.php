@extends('layout/master')

@section('title','Chi tiết bản tin')

@section('content')
    @if($news == null)
        <div class="alert alert-danger" role="alert">
            Không có bản tin!
        </div>
    @else
        <h1>{{$news->title}}</h1>
        <p>Ngày tạo: {{$news->created_at}}</p>
        <div>
            {!! $news->content !!}
        </div>
    @endif

@endsection
