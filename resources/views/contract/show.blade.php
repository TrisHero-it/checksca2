@extends('layouts.app')
@section('title', 'Create')
@section('link')
<link rel="stylesheet" href="{{ asset('css/style2.css') }}">
@endsection
@section('content')

<div class="cangiua" style="margin-top:30px">
    <h4>Các gói bảo hiểm</h4>

    <p style="margin-top:20px">Quỹ bảo hiểm CS là số tiền mà các đại lý, giao dịch viên, thành viên nạp vào số tài khoản
        bảo lãnh của <strong>
            check <span style="color: #00FABE">SCA</span> </strong> để đảm bảo giao dịch được thực hiện trong phạm vi
        hạn mức bảo lãnh.</p>

    <ul>
        <div style="display:flex">
            <li style="min-width:374px">Gói đồng: 2.000.000 ( Hai triệu đồng )</li> <a href="/contracts/1"
                style="margin-left:30px; text-decoration: none; color:#00FABE">Xem chi tiết</a>
        </div>
        <div style="display:flex">
            <li style="min-width:374px">Gói bạc: 5.000.000 ( Năm triệu đồng )</li> <a href="/contracts/2"
                style="margin-left:30px; text-decoration: none; color:#00FABE">Xem chi tiết</a>
        </div>
        <div style="display:flex">
            <li style="min-width:374px">Gói vàng: 10.000.000 ( Mười triệu đồng )</li> <a href="/contracts/3"
                style="margin-left:30px; text-decoration: none; color:#00FABE">Xem chi tiết</a>
        </div>
        <div style="display:flex">
            <li style="min-width:374px">Gói kim cương: 50.000.000 ( Năm mươi triệu đồng )</li> <a href="/contracts/4"
                style="margin-left:30px; text-decoration: none; color:#00FABE">Xem chi
                tiết</a>
        </div>
    </ul>
    <h4>
        Gói bảo hiểm {{$detail->name}}
    </h4>

    <p>
        {!!$detail->content!!}
    </p>
</div>

@endsection