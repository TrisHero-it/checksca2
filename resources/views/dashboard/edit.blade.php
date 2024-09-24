@extends('layouts.app')
@section('title', 'Dashboard')
@section('link')
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
@endsection
@section('content')
    <div class="cangiua">
        <div class="row ">
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
                    <div class="" style="padding: 12px; width: 142px; min-width: 142px; text-align: center; background: var(--Background-Popup, #091E22); border-radius: 12px; height: max-content;">
                        <p style="margin-bottom: unset; margin-top: 4px; font-size: 14px ; text-align: center !important;">Thông tin cá nhân</p>
                    </div>
                    <div class="" style="padding: 12px; width: 130px; min-width: 130px; text-align: center; border-radius: 12px; height: max-content;">
                        <p style="margin-bottom: unset; margin-top: 4px; font-size: 14px ; text-align: center !important;">Lịch sử tố cáo</p>
                    </div>
                    <div class="" style="padding: 12px; width: 130px; min-width: 130px; text-align: center; border-radius: 12px; height: max-content;">
                        <p style="margin-bottom: unset; margin-top: 4px; font-size: 14px ; text-align: center !important;">Phòng midman</p>
                    </div>
                    <div class="" style="padding: 12px; width: 130px; min-width: 130px; text-align: center; border-radius: 12px; height: max-content;">         
                        <p style="margin-bottom: unset; margin-top: 4px; font-size: 14px ; text-align: center !important;">Đổi mật khẩu</p>
                    </div>
                    <div class="" style="padding: 12px; width: 130px; min-width: 130px; text-align: center; border-radius: 12px; height: max-content;">
                        <p style="margin-bottom: unset; margin-top: 4px; font-size: 14px ; text-align: center !important;"><a href="/logout" class="text-light text-decoration-none">Đăng xuất</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">

                <div class="row" style="margin-top: unset;">
                    <div class="col-lg-6">
                        <div style="background: var(--Background-card, rgba(255, 255, 255, 0.08)); padding: 24px; border-radius: 16px; height: 100%">
                            <div class="navigation-column" style="height: unset;font-size: 16px; padding: unset">Ảnh đại diện</div>
                            <hr style="margin: 24px 0">
                            <div class="text-center" style="margin-top: 36px;">
                                @php
                                $stt =  strpos($account->avatar, 'http');
                                 @endphp
                                <img src="<?php if ($stt!==false) {
                                     echo $account->avatar;
                                 }else {
                                     echo \Illuminate\Support\Facades\Storage::url($account->avatar);
                                 }  ?>" style="width: 90px; height: 90px; border-radius: 100px" alt="">

                                <a id="changeAvatar" class="update-account" style="width: max-content; margin: 24px auto 0 auto">
                                    Đổi ảnh đại diện
                                </a>

                            </div>
                            <form action="{{route('dashboard.update-avatar')}}" id="formChangeAvatar" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('put')
                                <input type="file" id="avatar" name="avatar">
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-6" id="suaThongTinCaNhan">

                        <div style="background: var(--Background-card, rgba(255, 255, 255, 0.08)); padding: 24px; border-radius: 16px; height: 100%">
                            <div class="navigation-column" style="height: unset;font-size: 16px; padding: unset">Sửa thông tin cá nhân <div class="d-flex align-items-center"><a class="text-decoration-none text-light" style="font-size: 12px" href="{{route('dashboard.edit-profile')}}">Sửa <img src="{{asset('images/design/Arrows.svg')}}" alt=""></a></div></div>
                            <hr style="margin: 24px 0">
                            <div class="d-flex" style="gap: 12px">
                                <p style="color: #9E9E9E;">Họ và tên:</p> <p>{{$account->name}}</p>
                            </div>

                            <div class="d-flex" style="gap: 12px">
                                <p style="color: #9E9E9E;">Email:</p> <p>{{$account->email}}</p>
                                <p class="text-center"
                                   style=";width: 92px;color: #66E882; font-size: 12px; background: #00501B; padding:4px 12px; border-radius:100px;">
                                    Đã xác thực
                                </p>
                            </div>

                            <div class="d-flex" style="gap: 12px">
                                <p style="color: #9E9E9E;">Số điện thoại:</p> <p>{{$account->numberphone}}</p>
                                @if($account->verify_number_phone == true)
                                    <p class="text-center"
                                       style=";width: 92px;color: #66E882; font-size: 12px; background: #00501B; padding:4px 12px; border-radius:100px;">
                                        Đã xác thực
                                    </p>
                                    @else
                                    <p class="text-center"
                                       style=";width: 105px;color: #FF8989; font-size: 12px; background: #6B2323; padding:4px 12px; border-radius:100px;">
                                        Chưa xác thực
                                    </p>
                                @endif

                            </div>

                            <div class="d-flex" style="gap: 12px">
                                <p style="color: #9E9E9E;">Số cccd:</p> <p>{{$account->identity?? '_ _'}}</p>

                                @if($account->verify_identity == true)
                                    <p class="text-center"
                                       style=";width: 92px;color: #66E882; font-size: 12px; background: #00501B; padding:4px 12px; border-radius:100px;">
                                        Đã xác thực
                                    </p>
                                @else
                                    <p class="text-center"
                                       style=";width: 105px;color: #FF8989; font-size: 12px; background: #6B2323; padding:4px 12px; border-radius:100px;">
                                        Chưa xác thực
                                    </p>
                                @endif
                            </div>

                            <div class="d-flex" style="gap: 12px">
                                <p style="color: #9E9E9E;">Ngày đăng ký:</p> <p>{{$account->created_at}}</p>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="row search-computer" style="margin-top: 24px;">
                    <div class="col-12">
                        <div style="background: var(--Background-card, rgba(255, 255, 255, 0.08)); padding: 24px; border-radius: 16px; height: 100%">
                            <div class="navigation-column" style="height: unset;font-size: 16px; padding: unset">Lịch sử đăng nhập</div>
                            <hr style="margin: 16px 0">
                            <div class="d-flex" style="gap: 24px">
                                <p class="text-start"  style="min-width: 138px; margin-bottom: unset;">IP</p>
                                <p class="text-start"  style="min-width: 160px; margin-bottom: unset;">Ngày tạo</p>
                                <p class="text-start" style="margin-bottom: unset;" >Trình duyệt</p>
                            </div>
                            @foreach($histories as $history)
                            <hr style="margin: 16px 0">
                            <div class="d-flex" style="gap: 24px">
                                    <p style="font-size: 14px; min-width: 138px;color: var(--Light-Grey, #939393);">{{$history->ip}}</p>
                                    <p style="font-size: 14px; min-width: 160px;color: var(--Light-Grey, #939393);">{{$history->created_at}}</p>
                                    <p style="font-size: 14px;  color: var(--Light-Grey, #939393);">{{$history->browser}}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row search-mobile" style="margin-top: 24px;">
                    <div class="cangiua" style="margin-bottom: 24px;">
                        <div class="navigation-column" style="height: unset;font-size: 16px; padding: unset">Lịch sử đăng nhập</div>
                    </div>
                    <div class="col-12">
                        <div style="background: var(--Background-card, rgba(255, 255, 255, 0.08)); padding: 24px; border-radius: 16px; height: 100%; width: max-content;">
                            <div class="d-flex" style="gap: 24px">
                                <p class="text-start"  style="min-width: 138px; margin-bottom: unset;">IP</p>
                                <p class="text-start"  style="min-width: 160px; margin-bottom: unset;">Ngày tạo</p>
                                <p class="text-start" style="margin-bottom: unset;" >Trình duyệt</p>
                            </div>
                            @foreach($histories as $history)
                                <hr style="margin: 16px 0">
                                <div class="d-flex" style="gap: 24px">
                                    <p style="font-size: 14px; min-width: 138px;color: var(--Light-Grey, #939393);">{{$history->ip}}</p>
                                    <p style="font-size: 14px; min-width: 160px;color: var(--Light-Grey, #939393);">{{$history->created_at}}</p>
                                    <p style="font-size: 14px;  color: var(--Light-Grey, #939393);">{{$history->browser}}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                @php
                    $totalPage = ceil($histories->total() / 10);
                    $currentPage = $_GET['page'] ?? 1;
                @endphp
                <div class="d-flex" id="panigation" style="margin-top: 24px; gap:12px; margin-left: 3px;">

                    @if ($totalPage >= 5)
                        <a class="page" style="padding:5px" onclick="reloadPage({{$currentPage-1}})" "><img src="{{asset('images/arrowleft.png')}}" alt=""></a>

                        @if ($currentPage < 5)
                            @for ($i=1; $i<=5; $i++)
                                <a class="page" @if ($currentPage == $i)
                                    style="background: var(--Light-primary, #009571); border: 1px solid var(--Light-primary, #009571);" @endif onclick="reloadPage({{$i}})">{{$i}}</a>
                            @endfor

                            <a class="page" style="border: none;">...</a>
                            <a class="page" onclick="reloadPage({{$totalPage}})">{{$totalPage}}</a>
                        @elseif ($currentPage >= 5 && $currentPage <= $totalPage - 4)
                            <a class="page" onclick="reloadPage(1)">1</a>
                            <a class="page" style="border: none;">...</a>
                            @for ($i = $currentPage - 1; $i <= $currentPage+1; $i++)
                                <a class="page" @if ($currentPage == $i)
                                    style="background: var(--Light-primary, #009571); border: 1px solid var(--Light-primary, #009571);" @endif onclick="reloadPage({{$i}})">{{$i}}</a>
                            @endfor
                            <a class="page" style="border: none;">...</a>

                            <a class="page" onclick="reloadPage({{$totalPage}})">{{$totalPage}}</a>

                        @else
                            <a class="page" onclick="reloadPage({{1}})">1</a>
                            <a class="page" style="border: none;">...</a>
                            @for ($i = $totalPage - 4; $i <= $totalPage; $i++)
                                <a class="page" @if ($currentPage == $i)
                                    style="background: var(--Light-primary, #009571); border: 1px solid var(--Light-primary, #009571);" @endif onclick="reloadPage({{$i}})">{{$i}}</a>
                            @endfor

                        @endif

                        <a class="page" style="padding:5px" onclick="reload({{$currentPage+1}})" "><img src="{{asset('images/arrowright.png')}}" alt=""></a>
                    @else
                        @for ($i = 1; $i <= $currentPage; $i++)
                            @if($i!=$currentPage)
                                <a class="page" href="{{request()->fullUrlWithQuery([
                    'page' => $i
                ])}}" @if ($currentPage == $i)
                                    style="background: var(--Light-primary, #009571); border: 1px solid var(--Light-primary, #009571);" @endif>1</a>
                            @endif
                        @endfor
                    @endif
                </div>

            </div>
        </div>
    </div>
    <script src="{{asset('js/dashboard.js')}}"></script>
    <script !src="">
        document.getElementById('changeAvatar').addEventListener('click', ()=> {
            document.getElementById('avatar').click();
        })
        document.getElementById('avatar').addEventListener('change', ()=> {
            document.getElementById('formChangeAvatar').submit();
        })
        if (screen.width<500) {
            document.getElementById('suaThongTinCaNhan').style.marginTop = '24px'
        }
    </script>
@endsection
