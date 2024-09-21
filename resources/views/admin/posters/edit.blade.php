@extends('admin.layouts.app') 
@section('content')
<div class="main pt-3 pb-3">

    <h1>Sửa poster</h1>

    <form action="/admin-posters/{{$poster->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <label for="exampleInputEmail1" class="form-label">Ảnh</label>
        <div class="mb-3">
            <img src="{{asset('images/posters/' . $poster->image)}}" style="width:200px;" class="mb-3" alt="">
            <input type="file" class="form-control" id="exampleInputEmail1" name="image" aria-describedby="emailHelp">
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