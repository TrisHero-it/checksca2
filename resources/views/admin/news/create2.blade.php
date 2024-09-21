@extends('admin.layouts.app')
@section('link')
    <link rel="stylesheet" href="{{asset('assets/css/plugins/bootstrap-timepicker.min.css')}}">
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
@endsection
@section('content')
    <div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification">

    </div>
    <div class="col-md-12" id="post">
        <div class="card">
            <div class="card-header">
                <h5>Thêm tin tức</h5>
            </div>

            <form action="{{route('admin-news.store2')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label" for="exampleInputEmail1">Link bài viết (thegioididong.com)</label>
                        <input name="link" type="text" onkeyup="checkMetaSeo()" class="form-control" placeholder= "Link của bài viết muốn thêm">
                        <div class="thongbao" style="font-size: .875em; color: red"></div>
                    </div>

                    <div class="mb-3 d-flex">
                        <button class="btn btn-success">Thêm bài viết</button>
                    </div>

                </div>
            </form>
        </div>
    </div>


@endsection
