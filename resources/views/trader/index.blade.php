@extends('layouts.app')
@section('link')
<link rel="stylesheet" href="{{ asset('css/style3.css') }}">
@endsection
@section('check', 'Quỹ bảo hiểm')
@section('sca', '')
@section('infor', 'An toàn hơn khi giao dịch,
check kĩ admin trước khi giao dịch để tránh giả mạo!!!')
@php
    $menu = true;
    $category2 = true;
@endphp

@section('content')

    <div class="cangiua d-flex list-trader" style="margin-top: 60px; flex-wrap: wrap; gap: 24px; transform: translateY(-139px);">

         @foreach($traders as $trader)
            <a href="{{route('traders.show', $trader->id)}}">
                <div class="trader" style="height: 146px">
                    <div class="d-flex justify-content-between" >
                        <div class="d-flex" style="gap: 8px">
                            <img src="{{\Illuminate\Support\Facades\Storage::url($trader->img)}}" style="width: 40px; height: 40px; border-radius: 100px" alt="">
                            <div>
                                <p style="margin-bottom: unset; font-size: 14px; overflow: hidden; text-overflow: ellipsis; width: 143px;color: var(--Light-White, #E4E4E4);">
                                    {{$trader->fullname}}
                                </p>
                                <div class="d-flex" style="gap: 12px; margin-top: 3px;">
                                    @if($trader->is_Admin_Facebook != null)
                                           <img style="" onclick="loadUrl('{{$trader->link_facebook}}')" data-toggle="tooltip" data-placement="top" title="Admin của {{$trader->is_Admin_Facebook}}" src="{{asset('images/trader-icon/security.svg')}}" alt="">
                                    @endif
                                    @if($trader->identity_verification == 1)
                                        <img data-toggle="tooltip" data-placement="top" title="Đã xác thực căn cước" src="{{asset('images/trader-icon/user.svg')}}" alt="">
                                    @endif

                                    @if($trader->phone_verification == 1)
                                        <img data-toggle="tooltip" data-placement="top" title="Đã xác thực số điện thoại" src="{{asset('images/trader-icon/phone.svg')}}" alt="">
                                    @endif
                                    <img data-toggle="tooltip" data-placement="top" title="{{$trader->contract->name}}" src="{{asset('images/trader-icon/money.svg')}}" alt="">
                                </div>
                            </div>
                        </div>
                        <img style="margin-left: 8px;" src="{{\Illuminate\Support\Facades\Storage::url($trader->contract->image)}}" alt="">

                    </div>

                    <div style="margin-top: 16px;">
                        <div class="d-flex" style="flex-wrap: wrap; gap: 4px">
                            @foreach($trader->categories as $category)
                                <button class="btnReport" style="font-size: 12px;height: 24px; width: max-content; padding: 0 8px; background: var(--Light-Black, #2E2C29); border-radius: 100px;">
                                    {{$category->name}}
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </a>
         @endforeach

    </div>

    <script>
        function loadUrl(url) {
            window.location.href = url;
            alert('Đang chuyển hướng...')
        }

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection

