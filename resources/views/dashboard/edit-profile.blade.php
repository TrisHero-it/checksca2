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
                <div class="row" style="margin-top: unset;">
                    <div class="col-12">
                        <div style="background: var(--Background-card, rgba(255, 255, 255, 0.08)); padding: 24px; border-radius: 16px; height: 100%">
                            <div class="navigation-column" style="height: unset;font-size: 16px; padding: unset">Sửa thông tin cá nhân</div>
                            <hr style="margin: 24px 0">
                            <form action="">
                                <div class="form-group w-100 input-mobile">
                                    <input class="form-input" name='email_seller' type="text" id="email_seller" placeholder=" "
                                           value="{{$account->name}}">
                                    <label class="form-label" for="email">Họ và tên</label>
                                </div>

                                <div class="form-group w-100 input-mobile" style="margin-top: 8px;">
                                    <input class="form-input" name='email_seller' type="text" id="email_seller" placeholder=" "
                                           value="{{$account->email}}">
                                    <label class="form-label" for="email">Email</label>
                                </div>

                                <div class="form-group w-100 input-mobile" style="margin-top: 8px;">
                                    <input class="form-input" name='email_seller' type="text" id="email_seller" placeholder=" "
                                           value="{{$account->numberphone}}">
                                    <label class="form-label" for="email">Số điện thoại</label>
                                </div>

                                <button type="submit" class="btnReport" style="margin-top: 24px; font-size: 14px">Sửa thông tin</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="{{asset('js/dashboard.js')}}"></script>

@endsection
