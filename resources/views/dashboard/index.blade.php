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
                    <a href="{{route('dashboard')}}" class="text-decoration-none">
                    <div class="d-flex justify-content-center align-items-center" style="padding: 12px; width: 142px; min-width: 142px; text-align: center; background: var(--Light-primary, #009571); border-radius: 100px; height: 36px; transform: translateY(7px)">
                        <p style="margin-bottom: unset; margin-top: 4px; font-size: 14px ; text-align: center !important;">Thông tin cá nhân</p>
                    </div>
                    </a>
                    <a href="{{route('dashboard.histories')}}" class="text-decoration-none">
                    <div class="" style="padding: 12px; width: 130px; min-width: 130px; text-align: center; border-radius: 12px; height: max-content;">
                        <p style="margin-bottom: unset; margin-top: 4px; font-size: 14px ; text-align: center !important;">Lịch sử tố cáo</p>
                    </div>
                    </a>
                    <a href="{{route('password.edit')}}" class="text-decoration-none">
                    <div class="" style="padding: 12px; width: 130px; min-width: 130px; text-align: center; border-radius: 12px; height: max-content;">         
                        <p style="margin-bottom: unset; margin-top: 4px; font-size: 14px ; text-align: center !important;">Đổi mật khẩu</p>
                    </div>
                    </a>
                    <a href="">
                    <div class="" style="padding: 12px; width: 130px; min-width: 130px; text-align: center; border-radius: 12px; height: max-content;">
                        <p style="margin-bottom: unset; margin-top: 4px; font-size: 14px ; text-align: center !important;"><a href="/logout" class="text-light text-decoration-none">Đăng xuất</a></p>
                    </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-9">
                       <div class="row" style="margin-top: unset;">
                           <div class="col-lg-6">
                               <div style="background: var(--Background-card, rgba(255, 255, 255, 0.08)); padding: 24px; border-radius: 16px; height: 100%">
                                   <div class="d-flex justify-content-between align-items-center">
                                       <div class="d-flex align-items-center" style="gap: 16px;">
                                           <img src="{{$account->avatar}}" style="border: 2px solid var(--Background-card, rgba(255, 255, 255, 0.08));width: 48px; height: 48px; border-radius: 100px" alt="">
                                           <h5 class="name-dashboard" style="margin-bottom: unset; max-width: 190px">{{$account->name}}</h5>
                                       </div>
                                       <a href="{{route('dashboard.edit')}}" class="update-account search-computer" id="updateAccount">
                                           Cập nhập tài khoản
                                       </a>

                                       <a href="{{route('dashboard.edit')}}" class="search-mobile">
                                           <div>
                                               <img src="{{asset('images/design/dashboard/edit.png')}}" alt="">
                                           </div>
                                       </a>
                                   </div>
                                   <hr style="margin: 24px 0">
                                   <div class="un-flex-mobile justify-content-between align-items-center">
                                       <div class="d-flex align-items-center" style="gap: 8px">
                                           <img style="margin-top: 2.5px;" src="{{asset('images/design/dashboard/gmail.svg')}}" alt="">
                                           <p style="margin-bottom: unset; max-width: 198px; overflow: hidden; text-overflow: ellipsis">{{$account->email}}</p>
                                           <img src="{{asset('images/design/tich-v/active.svg')}}" alt="">
                                       </div>
                                       <div class="d-flex align-items-center" style="gap: 8px">
                                           <img src="{{asset('images/design/dashboard/Devices.svg')}}" alt="">
                                           <p style="margin-bottom: unset">{{$account->numberphone ?? '_ _'}}</p>
                                         @if($account->verify_number_phone == false)
                                               <img src="{{asset('images/design/tich-v/notActive.svg')}}" alt="">
                                           @else
                                               <img src="{{asset('images/design/tich-v/active.svg')}}" alt="">
                                         @endif
                                       </div>
                                   </div>
                               </div>

                           </div>
                           <div class="col-lg-6" id="lichsutocao">
                               <div style="background: var(--Background-card, rgba(255, 255, 255, 0.08)); padding: 24px; border-radius: 16px; height: 100%">
                                   <div class="navigation-column" style="height: unset;font-size: 16px;padding: unset">Lịch sử tố cáo<img src="{{asset('images/design/Arrows.svg')}}" alt=""></div>
                                   <hr style="margin: 24px 0">
                                   <div class="d-flex dashboard-mobile" style="margin-top: 36px;">
                                       <div class="" style="width: 33.3333%">
                                           <div class="text-center">{{$account->countReportsSuccess}}</div>
                                           <div class="text-center" style="color: var(--w-60, rgba(255, 255, 255, 0.60));font-weight: 100">Đã tố cáo</div>
                                       </div>

                                       <div class="" style="width: 33.3333%">
                                           <div class="text-center">{{$account->countReports}} </div>
                                           <div class="text-center" style="color: var(--w-60, rgba(255, 255, 255, 0.60));font-weight: 100">Đang ẩn</div>
                                       </div>

                                       <div class="" style="width: 33.3333%">
                                           <div class="text-center">{{$account->countReportsFail}}</div>
                                           <div class="text-center" style="color: var(--w-60, rgba(255, 255, 255, 0.60));font-weight: 100">Đã bị gỡ</div>
                                       </div>
                                   </div>
                               </div>

                           </div>
                       </div>
                <div class="row" style="margin-top: unset; margin-top: 24px;">
                    <div class="col-lg-6">

                        <div style="background: var(--Background-card, rgba(255, 255, 255, 0.08)); padding: 24px; border-radius: 16px; height: 100%">
                            <div class="navigation-column" style="height: unset;font-size: 16px;padding: unset">Phòng Midman<img src="{{asset('images/design/Arrows.svg')}}" alt=""></div>
                            <hr style="margin: 24px 0">
                            <div class="d-flex dashboard-mobile" style="margin-top: 36px;">
                                <div class="" style="width: 25%">
                                    <div class="text-center">{{$account->countOpenMidman}}</div>
                                    <div class="text-center" style="color: var(--w-60, rgba(255, 255, 255, 0.60));font-weight: 100">Đang mở</div>
                                </div>

                                <div class="" style="width: 25%">
                                    <div class="text-center">{{$account->countSuccessMidman}}</div>
                                    <div class="text-center" style="color: var(--w-60, rgba(255, 255, 255, 0.60));font-weight: 100">Hoàn thành</div>
                                </div>

                                <div class="" style="width: 25%">
                                    <div class="text-center">{{$account->countWaitingMidman}}</div>
                                    <div class="text-center" style="color: var(--w-60, rgba(255, 255, 255, 0.60));font-weight: 100">Tranh chấp</div>
                                </div>

                                <div class="" style="width: 25%">
                                    <div class="text-center">{{$account->countCancelMidman}}</div>
                                    <div class="text-center" style="color: var(--w-60, rgba(255, 255, 255, 0.60));font-weight: 100">Huỷ</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6" id="doimatkhau">
                        <div style="background: var(--Background-card, rgba(255, 255, 255, 0.08)); padding: 24px; border-radius: 16px; height: 100%">
                            <div class="navigation-column" style="height: unset;font-size: 16px;padding: unset">Đổi mật khẩu<img src="{{asset('images/design/Arrows.svg')}}" alt=""></div>
                            <hr style="margin: 24px 0">
                            <div class="d-flex" style="margin-top: 36px;">

                                <div class="w-100 d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center" style="gap: 16px;">
                                        <input type="text" class="form-input input-password-dashboard" style="padding: unset; height: 30px; padding-left: 15px; padding-top: 6px" disabled value="************">
                                    </div>
                                    <a class="update-account">
                                       Đổi mật khẩu
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/dashboard.js')}}"></script>
    <script !src="">
        if (screen.width <=500) {
            document.getElementById('lichsutocao').style.marginTop = '24px'
            document.getElementById('doimatkhau').style.marginTop = '24px'
        }else {
            document.getElementById('updateAccount').style.display = 'flex'
        }
    </script>
@endsection
