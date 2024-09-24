@extends('layouts.app')
@section('title', 'Dashboard')
@section('link')
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
@endsection
@section('content')
    <div class="cangiua">
        <div class="row">
        <div class="navigation col-3 search-computer" style="">
                <a class="text-decoration-none d-flex justify-content-between w-100" style="color: white" href="{{route('dashboard')}}"><div class="d-flex navigation-column navigation-hover"><div class="d-flex" style="align-items: center; gap:8px; color: var(--Light-primary, #009571);"> <img src="{{asset('images/User.svg')}}" alt=""> Thông tin cá nhân</div>  <img src="{{asset('images/design/Arrows-green.svg')}}" alt=""></div></a>
                <a class="text-decoration-none d-flex justify-content-between w-100" style="color: white" href="{{route('dashboard.histories')}}"><div class="navigation-column navigation-hover"><div class="d-flex" style="align-items: center; gap:8px;"><img src="{{asset('images/design/Report.png')}}" alt=""> Lịch sử tố cáo</div><img src="{{asset('images/design/Arrows.svg')}}" alt=""></div></a>
                <a class="text-decoration-none d-flex justify-content-between w-100" style="color: white" href="{{route('password.edit')}}"><div class="navigation-column navigation-hover"><div class="d-flex" style="align-items: center; gap:8px;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
<path d="M6.66602 8.33333V5.83333C6.66602 3.99238 8.1584 2.5 9.99935 2.5C11.8403 2.5 13.3327 3.99238 13.3327 5.83333V8.33333" stroke="#808089" stroke-width="1.5" stroke-linecap="round"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M3.41602 8.33337C3.41602 7.91916 3.7518 7.58337 4.16602 7.58337H15.8327C16.2469 7.58337 16.5827 7.91916 16.5827 8.33337V15.5C16.5827 17.0188 15.3515 18.25 13.8327 18.25H6.16602C4.64724 18.25 3.41602 17.0188 3.41602 15.5V8.33337ZM4.91602 9.08337V15.5C4.91602 16.1904 5.47566 16.75 6.16602 16.75H13.8327C14.523 16.75 15.0827 16.1904 15.0827 15.5V9.08337H4.91602Z" fill="#808089"/>
<ellipse cx="12.084" cy="12.9166" rx="1.25" ry="1.25" transform="rotate(-180 12.084 12.9166)" fill="#808089"/>
</svg> Đổi mật khẩu</div><img src="{{asset('images/design/Arrows.svg')}}" alt=""></div></a>
                <a href="/logout" class="text-light text-decoration-none"><div class="navigation-column navigation-hover"><div class="d-flex" style="align-items: center; gap:8px;"><img src="{{asset('images/design/logout.svg')}}" alt="">Đăng xuất</div> <img src="{{asset('images/design/Arrows.svg')}}" alt=""></div></a>
            </div>

            <div class="navigation col-lg-3 search-mobile" style="margin-bottom: 24px;">
                <div class="d-flex" style="overflow: auto; width: 100%;">
                    <div class="d-flex align-items-center justify-content-center" style="padding: 12px; width: 142px; min-width: 142px; text-align: center; background: var(--Light-primary, #009571); border-radius: 100px; height: 36px;">
                        <p style="margin-bottom: unset; margin-top: 4px; font-size: 14px ; text-align: center !important;">Thông tin cá nhân</p>
                    </div>
                    <a href="{{route('dashboard.histories')}}" class="text-decoration-none">
                    <div class="d-flex align-items-center justify-content-center" style="padding: 12px; width: 130px; min-width: 130px; text-align: center; border-radius: 100px; height: 36px;">
                        <p style="margin-bottom: unset; margin-top: 4px; font-size: 14px ; text-align: center !important;">Lịch sử tố cáo</p>
                    </div>
                    </a>
                    <div class="d-flex align-items-center justify-content-center" style="padding: 12px; width: 130px; min-width: 130px; text-align: center; border-radius: 100px; height: 36px;">
                        <p style="margin-bottom: unset; margin-top: 4px; font-size: 14px ; text-align: center !important;">Phòng midman</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-center" style="padding: 12px; width: 130px; min-width: 130px; text-align: center; border-radius: 100px; height: 36px;">         
                        <p style="margin-bottom: unset; margin-top: 4px; font-size: 14px ; text-align: center !important;">Đổi mật khẩu</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-center" style="padding: 12px; width: 130px; min-width: 130px; text-align: center; border-radius: 100px; height: 36px;">
                        <p style="margin-bottom: unset; margin-top: 4px; font-size: 14px ; text-align: center !important;"><a href="/logout" class="text-light text-decoration-none">Đăng xuất</a></p>
                    </div>
                </div>
            </div>

            <div class="col-sm-9">
                <div class="row" style="margin-top: unset;">
                    <div class="col-12 w-100">
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
