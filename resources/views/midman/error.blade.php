@extends('layouts.app')
@section('title', 'Midman')
@section('link')
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
@endsection
@section('content')
    <div class="cangiua text-center">
        <img src="{{asset('images/design/midman/error.png')}}" style="margin-top: 170px;" alt="">
        <p style="width: 588px; margin: 0 auto; color: var(--Light-White, #E4E4E4);
        padding-top: 25px;
text-align: center;
font-family: Mulish;
font-size: 20px;
font-style: normal;
font-weight: 500;
line-height: 140%; /* 28px */">
            Email của bạn hiện chưa được cấp quyền truy cập bởi chủ phòng. Để tiếp tục, vui lòng liên hệ với chủ phòng hoặc nhấn vào nút bên dưới để yêu cầu quyền truy cập:
        </p>
        <button class="btnReport d-flex align-items-center" id="guiduyet" style="width: max-content; margin: 0 auto; transform: translateY(20px)" >Yêu cầu quyền truy cập</button>
    </div>
    <div style="width: 10px; height: 130px"></div>
@endsection
