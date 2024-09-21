@extends('admin.layouts.app') 
@section('content')
<div class="main pt-3 pb-3">
    <h1 class="text-center">Thêm banner</h1>
    <form action="/admin-banners" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="exampleInputEmail1" class="form-label">Ảnh</label>
        <div class="mb-3">
            <input type="file" name="images" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <label for="exampleInputEmail1" class="form-label">Trạng thái</label>
        <div class="mb-3">
            <select class="form-select" name="status" aria-label="Default select example">
                <option value="on">on</option>
                <option value="off">off</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
    @if (session('success'))
            <div class="alert alert-success mt-5" role="alert">
                Thêm thành công
            </div>
        @endif
</div>
@endsection