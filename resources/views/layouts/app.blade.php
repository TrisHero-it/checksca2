<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title', 'Scam')</title>
    {!! SEO::generate() !!}

    <link id="loadingStyle" rel="stylesheet" href="{{ asset('css/loading.css') }}">
    <link rel="icon" href="{{asset('images/design/favicon_io/android-chrome-512x512.png')}}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="author" content="CheckSca">
    <meta property="og:site_name" content="CheckSca.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    @yield('link')
</head>
<style>
    .tooltip-inner {
        color: var(--Light-White, #E4E4E4); /* Màu chữ tùy chỉnh */
        font-weight: 500; /* Chữ đậm */
        padding: 16px; /* Tăng khoảng cách padding */
        font-size: 12px; /* Tăng kích thước chữ */
        border-radius: 12px; /* Bo góc */
        background: var(--Stroke, #3A3A3A);
    }

    .bs-tooltip-auto[data-popper-placement^=top] .tooltip-arrow::before, .bs-tooltip-top .tooltip-arrow::before {
        border-top-color : var(--Stroke, #3A3A3A);
    }
</style>
<body id="bodySca" style="position: relative; background-color: #0C0D0E">
@if(session('sign-up-success'))
    <script !src="">
        Swal.fire({
            title: "Gửi thành công",
            text: "Vui lòng kiểm tra email của bạn",
            icon: "success"
        });
    </script>
@endif
@if(session('login'))
    <script !src="">
        Swal.fire({
            title: "Đăng nhập thành công",
            text: "Chào mừng bạn đến với Checksca.com",
            icon: "success"
        });
    </script>
@endif
@if(session('error'))
    <script !src="">
        Swal.fire({
            title: "Đăng nhập thất bại",
            text: "Tài khoản mật khẩu không chính xác",
            icon: "error"
        });
    </script>
@endif
@if(session('sign-up'))
    <script !src="">
        Swal.fire({
            title: "Đăng ký thành công",
            text: "Chào mừng bạn đến với Checksca.com",
            icon: "success"
        });
    </script>
@endif
    <div class="cangiua2">
    <div class="background<?php if (isset($tracuu)) {
    echo '-3';
} else {
    echo '-1';
} ?>">
        <div class="ac" style="position: relative; z-index: 1">
            <div class="cangiua">
                <header style="">
                    <div class="header-left">
                        <img id="home" style="width:150px; height:auto" src="{{ asset('images/design/home/Checksca.com.png') }}" alt="">
                    </div>
                    <div id="showmenu" class="header-right-mobile">
                        <i class="fa-solid fa-bars" style="color: #ffffff;"></i>
                    </div>
                    <div id="header" class="header-right<?php if (auth()->check()) {
    echo '2';
} ?>">
                        <div class="middle-header">
                            <a href="/">Trang chủ</a>
                            <a href="">Giới thiệu</a>
                            <a href="/news">Cảnh báo lừa đảo</a>
                            <a href="/midman">Midman</a>
                        </div>
                        <div class="btn-report" id="btnReport">
                        <div class="logo-dashboard position-relative">
                        <img style="width:22px" src="{{asset('images/design/dashboard/Profile.png')}}" alt="">

                            <div class="position-absolute login">
                                <form id="formLogin" action="<?php if (strpos($email, 'checksca_khong_co_email') === 0)
                                echo '/send-email';
                                else
                                    echo '/login-client';
                                ?> " method="POST">
                                    @csrf
                                <div class="btn-login-transform d-flex" style="">
                                    <button type="button" class="btn-login">Đăng nhập</button>
                                    <button type="button" class="btn-register">Đăng ký</button>
                                </div>
                                <p class="text-login">@if(strpos($email, 'checksca_khong_co_email') === 0) Tài khoản chưa có email, vui lòng cung cấp email:@else Đăng nhập với tài khoản mạng xã hội @endif </p>
                                <div class="d-flex text-center icon">
                                    @if(strpos($email, 'checksca_khong_co_email') !== 0)
                                        <a href="/login"><img id="facebookIcon" src="{{asset('images/design/facebook.svg')}}" alt=""></a>
                                       <a style="margin-left: 12px;" href="/login-with-google">  <img id="googleIcon" src="{{asset('images/design/google.svg')}}" alt=""></a>
                                    @endif
                                    </div>
                                <div class="form-group w-100 input-mobile" style="margin-bottom: 16px;">
                                <input class="form-input" autocomplete="off" name='email' type="text" id="email" placeholder="">
                                <label class="form-label" for="email">Email</label>
                                <div class="error2 text-start" style="color: red"></div>
                            </div>

                                    @if(strpos($email, 'checksca_khong_co_email') !== 0)
                                        <div class="form-group w-100 input-mobile" style="margin-bottom: 16px;">
                                            <input class="form-input" name='password' type="password" id="password" placeholder="">
                                            <label class="form-label" for="email">Mật khẩu</label>
                                            <img class="position-absolute icon-password" src="{{asset('images/design/Eyeblock.svg')}}" alt="">
                                            <div class="error2 text-start" style="color: red"></div>
                                        </div>
                                    @endif


                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}

                            <button class="btnReport w-100" id="login" style="margin-top: 16px;"> @if(strpos($email, 'checksca_khong_co_email') != false) Gửi thư xác minh  @else Đăng nhập @endif</button>

                            <div class="d-flex justify-content-between" id="rememberLogin" style="margin-top: 16px;">
                               <div class="d-flex" style="gap: 8px">
                                   <label  style="margin-bottom: unset;
                                   color: var(--Light-White, #E4E4E4);
                                   font-family: Mulish;
                                   font-size: 14px;
                                   font-style: normal;
                                   font-weight: 400;
                                   line-height: normal;"class="custom-checkbox">
                                       <input name="duytridangnhap" value="1" type="checkbox" id="checkbox">
                                       <span class="checkmark"></span>
                                       Duy trì đăng nhập
                                   </label>
                               </div>

                                <a style="color: var(--Blue, #0989FF);font-weight: 500" href="">Quên mật khẩu</a>
                            </div>
                                </form>
                            </div>
                        </div>
                            <a class="btnReport btn-report-custom" @if (!auth()->check()) data-bs-toggle="modal"
                            data-bs-target="#exampleModal" @else href="/posts/create" @endif>Tố cáo
                                lừa
                                đảo</a>
                        </div>
                    </div>
                </header>
            </div>
        </div>
        <div id="menuMobile" class="menu-mobile" style="background: var(--Background-Popup, #091E22);">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <img id="home" style="width:150px; height:auto" src="{{ asset('images/design/logo/Checksca.com.webp') }}" alt="">
                </div>
                <div class="d-flex justify-content-center align-items-center" style="background: rgba(255, 255, 255, 0.07); width: 44px; height: 44px; border-radius: 100px;">
                    <img id="outMenu" src="{{asset('images/design/midman/Close.svg')}}" alt="">
                </div>
            </div>
            <hr style="color: #3A3A3A">
            <div class="d-flex justify-content-between">
                 <div class="logo-dashboard position-relative"><img style="width:22px" src="http://localhost:8000/images/design/dashboard/Profile.png" alt=""></div>
                <a style="width: 180px;" href="{{route('posts.create')}}" class="btnReport text-decoration-none d-flex align-items-center justify-content-center">Tố cáo lừa đảo</a>
            </div>
            <hr style="color: #3A3A3A;">
            <p style=" margin-bottom: 32px;"><a href="/" style="color: white; text-decoration: none;">Trang chủ</a></p>
            <p style=" margin-bottom: 32px;"><a style="color: white; text-decoration: none;">Giới thiệu</a></p>
            <p style=" margin-bottom: 32px;"><a href="/news" style="color: white; text-decoration: none;">Cảnh báo lừa đảo</a></p>
        </div>
        @isset($menu)

                <div class="banner cangiua" style="margin-top: 60px;">

                    <h1 class="text-center">@yield('check', 'Check') <span>@yield('sca', 'SCA')</span></h1>
                    <p class="text-center">@yield(
                'infor',
                'Tra cứu "SĐT, STK Ngân Hàng..." trước khi giao dịch online. Đây là dữ liệu để
                 cảnh báo không nhắm mục đích bôi nhọ hay hạ thấp uy tín danh dự của bất kì ai, vui lòng liên hệ
                 admin để gỡ thông tin sai sự thật .'
            )</p>

                    @if(!isset($midman))
                        <form action=" <?php if (request()->url() == env('APP_URL') . '/traders')
                echo '/traders';
            else
                echo '/posts' ?>" method="get" class="text-center search-computer" onsubmit="return validateSearch()"
                              style="position: relative;">
                            <input type="text" autocomplete="off" id="search" value="{{ request()->search }}" name="search" onkeyup="debounceShowHints(event, this.value <?php    if (request()->url() == env('APP_URL') . '/traders')
                echo ', 1'  ?>)" placeholder="Nhập số điện thoại, số tài khoản ngân hàng ...">
                            <button type="submit">
                                <div id="btndiv"></div>
                                TRA CỨU
                            </button>
                        </form>

                        <form action=" <?php if (request()->url() == env('APP_URL') . '/traders')
                echo '/traders';
            else
                echo '/posts' ?>" method="get" class="text-center search-mobile" onsubmit="return validateSearch()"
                              style="position: relative">
                            <input style="border-radius: 100px; width: 100%;" type="text" id="search" value="{{ request()->search }}" name="search" onkeyup="debounceShowHints(event, this.value <?php    if (request()->url() == env('APP_URL') . '/traders')
                echo ', 1'  ?>)" placeholder="Tìm kiếm....">
                            <img style="top: 10.3px; right: 20px; cursor: pointer" class="position-absolute" src="{{asset('images/design/midrooms/iconSearch.svg')}}" alt="">
                        </form>

                        <p class="text-center noti-search" style="color: red">Không được để trống</p>
                            <div class="tri text-center" style="margin-top: 21px;">
                                <a style="" @if (!Auth::check()) @else href="/posts/create" @endif class="btn2 btnReport text-decoration-none d-flex justify-content-center btn-report-custom">Tố cáo lừa đảo</a>
                                <a href="/traders" class="btn2 btnReport btnReport2 d-flex justify-content-center"
                                   style="text-decoration: none;">
                                    Quỹ bảo hiểm</a>
                            </div>
                    @else
                        <form action="" method="get" class="text-center" onsubmit="return validateSearch()"
                              style="position: relative">
                            <input  style="border-radius: 100px; width: 590px; margin-top: 5px; height: 43px;" type="text" id="search" value="{{ request()->search }}" name="search" onkeyup="debounceShowHints2(event, this.value <?php    if (request()->url() == env('APP_URL') . '/traders')
                echo ', 1'  ?>)" placeholder="Nhập tên phòng">

                        <p class="text-center noti-search" style="color: red">Không được để trống</p>
                        <div class="tri text-center" style="margin-top: 21px">
                            <button class="btn2 btnReport text-decoration-none" style="padding: 12px 20px;">Tìm kiếm</button>
                        </div>
                        </form>
                    @endif
                </div>
                <div class="canimg">
                    <div class="search2 no-scroll" id="search2">
                    </div>
                </div>

                @if (isset($muakey))

                <div class="cangiua d-flex aaa no-scroll" style="overflow: auto; margin: 24px auto;">
               @foreach ($ads as $ad)
               <div >
                    <a href="{{$ad->link}}">
                        <img src="{{\Illuminate\Support\Facades\Storage::url($ad->image)}}" alt="" style="width: 282px; height: 128px; border-radius: 16px;">
                    </a>
                </div>
               @endforeach
                </div>
                @endif

<!-- Start categories -->
                @if (isset($category2))
                <div class="cangiua">
                        <div class="d-flex flex-wrap category2" style="padding-bottom:136px">
                            @php
                                $cate =$_GET['cate']??0
                            @endphp
                            <button onclick="reloadIndex(-1)" class="btn-category" @if($cate==0)  style="background: var(--Light-primary, #009571);" @endif">Tất cả các game</button>
                          @foreach ($categories as $category)
                          <button onclick="reloadIndex({{$loop->index}})" class="btn-category" @if ($category->id==$cate)
                              style="background: var(--Light-primary, #009571);"
                          @endif >{{$category->name}}</button>
                          @endforeach
                        </div>
                </div>
                @else
                <div class="cangiua" style="overflow: hidden">
                <div class="d-flex justify-content-between">
                        <h5 class="text-light">Danh mục</h5>
                        <a class="btn-more btnReport2" style="text-decoration: none; transform: translateY(1px);">
                            Xem tất cả
                        </a>
                        </div>
                    <div class="categories d-flex no-scroll" style="overflow: auto">

                    <div style=" width: 160px; height: 194px" class="position-relative">
                        <div class="background-category position-absolute">

                        </div>
                        <div class="category position-absolute">

                        </div>
                        <div style="" class="category-img">
                        </div>
                        <div class="category-text">
                            PUBG
                        </div>
                    </div>
                       @foreach ($categories as $category)
                            <div style=" width: 160px; height: 194px" class="position-relative">
                                <div class="background-category position-absolute" style="background-image: url({{\Illuminate\Support\Facades\Storage::url($category->image)}})">

                                </div>
                                <div class="category position-absolute">

                                </div>
                                <div style="background-image: url({{\Illuminate\Support\Facades\Storage::url($category->image)}})" class="category-img">
                                </div>
                                <div class="category-text">
                                    {{$category->name}}
                                </div>
                            </div>
                       @endforeach
                    </div>
                </div>

{{--                <div class="cangiua position-relative">--}}
{{--                        <img id="prev" class="button prev" src="{{ asset('images/arrowleft.png') }}" alt="">--}}
{{--                        <img id='next' class="button next" src="{{ asset('images/arrowright.png') }}" alt="">--}}
{{--                </div>--}}
                @endif
<!-- end categories -->
        @endisset
    </div>
    </div>
    @yield('content')
    <hr style="height: 2px;
               background-color: #0D0D0D;">
    {{-- start footer --}}
    <div class="footer" id="footer">
        <div class="cangiua">
            <div id="mainFooter" class="div justify-content-between">
                <div class="footer1 col-xxl-3 col-sm-6" id="footer1">
                    <img src="{{ asset('images/logo.png') }}" alt="">
                    <p style="color: var(--w-60, rgba(255, 255, 255, 0.60));">Ở đâu có tình thương, ở đó có sự sống. Ở đâu có công lí, ở đó có sự sống. Ở đâu có tội
                        ác, ở
                        đó có công lí. Ở đâu có sự sống, ở đó có công lí.</p>
                </div>
                <div class="footer2 col-xxl-3 col-sm-6" >
                    <h6 style="color: white">Yêu cầu gỡ report</h6>
                    <p style="margin-top: 11px; color: var(--w-60, rgba(255, 255, 255, 0.60));">Telegram: @hotro</p>
                    <p style="margin-top: -6px; color: var(--w-60, rgba(255, 255, 255, 0.60));">Email: abc@gmail.com</p>
                    <p style="margin-top: -6px; color: var(--w-60, rgba(255, 255, 255, 0.60));">Thời gian làm việc: 8h - 23h</p>
                </div>
                <div class="footer3 col-xxl-3 col-sm-6" >
                    <h6 style="color: white">Trang chủ</h6>
                    <p style="margin-top: 12px; color: var(--w-60, rgba(255, 255, 255, 0.60));">Giới thiệu</p>
                    <p style="margin-top: -7px; color: var(--w-60, rgba(255, 255, 255, 0.60));" >Điều khoản dịch vụ</p>
                    <p style="margin-top: -7px; color: var(--w-60, rgba(255, 255, 255, 0.60));">Chính sách bảo mật</p>
                </div>
                <div class="footer4 col-xxl-2 col-sm-2" style="width: max-content;" >
                    <div>
                        <h6 style="color: white">Cộng đồng</h6>
                        <div style="display: flex">
                            <img src="{{ asset('images/design/icon-footer/Social.svg') }}" alt="">
                            <img style="margin-left: 12px" src="{{ asset('images/design/icon-footer/Social (1).svg') }}" alt="">
                            <img style="margin-left: 12px" src="{{ asset('images/design/icon-footer/Social (2).svg') }}" alt="">
                            <img style="margin-left: 12px" src="{{ asset('images/design/icon-footer/Social (3).svg') }}" alt="">
                        </div>
                    </div>
                    <div>
                        <img id="dmca" style="margin-top: 6px;" src="{{asset('images/design/DMCA.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div>
            <hr style="
                            height: 2px;
                            background-color: 232323;
                            border-top: 2px solid 232323;">
        </div>
        <p style="color: var(--w-60, rgba(255, 255, 255, 0.60)); text-align: center; margin-top: 30px; font-size: 14px">© Copyright 2023.
            All rights reserved</p>
    </div>
    <div style="@if(session('successHistory')) display:block; @endif  @if(session('pass_midman_error')) display:block; @endif" class="overlay" id="overlay"></div>
<div style="@if(session('pass_midman_error')) display:block; @endif" class="pass-midroom">
    <div class="d-flex align-items-center w-100 justify-content-between"><p style="color: var(--White, #F8F8F8); margin-bottom: unset;"> Nhập mã bảo mật </p> <img id="closeMidRoom" src="{{asset('images/design/midman/Close.svg')}}" alt=""> </div>

    <form action="" onsubmit="sub(event)" class="form-midroom">
        @csrf
        <div class="form-group input-mobile" style="margin: 24px 0;">
            <input onkeydown="resetStatus()" style="border: 1px solid var(--white-12, rgba(255, 255, 255, 0.12));" class="form-input" name='security_code' type="text" id="securityCode" placeholder=""
                   value="{{ old('mabaomat') }}">
            <label class="form-label" for="email">Nhập mã bảo mật</label>
            <div class="error" style="color: red" id="errorPassMidRoom"></div>
            </div>


        <div>
            <button class="w-100 btn2 btnReport text-decoration-none d-flex justify-content-center">Vào phòng giao dịch</button>
        </div>
    </form>
</div>
@if(!auth()->check())
    <script !src="">
        let btnReportCustom = document.getElementsByClassName('btn-report-custom');
        btnReportCustom[0].addEventListener('click', ()=> {
            document.getElementsByClassName('login')[0].style.display ='block';
            document.getElementById('overlay').style.display ='block'
        })
        btnReportCustom[1].addEventListener('click', ()=> {
            document.getElementsByClassName('login')[0].style.display ='block';
            document.getElementById('overlay').style.display ='block'
        })
    </script>
@endif
<script src="{{asset('js/login.js')}}"></script>
<script !src="">
    function checkPass(id){
        $.ajax({
            url : 'api/check-pass-midman/'+id,
            method: 'get',
            data: {
                account: {{auth()->id()}},
            },
            success: function (data) {
                console.log(data)
                const login = document.getElementsByClassName('login')[0];
                const overlay2 = document.getElementById('overlay');
                const midRoom = document.getElementsByClassName('pass-midroom')[0];
                const formMidroom = document.getElementsByClassName('form-midroom')[0];
                formMidroom.action = '/api/check-pass-midman/'+id;
                if (data['success']) {
                    window.location.href = '/midman/'+id;
                }else {
                    overlay2.style.display = 'block';
                    midRoom.style.display = 'block'
                }
            }
        });
    }

    function resetStatus() {
        let errorPassMidRoom = document.getElementById('errorPassMidRoom');
        let code = document.getElementById('securityCode');
        errorPassMidRoom.innerHTML = ''
        code.style.border = '1px solid var(--white-12, rgba(255, 255, 255, 0.12))'
        code.style.background = 'var(--dark-36, rgba(0, 0, 0, 0.36))';
    }

    function sub (e) {
        e.preventDefault();
        let code = document.getElementById('securityCode');
        let errorPassMidRoom = document.getElementById('errorPassMidRoom');
        $.ajax({
            url : e.srcElement.action,
            method : 'POST',
            data : {
                _token : "{{csrf_token()}}",
                security_code: code.value,

            },
            success : function (data) {
                if(data['success']) {
                    arrUrl = e.srcElement.action.split("/");
                    window.location.href = '/midman/'+arrUrl[arrUrl.length-1];
                }else {
                    code.style.background = 'rgba(255, 82, 82, 0.24)';
                    code.style.border = '1px solid var(--Error, #FF5252)';
                    errorPassMidRoom.innerHTML = 'Sai mật khẩu'
                }
            }
        });
    }


</script>
    {{-- end footer --}}
    <script>
        if (screen.width > 600) {
            document.getElementById('mainFooter').classList.add('row')
        }
    </script>
<script>
    document.getElementById('home').addEventListener('click', () => {
        window.location.href = '/';
    })
</script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/indexReports.js') }}"></script>
    <script src="{{ asset('js/historyReport.js') }}"></script>
<script src="{{ asset('js/posts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
<script !src="">
   // if (document.getElementById('bodySca').offsetHeight<=1080 ) {
   //     document.getElementById('footer').style.position = 'fixed';
   //     document.getElementById('footer').style.bottom = '0';
   //
   // }
</script>
<script !src="">
    const login = document.getElementsByClassName('login')[0];
    const overlay2 = document.getElementById('overlay');
    const midRoom = document.getElementsByClassName('pass-midroom')[0];
    overlay2.addEventListener('click', ()=> {
        login.style.display = 'none';
        overlay2.style.display = 'none'
        midRoom.style.display= 'none'
    })

    document.getElementById('closeMidRoom').addEventListener('click', ()=> {
        login.style.display = 'none';
        overlay2.style.display = 'none'
        midRoom.style.display= 'none'
    })
</script>
@if(auth()->check() && strpos($email, 'checksca_khong_co_email') !== 0)
    <script>
        document.getElementsByClassName('logo-dashboard')[0].addEventListener('click', ()=> {
            window.location.href='/dashboard'
        })
        document.getElementsByClassName('logo-dashboard')[1].addEventListener('click', ()=> {
            window.location.href='/dashboard'
        })
    </script>
@else
    <script>
        document.getElementsByClassName('logo-dashboard')[0].addEventListener('click', ()=> {
            login.style.display = 'block';
            overlay2.style.display = 'block';
        })
        document.getElementsByClassName('logo-dashboard')[1].addEventListener('click', ()=> {
            login.style.display = 'block';
            overlay2.style.display = 'block';
        })
    </script>
@endif

    @if (session('ban'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Tài khoản của bạn đã bị khoá",
                footer: 'Vui lòng liên hệ Admin hoặc sử dụng tài khoản khác'
            });
        </script>
    @endif
   @isset($index)
   @if ($index != 1)
        <script>
            active({{$index}}, 1)
            main.style.transform = 'translateX(' + (-157*{{$index-1}}) + 'px)'
        </script>
    @endif

   @endisset
