@extends('admin.layouts.app')
@section('content')
    <div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification">

    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Sửa danh mục</h5>
            </div>
            @section('link')
                <link rel="stylesheet" href="{{asset('assets/js/plugins/uppy/uppy.min.css')}}">
            @endsection
            <div class="card-body">
                <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="exampleInputEmail1">Tên danh mục</label>
                        <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp" placeholder="Tên danh mục" value="{{$category->name}}">
                        <div class="thongbao" style="font-size: .875em; color: red"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="exampleInputEmail1">Ảnh danh mục</label>
                        <img style="width: 200px; height: auto" src="{{\Illuminate\Support\Facades\Storage::url($category->image)}}" alt="">
                        <input name="image" type="file" class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp" placeholder="Tên danh mục">
                        <div class="thongbao" style="font-size: .875em; color: red"></div>
                    </div>

                    <button type="submit" class="btn btn-success">Sửa bài vết</button>
                </form>
            </div>
        </div>
    </div>

    @if(session('success'))
        <script !src="">
            let html = `
        <div class="toast toast-3 mb-2 fade show" id="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="{{'images/design/favicon_io/favicon.ico'}}" alt="" class="img-fluid m-r-5" style="width:20px;">
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
