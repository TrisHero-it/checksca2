@extends('admin.layouts.app') 
@section('content')

<div class="main pt-3 pb-3">
<h1>Danh sách poster quảng cáo</h1>

<table class="table">
    <thead>
        <th>STT</th>
        <th>Ảnh</th>
        <th>Chức năng</th>
    </thead>
    <tbody>
        @foreach ($posters as $poster)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td><img src="{{asset('images/posters/'.$poster->image)}}" style="width: 200px;" alt=""></td>
                <td><a href="/admin-posters/{{$poster->id}}/edit" class="btn btn-warning">Sửa</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection