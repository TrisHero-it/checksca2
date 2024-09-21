@extends('layouts.app')
@section('title', 'Dashboard')
@section('link')
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
@endsection
@section('content')
    <div class="cangiua">
        <div class="row">
            <div class="navigation col-2 search-computer" style="">
                <a class="text-decoration-none d-flex justify-content-between w-100" style="color: white" href="{{route('dashboard')}}"><div class="navigation-column navigation-hover"> Thông tin cá nhân <img src="{{asset('images/design/Arrows.svg')}}" alt=""></div></a>
                <a class="text-decoration-none d-flex justify-content-between w-100" style="color: white" href="{{route('dashboard.histories')}}"><div class="navigation-column navigation-hover">Lịch sử tố cáo<img src="{{asset('images/design/Arrows.svg')}}" alt=""></div></a>
                <div class="navigation-column navigation-hover">Phòng midman<img src="{{asset('images/design/Arrows.svg')}}" alt=""></div>
                <a class="text-decoration-none d-flex justify-content-between w-100" style="color: white" href="{{route('password.edit')}}"><div class="navigation-column navigation-hover">Đổi mật khẩu<img src="{{asset('images/design/Arrows.svg')}}" alt=""></div></a>
                <a href="/logout" class="text-light text-decoration-none"><div class="navigation-column navigation-hover">Đăng xuất<img src="{{asset('images/design/Arrows.svg')}}" alt=""></div></a>
            </div>

            <div class="col-10">
                <div class="row" style="margin-top: 0;">
                    <div class="col-12">
                        <div style="background: var(--Background-card, rgba(255, 255, 255, 0.08)); padding: 24px; border-radius: 16px; height: 100%">
                            <div class="d-flex" style="gap: 24px">
                                <p class="text-start"  style="min-width: 138px; margin-bottom: unset; font-size: 16px">Đổi mật khẩu</p>
                            </div>
                            <hr>
                            <form action="{{route('password.update')}}" method="POST" onsubmit="return checkRePass()">
                                @method('PUT')
                                @csrf
                                <div class="form-group w-100 position-relative">
                                    <input class="form-input w-100" style="outline:none" name='oldPass' type="password" value="" id="oldPass"
                                           placeholder=" ">
                                    <label class="form-label" for="number">Mật khẩu hiện tại <span
                                            style="color: forestgreen">*</span></label>
                                    <img class="position-absolute icon-password" id="eyeOldPass" src="{{asset('images/design/Eyeblock.svg')}}" alt="">
                                    <span style="font-size: 12px; color: red" class="errorRePass"></span>

                                </div>

                                <div class="form-group w-100 position-relative">
                                    <input class="form-input w-100" style="outline:none" name='password' type="password" value="" id="pass" onkeyup="validatePassword()"
                                           placeholder=" ">
                                    <label class="form-label" for="number">Mật khẩu mới <span
                                            style="color: forestgreen">*</span></label>
                                    <img class="position-absolute icon-password" id="eyeNewPass" src="{{asset('images/design/Eyeblock.svg')}}" alt="">
                                    <span style="font-size: 12px; color: red" class="errorRePass"></span>

                                </div>

                                <div class="d-flex" style="gap:4px; margin-top: 12px;"><img class="img-check-pass" src="{{asset('images/design/tich-v/trang.svg')}}" alt="">
                                    <p class="validation-password text-check-pass" style="color: var(--Light-Grey, #939393); font-size: 12px">Gồm 6-20 kí tự</p></div>

                                <div class="d-flex" style="gap:4px; margin-top: 12px;"><img class="img-check-pass" src="{{asset('images/design/tich-v/trang.svg')}}" alt="">
                                    <p class="validation-password text-check-pass" style="color: var(--Light-Grey, #939393); font-size: 12px">Gồm ký tự in hoa, in thường và số</p></div>

                                <div class="d-flex" style="gap:4px; margin-top: 12px;;margin-bottom: 24px"><img class="img-check-pass" src="{{asset('images/design/tich-v/trang.svg')}}" alt="">
                                    <p class="validation-password text-check-pass" style="color: var(--Light-Grey, #939393); font-size: 12px">Không gồm ký tự đặc biệt</p></div>

                                <div class="form-group w-100 position-relative">
                                    <input class="form-input w-100" style="
                                    outline:none" name='rePass' onkeyup="checkRePass()" type="password" value="{{ old('scam') }}" id="rePass"
                                           placeholder=" ">
                                    <label class="form-label" for="number">Nhập lại mật khẩu <span
                                            style="color: forestgreen">*</span></label>
                                    <img class="position-absolute icon-password" id="eyeRePass" src="{{asset('images/design/Eyeblock.svg')}}" alt="">
                                    <span style="font-size: 12px; color: red" class="errorRePass"></span>
                                </div>

                                <button class="btnReport" style="margin-top: 24px;">Đổi mật khẩu</button>
                                <form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        let rePass = document.getElementById('rePass');
        let pass = document.getElementById('pass');
        let oldPass = document.getElementById('oldPass');

        function checkRePass() {
            let check = true
            if (oldPass.value.trim() == '') {
                oldPass.style.border = '1px solid var(--Error, #FF5252)'
                oldPass.style.background = 'rgba(255, 82, 82, 0.24)'
                document.getElementsByClassName('errorRePass')[0].innerHTML = 'Mật khẩu không được để trống'
                check = false
            }else {
                oldPass.style.border = ''
                oldPass.style.background = ''
                document.getElementsByClassName('errorRePass')[0].innerHTML = ''
                check = true
            }

            if (pass.value.trim() == '') {
                pass.style.border = '1px solid var(--Error, #FF5252)'
                pass.style.background = 'rgba(255, 82, 82, 0.24)'
                document.getElementsByClassName('errorRePass')[1].innerHTML = 'Mật khẩu không được để trống'
                check = false
            }else {
                pass.style.border = ''
                pass.style.background = ''
                document.getElementsByClassName('errorRePass')[1].innerHTML = ''
                check = true
            }

            if (rePass.value != pass.value) {
                rePass.style.border = '1px solid var(--Error, #FF5252)'
                rePass.style.background = 'rgba(255, 82, 82, 0.24)'
                document.getElementsByClassName('errorRePass')[2].innerHTML = 'Mật khẩu không khớp'
                check = false
            }else {
                rePass.style.border = ''
                rePass.style.background = ''
                document.getElementsByClassName('errorRePass')[2].innerHTML = ''
                check = true
            }

            return check
        }
    </script>

    @if(session('errorOldPassword'))
        <script !src="">oldPass.style.border = '1px solid var(--Error, #FF5252)'
            oldPass.style.background = 'rgba(255, 82, 82, 0.24)'
            document.getElementsByClassName('errorRePass')[0].innerHTML = 'Sai mật khẩu'</script>
    @endif

    @if(session('successHistory'))
        <div style="display:block; z-index: 1000;" class="pass-midroom">
            <div class="d-flex align-items-center w-100 justify-content-between"><p style="color: var(--White, #F8F8F8); margin-bottom: unset; font-size: 16px"> Chỉnh sửa tố cáo </p> <img id="closeMidRoom" src="{{asset('images/design/midman/Close.svg')}}" alt=""> </div>
            <div style="color: var(--Light-Grey, #939393); font-size: 14px; margin-top: 24px;">
                Chúng tôi đã gửi yêu cầu của bạn đến Admin để được xem xét, và sẽ thông báo cho bạn kết quả sớm nhất.
            </div>
        </div>
    @endif

    <script src="{{asset('js/dashboard.js')}}"></script>
    <script>
        function toUrl(id, status) {
            if (status ==3) {
                window.location.href = `/posts/${id}`;
            } else {
                window.location.href = `/dashboard/histories/${id}/edit`;
            }
        }
    </script>

        <script !src="">
            let abc = new URL(window.location.href)
            let bcd = abc.origin

            let signUp = document.getElementById('eyeOldPass');
            signUp.addEventListener('click', ()=> {
                if (signUp.src == `${bcd}/images/design/eye.svg`){
                    signUp.src = `${bcd}/images/design/Eyeblock.svg`
                    document.getElementById('oldPass').setAttribute('type', 'password')
                }else {
                    signUp.src = `${bcd}/images/design/eye.svg`
                    document.getElementById('oldPass').setAttribute('type', 'text')
                }
            })

            let signUp2 = document.getElementById('eyeNewPass');
            signUp2.addEventListener('click', ()=> {
                if (signUp2.src == `${bcd}/images/design/eye.svg`){
                    signUp2.src = `${bcd}/images/design/Eyeblock.svg`
                    document.getElementById('pass').setAttribute('type', 'password')
                }else {
                    signUp2.src = `${bcd}/images/design/eye.svg`
                    document.getElementById('pass').setAttribute('type', 'text')
                }
            })

            let signUp3 = document.getElementById('eyeRePass');
            signUp3.addEventListener('click', ()=> {
                if (signUp3.src == `${bcd}/images/design/eye.svg`){
                    signUp3.src = `${bcd}/images/design/Eyeblock.svg`
                    document.getElementById('rePass').setAttribute('type', 'password')
                }else {
                    signUp3.src = `${bcd}/images/design/eye.svg`
                    document.getElementById('rePass').setAttribute('type', 'text')
                }
            })
        </script>
@endsection
