@extends('layouts.app')
@section('title', 'Tin tức')
@section('link')
<link rel="stylesheet" href="{{ asset('css/style2.css') }}">
<style>
    .content:hover {
        border-top-left-radius: 11px;
        border-top-right-radius: 11px;
        border-bottom-left-radius: 17px;
        border-bottom-right-radius: 17px;
    }

    .text-news-trending:hover {
        background: rgba(0, 149, 113, 0.24);
    }

    .news-hover:hover {
        background: rgba(0, 149, 113, 0.24);
        border-radius: 12px;
    }

    .content {
        border-top-left-radius: 11px;
        border-top-right-radius: 11px;
        border-bottom-left-radius: 17px;
        border-bottom-right-radius: 17px;
        border: 1px solid #1F2021;
    }

    .text> p {
        font-size: 14px !important;
        margin-top: 21px;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 1;
        align-self: stretch;
        overflow: hidden;
        flex-wrap: nowrap;
        color: #9E9E9E;
        text-overflow: ellipsis;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }
</style>
@endsection
@section('content')
<div class="cangiua">
    <div class="row">
        <div class="navigation col-3 search-computer">
            <div class="navigation-column navigation-hover d-flex"><div class="d-flex" style="gap: 8px"> <img src="{{asset('images/design/midrooms/Star.svg')}}" alt="">  Tin công nghệ </div> <img src="{{asset('images/design/Arrows.svg')}}" alt=""></div>
            <div class="navigation-column navigation-hover d-flex"> <div class="d-flex" style="gap: 8px"><img src="{{asset('images/design/midrooms/Star.svg')}}" alt="">  Khám phá </div> <img src="{{asset('images/design/Arrows.svg')}}" alt=""></div>
            <div class="navigation-column navigation-hover d-flex"> <div class="d-flex" style="gap: 8px"><img src="{{asset('images/design/midrooms/Star.svg')}}" alt="">  Đánh giá </div><img src="{{asset('images/design/Arrows.svg')}}" alt=""></div>
            <div class="navigation-column navigation-hover d-flex"><div class="d-flex" style="gap: 8px"><img src="{{asset('images/design/midrooms/Star.svg')}}" alt="">  Khuyến mãi </div> <img src="{{asset('images/design/Arrows.svg')}}" alt=""></div>
            <div class="navigation-column navigation-hover d-flex"><div class="d-flex" style="gap: 8px"><img src="{{asset('images/design/midrooms/Star.svg')}}" alt="">  Tuyển dụng </div> <img src="{{asset('images/design/Arrows.svg')}}" alt=""></div>
        </div>
        <div class="navigation col-lg-3 search-mobile">
            <div class="d-flex" style="overflow: auto; width: 100%;">
                <div class="" style="padding: 12px; width: 130px; min-width: 130px; text-align: center; background: var(--Background-Popup, #091E22); border-radius: 12px">
                    <img src="{{asset('images/design/midrooms/Star.svg')}}" alt=""> <br>
                    <p style="margin-bottom: unset; margin-top: 4px; text-align: center !important;">Tin công nghệ</p>
                </div>
                <div class="" style="padding: 12px; width: 130px; min-width: 130px; text-align: center; border-radius: 12px">
                    <img src="{{asset('images/design/midrooms/Star.svg')}}" alt=""> <br>
                    <p style="margin-bottom: unset; margin-top: 4px; text-align: center !important;">Khám phá</p>
                </div>
                <div class="" style="padding: 12px; width: 130px; min-width: 130px; text-align: center; border-radius: 12px">
                    <img src="{{asset('images/design/midrooms/Star.svg')}}" alt=""> <br>
                    <p style="margin-bottom: unset; margin-top: 4px; text-align: center !important;">Đánh giá</p>
                </div>
                <div class="" style="padding: 12px; width: 130px; min-width: 130px; text-align: center; border-radius: 12px">
                    <img src="{{asset('images/design/midrooms/Star.svg')}}" alt=""> <br>
                    <p style="margin-bottom: unset; margin-top: 4px; text-align: center !important;">Khuyến mãi</p>
                </div>
                <div class="" style="padding: 12px; width: 130px; min-width: 130px; text-align: center; border-radius: 12px">
                    <img src="{{asset('images/design/midrooms/Star.svg')}}" alt=""> <br>
                    <p style="margin-bottom: unset; margin-top: 4px; text-align: center !important;">Tuyển dụng</p>
                </div>
            </div>
        </div>

        <div class="col-lg-9" style="overflow-x: hidden">
            <div class="d-flex align-items-center" style="gap: 8px">
                <img src="{{asset('images/design/fire.png')}}" alt="">
                <p style="margin-bottom: unset;">Chủ đề hot</p>
            </div>
            <div class="categories d-flex" style="margin-left: unset; margin-right: unset;">
                <div style=" width: 160px; height: 194px" class="position-relative">
                    <div class="background-category position-absolute">

                    </div>
                    <div class="category position-absolute">

                    </div>
                    <div style="" class="category-img">
                    </div>
                    <div class="category-text">
                        PUBG
                    </div>
                </div>
                @foreach ($categories as $category)
                    <div style=" width: 160px; height: 194px" class="position-relative">
                        <div class="background-category position-absolute" style="background-image: url({{\Illuminate\Support\Facades\Storage::url($category->image)}})">

                        </div>
                        <div class="category position-absolute">

                        </div>
                        <div style="background-image: url({{\Illuminate\Support\Facades\Storage::url($category->image)}})" class="category-img">
                        </div>
                        <div class="category-text">
                            {{$category->name}}
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex align-items-center" style="gap: 8px; margin-top: 79px;">
                <img src="{{asset('images/design/tich-v/star.png')}}" alt="">
                <p style="margin-bottom: unset;">Nổi bật nhất</p>
            </div>
            <div class="row search-computer" style="margin-top: 24px;">
                @foreach($news as $currentNews)
                @if($loop->index==0)
                        <div class="col-6">
                            <a class="text-decoration-none" href="{{route('news.show', $currentNews->id)}}">
                                <img style="width: 100%; height: 194px; border-top-left-radius:16px; border-top-right-radius: 16px " src="{{\Illuminate\Support\Facades\Storage::url($currentNews->image)}}" alt="">
                                <div class="text-news-trending" style="overflow: hidden; height: 98px">
                                    <h5 style="font-size: 16px">{{$currentNews->title}}</h5>
                                    <div class="text w-100" style="margin-top: -13px;
    color: var(--Light-White, #9E9E9E);">
                                        {!! $currentNews->content !!}
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6" style="transform: translate(-12px, -12px)">

                    @else
                        <a class="text-decoration-none" href="{{route('news.show', $currentNews->id)}}">
                            <div class="d-flex news-hover" style="gap: 12px; padding: 12px">
                                <img style="width: 100px; height: 53px; border-radius: 12px" src="{{\Illuminate\Support\Facades\Storage::url($currentNews->image)}}" alt="">
                                <p id="list-news-trending">{{$currentNews->content}}</p>
                            </div>
                        </a>

                @endif
                @endforeach
                        </div>
            </div>

            <div class="search-mobile">
                @foreach($news as $currentNews)
                    <div class="d-flex w-100" style="gap: 12px; margin-top: 24px;">
                        <img src="{{\Illuminate\Support\Facades\Storage::url($currentNews->image)}}" width="132px" style="border-radius: 12px; height: 105px; max-width:132px; min-width:132px" alt="">
                        <div>
                            <p style=" margin-bottom: 4px; font-size: 14px; color: var(--Light-White, #E4E4E4); overflow: hidden;display: -webkit-box;
-webkit-box-orient: vertical;
-webkit-line-clamp: 2;
align-self: stretch;
text-overflow: ellipsis;
">{{$currentNews->title}}</p>

                            <p style="margin-bottom: 4px; overflow: hidden;
color: var(--Light-Grey, #939393);
text-overflow: ellipsis;
/* 12 Reg */
font-family: Mulish;
font-size: 12px;
display: -webkit-box;
-webkit-box-orient: vertical;
-webkit-line-clamp: 2;
align-self: stretch;">
                                {{$currentNews->content}}
                            </p>
                            <div class="d-flex align-items-center" style="gap: 4px">
                                @php
                                    $date = explode(' ', $currentNews->created_at);
                                $arrDate = explode('-', $date[0]);
                                $formatDate = $arrDate[2].'.'.$arrDate[1].'.'.$arrDate[0];
                                @endphp
                                <img src="{{asset('images/design/time.svg')}}" alt=""> <p style="color: var(--Light-Grey, #939393);font-size: 12px; margin-bottom: unset;">{{$formatDate}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex align-items-center" style="gap: 8px; margin-top: 24px;">
                <img src="{{asset('images/design/tich-v/mess.png')}}" alt="">
                <p style="margin-bottom: unset;">Xem nhiều tuần qua</p>
            </div>

            <div class="search-computer" style="gap: 24px; margin: 24px 0 0 0; display: flex">
                @foreach($newsLastWeek as $currentNews)
                    <a class="none content" style="margin-top: -3px;" href="news/{{$currentNews->id}}">
                        <img class="image-news" style="width: 282px;" src="{{\Illuminate\Support\Facades\Storage::url($currentNews->image)}}" alt="">
                            <div class="text-news-trending position-relative" style="min-height: 176.06px">
                                <h5 style="font-size: 16px; color: var(--Light-White, #E4E4E4);">{{$currentNews->title}}</h5>
                                <p id="text-news-trending" style="display: -webkit-box;
-webkit-box-orient: vertical;
-webkit-line-clamp: 2;
align-self: stretch;">{{$currentNews->content}}</p>
                                @php
                                    $date = explode(' ', $currentNews->created_at);
                                @endphp
                                <div style="position: absolute; bottom: 0">
                                    <div class="d-flex" style="margin-top: -10px">
                                        <img style="transform: translateY(-8px) ;" src="{{asset('images/design/time.svg')}}" alt="">
                                        <p style=" font-weight: 700; transform: translateX(5px); font-size: 13px;color: var(--Light-White, #9E9E9E);" class="text w-100"
                                           @php
                                               $arrDate = explode('-', $date[0]);
                                               $formatDate = $arrDate[2].'.'.$arrDate[1].'.'.$arrDate[0];
                                           @endphp
                                           style="font-size: 14px;color: var(--Light-White, #9E9E9E);">{{$formatDate}}</p>
                                    </div>
                                </div>
                            </div>
                    </a>
                @endforeach
            </div>

            <div class="search-mobile">
                @foreach($news as $currentNews)
                    <a  class="none" href="news/{{$currentNews->id}}">
                        <div class="d-flex w-100" style="gap: 12px; margin-top: 24px;">
                            <img src="{{\Illuminate\Support\Facades\Storage::url($currentNews->image)}}" width="132px" style="border-radius: 12px; height: 105px; min-width: 132px; max-width: 132px;" alt="">
                            <div>
                                <p style=" margin-bottom: 4px; font-size: 14px; color: var(--Light-White, #E4E4E4); overflow: hidden;display: -webkit-box;
-webkit-box-orient: vertical;
-webkit-line-clamp: 2;
align-self: stretch;
text-overflow: ellipsis;
">{{$currentNews->title}}</p>

                                <p style="margin-bottom: 4px; overflow: hidden;
color: var(--Light-Grey, #939393);
text-overflow: ellipsis;
/* 12 Reg */
font-family: Mulish;
font-size: 12px;
display: -webkit-box;
-webkit-box-orient: vertical;
-webkit-line-clamp: 2;
align-self: stretch;">
                                    {{$currentNews->content}}
                                </p>
                                <div class="d-flex align-items-center" style="gap: 4px">
                                    @php
                                        $date = explode(' ', $currentNews->created_at);
                                    $arrDate = explode('-', $date[0]);
                                    $formatDate = $arrDate[2].'.'.$arrDate[1].'.'.$arrDate[0];
                                    @endphp
                                    <img src="{{asset('images/design/time.svg')}}" alt=""> <p style="color: var(--Light-Grey, #939393);font-size: 12px; margin-bottom: unset;">{{$formatDate}}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

@if($ad->status=='on')
                <a href="{{$ad->link}}">
                    <img style="margin-top: 48px; width: 100%; height: 163px; border-radius: var(--24px, 24px);" src="{{\Illuminate\Support\Facades\Storage::url($ad->image)}}" alt="">
                </a>
@endif

            <div class=" align-items-center flex-mobile" style="gap: 8px; margin-top: 48px; display: flex">
                <img src="{{asset('images/design/tich-v/icon-news.png')}}" alt="">
                <p style="margin-bottom: unset;">Mới nhất</p>
            </div>

            <div class="search-mobile">
                @foreach($news as $currentNews)
                    <div class="d-flex w-100" style="gap: 12px; margin-top: 24px;">
                        <img src="{{\Illuminate\Support\Facades\Storage::url($currentNews->image)}}" style="border-radius: 12px;max-width:132px; min-width:132px" alt="">
                        <div>
                            <p style=" margin-bottom: 4px; font-size: 14px; color: var(--Light-White, #E4E4E4); overflow: hidden;display: -webkit-box;
-webkit-box-orient: vertical;
-webkit-line-clamp: 2;
align-self: stretch;
text-overflow: ellipsis;
">{{$currentNews->title}}</p>

                            <p style="margin-bottom: 4px; overflow: hidden;
color: var(--Light-Grey, #939393);
text-overflow: ellipsis;
/* 12 Reg */
font-family: Mulish;
font-size: 12px;
display: -webkit-box;
-webkit-box-orient: vertical;
-webkit-line-clamp: 2;
align-self: stretch;">
                                {{$currentNews->content}}
                            </p>
                            <div class="d-flex align-items-center" style="gap: 4px">
                                @php
                                    $date = explode(' ', $currentNews->created_at);
                                $arrDate = explode('-', $date[0]);
                                $formatDate = $arrDate[2].'.'.$arrDate[1].'.'.$arrDate[0];
                                @endphp
                                <img src="{{asset('images/design/time.svg')}}" alt=""> <p style="color: var(--Light-Grey, #939393);font-size: 12px; margin-bottom: unset;">{{$formatDate}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <button class="btnReport w-100 d-flex justify-content-center" id="guiduyet" style="width: auto; margin-top: 24px;">Xem thêm</button>
            </div>

            <div class=" align-items-center flex-mobile" style="gap: 8px; margin-top: 48px; display: flex">
                <img src="{{asset('images/design/tich-v/trending.png')}}" alt="">
                <p style="margin-bottom: unset;">Khám phá trending</p>
            </div>

            <div class="search-mobile">
                @foreach($news as $currentNews)
                    <div class="d-flex w-100" style="gap: 12px; margin-top: 24px;">
                        <img src="{{\Illuminate\Support\Facades\Storage::url($currentNews->image)}}" width="132px" style="border-radius: 12px; height: 105px;max-width:132px; min-width:132px" alt="">
                        <div>
                            <p style=" margin-bottom: 4px; font-size: 14px; color: var(--Light-White, #E4E4E4); overflow: hidden;display: -webkit-box;
-webkit-box-orient: vertical;
-webkit-line-clamp: 2;
align-self: stretch;
text-overflow: ellipsis;
">{{$currentNews->title}}</p>

                            <p style="margin-bottom: 4px; overflow: hidden;
color: var(--Light-Grey, #939393);
text-overflow: ellipsis;
/* 12 Reg */
font-family: Mulish;
font-size: 12px;
display: -webkit-box;
-webkit-box-orient: vertical;
-webkit-line-clamp: 2;
align-self: stretch;">
                                {{$currentNews->content}}
                            </p>
                            <div class="d-flex align-items-center" style="gap: 4px">
                                @php
                                    $date = explode(' ', $currentNews->created_at);
                                $arrDate = explode('-', $date[0]);
                                $formatDate = $arrDate[2].'.'.$arrDate[1].'.'.$arrDate[0];
                                @endphp
                                <img src="{{asset('images/design/time.svg')}}" alt=""> <p style="color: var(--Light-Grey, #939393);font-size: 12px; margin-bottom: unset;">{{$formatDate}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="none-mobile justify-content-between" style="margin-top: 48px; ">
                <div class="" style="width: 66%;">
                    <div class="d-flex align-items-center" style="gap: 8px; margin-bottom: 24px;">
                        <img src="{{asset('images/design/tich-v/icon-news.png')}}" alt="">
                        <p style="margin-bottom: unset;">Mới nhất</p>
                    </div>

                    @foreach($news as $currentNews)
                    <a class="none" href="news/{{$currentNews->id}}">
                        <div class="d-flex news-hover" style="gap: 12px; padding: 12px; margin-left: -12px;">
                            <img style="min-height: 106px; max-height: 106px; max-width: 201px ; min-width: 201px; border-radius: 16px" src="{{\Illuminate\Support\Facades\Storage::url($currentNews->image)}}" alt="">
                            <div>
                                <h6>{{$currentNews->title}}</h6>
                                <p id="list-news-trending" style="width: 365.03px">{{$currentNews->content}}</p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                    <button class="btnReport" id="guiduyet" style="width: 160px; height: 44px">Xem thêm</button>
                </div>

                <div class="" style="width: 283px;" id="top-trending-news">
                    <div class="d-flex align-items-center" style="gap: 8px; margin-bottom: 24px;">
                        <img src="{{asset('images/design/tich-v/trending.png')}}" alt="">
                        <p style="margin-bottom: unset;">Khám phá trending</p>
                    </div>

                    <a class="none" style="" href="news/{{$currentNews->id}}">
                        <div class="d-flex" style="gap: 12px;">
                            <img style="border-radius: 16px; width: 103px; height: 66px; margin-top: -10px;" src="{{asset('images/news/lua-dao-quyet-ma-qr.jfif')}}" alt="">
                            <p style="margin-top: -10px; height: 54px" id="list-news-trending">{{$currentNews->content}}</p>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="{{asset('js/news.js')}}"></script>
@endsection
