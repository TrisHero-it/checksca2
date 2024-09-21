@extends('admin.layouts.app')
@section('link')
    <link rel="stylesheet" href="{{asset('assets/fonts/material/css/materialdesignicons.min.css')}}">
@endsection
@section('content')
    <div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification">

    </div>
    <div class="col-md-12" id="post">
        <div class="card">
            <div class="card-header">
               <h5>Chỉnh sửa quảng cáo</h5>
            </div>
            <form action="{{route('ads.update', $ad->id)}}" method="post" onsubmit="return validate()" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    @method('put')
                    <div class="d-flex w-100 align-items-center i-main" id="divImgAds" style="gap: 24px">
                        <img class="mb-3" style="width: 200px; height: 200px" src="{{\Illuminate\Support\Facades\Storage::url($ad->image)}}" alt="">
                        <div id="avc">

                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="exampleInputEmail1"> Ảnh </label>
                        <input name="image" type="file" class="form-control" >
                        <div class="thongbao" style="font-size: .875em; color: red"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="exampleInputEmail1"> Đường link của hình ảnh </label>
                        <input name="link" type="text" class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp" value="{{$ad->link}}" placeholder="Tài khoản game">
                        <div class="thongbao" style="font-size: .875em; color: red"></div>
                    </div>

                    <button class="btn btn-gradient-success">
                        Sửa
                    </button>
                </div>
            </form>

        </div>
    </div>

    <script !src="">
        let divImgAds = document.getElementById('divImgAds');
        let imgInput = document.getElementsByName('image')[0];

        imgInput.addEventListener('change', (event)=> {

            const reader = new FileReader();
            reader.onload = function (e) {
                let html = `
                <div class="i-block" style="border: none" data-clipboard-text="mdi mdi-airballoon" data-filter="mdi-airballoon" data-bs-toggle="tooltip" aria-label="mdi-airballoon" data-bs-original-title="mdi-airballoon">
                            <i style="color: var(--Light-primary, #009571); font-size: 35px" class="mdi mdi-arrow-right-bold-outline"></i>
                        </div>
                        <img style="width: 200px; height: 200px" class="mb-3" src="asd" id="imgAds" alt="">
                       `
                document.getElementById('avc').innerHTML = html;
                const imgAds = document.getElementById('imgAds');
                imgAds.src = e.target.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        })

        function validate() {
            let link = document.getElementsByName('link')[0];
            let check = true;
            let thongbao = document.getElementsByClassName('thongbao');
            let regexLink  = /^(https?:\/\/)?([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}([\/a-zA-Z0-9#?&%=~_\-\.]*)?$/ ;
            if (link.value.trim()== ''){
                thongbao[1].innerHTML = 'Link không được để trống';
                link.style.borderColor = 'var(--bs-form-invalid-border-color'
                check=false
            }else if(!regexLink.test(link.value.trim())) {
                thongbao[1].innerHTML = 'Đây phải điền link';
                link.style.borderColor = 'var(--bs-form-invalid-border-color'
                check=false
            }else {
                thongbao[1].innerHTML = ''
            }

            return check
        }

    </script>

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

    <script !src="">

    </script>

@endsection
