@extends('admin.layouts.app')
@section('content')
<div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification">

</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Tinh chỉnh hợp đồng</h5>
        </div>
        <div class="card-body">
            <form action="/admin-contracts/{{$contract->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <label for="">Tên hợp đồng</label> <br>
                <input class="form-control" type="text" name="name" value="{{$contract->name}}">
                @error('name')
                <div style="color:red">{{$message}}</div>
                @enderror
                <label for="" style="margin-top:24px">color</label>
                <div style="width:20px; height:20px;margin-bottom: 14px; background-color:#{{$contract->color}}"></div>
                <input class="form-control" type="text" name="color" placeholder="Vui lòng điền mã màu(không chứa kí tự #)">
                @error('color')
                <div style="color:red">{{$message}}</div>
                @enderror
                <img style="margin-top: 10px;" src="{{\Illuminate\Support\Facades\Storage::url($contract->image)}}" alt=""> <br>
                <input type="file" name="image" style="margin-top: 10px;"  class="form-control">
                <button type="submit" style="margin-top: 11px;" class="btn btn-primary">Sửa</button>
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
                Sửa thành công !!
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



<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

</script>
@endsection
