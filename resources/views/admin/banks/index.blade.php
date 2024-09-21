@extends('admin.layouts.app')
@section('content')
<div class="main pt-3 pb-3">
    <h1>Danh sách ngân hàng</h1>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            Xoá thành công
        </div>
    @endif
    <a href="/admin-banks/create" class="btn btn-success mb-2">Thêm</a>
    <table class="table">
        <thead>
            <th>STT</th>
            <th>Tên</th>
            <th>Chức năng</th>
        </thead>
        <tbody>
            @foreach ($banks as $bank)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$bank->name}}</td>
                    <td>
                        <form action="/admin-banks/{{$bank->id}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá?')">Xoá</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection