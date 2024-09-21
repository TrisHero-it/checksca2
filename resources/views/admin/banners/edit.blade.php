@extends('admin.layouts.app') 
@section('content')
<div class="main pt-3 pb-3">

    <h1>Sửa banner</h1>

    <form action="/admin-banners/{{$banner->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <label for="exampleInputEmail1" class="form-label">Ảnh</label>
        <div class="mb-3">
            <img src="{{asset('images/banner/' . $banner->images)}}" style="width:400px; height:200px" class="mb-3"
                alt="">
            <input type="file" class="form-control" id="exampleInputEmail1" name="images" aria-describedby="emailHelp">
        </div>
        <label for="exampleInputEmail1" class="form-label">Trạng thái</label>
        <div class="mb-3">
            <select class="form-select" name="status" aria-label="Default select example">
                <option value="on">on</option>
                <option @if ($banner->status=='off')
                    selected
                @endif value="off">off</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Sửa</button>
    </form>
    @if (session('success'))
            <div class="alert alert-success mt-5" role="alert">
                Sửa thành công
            </div>
        @endif
</div>
@endsection