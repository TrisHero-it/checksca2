@extends('admin.layouts.app') 
@section('content')
<div class="main pt-3 pb-3">

    <h1>Danh sách banner</h1>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            Xoá thành công
        </div>
    @endif
    <a href="/admin-banners/create" class="btn btn-success mb-2">Thêm banner </a>
    <table class="table">
        <thead>
            <th>STT</th>
            <th>Hình ảnh</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </thead>
        <tbody>
            @foreach ($banners as $banner)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><img src="{{asset('images/banner/' . $banner->images)}}" style="width:150px; height:150px" alt="">
                    </td>
                    <td>
                        @if ($banner->status == 'on')
                            <button class="btn btn-success">{{$banner->status}}</button>
                        @else
                            <button class="btn btn-danger">{{$banner->status}}</button>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex justify-content-between" style="width:120px">
                            <a href="/admin-banners/{{$banner->id}}/edit" class="btn btn-warning">Sửa</a>
                            <form action="/admin-banners/{{$banner->id}}" method="post">
                                @csrf
                                @method('delete')
                                <button onclick="return confirm('Bạn có muốn xoá không?')"
                                    class="btn btn-danger">Xoá</button>
                            </form>
                        </div>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection