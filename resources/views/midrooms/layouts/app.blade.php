@extends('layouts.app')
@section('title', 'Phòng giao dịch số 1')
@section('link')
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <script src="{{asset('lib/js/config.min.js')}}"></script>
    <script src="{{asset('lib/js/util.min.js')}}"></script>
    <script src="{{asset('lib/js/jquery.emojiarea.min.js')}}"></script>
    <script src="{{asset('lib/js/emoji-picker.min.js')}}"></script>
    <link href="{{asset('lib/css/emoji.css')}}" rel="stylesheet">
    <style>
        .lds-ring,
        .lds-ring div {
            box-sizing: border-box;
        }
        .lds-ring {
            display: inline-block;
            position: relative;
            width: 20px;
            height: 20px;
        }
        .lds-ring div {
            box-sizing: border-box;
            display: block;
            position: absolute;
            width: 20px;
            height: 20px;
            border: 2px solid currentColor;
            border-radius: 50%;
            animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
            border-color: currentColor transparent transparent transparent;
        }
        .lds-ring div:nth-child(1) {
            animation-delay: -0.45s;
        }
        .lds-ring div:nth-child(2) {
            animation-delay: -0.3s;
        }
        .lds-ring div:nth-child(3) {
            animation-delay: -0.15s;
        }
        @keyframes lds-ring {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

    </style>
    @vite('resources/js/app.js')
@endsection
@section('content')
<div class="cangiua">

{{--    start warning midrooms--}}
    <div class="warning-midrooms">
    <div class="d-flex align-items-center" style="gap:4px">
        <img style="width: 16px; height: auto" src="{{asset('images/design/midrooms/barrier.png')}}" alt="">
        <p style="margin-bottom: unset; font-size: 16px; font-weight: 200">Phòng giao dịch hiện tại chưa có Admin đảm bảo</p>
    </div>
        <div class="d-flex align-items-center" style="gap:4px; margin-top: 16px;">
            <img style="width: 16px; height: auto" src="{{asset('images/design/midrooms/X.png')}}" alt="">
            <p style="margin-bottom: unset; font-size: 16px; font-weight: 200">Không an toàn để giao dịch - Không nên giao dịch</p>
        </div>
    </div>
{{--end warning midroom--}}

{{--start step-deal--}}
    <div class="step-deal d-flex">
    <div class="d-flex">
        <img class="step-img" src="{{asset('images/design/midrooms/Dollar.svg')}}" alt="">
        <div>
            <p style="margin-bottom: unset; font-size: 14px; color: var(--Light-Grey, #939393);">Người mua chuyển tiền</p>
            <p style="margin-bottom: unset; color: var(--Light-Grey, #939393); font-size: 12px">_ _ _ _</p>
        </div>
    </div>
        <img src="{{asset('images/design/midrooms/Arrows.svg')}}" alt="">

        <div class="d-flex">
            <img class="step-img" src="{{asset('images/design/midrooms/user.svg')}}" alt="">
            <div>
                <p style="margin-bottom: unset; font-size: 14px; color: var(--Light-Grey, #939393);">Người bán gửi thông tin</p>
                <p style="margin-bottom: unset; color: var(--Light-Grey, #939393); font-size: 12px">_ _ _ _</p>
            </div>
        </div>

        <img src="{{asset('images/design/midrooms/Arrows.svg')}}" alt="">

        <div class="d-flex">
            <img class="step-img" src="{{asset('images/design/midrooms/userActive.svg')}}" alt="">
            <div>
                <p style="margin-bottom: unset; font-size: 14px; color: var(--Light-Grey, #939393);">Người mua xác nhận thông tin</p>
                <p style="margin-bottom: unset; color: var(--Light-Grey, #939393); font-size: 12px">_ _ _ _</p>
            </div>
        </div>

        <img src="{{asset('images/design/midrooms/Arrows.svg')}}" alt="">

        <div class="d-flex">
            <img class="step-img" src="{{asset('images/design/midrooms/Money.svg')}}" alt="">
            <div>
                <p style="margin-bottom: unset; font-size: 14px; color: var(--Light-Grey, #939393);">Midman chuyển tiền</p>
                <p style="margin-bottom: unset; color: var(--Light-Grey, #939393); font-size: 12px">_ _ _ _</p>
            </div>
        </div>
    </div>
{{--end step-deal--}}

    <div class="d-flex w-100" style="gap: 24px; margin-top: 24px;">
        <div class="w-100">
{{--            start infor-midman--}}
            <div class="infor-midman">
                <p>Thông tin chuyển tiền cho Midman</p>
                <div class="form-group w-100" id="formGroup">
                    <select name="category_id" class="form-select" id="form2">
                        <option value="">Ngân hàng <span style="color: forestgreen">*</span></option>
                        <option value="">MB <span style="color: forestgreen">*</span></option>
                        <option value="">VCB <span style="color: forestgreen">*</span></option>
                    </select>
                </div>

                <div class="info-bank">
                    <div class="d-flex justify-content-between">
                        <p style="font-size: 14px ; font-weight: 500;  color: var(--Light-Grey, #939393); margin-bottom: unset;">STK</p>
                        <p style="font-size: 14px ; font-weight: 300;  margin-bottom: unset;">0123456778</p>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <p style="font-size: 14px ; font-weight: 500;  color: var(--Light-Grey, #939393); margin-bottom: unset;">Chủ TK</p>
                        <p style="font-size: 14px ; font-weight: 300;  margin-bottom: unset;">Admin Sca</p>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <p style="font-size: 14px ; font-weight: 500;  color: var(--Light-Grey, #939393); margin-bottom: unset;">Số tiền</p>
                        <p style="font-size: 14px ; font-weight: 500;  margin-bottom: unset;color: var(--Light-primary, #009571);">310.000 VNĐ</p>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <p style="font-size: 14px ; font-weight: 500;  color: var(--Light-Grey, #939393); margin-bottom: unset;">Nội dung</p>
                        <p style="font-size: 14px ; font-weight: 500;  margin-bottom: unset;color: var(--Light-primary, #009571);">Đời buồn JQK</p>
                    </div>
                </div>
                <p style="margin-bottom: unset;color: var(--Yellow, #FFCA06); margin-top: 24px; margin-bottom: 8px;">
                    Upload bill chuyển khoản
                </p>
                <img src="{{asset('images/banner/banner.png')}}" style="width: 60px; height: 60px; border-radius: 12px;border: 1px solid var(--Stroke, #3A3A3A);" alt="">
                <button style="margin-top: 24px; font-size: 14px" class="btnReport w-100">Đã chuyển tiền, báo cho Midman</button>
            </div>
            {{-- End infor-midman--}}

            <div class="infor-midman" style="margin-top: 24px;">
                <p>Nhận thông tin từ người bán</p>


                <div class="text-center" style="margin: 24px 0">
                    <img src="{{asset('images/design/midrooms/box.png')}}" alt="">
                </div>

                <textarea disabled class="no-scroll" style="padding: 16px;font-size: 14px; height: 81px ;resize: none" id="comment" name="comment" rows="10"
                          placeholder="Sau khi mid man xác nhận đã nhận tiền, thông tin của người bán sẽ được hiển thị ở đây"></textarea>
            </div>

        </div>

        <div class="" style="width: 384px;">
            {{--            start infor-midman--}}
            <div class="infor-midman h-100 d-flex" style="flex-direction: column; ">
                <p style="margin-bottom: unset; height: 20px">Kênh chat</p>
                <hr>

                <div class="content-chat2 d-flex justify-content-end" id="contentChat" style="flex-direction: column; flex:  1 0%">
                    <p class="d-flex justify-content-center" style="margin-bottom: unset; font-size: 12px; color: var(--white-60, rgba(255, 255, 255, 0.60)); font-weight: 200">
                        2020-07-08 22:54:27
                    </p>
                    @foreach($messengers as $index => $messenger)

                        @if($messenger->account_id == \Illuminate\Support\Facades\Auth::id())
                            @if(isset($messengers[$index-1]))

                                @if($messenger->account_id == $messengers[$index-1]->account_id)
                                    <script !src="">
                                        var arrChat = document.getElementsByClassName('content-chat');
                                        if(arrChat.length>1) {
                                            for (let i=0; i<arrChat.length-1; i++) {
                                                arrChat[i].classList.remove('content-chat')
                                            }
                                        }
                                        var html = `
                                         <div class="d-flex" style="padding: 12px 16px;flex-direction: column;max-width: 294px;word-break: break-word;width: max-content ;gap: 4px; border-radius: 16px;background: #152833;font-size: 13px; margin-top: 4px;font-weight: 200">
                                                {{$messenger->content}}
                                        </div>`
                                        $('.content-chat').append(html)
                                    </script>
                                @else
                                    <div class="d-flex justify-content-end" style="gap: 12px; margin-top: 12px;">
                                        <div class="content-chat" style="display: flex; flex-direction: column; align-items: flex-end">
                                            <div class="d-flex" style="padding: 12px 16px;flex-direction: column;align-items: flex-start;gap: 4px;max-width: 294px;word-break: break-word; border-radius: 16px;background: #152833;font-size: 13px; margin-top: 4px;font-weight: 200">
                                                {{$messenger->content}}
                                            </div>
                                        </div>

                                        <div class="position-relative" style="min-width: 30px;">
                                            <div class="avatar-me">
                                                <img src="{{$messenger->account->avatar}}" style="width: 32px; height: 32px; border-radius: 100px; position: absolute; bottom: 2px" alt="">
                                                <svg class="position-absolute" style="left: 21px; bottom: 1px; " xmlns="http://www.w3.org/2000/svg" width="9" height="8" viewBox="0 0 9 8" fill="none">
                                                    <circle cx="4.45277" cy="3.86366" r="3.63636" fill="#2DB517"></circle>
                                                </svg>
                                            </div>

                                        </div>
                                    </div>
                                @endif

                            @else
                                <div class="d-flex justify-content-end" style="gap: 12px; margin-top: 12px;">
                                    <div class="content-chat" style="display: flex; flex-direction: column; align-items: flex-end">
                                        <div class="d-flex" style="padding: 12px 16px;flex-direction: column;max-width: 294px;word-break: break-word;align-items: flex-start;gap: 4px; border-radius: 16px;background: #152833;font-size: 13px; margin-top: 4px;font-weight: 200">
                                            {{$messenger->content}}
                                        </div>
                                    </div>

                                    <div class="position-relative" style="min-width: 30px;">
                                        <div class="avatar-me">
                                            <img src="{{$messenger->account->avatar}}" style="width: 32px; height: 32px; border-radius: 100px; position: absolute; bottom: 2px" alt="">
                                            <svg class="position-absolute" style="left: 21px; bottom: 1px; " xmlns="http://www.w3.org/2000/svg" width="9" height="8" viewBox="0 0 9 8" fill="none">
                                                <circle cx="4.45277" cy="3.86366" r="3.63636" fill="#2DB517"></circle>
                                            </svg>
                                        </div>

                                    </div>
                                </div>
                            @endif
                        @else
                            @if(isset($messengers[$index-1]))
                                @if($messenger->account_id == $messengers[$index-1]->account_id)
                                    <script !src="">
                                        var arrChat = document.getElementsByClassName('content-chat');
                                        if(arrChat.length>1) {
                                            for (let i=0; i<arrChat.length-1; i++) {
                                                arrChat[i].classList.remove('content-chat')
                                            }

                                        }
                                        var html = `
                                         <div class="d-flex" style="padding: 12px 16px;flex-direction: column;width: max-content ;max-width: 294px;word-break: break-word;align-items: flex-start;gap: 4px;border-radius: 16px;background: #152833;font-size: 13px; margin-top: 4px;font-weight: 200">
                                                {{$messenger->content}}
                                        </div>
`
                                        $('.content-chat').append(html)
                                    </script>
                                @else
                                    <div class="d-flex " style="gap: 12px">
                                        <div class="position-relative" style="min-width: 30px;">
                                            <div>
                                                <img src="{{$messenger->account->avatar}}" style="width: 32px; height: 32px; border-radius: 100px; position: absolute; bottom: 2px" alt="">
                                                <svg class="position-absolute" style="left: 21px; bottom: 1px; " xmlns="http://www.w3.org/2000/svg" width="9" height="8" viewBox="0 0 9 8" fill="none">
                                                    <circle cx="4.45277" cy="3.86366" r="3.63636" fill="#2DB517"></circle>
                                                </svg>
                                            </div>

                                        </div>

                                        <div>
                                            <p style="margin-bottom: unset; letter-spacing: 1px ;font-size: 10px; margin-top: 12px;; color: var(--white-60, rgba(255, 255, 255, 0.60)); font-weight: 200; margin-left: 12px;">
                                                {{$messenger->account->name}}
                                            </p>
                                            <div class="content-chat">

                                                <div class="d-flex" style="padding: 12px 16px;flex-direction: column;width: max-content ;max-width: 294px;word-break: break-word;align-items: flex-start;gap: 4px; border-radius: 16px;background: #152833;font-size: 13px; margin-top: 4px;font-weight: 200">
                                                    {{$messenger->content}}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endif
                            @else

                                <div class="d-flex " style="gap: 12px">
                                    <div class="position-relative" style="min-width: 30px;">
                                        <div>
                                            <img src="{{$messenger->account->avatar}}" style="width: 32px; height: 32px; border-radius: 100px; position: absolute; bottom: 2px" alt="">
                                            <svg class="position-absolute" style="left: 21px; bottom: 1px; " xmlns="http://www.w3.org/2000/svg" width="9" height="8" viewBox="0 0 9 8" fill="none">
                                                <circle cx="4.45277" cy="3.86366" r="3.63636" fill="#2DB517"></circle>
                                            </svg>
                                        </div>

                                    </div>

                                    <div>

                                        <p style="margin-bottom: unset; letter-spacing: 1px ;font-size: 10px; margin-top: 12px;; color: var(--white-60, rgba(255, 255, 255, 0.60)); font-weight: 200; margin-left: 12px;">
                                            {{$messenger->account->name}}
                                        </p>
                                        <div class="content-chat">

                                            <div class="d-flex" style="padding: 12px 16px;flex-direction: column;width: max-content ;max-width: 294px;word-break: break-word;align-items: flex-start;gap: 4px; border-radius: 16px;background: #152833;font-size: 13px; margin-top: 4px;font-weight: 200">
                                                {{$messenger->content}}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endif
                        @endif

                    @endforeach


                </div>

                <hr>
                <div class="d-flex align-items-center" style="gap: 12px; height: 60px">
                    <img src="{{asset('images/design/midrooms/Photo.svg')}}" alt="">
                    <img id="emoji" src="{{asset('images/design/midrooms/emoji.svg')}}" alt="">
                    <div class="w-100 position-relative">
                        <div class="w-100 input-mobile">
                           <textarea class="chat no-scroll" id="chat" style="height: 44px; resize: none" data-emojiable="true"
                                     data-emoji-input="unicode" type="text">
                           </textarea>
                        </div>
                        <img style="top: 14px; right: 19px; cursor: pointer" onclick="sendMessage()" src="{{asset('images/design/midrooms/send.svg')}}" class="position-absolute" id="sendMessage" alt="">
                        <div class="lds-ring position-absolute" id="loadingMessage" style="top: 14px; right: 19px; display: none"><div></div><div></div><div></div><div></div></div>
                    </div>
                </div>
            </div>
            {{-- End infor-midman--}}

        </div>


        <div class="w-100">
            <div class="w-100">

            {{--            start infor-midman--}}
            <div class="infor-midman">
                <p>Danh sách thành viên</p>
             <div class="d-flex justify-content-between">
                 <div class="d-flex position-relative align-items-center" style="gap: 12px">
                     <img src="{{$midRoom->accountSeller->avatar}}" style="width: 32px; height: 32px; border-radius: 100px" alt="">
                     <svg class="position-absolute" style="left: 21px; bottom: 1px; " xmlns="http://www.w3.org/2000/svg" width="9" height="8" viewBox="0 0 9 8" fill="none">
                         <circle cx="4.45277" cy="3.86366" r="3.63636" fill="#2DB517"/>
                     </svg>
                     <div>
                         <p style="margin-bottom: unset; font-size: 14px">{{$midRoom->accountSeller->name}}</p>
                         <p style="font-size: 10px;color: var(--Light-Grey, #939393); margin-bottom: unset;">Người bán</p>
                     </div>
                 </div>

                 <div class="d-flex align-items-center" style="gap: 12px">
                     <img style="width: 24px; height: 24px" src="{{asset('images/design/midrooms/phoneActive.svg')}}" alt="">
                 </div>
             </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center position-relative" style="gap: 12px">
                        <img src="{{$midRoom->accountBuyer->avatar}}" style="width: 32px; height: 32px; border-radius: 100px" alt="">
                        <svg class="position-absolute" style="left: 21px; bottom: 1px;" xmlns="http://www.w3.org/2000/svg" width="9" height="8" viewBox="0 0 9 8" fill="none">
                            <circle cx="4.45277" cy="3.86366" r="3.63636" fill="#2DB517"/>
                        </svg>
                        <div>
                            <p style="margin-bottom: unset; font-size: 14px">{{$midRoom->accountBuyer->name}}</p>
                            <p style="font-size: 10px;color: var(--Light-Grey, #939393); margin-bottom: unset;">Người mua</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center" style="gap: 12px">
                        <img style="width: 24px; height: 24px" src="{{asset('images/design/midrooms/phoneActive.svg')}}" alt="">
                    </div>
                </div>

                <hr>

                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center position-relative" style="gap: 12px">
                        <img src="{{\Illuminate\Support\Facades\Storage::url($midRoom->trader->img)}}" style="width: 32px; height: 32px; border-radius: 100px" alt="">
                        <svg class="position-absolute" style="left: 21px; bottom: 1px;" xmlns="http://www.w3.org/2000/svg" width="9" height="8" viewBox="0 0 9 8" fill="none">
                            <circle cx="4.45277" cy="3.86366" r="3.63636" fill="#2DB517"/>
                        </svg>
                        <div>
                            <p style="margin-bottom: unset; font-size: 14px">{{$midRoom->trader->fullname}}</p>
                            <p style="font-size: 10px;color: var(--Light-Grey, #939393); margin-bottom: unset;">Midman</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center" style="gap: 12px">
                        @if($midRoom->trader->link_facebook != null)
                            <img style="width: 24px; height: 24px" src="{{asset('images/trader-icon/security.svg')}}" alt="">
                        @endif
                        @if($midRoom->trader->identity_verification)
                                <img style="width: 24px; height: 24px" src="{{asset('images/trader-icon/user.svg')}}" alt="">
                        @endif

                        @if($midRoom->trader->phone_verification)
                                <img style="width: 24px; height: 24px" src="{{asset('images/trader-icon/phone.svg')}}" alt="">
                        @endif
                            <img style="width: 24px; height: 24px" src="{{asset('images/trader-icon/money.svg')}}" alt="">


                    </div>
                </div>
            </div>
            {{-- End infor-midman--}}
            </div>

            <div class="w-100" style="margin-top: 24px;">

                {{--            start infor-midman--}}
                <div class="infor-midman">
                    <p>Thông tin phòng giao dịch</p>
                   <div class="d-flex align-items-center" style="gap: 8px">
                       <p style="font-size: 14px;color: var(--Light-Grey, #939393); margin-bottom: unset;">Tên phòng:</p>
                       <p style="margin-bottom: unset; font-size: 14px">{{$midRoom->name}}</p>
                   </div>
                    <hr>
                    <div class="d-flex align-items-center justify-content-between" >
                        <div class="d-flex" style="gap: 8px">
                            <p style="font-size: 14px;color: var(--Light-Grey, #939393); margin-bottom: unset;">Mã bảo mật:</p>
                            <input id="pass" type="password" style="margin-bottom: unset; font-size: 14px;background: #1F2021; border: none; outline: none" disabled value="{{$midRoom->security_code}}">
                        </div>
                        <img style="cursor: pointer" src="{{asset('images/design/Eyeblock.svg')}}" alt="" id="showPass">
                    </div>
                    <hr>
                    <div class="d-flex align-items-center" style="gap: 8px">
                        <p style="font-size: 14px;color: var(--Light-Grey, #939393); margin-bottom: unset;">Người tạo:</p>
                        <p style="margin-bottom: unset; font-size: 14px">{{$midRoom->account->name}}</p>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center" style="gap: 8px">
                        <p style="font-size: 14px;color: var(--Light-Grey, #939393); margin-bottom: unset;">Số tiền:</p>
                        <p style="margin-bottom: unset; font-size: 14px;color: var(--Light-primary, #009571);">{{number_format($midRoom->moneys, 0 ,',','.')}} VNĐ</p>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center" style="gap: 8px">
                        <p style="font-size: 14px;color: var(--Light-Grey, #939393); margin-bottom: unset;">Phí giao dịch:</p>
                        <p style="margin-bottom: unset; font-size: 14px;color: var(--Light-primary, #009571);">100tr VNĐ</p>
                    </div>
                </div>
                {{-- End infor-midman--}}
            </div>

            <div class="w-100" style="margin-top: 24px;">

                {{--            start infor-midman--}}
                <div class="infor-midman">
                    <div class="d-flex align-items-center justify-content-between">
                        <p style="margin-bottom: unset;">Thêm người tham gia</p>
                        <img style="cursor: pointer" src="{{asset('/images/design/midrooms/invite.svg')}}" alt="">
                    </div>

                </div>
                {{-- End infor-midman--}}
            </div>

        </div>

    </div>

</div>
<script !src="">



    function sendMessage() {
        const div = document.querySelector('div[data-type="input"]');
        $.ajax({
            url : '/api/messengers/'+{{$midRoom->id}},
            success : function (mess) {
                var accountId = mess.account_id;
                if (document.getElementById('chat').value.trim()!='') {
                if (accountId == {{auth()->id()}}) {
                    var arrChat = document.getElementsByClassName('content-chat');
                    if(arrChat.length>1) {
                        for (let i=0; i<arrChat.length-1; i++) {
                            arrChat[i].classList.remove('content-chat')
                        }
                    }
                    var html = `
                                         <div class="d-flex" style="padding: 12px 16px;flex-direction: column;width: max-content ;gap: 4px;border-radius: 16px;background: #152833;font-size: 13px; margin-top: 4px;font-weight: 200">
                                                ${document.getElementById('chat').value.trim()}
                    </div>
`
                    $('.content-chat').append(html)
                }else {
                    var html ='';
                    html += `<div class="d-flex justify-content-end" style="gap: 12px;                                                         ">
                                <div>
                                    <div class="d-flex" style="padding: 12px 16px;flex-direction: column;align-items: flex-start;gap: 4px;border-radius: 16px;background: #152833;font-size: 13px; margin-top: 4px;font-weight: 200">
                                        ${document.getElementById('chat').value}
                                    </div>
                                </div>

                                <div class="position-relative" style="min-width: 30px;">
                                                <div class="avatar-me">
                                                <img src="{{auth()->user()->avatar}}" style="width: 32px; height: 32px; border-radius: 100px; position: absolute; bottom: 2px" alt="">
                                                <svg class="position-absolute" style="left: 21px; bottom: 1px; " xmlns="http://www.w3.org/2000/svg" width="9" height="8" viewBox="0 0 9 8" fill="none">
                                                    <circle cx="4.45277" cy="3.86366" r="3.63636" fill="#2DB517"></circle>
                                                </svg>
                                            </div>

                                </div>
                            </div>`;
                    $('#contentChat').append(html)
                }
                    document.getElementById('sendMessage').style.display = 'none';
                    document.getElementById('loadingMessage').style.display = 'block';
                    div.innerText = ''

                    $.ajax({
                        url : '/messengers',
                        method : 'POST',
                        data : {
                            _token : "{{csrf_token()}}",
                            detail_contract_id: {{$midRoom->id}},
                            content : document.getElementById('chat').value.trim(),
                        },
                        success : function (data) {
                            document.getElementById('sendMessage').style.display = 'block';
                            document.getElementById('loadingMessage').style.display = 'none';
                        }
                    });
                }
            }
        })

    }

    document.addEventListener('DOMContentLoaded', () => {
        if (window.Echo) {
            window.Echo.channel('chatChannel')
                .listen('chatEvent', (e) => {
                    let chat = document.getElementById('contentChat')
                    let html = ''
                    console.log(e);
                    if (e.detail_contract_id == {{$midRoom->id}}) {
                        if (e.account_id != {{\Illuminate\Support\Facades\Auth::id()}}) {
                        if (e.old_message.account_id) {
                            if (e.old_message.account_id != e.account_id) {
                                html += `
                               <div class="d-flex " style="gap: 12px">
                                <div class="position-relative" style="min-width: 30px;">
                                <div>
                                                    <img src="${e.account_send_message.avatar}" style="width: 32px; height: 32px; border-radius: 100px; position: absolute; bottom: 2px" alt="">
                                                    <svg class="position-absolute" style="left: 21px; bottom: 1px; " xmlns="http://www.w3.org/2000/svg" width="9" height="8" viewBox="0 0 9 8" fill="none">
                                                        <circle cx="4.45277" cy="3.86366" r="3.63636" fill="#2DB517"></circle>
                                                    </svg>
                                </div>

                                </div>

                                <div>

                                                                            <p style="margin-bottom: unset; letter-spacing: 1px; margin-top: 12px; ;font-size: 10px; color: var(--white-60, rgba(255, 255, 255, 0.60)); font-weight: 200; margin-left: 12px;">
                                               ${e.account_send_message.name}
                                        </p>
                                                                        <div class="d-flex" style="padding: 12px 16px;flex-direction: column;width: max-content ;align-items: flex-start;gap: 4px;border-radius: 16px;background: #152833;font-size: 13px; margin-top: 4px;font-weight: 200">
                                        ${e.content}
                                    </div>
                                </div>

                            </div>
                                `;
                                $('#contentChat').append(html)

                            }else {
                                var arrChat = document.getElementsByClassName('content-chat');
                                if(arrChat.length>1) {
                                    for (let i=0; i<arrChat.length-1; i++) {
                                        arrChat[i].classList.remove('content-chat')
                                    }

                                }
                                html = `
                                         <div class="d-flex" style="padding: 12px 16px;flex-direction: column;width: max-content ;max-width: 294px;word-break: break-word;align-items: flex-start;gap: 4px;border-radius: 16px;background: #152833;font-size: 13px; margin-top: 4px;font-weight: 200">
                                                ${e.content}
                            </div>
`
                                $('.content-chat').append(html)
                            }
                        }else {
                            html += `
                               <div class="d-flex " style="gap: 12px">
                                <div class="position-relative" style="min-width: 30px;">
                                <div>
                                                    <img src="${e.account_send_message.avatar}" style="width: 32px; height: 32px; border-radius: 100px; position: absolute; bottom: 2px" alt="">
                                                    <svg class="position-absolute" style="left: 21px; bottom: 1px; " xmlns="http://www.w3.org/2000/svg" width="9" height="8" viewBox="0 0 9 8" fill="none">
                                                        <circle cx="4.45277" cy="3.86366" r="3.63636" fill="#2DB517"></circle>
                                                    </svg>
                                </div>

                                </div>

                                <div>

                                                                            <p style="margin-bottom: unset; letter-spacing: 1px; margin-top: 12px; ;font-size: 10px; color: var(--white-60, rgba(255, 255, 255, 0.60)); font-weight: 200; margin-left: 12px;">
                                               ${e.account_send_message.name}
                                        </p>
                                                                        <div class="d-flex" style="padding: 12px 16px;flex-direction: column;width: max-content ;align-items: flex-start;gap: 4px;border-radius: 16px;background: #152833;font-size: 13px; margin-top: 4px;font-weight: 200">
                                        ${e.content}
                                    </div>
                                </div>

                            </div>
                                `;
                            $('#contentChat').append(html)
                        }

                        }
                    }
                });
        } else {
            console.error('Echo is not defined');
        }
    });
</script>

<script>
let e;

    $(function() {
        // Initializes and creates emoji set from sprite sheet
        window.emojiPicker = new EmojiPicker({
            emojiable_selector: '[data-emojiable=true]',
            assetsPath: '{{asset('lib/img')}}',
            popupButtonClasses: 'fa fa-smile-o' // far fa-smile if you're using FontAwesome 5
        });
        // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
        // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
        // It can be called as many times as necessary; previously converted input fields will not be converted again
        window.emojiPicker.discover();
        e = document.getElementsByClassName('emoji-picker-icon');
        e[0].style.display = 'none'
        document.getElementsByClassName('emoji-wysiwyg-editor')[0].style.fontSize = '14px'
        document.getElementsByClassName('emoji-wysiwyg-editor')[0].style.width = '264px'
        document.getElementsByClassName('emoji-wysiwyg-editor')[0].style.fontWeight = '200'
        document.getElementsByClassName('emoji-wysiwyg-editor')[0].classList.remove('emoji-wysiwyg-editor');
        let menu = document.getElementsByClassName('emoji-menu')[0]
        menu.style.width = '340px';
        menu.style.boxShadow = `5px 5px 15px rgba(0, 0, 0, 0.3),
    -5px -5px 15px rgba(0, 0, 0, 0.3),
    5px -5px 15px rgba(0, 0, 0, 0.3),
    -5px 5px 15px rgba(0, 0, 0, 0.3)`;
        menu.style.top = '-360px';
        menu.style.border = '1px solid #1F2021';
        menu.style.right = '-2px'
        document.getElementsByClassName('emoji-items-wrap')[0].style.height = '300px'
        document.getElementsByClassName('emoji-items-wrap')[0].style.overflow = 'auto'
        document.getElementsByClassName('emoji-items-wrap1')[0].style.background = '#242526'
        document.querySelector('[data-type="input"]').addEventListener('keydown', function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                this.blur();
                sendMessage();
            }
        });
    });
    document.getElementById('emoji').addEventListener('click', ()=> {
        e[0].click();
    })
</script>
<script !src="">
    let showPass = document.getElementById('showPass');
    showPass.addEventListener('click', () => {
        if (document.getElementById('pass').type=='text')
        {
            showPass.src = '/images/design/Eyeblock.svg'
            document.getElementById('pass').type = 'password';
        }else {
            showPass.src = '/images/design/Eye.svg'
            document.getElementById('pass').type = 'text';
        }
    })
</script>
@endsection
