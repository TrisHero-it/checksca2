@extends('layouts.app')
@section('link')
<link rel="stylesheet" href="{{ asset('css/style3.css') }}">
<link rel="stylesheet" href="{{ asset('css/style2.css') }}">
<style>
    p {
        font-size: 16px;
        color: #9E9E9E;
    }

    @media only screen and (max-width: 1111px) {
        p {
            font-size: 14px;
            color: #9E9E9E;
        }

        .trader-icon {
            display: none;
        }

        .trader-contact {
            width: 133.5px !important;
            justify-content: center;
        }

        .trader-contact2 {
            margin-top: 12px;
        }

        .info {
            margin-top: 12px;
        }
    }
</style>
@endsection
@section('content')


        <div class="cangiua" style="" id="bodyShowTrader">
                <div class="un-flex-mobile" style="gap: 24px; ">

                    <div style="background: var(--Background-card, rgba(255, 255, 255, 0.08)); border-radius: var(--24px, 24px);padding: var(--24px, 24px);">
                        @if($trader->contract_id == 5)
                            <div style="padding: 2px; border-radius: 500px; width: max-content; margin: 0 auto;background: linear-gradient(to right, #D9B44B, #0EF);">
                                <img src="{{\Illuminate\Support\Facades\Storage::url($trader->img)}}" style="border-radius: 5000px; width: 112px; height: 112px; padding: 8px; background: #1F2021" alt="">
                            </div>
                        @else
                            <div style="padding: 8px; border: 2px solid var(--Light-White, #{{$trader->contract->color}}); border-radius: 500px; width: max-content; margin: 0 auto">
                                <img src="{{\Illuminate\Support\Facades\Storage::url($trader->img)}}" style="border-radius: 5000px; width: 104px; height: 104px" alt="">
                            </div>
                        @endif

                    <div class="d-flex" style=" gap: 6px; width: max-content; margin: 16px auto 0 auto">
                        <p style="font-size: 20px; color: var(--Light-White, #E4E4E4);">
                            {{$trader->fullname}}
                        </p>
                        <img style="width: 40px; height: 40px" src="{{\Illuminate\Support\Facades\Storage::url($trader->contract->image)}}" alt="">
                    </div>
                        <div class="d-flex" style="gap: 12px; margin: 0 auto; width: max-content;">
                            @if($trader->is_Admin_Facebook != '')
                                <a href="{{$trader->link_facebook   }}">
                                    <img style="width: 24px; height: 24px" data-toggle="tooltip" data-placement="top" title="Admin của {{$trader->is_Admin_Facebook}}" src="{{asset('images/trader-icon/security.svg')}}" alt="">
                                </a>
                            @endif
                            @if($trader->identity_verification == 1)
                                <img style="width: 24px; height: 24px" data-toggle="tooltip" data-placement="top" title="Đã xác thực căn cước" src="{{asset('images/trader-icon/user.svg')}}" alt="">
                            @endif

                            @if($trader->phone_verification == 1)
                                <img style="width: 24px; height: 24px" data-toggle="tooltip" data-placement="top" title="Đã xác thực số điện thoại" src="{{asset('images/trader-icon/phone.svg')}}" alt="">
                            @endif
                            <img style="width: 24px; height: 24px" data-toggle="tooltip" data-placement="top" title="{{$trader->contract->name}}" src="{{asset('images/trader-icon/money.svg')}}" alt="">
                        </div>

                        <div class="d-flex" style="gap: 12px">
                            <div  class="d-flex trader-contact" style="width: max-content; gap: 8px; margin: 0 auto; margin-top: 16px; padding: 12px 16px; background: rgba(255, 255, 255, 0.12); border-radius: 100px;">
                                <img class="trader-icon" src="{{asset('images/trader-icon/messenger.svg')}}" alt="">
                                <p style="margin-bottom: unset; color: white ">
                                    Check mess
                                </p>
                            </div>
                            <div  class="d-flex trader-contact" style="width: max-content; gap: 8px; margin: 0 auto; margin-top: 16px; padding: 12px 16px; background: rgba(255, 255, 255, 0.12); border-radius: 100px;">
                                <img class="trader-icon" src="{{asset('images/trader-icon/phone2.svg')}}" alt="">
                                <p style="margin-bottom: unset; color: white ">
                                    Check phone
                                </p>
                            </div>
                        </div>

                    </div>

                    <div class="w-100 trader-contact2" style="background: var(--Background-card, rgba(255, 255, 255, 0.08)); border-radius: var(--24px, 24px);padding: var(--24px, 24px);">
                        <p style="font-size: 16px; color: var(--Light-White, #E4E4E4);">
                            Thông tin liên hệ
                        </p>

                        <div class="d-flex" style="margin-top: 16px; gap: 8px">
                            <img src="{{asset('images/trader-icon/facebook.svg')}}" alt="">
                            <p style="color: #9E9E9E; margin-bottom: unset;">
                            Check FB:
                            </p>
                            <a href="{{$trader->facebook}}" style="color: var(--Blue, #0989FF); text-decoration-line: underline !important; ">{{$trader->facebook}}</a>
                        </div>

                        <div class="d-flex" style="margin-top: 16px; gap: 8px">
                            <img src="{{asset('images/trader-icon/zalo.svg')}}" alt="">
                            <p style="color: #9E9E9E; margin-bottom: unset;">
                                Check Zalo:
                            </p>
                            <a href="tel:{{$trader->zalo}}" style="color: var(--Blue, #0989FF); text-decoration-line: underline !important; ">{{$trader->zalo}}</a>
                        </div>

                        <div class="d-flex" style="margin-top: 16px; gap: 8px">
                            <img src="{{asset('images/trader-icon/web.svg')}}" alt="">
                            <p style="color: #9E9E9E; margin-bottom: unset;">
                               Web:
                            </p>
                            <a href="{{$trader->website}}" style="color: var(--Blue, #0989FF); text-decoration-line: underline !important; ">{{$trader->website}}</a>
                        </div>
                        <hr style="margin: 24px 0">
                        <p style="font-size: 16px; color: var(--Light-White, #E4E4E4);">
                            Quỹ bảo hiểm Muakey
                        </p>
                        <p style="color: #9E9E9E; margin-bottom: unset;">
                                Từ ngày 11/07/2023 Khách hàng sẽ được MmoFund.vn bảo hiểm an toàn giao dịch với số tiền trong quỹ bảo hiểm <a style="color: var(--Blue, #0989FF); ">3,000,000.vnđ</a>  của <a style="color: var(--Blue, #0989FF);">{{$trader->fullname}}</a>
                        </p>

                    </div>



                </div>

                <div class="info" style="position: relative;">

                    <p style="color: var(--Light-Stroke, #E4E4E4);">Mô tả</p>
                    <p id="describe">{{ $trader->describe ?? 'Đang cập nhập...' }}</p>
                    <div class="text-center" id="submit2">
                        <button class="btn btn-success">Sửa</button>
                    </div>
                </div>

                <div class="info" style="position: relative;">
                    <p style="color: var(--Light-Stroke, #E4E4E4);">Vui lòng kiểm tra kỹ thông tin trước khi giao dịch
                        tránh
                        Fake:
                    </p>
                    <p>TK ngân hàng:</p>
                    <p id="bank" style="white-space: pre-wrap">{{ $trader->bank ?? 'Đang cập nhập...' }}</p>
                    <p style="color: var(--Light-Stroke, #E4E4E4);">Phí trung gian</p>
                    <p id="fee" style="white-space: pre-wrap; margin-bottom: unset;">{{ $trader->fee ?? 'Đang cập nhập...' }}
                    </p>
                    <p> Lưu Ý: Tránh trường hợp Nick Fake, Ảnh Fake, Link Fake, Rửa Tiền…. Người dùng hãy nhớ Chát đúng
                        Facebook,
                        Gọi đúng SĐT, Chuyển khoản đúng những STK có ở trong trong link bảo hiểm này MmoFund.vn cam kết
                        bạn
                        sẽ an
                        toàn trong mọi giao dịch..!!!</p>
                    <div class="text-center" id="submit3">
                        <button class="btn btn-success">Sửa</button>
                    </div>
                </div>

                <div class="info" style="border: 1px solid var(--Light-primary, #009571); color: #9E9E9E;">

                    Mọi giao dịch của bạn với "{{ $trader->fullname }}" sẽ được MmoFund.vn Bảo vệ với số tiền nằm trong
                    Quỹ
                    bảo hiểm
                    3,000,000.vnđ khi bạn tuân theo <a href="">Điều Khoản Sử Dụng</a> của MmoFund.vn

                </div>

</div>

        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })

            if (screen.width>=500) {
                document.getElementById('bodyShowTrader').style.marginTop = '60px'
            }else {
                document.getElementById('bodyShowTrader').style.marginTop = '48px'
            }
        </script>
<script src="{{ asset('js/traders.js') }}"></script>
@endsection
