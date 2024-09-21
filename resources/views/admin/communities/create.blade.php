@extends('admin.layouts.app')
@section('content')
<div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification">

</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Thêm nhóm facebook</h5>
        </div>
        <div class="card-body">
            <form action="/admin-communities" method="post" class="" enctype="multipart/form-data">
                @csrf
                <label class="" for="">Tên </label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                @error('name')
                <div style="color:red">{{$message}}</div>
                @enderror

                <label class="mt-3" for="">Thông tin (số thành viên - số bài viết 1 ngày) </label>
                <input type="text" name="infor" class="form-control " value="{{old('infor')}}" placeholder="Công khai . 301,9K thành viên . 10 bài viết / ngày">
                @error('infor')
                <div style="color:red">{{$message}}</div>
                @enderror
                <label class="mt-3" for="">Link </label>
                <input type="text" name="link" class="form-control " value="{{old('link')}}">
                @error('link')
                <div style="color:red">{{$message}}</div>
                @enderror
                <label class="mt-3" for="">Ảnh</label>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" name="image" id="inputGroupFile03" value="{{old('image')}}"
                           aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                </div>
                @error('image')
                <div style="color:red">{{$message}}</div>
                @enderror
                <button class="btn btn-primary">Thêm</button>
            </form>
        </div>
    </div>
</div>

@if(session('success'))
    <script !src="">
        let html = `
        <div class="toast toast-3 mb-2 fade show" id="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="{{asset('images/design/favicon_io/favicon.ico')}}" alt="" class="img-fluid m-r-5" style="width:20px;">
                <strong class="me-auto">CheckSca</strong>
                <small class="text-muted">1 Giây</small>
                <button type="button" class="m-l-5 mb-1 mt-1 btn-close" data-bs-dismiss="toast" aria-label="Close">
                </button>
            </div>
            <div class="toast-body">
                Thêm thành công !!
            </div>
        </div> `
        $('#notification').prepend(html)
        setTimeout(()=> {
            let a = document.getElementById('toast');
            a.style.transition = '0.2s ease all';
            a.style.transform = 'translateX(200%)';
            setTimeout(()=> {
                document.getElementById('toast').remove()
            }, 1000)
        }, 2000)
    </script>
@endif


@endsection
