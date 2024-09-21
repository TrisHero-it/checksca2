@extends('layouts.app')
@section('title', 'Đăng ký')
@section('link')
<link rel="stylesheet" href="{{ asset('css/style2.css') }}">
@endsection
@section('content')

<div class="cangiua" style="margin-top: 60px; width: 587px;">
    <div class="border-sign-up">
        <h5>Đăng ký </h5>
        <p>Để trở thành thành viên của <span style="color:var(--Light-primary, #009571)">CheckSca.com</span>, vui lòng hoàn thành thông tin dưới
            đây:</p>
        <form action="{{request()->url()}}" method="post">
            @csrf
            <div class="form-group w-100">
                <input class="form-input w-100" style="outline:none" name='name' type="text" value="{{ old('scam') }}" id="name"
                    placeholder=" ">
                <label class="form-label" for="number">Họ và tên<span style="color: forestgreen">*</span></label>
            </div>

            <div class="form-group w-100">
                <input class="form-input w-100" style="outline:none" name='number_phone' type="text" value="{{ old('scam') }}" id="number"
                    placeholder=" ">
                <label class="form-label" for="number">Số điện thoại<span
                        style="color: forestgreen">*</span></label>
            </div>

            <div class="form-group w-100 position-relative">
                <input class="form-input w-100" style="outline:none" name='password' type="password" value="{{ old('scam') }}" id="pass" onkeydown="validatePassword()"
                    placeholder=" ">
                <label class="form-label" for="number">Mật khẩu<span
                        style="color: forestgreen">*</span></label>
                <img class="position-absolute icon-password" id="signUpPass" src="{{asset('images/design/Eyeblock.svg')}}" alt="">
            </div>

            <div class="d-flex" style="gap:4px; margin-top: 12px;"><img class="img-check-pass" src="{{asset('images/design/tich-v/trang.svg')}}" alt="">
        <p class="validation-password text-check-pass" style="">Gồm 6-20 kí tự</p></div>

        <div class="d-flex" style="gap:4px; margin-top: 12px;"><img class="img-check-pass" src="{{asset('images/design/tich-v/trang.svg')}}" alt="">
        <p class="validation-password text-check-pass" style="">Gồm ký tự in hoa, in thường và số</p></div>

        <div class="d-flex" style="gap:4px; margin-top: 12px;;margin-bottom: 24px"><img class="img-check-pass" src="{{asset('images/design/tich-v/trang.svg')}}" alt="">
        <p class="validation-password text-check-pass" style="">Không gồm ký tự đặc biệt</p></div>

        {!! NoCaptcha::renderJs() !!}
        {!! NoCaptcha::display() !!}

        <button style="margin-top: 24px;" class="btn btn-success btn-send-create justify-content-center" id="guiduyet">
            Đăng ký
        </button>
        </form>
    </div>
</div>
@endsection
