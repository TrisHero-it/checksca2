@extends('layouts.app')
@php
    $menu = true;
    $muakey = true;
@endphp
@section('link')
    <style>
        #form2 {
            font-size: 14px;
        }

        .form-label {
            font-size: 14px;
            top: 18px;
        }
    </style>
@endsection
@section('content')
@if (session('success'))
    <script>
        Swal.fire({
            icon: "success",
            title: "Thành công",
            text: "Tạo hợp đồng thành công",
        });
    </script>
@endif
<div class="hanhtinh arrow-up text-center" id="scrollUp">
    <img src="{{ asset('images/arrow.png') }}" alt="" /> <br />
    <span class="text-light">Đầu trang</span>
</div>
<div class="hanhtinh logomess text-center" style="">
    <img src="{{ asset('images/messageicon.png') }}" alt=""> <br>
    <span class="text-light">Hỗ trợ</span>
</div>
<div class="body">
    <div class="cangiua" style="padding: 70px 0 60px 0;">
        <div class="d-flex justify-content-between">
            <h5 class="text-light">Tố cáo lừa đảo</h5>
            <a href="/posts" class="btn-more"
                style="text-decoration: none;">
                Xem tất cả
            </a>
        </div>

        <div class="cangiua" style="margin-top: 16px;" id="postsTable">
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
                                    <div class="post post-content" style="padding-top:17px; margin-top: 2px;">
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
                                                {{$post->username?? '--'}}
                                            </p>
                                        </div>
                                        <div class="column-post post-text post-numberbank">
                                            <p>
                                                {{$post->numberbank}} : {{$post->namebank}}
                                            </p>
                                        </div>
                                        <div class="column-post post-text post-numberphone">
                                            <p>
                                                {{$post->numberphone?? '--'}}
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

                @foreach ($posts as $post)
                <div class="table-posts table-posts-mobile" style="padding: 24px;transform: translate(0) <?php if ($loop->index!= 0) echo ";margin-top:12px;"  ?>">
                    <a href="{{route('posts.show', $post->id)}}">
                        <div class="post post-content position-relative">
                            <div class="column-post post-text">
                                <div class="d-flex" style="gap: 8px; width: 276px;"><img src="{{asset('images/design/home/Icon.svg')}}" alt=""> <p style="margin-bottom: unset; max-width: 300px">
                                        {{$post->fullname}}
                                    </p> </div>
                            </div>
                            <hr>
                            <div class="d-flex" style="gap: 4px">
                                <div class=" post-text d-flex align-items-center">
                                    <p style="margin-bottom: unset; max-width: 118px">
                                       Chiếm đoạt:
                                    </p>
                                </div>
                                <div style="min-width: 158px; max-width: 158px;" class="column-post post-text d-flex align-items-center">
                                    <p style="color: var(--Green, #12CBAB); margin-bottom: unset;">
                                        {{number_format($post->moneys_scam, 0, ',' , ',')}} VNĐ
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex"  style="gap: 4px">
                                <div class="d-flex align-items-center post-text">
                                    <p style="margin-bottom: unset; max-width: 118px">
                                        Tài khoản game:
                                    </p>
                                </div>
                                <div class="column-post d-flex align-items-center post-text post-numberphone">
                                    <p style="margin-bottom: unset; max-width: 118px">
                                        {{$post->username?? '--'}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
            </div>

                @endforeach
        </div>

    </div>

</div>
{{-- end content --}}
<!-- start contract -->

{{--<div class="body" id="nomargin">--}}
{{--    <div class="cangiua">--}}
{{--        <h5 class="text-light">Midman</h5>--}}
{{--        <p class="text-light" style="margin-top: 21px;">Để không bị lừa đảo khi mua hàng, bạn hãy tạo phòng chát riêng--}}
{{--            với người bán, rồi thêm giao dịch viên (trọng tài) vào để họ tạm giữ tiền thanh toán, sau khi bạn nhận được--}}
{{--            hàng hãy yêu cầu giao dịch viên trả tiền cho bên bán. Lưu ý: tốt nhất chọn giao dịch viên đã có cọc bảo hiểm--}}
{{--            trên checkscam.com.</p>--}}
{{--        <div class="row">--}}
{{--            <!-- contract -->--}}
{{--            <div class="col-sm-6">--}}
{{--                <form action="/detail-contracts" method="post" onsubmit="return validate()">--}}
{{--                    @csrf--}}
{{--                    <div class="border-contract">--}}
{{--                        <div class="form-group" id="formGroup">--}}
{{--                            <select name="category_id" class="form-select" id="form2">--}}
{{--                                <option value="">Danh mục <span style="color: forestgreen">*</span></option>--}}
{{--                                @foreach ($categories as $category)--}}
{{--                                    <option @if (old('category_id') == $category['id']) {{ 'selected' }} @endif--}}
{{--                                        value="{{ $category['id'] }}">{{ $category['name'] }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="error" style="color: red"></div>--}}
{{--                        <div class="form-group input-mobile">--}}
{{--                            <input class="form-input" autocomplete="off" name='name' type="text" id="name" placeholder=" "--}}
{{--                                value="{{ old('name') }}">--}}
{{--                            <label class="form-label" for="email">Tên phòng Mid</label>--}}
{{--                        </div>--}}
{{--                        <div class="error" style="color: red"></div>--}}

{{--                        <div class="form-group input-mobile">--}}
{{--                            <input class="form-input" autocompDlete="off" name='moneys' type="text" id="moneys" placeholder=" "--}}
{{--                                value="{{ old('moneys') }}">--}}
{{--                            <label class="form-label" for="email">Số tiền giao dịch</label>--}}
{{--                        </div>--}}
{{--                        <div class="error" style="color: red"></div>--}}

{{--                        <p class="noti-contract">--}}
{{--                            Người bán--}}
{{--                        </p>--}}
{{--                        <div class="d-flex w-100" style="gap: 12px; margin-top:-15px">--}}
{{--                            <div class="form-group w-100 input-mobile">--}}
{{--                                <input class="form-input" name='email_seller' type="text" id="email_seller" placeholder=" "--}}
{{--                                    value="{{ old('email_seller') }}">--}}
{{--                                <label class="form-label" for="email">Email</label>--}}
{{--                                <div class="error" style="color: red"></div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group w-100 input-mobile">--}}
{{--                                <input class="form-input" name='name_seller' type="text" id="name_seller" placeholder=" "--}}
{{--                                    value="{{ old('name_seller') }}">--}}
{{--                                <label class="form-label" for="email">Tên</label>--}}
{{--                                <div class="error" style="color: red"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <p class="noti-contract">--}}
{{--                            Người mua--}}
{{--                        </p>--}}
{{--                        <div class="d-flex w-100" style="gap: 12px; margin-top:-15px">--}}
{{--                            <div class="form-group w-100 input-mobile">--}}
{{--                                <input class="form-input" name='email_buyer' type="text" id="email_buyer" placeholder=" "--}}
{{--                                    value="{{ old('email_buyer') }}">--}}
{{--                                <label class="form-label" for="email">Email</label>--}}
{{--                                <div class="error" style="color: red"></div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group w-100 input-mobile">--}}
{{--                                <input class="form-input" name='name_buyer' type="text" id="name_buyer" placeholder=" "--}}
{{--                                    value="{{ old('name_buyer') }}">--}}
{{--                                <label class="form-label" for="email">Tên</label>--}}
{{--                                <div class="error" style="color: red"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <p class="noti-contract">--}}
{{--                            chọn midman--}}
{{--                        </p>--}}
{{--                        <div class="form-group">--}}
{{--                            <select name="midman" class="form-select" id="form2">--}}
{{--                                <option value="">Chọn midman <span style="color: forestgreen">*</span></option>--}}
{{--                                @foreach($traders as $trader)--}}
{{--                                    <option value="{{$trader->id}}" style="color: #fff; background: #{{$trader->contract->color}}"> {{$trader->fullname}} </option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            <div class="error" style="color: red"></div>--}}
{{--                        </div>--}}

{{--                        <p class="noti-contract">--}}
{{--                            Mã captcha--}}
{{--                        </p>--}}

{{--                        {!! NoCaptcha::renderJs() !!}--}}
{{--                        {!! NoCaptcha::display() !!}--}}
{{--                        @error('g-recaptcha-response')--}}
{{--                        <div class="error" style="color: red"></div>--}}
{{--                        @enderror--}}
{{--                        <button class="btnReport btn-contract w-100 btn-mobile"> Tạo hợp đồng </button>--}}
{{--                    </div>--}}
{{--                    <button class="btnReport btn-contract"> Tạo hợp đồng </button>--}}
{{--                </form>--}}

{{--            </div>--}}
{{--            <!-- table -->--}}
{{--            <div class="col-sm-6">--}}
{{--                <div class="border-gray">--}}
{{--                    <div class="list-contract-row d-flex" style="gap: 24px">--}}
{{--                        <p class="contract-midrooms">Phòng Midman</p>--}}
{{--                        <p class="contract-moneys">Số tiền</p>--}}
{{--                        <p class="contract-status" >Trạng thái</p>--}}
{{--                    </div>--}}
{{--                    @foreach ($detailContracts as $contract)--}}
{{--                        <hr>--}}
{{--                        <div class="list-contract-row d-flex" style="gap: 24px">--}}
{{--                            <p class="contract-midrooms">{{$contract->name}}</p>--}}
{{--                            <p class="contract-moneys" style="color: var(--Light-primary, #009571);">--}}
{{--                                {{number_format($contract->moneys, 0, ',', ',') . " VNĐ"}}--}}
{{--                            </p>--}}
{{--                            <p class="d-flex align-items-center justify-content-center" style="height: 28px;width: 92px;color: {{$contract->getColor(['status' => $contract->status])}}; font-size: 12px; background: {{$contract->getBackground(['status' => $contract->status])}}; padding:4px 12px; border-radius:100px;">--}}
{{--                                {{$contract->getStatus(['status' => $contract->status])}}--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}

{{--                </div>--}}
{{--                <div class="text-end search-computer">--}}
{{--                    <a class="btnReport" href="/midman" style="background-color: #2A2A2A; text-decoration: none; margin: 23px 0 0 auto;">Xem tất cả</a>--}}
{{--                </div>--}}
{{--                <div class="text-center" style="margin-top: 24px;">--}}
{{--                    <a class="btnReport btn-mobile w-100" id="loadMoreMidman" href="/midman" style="background-color: #2A2A2A; text-decoration: none;">Xem tất--}}
{{--                        cả</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<!-- end contract -->

{{-- start community --}}
<div class="body" id="nomargin" style="">
    {{-- start content --}}
    <div class="cangiua">
        <div class="body-con">
            <div class="d-flex" style=" gap:10px">
                <img src="{{asset('images/communities/elip.webp')}}"
                    style="width: 28px; height:28px; border-radius:100px" alt="">
                <h5 class="text-light">Cộng đồng Valorant</h5>
            </div>
            <div class="contenter">
                @foreach ($communities as $community)
                    <a class="none" href="{{$community->link}}">
                        <div class="content comunity">
                            <div class="d-flex" style="margin-top: 13px;"><img
                                    style="border-radius: 100px; height: 48px; width: 48px;"
                                    src="{{ asset('images/communities/' . $community->image) }}" alt="">
                                <p style="transform: translate(15px, -2px);">{{$community->name}}</p>
                            </div>
                            <p style="color: var(--Light-White, #B5AB9A);transform: translate(9px, 4px);">
                                {{$community->infor}}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="body" id="nomargin" style="margin-top: -3px;">
    {{-- start content --}}
    <div class="cangiua">
        <div class="body-con">
            <div class="d-flex" style=" gap:10px">
                <img src="{{asset('images/communities/elip.webp')}}"
                    style="width: 28px; height:28px; border-radius:100px" alt="">
                <h5 class="text-light">Cộng đồng Valorant</h5>
            </div>
            <div class="contenter">
                @foreach ($communities as $community)
                    <a class="none" href="{{$community->link}}">
                        <div class="content comunity">
                            <div class="d-flex" style="margin-top: 13px;"><img
                                    style="border-radius: 100px; height: 48px; width: 48px;"
                                    src="{{ asset('images/communities/' . $community->image) }}" alt="">
                                <p style="transform: translate(15px, -2px);">{{$community->name}}</p>
                            </div>
                            <p style="color: var(--Light-White, #B5AB9A);transform: translate(9px, 4px);">
                                {{$community->infor}}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="body" id="nomargin" style="margin-top: -3px;">
    {{-- start content --}}
    <div class="cangiua">
        <div class="body-con">
            <div class="d-flex" style=" gap:10px">
                <img src="{{asset('images/communities/elip.webp')}}"
                    style="width: 28px; height:28px; border-radius:100px" alt="">
                <h5 class="text-light">Cộng đồng Valorant</h5>
            </div>
            <div class="contenter">
                @foreach ($communities as $community)
                    <a class="none" href="{{$community->link}}">
                        <div class="content comunity">
                            <div class="d-flex" style="margin-top: 13px;"><img
                                    style="border-radius: 100px; height: 48px; width: 48px;"
                                    src="{{ asset('images/communities/' . $community->image) }}" alt="">
                                <p style="transform: translate(15px, -2px);">{{$community->name}}</p>
                            </div>
                            <p style="color: var(--Light-White, #B5AB9A);transform: translate(9px, 4px);">
                                {{$community->infor}}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
{{-- end community --}}


<div class="cangiua">
    <div class="d-flex justify-content-center position-relative" style="margin-top: -27px;">
        <a class="btnReport" style="background-color: #2A2A2A; text-decoration: none;">Xem thêm</a>
    </div>
</div>

<div class="body" id="nomargin" style="padding-top: 71px;">
    {{-- start content --}}
    <div class="cangiua position-relative">
        <div class="body-con">
            <div class="d-flex align-content-between" style=" gap:10px">
                <h5 class="text-light">Cảnh báo lừa đảo</h5>
                <a href="/news" class="btnReport text-decoration-none load-news">Xem tất cả</a>

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
                                            {{$new->content}}
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
<script !src="">
    if (screen.width <=500) {
        document.getElementById('loadMoreMidman').classList.add('d-flex')
        document.getElementById('loadMoreMidman').classList.add('alight-item-center')
    }

    document.getElementById("scrollUp").addEventListener("click", function() {
        // Sử dụng smooth scrolling để lướt lên đầu trang
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>
<script src="{{asset('js/contract.js')}}"></script>
@endsection
