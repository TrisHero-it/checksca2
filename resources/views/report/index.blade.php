@extends('layouts.app')
@section('check', 'Tra cứu')
@section('title', 'Danh sách tố cáo')
@section('sca', 'Scam')
@php
    $menu = true;
    $tracuu = true;
    $category2 = true;
@endphp

@section('content')

<div class="cangiua" style="">
    <div class="table-posts" style="transform: translate(0)">
        <div class="post">
            <div class="column-post">
                <p>
                    Người bị tố cáo
                </p>
            </div>
            <div class="column-post">
                <p>
                    Chiếm đoạt
                </p>
            </div>
            <div class="column-post">
                <p>
                    Tài khoản game
                </p>
            </div>
            <div class="column-post post-numberbank">
                <p>
                    STK ngân hàng
                </p>
            </div>
            <div class="column-post">
                <p>
                    Số điện thoại
                </p>
            </div>
            <div class="column-post">
                <p>
                    ngày
                </p>
            </div>

        </div>
        @foreach ($posts as $post)
                <hr>
                <a href="{{route('posts.show', $post->id)}}">
                    <div class="post post-content" style="padding-top:17px">
                        <div class="column-post post-text">
                            <p>
                                {{$post->fullname}}
                            </p>
                        </div>
                        <div class="column-post post-text">
                            <p style="color: var(--Green, #12CBAB);">
                                {{number_format($post->moneys_scam, 0, ',', ',')}} VNĐ
                            </p>
                        </div>
                        <div class="column-post post-text">
                            <p>
                                {{$post->username ?? '--'}}
                            </p>
                        </div>
                        <div class="column-post post-text post-numberbank">
                            <p>
                                {{$post->numberbank}} : {{$post->namebank}}
                            </p>
                        </div>
                        <div class="column-post post-text post-numberphone">
                            <p>
                                {{$post->numberphone ?? '--'}}
                            </p>
                        </div>
                        <div class="column-post post-text post-created">
                            @php
                                $date = explode(' ', $post->created_at);
                            $arrDate = explode('-', $date[0]);
                            $formatDate = $arrDate[2].'.'.$arrDate[1].'.'.$arrDate[0];
                            @endphp
                            <p>
                                {{$formatDate}}
                            </p>
                        </div>
                    </div>

                </a>
        @endforeach
    </div>
    <div class="cangiua" style="margin-top: 16px;" id="postsTable">

    @foreach ($posts as $post)
        <div class="table-posts table-posts-mobile" style="transform: translate(0) <?php if ($loop->index!= 0) echo ";margin-top:12px;"  ?>">
            <a href="{{route('posts.show', $post->id)}}">
                <div class="post post-content position-relative">
                    <div class="column-post post-text">
                        <div class="d-flex" style="gap: 8px; width: 276px;"><img src="{{asset('images/design/home/Icon.svg')}}" alt=""> <p style="margin-bottom: unset; max-width: 300px">
                                {{$post->fullname}}
                            </p> </div>
                    </div>
                    <hr>
                    <div class="d-flex">
                        <div style="min-width: 158px; max-width: 158px;" class="column-post post-text d-flex align-items-center">
                            <p style="color: var(--Green, #12CBAB); margin-bottom: unset;">
                                {{number_format($post->moneys_scam, 0, ',' , ',')}} VNĐ
                            </p>
                        </div>
                        <div class="column-post post-text d-flex align-items-center">
                            <p style="margin-bottom: unset; max-width: 118px">
                                {{$post->username?? '--'}}
                            </p>
                        </div>
                    </div>
                    <hr>
                    <hr class="position-absolute" style="transform: rotate(90deg);width: 145px; top: 93px; left: 63px">
                    <div class="d-flex">
                        <div style="min-width: 158px; max-width: 158px" class="column-post d-flex align-items-center post-text post-numberbank">
                            <p style="margin-bottom: unset; max-width: 118px">
                                {{$post->numberbank}}
                            </p>
                        </div>
                        <div class="column-post d-flex align-items-center post-text post-numberphone">
                            <p style="margin-bottom: unset; max-width: 118px">
                                {{$post->numberphone?? '--'}}
                            </p>
                        </div>
                    </div>
                    <hr>

                    <div class="column-post d-flex align-items-center post-text post-created" style="min-width: 158px; max-width: 158px">
                        @php
                            $date = explode(' ', $post->created_at);
                            $arrDate = explode('-', $date[0]);
                            $formatDate = $arrDate[2]. '.'.$arrDate[1].'.'.$arrDate[0]
                        @endphp
                        <p style="margin-bottom: unset;">
                            {{$formatDate}}
                        </p>
                    </div>
                </div>
            </a>
        </div>

    @endforeach
    </div>
    <!-- start panigation -->
    @php
        $totalPage = ceil($posts->total() / 10);
        $currentPage = $_GET['page'] ?? 1;
    @endphp
    <div class="d-flex" id="panigation" style="margin-top: 24px; gap:12px; margin-left: 3px;">

        @if($totalPage <=5)
            @for($i=1; $i<=$totalPage; $i++)
                <a href="{{request()->fullUrlWithQuery(['page' => $i])}}" class="page" @if($currentPage == $i) style="background: var(--Light-primary, #009571); border: 1px solid var(--Light-primary, #009571);" @endif>{{$i}}</a>
            @endfor
        @endif

    </div>
    <!-- end panigation -->
    <div class="body search-computer" id="nomargin" style="padding-top: 71px;">
    {{-- start content --}}
    <div class="cangiua position-relative">
        <div class="body-con">
            <div class="d-flex justify-content-between" style=" gap:10px">
                <h5 class="text-light">Cảnh báo lừa đảo</h5>
                <a href="/news" class="btnReport btn-contract text-decoration-none load-news" style="margin-top: 0; display: flex">Xem tất cả</a>
            </div>
            <div class="contenter contenter-news" style="margin-top: 34px">
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
<script src="{{asset('js/indexReports.js')}}"></script>
@endsection
