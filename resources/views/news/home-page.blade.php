@extends('layout/master')

@section('title','Trang chủ')

@section('content')
    <h1 class="text-center display-6">Tin tức </h1>

    <a class="btn btn-primary mb-3" href="/home/create">Thêm bản tin</a>

    <table class="table table-bordered table-hover">
        <tr class="table-active text-center ">
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
        </tr>
        @forelse($allNews as $news)
            <tr>
                <td class="text-center">{{$news->id}}</td>
                <td class="fw-bold">{{$news->title}}</td>
                <td>{{$news->created_at}}</td>
                <td class="d-flex justify-content-around align-items-center">
                    <a class="btn btn-sm btn-info" href="/home/news/{{$news->id}}">
                        Xem
                    </a>
                    <form onsubmit="return confirm('Bạn có muốn xoá?')" method="POST" action="/home/news/{{$news->id}}">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm btn-danger">Xoá</button>
                    </form>
                    <a class="btn btn-sm btn-warning" href="/home/news/{{$news->id}}/edit">
                        Sửa
                    </a>
                </td>
            </tr>
        @empty
        @endforelse
    </table>
@endsection
