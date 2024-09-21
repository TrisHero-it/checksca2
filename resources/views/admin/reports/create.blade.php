@extends('admin.layouts.app')
@section('content')
    <div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification">

    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Thêm bài viết</h5>
            </div>
            @section('link')
                <link rel="stylesheet" href="{{asset('assets/js/plugins/uppy/uppy.min.css')}}">
            @endsection
                <div class="card-body">
                <form action="/admin-reports" method="POST" onsubmit="return validate()" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Tài khoản game</label>
                                <input onkeyup="inputValidate()" name="username" type="text" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" placeholder="Tài khoản game">
                                <div class="thongbao" style="font-size: .875em; color: red"></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"
                                       for="exampleInputPassword1">Link facebook</label>
                                <input name="linkfb" type="text" class="form-control"
                                       id="exampleInputPassword1" placeholder="https://....">
                                <div class="thongbao" style="font-size: .875em; color: red"></div>

                            </div>
                        <div class="mb-3">
                            <label class="form-label"
                                   for="exampleInputPassword1">Họ và tên người lừa đảo</label>
                            <input onkeyup="inputValidate()" name="fullname" type="text" class="form-control"
                                   id="exampleInputPassword1" placeholder="Nguyễn Văn A">
                                <div class="thongbao" style="font-size: .875em; color: red"></div>

                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                   for="exampleInputPassword1">Số điện thoại</label>
                            <input onkeyup="inputValidate()" name="numberphone" type="number" class="form-control"
                                   id="exampleInputPassword1" placeholder="098....">
                                <div class="thongbao" style="font-size: .875em; color: red"></div>

                        </div>

                        <div class="mb-3">
                            <label class="form-label"
                                   for="exampleInputPassword1">Số tiền lừa đảo</label>
                            <input onkeyup="inputValidate()" name="moneys_scam" type="number" class="form-control"
                                   id="exampleInputPassword1" placeholder="100.000.000">
                                <div class="thongbao" style="font-size: .875em; color: red"></div>

                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="mb-3">
                            <label class="form-label"
                                   for="exampleInputPassword1">Số tài khoản</label>
                            <input onkeyup="inputValidate()" name="numberbank" type="number" class="form-control"
                                   id="exampleInputPassword1" placeholder="098....">
                                <div class="thongbao" style="font-size: .875em; color: red"></div>

                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                   for="exampleFormControlSelect1">Ngân hàng</label>
                            <select name="namebank" onchange="inputValidate()" class="form-control" id="exampleFormControlSelect1">
                                <option value="">Chưa chọn</option>
                                @foreach($banks as $bank)
                                    <option value="{{$bank['shortName']}}">{{$bank['shortName']}}</option>
                                @endforeach
                            </select>
                            <div class="thongbao" style="font-size: .875em; color: red"></div>
                        </div>
                            <div class="mb-3">
                                <label class="form-label"
                                       for="exampleFormControlSelect1">Danh mục</label>
                                <select name="category_id" onchange="inputValidate()" class="form-control" id="exampleFormControlSelect1">
                                    <option value="">Chưa chọn</option>
                                   @foreach($categories as $category)
                                       <option value="{{$category->id}}"> {{$category->name}} </option>
                                   @endforeach
                                </select>
                                <div class="thongbao" style="font-size: .875em; color: red"></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"
                                       for="exampleFormControlTextarea1">Nội dung</label>
                                <textarea onkeyup="inputValidate()" name="content" class="form-control" id="exampleFormControlTextarea1"
                                          placeholder="Aa..."
                                          style="height: 139px"></textarea>
                                <div class="thongbao" style="font-size: .875em; color: red"></div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-6 w-100">
                    <div class="card">
                        <div class="card-header">
                            <h5>Ảnh chụp bằng chứng</h5>
                        </div>
                        <div class="card-body">
                            <div class="pc-uppy" id="pc-uppy-3">
                                <div class="pc-uppy-drag">
                                    <button type="button" id="btnInput" class="uppy-Root uppy-u-reset uppy-DragDrop-container uppy-DragDrop--is-dragdrop-supported" style="width: 100%; height: 100%;">
                                        <input class="uppy-DragDrop-input" id="inputFile" type="file" tabindex="-1" focusable="false" name="images[]" multiple="" accept="image/*,video/*">
                                        <div class="uppy-DragDrop-inner"><svg aria-hidden="true" focusable="false" class="UppyIcon uppy-DragDrop-arrow" width="16" height="16" viewBox="0 0 16 16">
                                                <path d="M11 10V0H5v10H2l6 6 6-6h-3zm0 0" fill-rule="evenodd"></path></svg>
                                            <div class="uppy-DragDrop-label">Drop files here or <span class="uppy-DragDrop-browse">browse</span></div>
                                            <span class="uppy-DragDrop-note"></span></div></button>
                                </div>
                                <div class="pc-uppy-informer"><div class="uppy uppy-Informer" aria-hidden="true"><p role="alert"> </p></div></div>
                                <div class="pc-uppy-progress"><div class="uppy uppy-ProgressBar" style="position: initial;"><div class="uppy-ProgressBar-inner" style="width: 0%;"></div><div class="uppy-ProgressBar-percentage">0</div></div></div>
                                <div class="pc-uppy-thumbnails">

                                </div>
                            </div>
                        </div>
                        <div class="thongbao" style="font-size: .875em; color: red"></div>
                    </div>
                </div>
                    <button type="submit" class="btn btn-success">Thêm bài vết</button>
                </form>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

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

    <script !src="">
        let inputFile = document.getElementById('inputFile');
        let btnInput = document.getElementById('btnInput');
        btnInput.addEventListener('click', ()=> {
            inputFile.click()
        })

        btnInput.addEventListener('change', (e)=> {
            debounceImages(e);
        })

        const debounceImages = showImages()

        function showImages(event) {
            let seriImages = 0;
            const data = new DataTransfer()

            return (event) => {
                const images = [...event.target.files]
                let fileList = event.target.files;
                images.forEach((image, index) => {
                    const files = image
                    data.items.add(files)
                })
                arrImage = [...data.files];
                document.getElementById('inputFile').files = data.files
                const img = document.getElementsByClassName('pc-uppy-thumbnails')[0];

                for (let i = 0; i < images.length; i++) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        let html = `
                <div id="anh${seriImages}" class="pc-uppy-thumbnail-container">
                                        <div class="card border mb-3">
                                            <div class="p-2">
                                                <div class="media align-items-center">
                                                    <div class="pc-uppy-thumbnail">
                                                        <img id="imageDisplay${seriImages}" src="aas"></div>
                                                    <div class="media-body">
                                                        <span class="pc-uppy-thumbnail-label">${fileList[i].name}</span></div>
                                                    <span data-id="uppy-social//4//svg-10-18-19-1e-image/svg+xml-567-1722243244464" class="pc-uppy-remove-thumbnail">
                                                        <i style="cursor: pointer" class="feather icon-x-circle text-danger f-20" onclick="deleteImage(${seriImages})"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                       `
                        $(img).prepend(html)
                        const imageDisplay = document.getElementById('imageDisplay' + seriImages++);
                        imageDisplay.src = e.target.result;
                        imageDisplay.style.display = 'block'
                    }
                    reader.readAsDataURL(images[i]);
                }
            }
        }

        function deleteImage(id) {
            const data = new DataTransfer()
            const inp = document.getElementById('inputFile');

            for (var i = 0; i < inp.files.length; ++i) {
                if (i == id) {
                    continue;
                }
                var name = inp.files.item(i).name;
                const files = inp.files[i]
                data.items.add(files)
            }
            inp.files = data.files
            let img = document.getElementById('anh' + id)
            img.style.display = 'none'
        }

        function validate() {
            let check = true
            let thongbao = document.getElementsByClassName('thongbao');
            let category = document.getElementsByName('category_id')[0];
            let userName = document.getElementsByName('username')[0];
            let fullName = document.getElementsByName('fullname')[0];
            let numberPhone = document.getElementsByName('numberphone')[0];
            let numberBank = document.getElementsByName('numberbank')[0];
            let nameBank = document.getElementsByName('namebank')[0];
            let images = document.getElementById('inputFile');
            let moneysScam = document.getElementsByName('moneys_scam')[0];
            let content = document.getElementsByName('content')[0];

            if (category.value.trim()==''){
                category.style.borderColor = 'var(--bs-form-invalid-border-color'
                thongbao[7].innerHTML = 'Danh mục không được để trống'
                check = false
            }

            if (userName.value.trim() == ''){
                userName.style.borderColor = 'var(--bs-form-invalid-border-color';
                thongbao[0].innerHTML = 'Tài khoản game không được để trống'
                check = false
            }

            if (fullName.value.trim() == ''){
                fullName.style.borderColor = 'var(--bs-form-invalid-border-color';
                thongbao[2].innerHTML = 'Họ và tên không được để trống'
                check = false
            }

            if (numberPhone.value.trim()==''){
                numberPhone.style.borderColor = 'var(--bs-form-invalid-border-color'
                thongbao[3].innerHTML = 'Số điện thoại không được để trống'
                check = false
            }

            if (moneysScam.value.trim()==''){
                moneysScam.style.borderColor = 'var(--bs-form-invalid-border-color'
                thongbao[4].innerHTML = 'Số tiền lừa đảo không được để trống'
                check = false
            }else if (moneysScam.value.trim()<50000)
            {
                moneysScam.style.borderColor = 'var(--bs-form-invalid-border-color';
                thongbao[4].innerHTML = 'Số tiền lừa đảo không được nhỏ hơn 50.000'
                check = false
            }

            if (content.value.trim()== ''){
                content.style.borderColor = 'var(--bs-form-invalid-border-color'
                thongbao[8].innerHTML = 'Nội dung không được để trống'
                check = false
            }

            if (numberBank.value.trim()==''){
                numberBank.style.borderColor = 'var(--bs-form-invalid-border-color'
                thongbao[5].innerHTML = 'Số tài khoản không được để trống'
                check = false
            }

            if (nameBank.value.trim()==''){
                nameBank.style.borderColor = 'var(--bs-form-invalid-border-color'
                thongbao[6].innerHTML = 'Vui lòng chọn ngân hàng'
                check = false
            }

            if (images.value =='' ){
                thongbao[9].innerHTML = 'Ảnh không được để trống'
                check = false
            }

            return check
        }

        function inputValidate() {

            let check = true
            let thongbao = document.getElementsByClassName('thongbao');
            let category = document.getElementsByName('category_id')[0];
            let userName = document.getElementsByName('username')[0];
            let fullName = document.getElementsByName('fullname')[0];
            let numberPhone = document.getElementsByName('numberphone')[0];
            let numberBank = document.getElementsByName('numberbank')[0];
            let nameBank = document.getElementsByName('namebank')[0];
            let images = document.getElementById('inputFile');
            let moneysScam = document.getElementsByName('moneys_scam')[0];
            let content = document.getElementsByName('content')[0];

            if (userName.value.trim()==''){
                userName.style.borderColor = 'var(--bs-form-invalid-border-color';
                thongbao[0].innerHTML = 'Tài khoản game không được để trống'
                check = false
            } else {
                userName.style.borderColor = '';
                thongbao[0].innerHTML = ''
                check = true
            }

            if (category.value.trim() == '') {
                category.style.borderColor = 'var(--bs-form-invalid-border-color';
                thongbao[7].innerHTML = 'Tài khoản game không được để trống'
                check = false
            } else {
                category.style.borderColor = '';
                thongbao[7].innerHTML = ''
                check = true
            }

            if (fullName.value.trim() == '') {
                fullName.style.borderColor = 'var(--bs-form-invalid-border-color';
                thongbao[2].innerHTML = 'Họ và tên không được để trống'
                check = false
            } else {
                fullName.style.borderColor = '';
                thongbao[2].innerHTML = ''
                check = true
            }

            if (numberPhone.value.trim() == '') {
                numberPhone.style.borderColor = 'var(--bs-form-invalid-border-color';
                thongbao[3].innerHTML = 'Số điện thoại không được để trống'
                check = false
            } else {
                numberPhone.style.borderColor = '';
                thongbao[3].innerHTML = ''
                check = true
            }

            if (moneysScam.value.trim() == '') {
                moneysScam.style.borderColor = 'var(--bs-form-invalid-border-color';
                thongbao[4].innerHTML = 'Số tiền lừa đảo không được để trống'
                check = false
            }else if(moneysScam.value.trim()<50000) {
                moneysScam.style.borderColor = 'var(--bs-form-invalid-border-color';
                thongbao[4].innerHTML = 'Số tiền lừa đảo không được nhỏ hơn 50.000'
                check = false
            }
            else {
                moneysScam.style.borderColor = '';
                thongbao[4].innerHTML = ''
                check = true
            }

            if (numberBank.value.trim() == '') {
                numberBank.style.borderColor = 'var(--bs-form-invalid-border-color';
                thongbao[5].innerHTML = 'Số tài khoản không được để trống'
                check = false
            } else {
                numberBank.style.borderColor = '';
                thongbao[5].innerHTML = ''
                check = true
            }

            if (nameBank.value.trim() == '') {
                nameBank.style.borderColor = 'var(--bs-form-invalid-border-color';
                thongbao[6].innerHTML = 'Vui lòng chọn ngân hàng'
                check = false
            } else {
                nameBank.style.borderColor = '';
                thongbao[6].innerHTML = ''
                check = true
            }

            if (content.value.trim() == '') {
                content.style.borderColor = 'var(--bs-form-invalid-border-color';
                thongbao[8].innerHTML = 'Nội dung không được bỏ trống'
                check = false
            } else {
                content.style.borderColor = '';
                thongbao[8].innerHTML = ''
                check = true
            }

            return check
        }
    </script>



@endsection
