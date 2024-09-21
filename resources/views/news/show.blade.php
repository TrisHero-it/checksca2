@extends('layouts.app')
@section('title', 'Tin tức')
@section('link')
<link rel="stylesheet" href="{{ asset('css/style2.css') }}">
{!! SEO::generate() !!}
<style>
    h4{
        margin-bottom: 20px;
    }
    .news-hover:hover {
        background: rgba(0, 149, 113, 0.24);
        border-radius: 12px;
    }
</style>
@endsection
@section('content')
<div class="cangiua">
    <div class="row">
        <div class="col-xl-8">
            <div style="display:flex"><img class="image-show-news" src="{{\Illuminate\Support\Facades\Storage::url($news->image)}}" alt=""></div>
            <div class="text-show-news" style="font-weight: 300; margin-top: 24px;font-size: 14px;">
                <h3 style="margin: 24px 0">{{$news->title}}</h3>
                <div class="d-flex" style="gap: 24px">
                    <div class="d-flex align-items-center" style="gap: 4px">
                        @php
                            $date = explode(' ', $news->created_at);
                            $arrDate = explode('-', $date[0]);
                            $date = $arrDate[2].'.'.$arrDate[1].'.'.$arrDate[0]
                        @endphp
                        <img src="{{asset('images/design/time.svg')}}" alt="">
                        <p style="color: #9E9E9E;
                            font-family: Mulish;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 500;
                            line-height: normal;
                            margin-bottom: unset;"> {{$date}} </p>
                    </div>

                    <div class="d-flex align-items-center" style="gap: 6px">
                        @php
                            $date = explode(' ', $news->created_at);
                        @endphp
                        <img src="{{asset('images/design/tich-v/eye.svg')}}" alt="">
                        <p style="color: #9E9E9E;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 500;
                            line-height: normal;
                            margin-bottom: unset;"> {{$news->viewers}} lượt xem </p>
                    </div>
                </div>

                <hr style="margin-top: 25px">
                <p class="" style="white-space: pre-wrap; font-weight: 300; margin-top: 24px;color: var(--w-60, rgba(255, 255, 255, 0.60)); font-size: 14px">{!! $news->content!!}
                </p>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="w-100 other-news">
                <p style="margin-top: -4px;">Bài viết khác</p>
            @foreach($OtherNews as $other)
                    <a class="text-decoration-none" href="/news/{{$other->id}}">
                        <div class="d-flex w-100 news-hover" style="gap: 12px; @if($loop->index==0)  margin-top: -2px; @else margin-top: 3px; @endif padding: 10px;
    margin-left: -10px;
    border-radius: 10px;">
                            <img src="{{\Illuminate\Support\Facades\Storage::url($other->image)}}" style="border-radius: 12px; min-width: 132px; max-width: 132px; min-height: 90px; max-height: 90px" alt="">
                            <div>
                                <p style="line-height: 1.4 ; width: 169px;margin-bottom: 4px; font-size: 14px; color: var(--Light-White, #E4E4E4); overflow: hidden;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 2;align-self: stretch;text-overflow: ellipsis;">{{$other->title}}</p>

                                <p style="margin-bottom: 4px; overflow: hidden;width: 169px;
                                color: var(--Light-Grey, #939393);
                                text-overflow: ellipsis;
                                /* 12 Reg */
                                font-size: 12px;
                                display: -webkit-box;
                                -webkit-box-orient: vertical;
                                -webkit-line-clamp: 2;
                                align-self: stretch;
                                margin-top: -5px;
                                line-height: 1.4;
                                ">
                                    {{$other->content}}
                                </p>
                                <div class="d-flex align-items-center" style="gap: 4px">
                                    @php
                                        $date = explode(' ', $other->created_at);
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

            <div class="w-100 other-news" style="margin-top: 24px;">
                <div class="d-flex" style="gap: 8px; margin-top: -9px;"><img style="width: 28px; height: 28px; border-radius: 100px" src="{{asset('images/communities/elip.webp')}}" alt=""> <p style="font-size: 20px; font-weight: 300;">Cộng đồng Valorant</p></div>
              <div style="transform: translateY(-22px)">
                  @foreach($communities as $community)
                      <a class="text-decoration-none" href="{{$community->link}}">
                          <div style="margin-top: 30px;">
                              @if($loop->index!=0)
                                  <hr style="margin: 16px 0">
                              @endif
                              <div class="d-flex" style="gap: 16px">
                                  <img style="width: 48px; height: 48px; border-radius: 100px" src="{{asset('images/communities/elip.webp')}}" alt="">
                                  <h6 style="font-size: 16px; color: var(--Light-White, #E4E4E4);">VALORANT: Chợ dời - Trao đổi mua bán tài khoản (PC) VN</h6>
                              </div>

                              <p class="w-100" style="color: #9E9E9E;
font-family: Mulish;
font-size: 16px;
font-style: normal;
font-weight: 500;
line-height: normal;
margin-top: 16px;">Công khai · 58K thành viên · Hơn 10 bài viết / ngày</p>
                          </div>
                      </a>
                  @endforeach
              </div>
            </div>


        </div>
    </div>
</div>
@endsection
