@extends('admin.layouts.app')
@section('content')
<div class="main pt-3 pb-3">
    <h1>Sửa nhóm facebook</h1>
    <form action="/admin-communities/{{$community->id}}" method="post" class="mt-5" enctype="multipart/form-data">
        @csrf
        @method('put')
        <label class="mt-3" for="">Tên </label>
        <input type="text" name="name" class="form-control" value="{{$community->name}}">
        @error('name')
            <div style="color:red">{{$message}}</div>
        @enderror

        <label class="mt-3" for="">Thông tin (số thành viên - số bài viết 1 ngày) </label>
        <input type="text" name="infor" class="form-control " value="{{$community->infor}}">
        @error('infor')
            <div style="color:red">{{$message}}</div>
        @enderror
        <label class="mt-3" for="">Link </label>
        <input type="text" name="link" class="form-control " value="{{$community->link}}">
        @error('link')
            <div style="color:red">{{$message}}</div>
        @enderror
        <label class="mt-3" for="">Ảnh</label>
        <img src="{{asset('images/communities/' . $community->image)}}" style="width:200px; height:200px" alt=""
            class="mt-4 mb-2">
        <div class="input-group mb-3">
            <input type="file" class="form-control" name="image" id="inputGroupFile03"
                aria-describedby="inputGroupFileAddon03" aria-label="Upload">
        </div>
        @error('image')
            <div style="color:red">{{$message}}</div>
        @enderror
        <button class="btn btn-primary">Sửa</button>
    </form>
    @if (session('success'))
        <div class="alert alert-success mt-5" role="alert">
            Sửa thành công
        </div>
    @endif
</div>
@endsection