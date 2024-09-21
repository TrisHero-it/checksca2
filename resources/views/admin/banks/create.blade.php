@extends('admin.layouts.app')
@section('content')
<div class="main pt-3 pb-3">
    <div style="width:300px; margin:0 auto">
        <h1 class="text-center">Thêm ngân hàng</h1>
        <form action="/admin-banks" method="POST">
            @csrf
            <label for="">Tên ngân hàng</label> <br>
            <input class="form-control" type="text" name="name">
            @error('name')
                <div style="color:red">{{$message}}</div>
            @enderror
            <button type="submit" style="margin-top: 11px;" class="btn btn-primary">Thêm</button>
        </form>
        @if (session('success'))
            <div class="alert alert-success mt-5" role="alert">
                Thêm thành công
            </div>
        @endif

    </div>
</div>
@endsection