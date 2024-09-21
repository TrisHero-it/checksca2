@extends('layouts.app')
@section('check', 'Phòng Midman')
@section('title', 'Trung gian')
@section('sca', '')
@php
    $menu = true;
    $tracuu = true;
    $category2 = true;
    $midman =  true;
@endphp

@section('content')
    <div class="cangiua">
        <div class="d-flex flex-wrap" style="gap: 24px">

            @foreach($midmans as $midman)
                <a class="text-decoration-none" onclick="checkPass({{$midman->id}})">
                    <div class="midroom">
                        <div class="d-flex align-items-center" style="gap: 4px">
                            <img src="{{asset('images/design/midman/user.svg')}}">
                            <p style="margin-bottom: unset; color: #9E9E9E; font-size: 14px;">Phòng: </p>
                            <p style="margin-bottom: unset; color: var(--Light-White, #E4E4E4); font-size: 14px;">{{$midman->name}}</p>
                        </div>

                        <div class="d-flex align-items-center" style="gap: 4px; margin-top: 16px;" >
                            <img src="{{asset('images/design/midman/lock.svg')}}">
                            <p style="margin-bottom: unset; color: #9E9E9E; font-size: 14px;">Người tạo: </p>
                            <p style="margin-bottom: unset; color: var(--Light-White, #E4E4E4); font-size: 14px;">{{$midman->account->name}}</p>
                        </div>

                        <div class="d-flex align-items-center" style="gap: 4px; margin-top: 16px;">
                            <img src="{{asset('images/design/midman/money.svg')}}">
                            <p style="margin-bottom: unset; color: #9E9E9E; font-size: 14px;">Số tiền: </p>
                            <p style="margin-bottom: unset; color: var(--Light-primary, #009571); font-size: 14px;">{{number_format($midman->moneys, 0 , '.', ',')}} VNĐ</p>
                        </div>

                        <div class="d-flex align-items-center justify-content-between" style="gap: 4px; margin-top: 16px;">
                            <div class="d-flex align-items-center" style="gap: 4px;">
                                <img src="{{asset('images/design/midman/time.svg')}}">
                                <p style="margin-bottom: unset; color: #9E9E9E; font-size: 14px;">Ngày: </p>
                                <p style="margin-bottom: unset; color: var(--Light-White, #E4E4E4); font-size: 14px;">
                                @php
                                $date = explode(' ' ,$midman->created_at)
                                @endphp
                                    {{$date[0]}}
                                </p>
                            </div>
                            <span class="d-flex justify-content-center" style="width: 92px;color: {{$midman->getColor(['status' => $midman->status])}}; font-size: 12px; background: {{$midman->getBackground(['status' => $midman->status])}}; padding:4px 12px; border-radius:100px;">
                                {{$midman->getStatus(['status' => $midman->status])}}
                        </span>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>



        <div class="body" id="nomargin" style="padding-top: 71px;">
            {{-- start content --}}
            <div class="cangiua position-relative">
                <div class="body-con">
                    <div class="d-flex" style=" gap:10px">
                        <h5 class="text-light">Cảnh báo lừa đảo</h5>
                        <a class="btnReport btn-contract text-decoration-none load-news d-flex align-items-center" style="margin-top: unset;">Xem tất cả</a>
                    </div>
                    <div class="contenter" style="margin-top: 34px">
                        @foreach ($news as $new)
                            <a class="none" href="news/{{$new->id}}">
                                <img class="image-news" src="{{Storage::url($new->image)}}" alt="">
                                <div class="content comunity position-relative" id="news" style="height: 158px;">
                                    <p style="margin-top: 17px;     display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;">{{$new->title}}</p>
                                    <div class="text w-100" style="margin-top: -13px;
    color: var(--Light-White, #9E9E9E);
    font-size: 14px;">
                                        {!! $new->content !!}
                                    </div>
                                    @php
                                        $date = explode(' ', $new->created_at);
                                    @endphp
                                    <div style="position: absolute; bottom: 0">
                                        <div class="d-flex" style="margin-top: 11px;">
                                            <img style="transform: translateY(-8px) ;" src="{{asset('images/design/time.svg')}}" alt="">
                                            <p style=" font-weight: 700; transform: translateX(5px); font-size: 13px;color: var(--Light-White, #9E9E9E);" class="text w-100"
                                               style="font-size: 14px;color: var(--Light-White, #9E9E9E);">{{$date[0]}}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
