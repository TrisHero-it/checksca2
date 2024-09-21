@extends('layouts.app')
@section('title', 'Bài viết')
@section('link')
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
@endsection
@section('content')
    @if(session('success'))
        <script !src="">
            Swal.fire({
                title: "Gửi yêu cầu thành công",
                icon: "success"
            });
        </script>
    @endif
    @if(session('errorRequestRemove'))
        <script !src="">
            Swal.fire({
                title: "Gửi yêu cầu thất bại",
                text : 'Đã có lỗi xảy ra',
                icon: "error"
            });
        </script>
    @endif
@if (session('error'))
<script>
    alert('Bạn đã hết số lần comments')
</script>
@endif
    <div class="cangiua">

        <div class="banner">

            <p class="text-center">@yield(
                'infor',
                'Tra cứu "SĐT, STK Ngân Hàng..." trước khi giao dịch online. Đây là dữ liệu để
                 cảnh báo không nhắm mục đích bôi nhọ hay hạ thấp uy tín danh dự của bất kì ai, vui lòng liên hệ
                 admin để gỡ thông tin sai sự thật .'
            )</p>

            <form action=" <?php    if (request()->url() == env('APP_URL') . '/traders')
                echo '/traders';
            else
                echo '/posts' ?>" method="get" class="text-center search-computer" onsubmit="return validateSearch()"
                  style="position: relative">
                <input type="text" id="search" value="{{ request()->search }}" name="search" onkeyup="debounceShowHints(event, this.value <?php    if (request()->url() == env('APP_URL') . '/traders')
                echo ', 1'  ?>)" placeholder="Nhập số điện thoại, số tài khoản ngân hàng ...">
                <button type="submit">
                    <div id="btndiv"></div>
                    TRA CỨU
                </button>
            </form>

            <form action=" <?php if (request()->url() == env('APP_URL') . '/traders')
                echo '/traders';
            else
                echo '/posts' ?>" method="get" class="text-center search-mobile" onsubmit="return validateSearch()"
                  style="position: relative">
                <input style="border-radius: 100px; width: 100%;" type="text" id="search" value="{{ request()->search }}" name="search" onkeyup="debounceShowHints(event, this.value <?php    if (request()->url() == env('APP_URL') . '/traders')
                echo ', 1'  ?>)" placeholder="Tìm kiếm....">
                <img style="top: 10.3px; right: 20px; cursor: pointer" class="position-absolute" src="{{asset('images/design/midrooms/iconSearch.svg')}}" alt="">
            </form>
            <p class="text-center noti-search" style="color: red">Không được để trống</p>
            <div class="tri text-center" style="margin-top: 21px">
                <a @if (!Auth::check()) data-bs-toggle="modal"
                   data-bs-target="#exampleModal" @else href="/posts/create" @endif class="btn2 btnReport text-decoration-none">Tố cáo lừa đảo</a>
                <a href="/traders" class="btn2 btnReport"
                   style="background: rgba(255, 255, 255, 0.12); text-decoration: none; ">Quỹ bảo hiểm</a>
            </div>
            <div class="canimg">
                <div class="search2 no-scroll" id="search2">
                </div>
            </div>
        </div>

        <div class="row" style="margin-left: 0px">
            <div class="col-xl-9" id="col-md-9">
                <h5>Thông tin Scam</h5>
                @csrf
            <div class="content-show-post">
            <div class="fields">
                    <div class="title">Danh mục:</div>
                    <p class="noidung">{{ $post->category->name }}</p>
                </div>
                <hr class="hr">

                <div class="fields">
                    <div class="title">Tài khoản game:</div>
                    <p class="noidung">{{ $post->username ? $post->username : '--' }}</p>

                </div>
                    <hr class="hr">

                    <div class="fields">
                        <div class="title">Link bài viết report:</div>
                        <p class="noidung"><a href="{{ $post->linkfb }}">{{ $post->linkfb ?? 'Bài viết này không có link' }}</a></p>
                    </div>
                <hr class="hr">

                <div class="fields">
                    <div class="title">Họ và tên:</div>
                    <div class="d-flex">
                        <p class="noidung" id="fullname">{{ $post->fullname }}</p>
                        <i class="fa-regular fa-copy" style="color: #74C0FC;" onclick="copyToClipboard('fullname')"></i>
                    </div>
                </div>
                <hr class="hr">

                <div class="fields">
                    <div class="title">Số tiền chiếm đoạt:</div>
                        <p class="noidung" style="color: var(--Light-primary, #009571);">{{ number_format($post->moneys_scam, 0 , ',', ',') }} VNĐ</p>
                </div>
                <hr class="hr">

                <div class="fields">
                    <div class="title">Số điện thoại:</div>
                    <div class="d-flex"> <p class="noidung" id="numberPhone">{{ $post->numberphone ? $post->numberphone : '--' }}</p>
                       <i class="fa-regular fa-copy" style="color: #74C0FC;" onclick="copyToClipboard('numberPhone')"></i></div>
                </div>
                <hr class="hr">
                <div class="fields">
                    <div class="title">Số tài khoản:</div>
                    <div class="d-flex"><p class="noidung" id="copyNumberBank">{{ $post->numberbank }}</p>
                        <i class="fa-regular fa-copy" style="color: #74C0FC;" onclick="copyToClipboard('copyNumberBank')"></i></div>
                </div>
                <hr class="hr">
                <div class="fields">
                    <div class="title">Ngân hàng:</div>
                    <p class="noidung">{{ $post->namebank ? $post->namebank : '--' }}</p>
                </div>
                <hr class="hr">
                <div class="fields" style="height: max-content">

                    <div class="title" >Ảnh chụp băng chứng:</div>
                    <div class="images">

                    @if (is_array($post->images))
                    @foreach ($post->images as $image)
                    <div class="image-container" onclick="largeImg({{$loop->index}})">
                    <img src="{{\Illuminate\Support\Facades\Storage::url($image)}}" id="imageDisplay{{$loop->index}}" alt="Image" class="image2">
                    </div>
                    @endforeach
                    @else
                    <p class="noidung mt-5">Không có ảnh</p>
                    @endif
                    <div class="image_overlay" id="over"></div>
                </div>
                </div>
                <hr class="hr">
                <div class="fields">
                    <div class="title">Nội dung report:</div>
                    <p class="noidung" style="word-break: break-word">{{$post->content}}</p>
                </div>
                <hr class="hr">
                <a class="d-flex text-decoration-none">
                    <img src="{{asset('images/design/Warning.svg')}}" alt="">
                    <p class="mb-0 fs-6" id="btnRequestRemovePost" style="color: var(--Light-White, #B5AB9A); margin-left:4px">Yêu cầu gỡ</p>
                </a>
            </div>
            </div>
    <div class="col-xl-3" id="inforPoster">

    <div id="borderPoster" style="height: max-content; padding-bottom: 5px">
    <div class="fields">
        <h5 style="margin-bottom: -1px;">Người đăng</h5>
    </div>
    <div class="fields">
                    <div class="title">Họ và tên:</div>
        <?php
        $name = '';
        $stt = 0;
        $arrNames = str_split($post->account->name);
        foreach ($arrNames as $arrName) {
            if ($stt++ <=0 || $arrName==' '){
                $name .= $arrName;
            }else {
                $name .= '*';
            }
        }
        ?>
                    <p class="noidung w-100 text-end" id="namePoster">{{ $name }}</p>
                </div>

                <hr class="hr">
            <div class="fields">
                <div class="title">Số điện thoại:</div>
                <?php
                $phone = '';
                $stt = 0;
                $arrPhones = str_split($post->account->numberphone);
                foreach ($arrPhones as $arrPhone) {
                    if ($stt++ <=3){
                        $phone .= $arrPhone;
                    }else {
                        $phone .= '*';
                    }
                }
                ?>
                <p class="noidung w-100 text-end" id="phonePoster">{{ $phone != '' ?$phone : '0*********' }}</p>
            </div>
                <hr class="hr">
                <div class="fields">
                    <div class="title">Lượt tố cáo:</div>
                    <p class="noidung w-100 text-end">{{$post->countReport}}</p>
                </div>
                <hr class="hr">
                <div class="fields">
                    <div class="title">Ngày đăng:</div>
                    @php
                    $date = explode(" ", $post->created_at);
                    $arrDate = explode('-', $date[0]);
                    $formatDate = $arrDate[2].'.'.$arrDate[1].'.'.$arrDate[0];
                    @endphp
                    <p class="noidung w-100 text-end">{{ $formatDate }}</p>
                </div>

    </div>

        <div id="borderPoster" style="height: max-content; margin-top: 23px">
            <div class="fields">
               <div class="d-flex">
                   <img src="{{asset('images/communities/elip.webp')}}" style="width: 28px; height: 28px; border-radius: 100px" alt="">
                   <h5 style="transform: translate(7px, 3px);">Cộng đồng Valorant</h5>
               </div>
            </div>
            <div class="search-computer" >
                @foreach($communities as $community)
                    @if($loop->index!= 0)
                        <hr class="hr" style="margin-top: 19px; margin-bottom: 5px">
                    @endif
                    <a class="text-decoration-none" href="{{$community->link}}">
                        <div class="d-flex" style="margin-top: 20px">
                            <img src="{{asset('images/communities/elip.webp')}}" style="width: 48px; height: 48px; border-radius: 100px" alt="">
                            <p style="transform: translate(15px, -2px);line-height: 22px;">VALORANT: Chợ dời - Trao đổi mua bán tài khoản (PC) VN</p>
                        </div>
                        <span style="color: var(--Light-White, #B5AB9A);">Công khai · 58K thành viên · Hơn 10 bài viết/ngày</span>
                    </a>
                @endforeach
            </div>

            <div style="margin-top: 12px;" class="search-mobile">
                @foreach($communities as $community)
                <a class="text-decoration-none" href="{{$community->link}}">
                    <div class="communities-mobile" style="margin-top: 12px;">
                        <div class="d-flex" style="gap: 16px; height: max-content">
                            <img src="{{asset('images/communities/'.$community->image)}}" style="width: 48px; height: 48px; border-radius: 100px" alt="">
                            <p style="margin-bottom: unset; color: var(--Light-White, #E4E4E4);">{{$community->name}}</p>
                        </div>
                        <p style="color: #9E9E9E;margin-bottom: unset; margin-top: 16px;">
                            {{$community->infor}}
                        </p>
                    </div>
                </a>
                @endforeach
            </div>

        </div>
    </div>

    </div>
        <div class="cangiua" style="margin-top: 57px;">
            <div class="d-flex justify-content-between">
                <p><span style="color: var(--Light-primary, #009571);">({{$post->numberComments}})</span> Bình luận</p>
                <p>Hôm nay bạn còn <span style="color: var(--Light-primary, #009571);">{{Auth::user()->numcomments??3}}</span> lượt</p>
            </div>
        </div>

        <div style="display: flex; margin-top: 6px">
            <img style="width: 40px; height: 40px; border-radius: 100px" src="<?php if (isset($account['avatar'])) {
                    echo $account['avatar'];
                }else {
                    echo 'https://api-muakey.cdn.vccloud.vn/_nuxt/img/male.fa119a1.png';
                } ?>"
                 alt="">
            <form id="form" action="/comments" method="POST" onsubmit="return validate()">
                @csrf
                <input type="hidden" value="{{ $account['numcomments'] }}" name="numcomments">
                <input type="hidden" value="{{ request()->id }}" name="post">
                <textarea class="no-scroll" style="margin-left: 15px;padding: 10px 118px 0 10px; resize: none" id="comment" name="comment" rows="10"
                          placeholder="Để lại bình luận của bạn về nội dung report này..."></textarea>
                <button id="commentSubmit" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        style="margin-top: -61px; margin-left: 20px;" type="button">Gửi
                </button>

            </form>
        </div>
        <div style="color: red" id="errorComment"></div>
        @error('comment')
        <div style="color:red">{{$message}}</div>
        @enderror
        <div class="list-comments">
            @foreach ($comments as $comment)
                <nav class="navbar navbar-dark">
                    <div class="container-fluid">
                        <div style="display: flex">
                            <img style="width: 32px; height: 32px; border-radius: 100px"
                                 src="{{ $comment->account->avatar }}" alt="">
                            <div>

                                <div class="d-flex">
                                    <p style="margin-left: 15px; color: var(--Blue, #0989FF);">{{ $comment->account->name }}
                                    </p>
                                    @php
                                        $arrDate = explode(" ",$comment->created_at);
                                        $oldDate = explode('-', $arrDate[0]);
                                        $date = $oldDate[2]. '/'. $oldDate[1].'/'. $oldDate[0];
                                        $arrTime = explode(":", $arrDate[1]);
                                        $time  = $arrTime[0].':'.$arrTime[1]
                                    @endphp
                                    <p style="margin-left: 12px; font-size: 14px; color: var(--w-60, rgba(255, 255, 255, 0.60));">
                                        {{$time.' '.$date}}
                                    </p>
                                </div>
                                <p class="content-wrap" style="margin-left: 15px; margin-top: -12px;">{{ $comment->comment_content }}</p>
                                <div style="display: flex; margin-left: 15px; margin-top: -12px;">

                                    @if ($comment->check == 1)
                                        <a data-bs-toggle="modal" data-bs-target="#exampleModal"
                                           id="like{{ $comment->id }}" onclick="unlike({{ $comment->id }})"
                                           style="display: flex; text-decoration: none">
                                            <img style="margin-bottom: 16px" src="{{ asset('images/content/dalike.svg') }}"
                                                 alt="">
                                            <p>&nbsp;<span id="num{{ $comment->id }}">{{ $comment->like }}</span> Thích
                                                &nbsp;&nbsp;</p>
                                        </a>
                                    @else
                                        <a data-bs-toggle="modal" data-bs-target="#exampleModal"
                                           id="like{{ $comment->id }}" onclick="like({{ $comment->id }})"
                                           style="display: flex; text-decoration: none">
                                            <img style="margin-bottom: 16px"
                                                 src="{{ asset('images/content/chualike.svg') }}" alt="">
                                            <p>&nbsp;<span id="num{{ $comment->id }}">{{ $comment->like }}</span> Thích
                                                &nbsp;&nbsp;</p>
                                        </a>
                                    @endif

                                    <a style="display: flex; text-decoration: none" data-bs-toggle="collapse"
                                       data-bs-target="#navbarToggleExternalContent{{ $comment->id }}"
                                       aria-controls="navbarToggleExternalContent{{ $comment->id }}"
                                       aria-expanded="false" aria-label="Toggle navigation">
                                        <img style="margin-bottom: 16px" src="{{ asset('images/content/traloi.svg') }}"
                                             alt="">
                                        <p>&nbsp;{{ $comment->number }} Trả lời</p>
                                    </a>
                                    @auth
                                        @if (Auth::user()->role_id==2)
                                            <a onclick="return confirm('Bạn có muốn xoá comment này và các comment liên quan?')" style="display: flex; text-decoration: none" href="/delete-comments/{{$comment->id}}">
                                                <i class="fa-solid fa-trash" style="color: #ffffff;margin:4px 4px 0 10px"></i>
                                                <p>Xoá</p>
                                            </a>
                                        @endif
                                    @endauth

                                </div>

                            </div>
                        </div>
                    </div>
                </nav>
                <div style="margin-left: 30px; margin-top: -25px;" class="collapse" id="navbarToggleExternalContent{{ $comment->id }}"
                     data-bs-theme="dark">
                    <div class=" p-4">
                        @foreach ($comment->replies as $reply)
                            @php
                                $arrDate = explode(" ",$reply->created_at);
                                                                $oldDate = explode('-', $arrDate[0]);
                                                                $date = $oldDate[2]. '/'. $oldDate[1].'/'. $oldDate[0];
                                                                $arrTime = explode(":", $arrDate[1]);
                                                                $time  = $arrTime[0].':'.$arrTime[1]
                            @endphp
                            <div style="display: flex;">
                                <img style="width: 32px; height: 32px; border-radius: 100px"
                                     src="{{ $reply->account->avatar }}" alt="">
                                <div>
                                    <div class="d-flex">
                                        <p style="margin-left: 15px; color: var(--Blue, #0989FF);">{{ $reply->account->name }}
                                        </p>
                                        <p style="margin-left: 12px; font-size: 14px; color: var(--w-60, rgba(255, 255, 255, 0.60));">
                                            {{$time.' '.$date}}
                                        </p>
                                    </div>
                                    <p class="content-wrap2" style="margin-left: 15px; margin-top: -12px;">{{ $reply->comment_content }}</p>
                                    <div style="display: flex; margin-top: -12px; margin-left: 15px;">
                                        @if ($reply->check == 1)
                                            <a data-bs-toggle="modal" data-bs-target="#exampleModal"
                                               id="like{{ $reply->id }}" onclick="unlike({{ $reply->id }})"
                                               style="display: flex; text-decoration: none">
                                                <img style="margin-bottom: 16px"
                                                     src="{{ asset('images/content/dalike.svg') }}" alt="">
                                                <p>&nbsp;<span id="num{{ $reply->id }}">{{ $reply->like }}</span>
                                                    Thích &nbsp;&nbsp;</p>
                                            </a>
                                        @else
                                            <a data-bs-toggle="modal" data-bs-target="#exampleModal"
                                               id="like{{ $reply->id }}" onclick="like({{ $reply->id }})"
                                               style="display: flex; text-decoration: none">
                                                <img style="margin-bottom: 16px"
                                                     src="{{ asset('images/content/chualike.svg') }}" alt="">
                                                <p>&nbsp;<span id="num{{ $reply->id }}">{{ $reply->like }}</span>
                                                    Thích &nbsp;&nbsp;</p>
                                            </a>
                                        @endif
                                        @if (Auth::check())
                                            @if (Auth::user()->role_id==2)
                                                <a onclick="return confirm('Bạn có muốn xoá comment này?')" style="display: flex; text-decoration: none" href="/delete-comments/{{$reply->id}}">
                                                    <i class="fa-solid fa-trash" style="color: #ffffff;margin:4px 4px 0 10px"></i>
                                                    <p>Xoá</p>
                                                </a>
                                            @endif
                                        @endif
                                    </div>

                                </div>
                            </div>
                        @endforeach

                        <div style="display: flex">
                            <form class="form_reply{{$comment->id}}" id="form" @if (!Auth::check()) onsubmit="return false" @endif action="/comments" method="post">
                                @csrf
                                <input type="hidden" value="{{ $account['numcomments'] }}" name="numcomments">
                                <input type="hidden" value="{{ $comment->id }}" name="reply">
                                <input type="hidden" value="{{ $post->id }}" name="post">
                                <textarea class="content-comment{{ $comment->id }}" onkeydown="submitForm(event, {{$comment->id}})" style="margin-left: 5px; padding: 10px 118px 0 10px; resize: none" id="comment" name="comment" cols="121"
                                          rows="10" placeholder="Nhập câu trả lời của bạn ..."></textarea>
                                <button id="btnReply{{$comment->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-top: -61px; margin-left: 20px; right: 26px" type="submit">Gửi</button>
                            </form>
                        </div>
                            <div style="color: red" id="errorComment{{ $comment->id }}"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@auth
    <div class="request-remove-post">
        <form action="{{route('job-remove-posts.store')}}" onsubmit="return submitRequestRemovePost()" method="post" enctype="multipart/form-data">
            <input type="hidden" name="number" value="{{ $post->id }}">
            @csrf
            <div class="d-flex align-items-center justify-content-between">
                <h5>
                    Yêu cầu gỡ bài tố cáo
                </h5>
                <img id="dong" style="cursor: pointer" src="{{asset('images/design/midman/Close.svg')}}" alt="">
            </div>

            <textarea style="margin-top: 24px; padding: 10px 118px 0 10px; resize: none" id="comment" name="content" cols="121"
                      rows="10" placeholder="Lí do yêu cầu gỡ bài"></textarea>
            <span style="color: red; font-size: 12px" id="errorContent"></span>

            <p style="margin-bottom: unset;margin-top: 24px; color: var(--Yellow, #FFCA06);">Upload bằng chứng</p>
            <div class="d-flex justify-content-between">
                <div class="images-request-remove-post">
                    <input onchange="showSingleImage(event, 0)" class="img-request-remove-post" name='images[]' type="file" id="file" accept="image/*" />
                    <label for="file" class="custom-file-upload"></label>
                </div>
                <img src="" class="img img-request-remove-post" style="display: none; border-radius: 10px; margin-top: 21px;" alt="">
                <div class="images-request-remove-post">
                    <input onchange="showSingleImage(event, 1)" class="img-request-remove-post" name='images[]' type="file" id="file2" accept="image/*" />
                    <label for="file2" class="custom-file-upload"></label>
                </div>
                <img src="" class="img img-request-remove-post" style="display: none; border-radius: 10px; margin-top: 21px;" alt="">
                <div class="images-request-remove-post">
                    <input onchange="showSingleImage(event, 2)" class="img-request-remove-post" name='images[]' type="file" id="file3" accept="image/*" />
                    <label for="file3" class="custom-file-upload"></label>
                </div>
                <img src="" class="img img-request-remove-post" style="display: none; border-radius: 10px; margin-top: 21px;" alt="">
                <div class="images-request-remove-post">
                    <input onchange="showSingleImage(event, 3)" class="img-request-remove-post" name='images[]' type="file" id="file4" accept="image/*" />
                    <label for="file4" class="custom-file-upload"></label>
                </div>
                <img src="" class="img img-request-remove-post" style="display: none; border-radius: 10px; margin-top: 21px;" alt="">
                <div class="images-request-remove-post">
                    <input onchange="showSingleImage(event, 4)" class="img-request-remove-post" name='images[]' type="file" id="file5" accept="image/*" />
                    <label for="file5" class="custom-file-upload"></label>
                </div>
            </div>
            <span style="color: red; font-size: 12px" id="errorImages"></span>
            <button class="btnReport w-100" style="margin-top: 24px;">Yêu cầu gỡ bài</button>
        </form>
    </div>

@endauth
    <script src="{{ asset('js/img.js') }}"></script>
<script !src="">
    function submitRequestRemovePost() {
        let check =true;
        let flag = 0;
        let images = document.getElementsByClassName('img-request-remove-post');
        let content = document.getElementsByName('content')[0];

        if (content.value.trim() ==''){
        content.style.border = '1px solid var(--Error, #FF5252)';
        content.style.background = 'rgba(255, 82, 82, 0.24)';
        document.getElementById('errorContent').innerHTML = 'Nội dung không được để trống'
        check = false;
    }

        for (const imagesElement of images) {
            if (imagesElement.value != '' && imagesElement.value != undefined){
                flag = 1;
            }
        }
        if (flag!=1){
            document.getElementById('errorImages').innerHTML = 'Ảnh không được để trống'
            check = false;
        }
    return check;
    }

    function handleSubmit (e=null) {
        btnComment.disabled = true;
        comment.disabled = true;
        let loading = `
        <div class="spinner-border text-success" id="spinner" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
`;
        btnComment.innerHTML = `Gửi ${loading}`;
        btnComment.style.cursor = 'not-allowed';
        $.ajax({
            url : '/comments',
            method: 'POST',
            data: {
                _token: "{{csrf_token()}}",
                post : postId,
                comment : comment.value,
            },
            success : function (data) {
                const parser = new DOMParser();
                const htmlDoc = parser.parseFromString(data, 'text/html');
                const newComments = htmlDoc.getElementsByClassName('list-comments')[0].innerHTML;
                document.getElementsByClassName('list-comments')[0].innerHTML = newComments;
                document.getElementById('spinner').remove();
                document.getElementById('comment').value =''
                btnComment.disabled = false;
                comment.disabled = false;
                btnComment.style.cursor = 'pointer';
            },
            error: function () {
                alert('đã xảy ra lỗi')
            }
        });
    }

    document.getElementById('btnRequestRemovePost').addEventListener('click', ()=> {
        document.getElementById('over').style.display = 'block'
        document.getElementById('over').style.zIndex = '1'
        document.getElementsByClassName('request-remove-post')[0].style.display = 'block'
    })

    document.getElementById('over').addEventListener('click', ()=> {
        document.getElementById('over').style.display = 'none'
        document.getElementsByClassName('request-remove-post')[0].style.display = 'none'
    })

    document.getElementById('dong').addEventListener('click', ()=> {
        document.getElementById('over').style.display = 'none'
        document.getElementsByClassName('request-remove-post')[0].style.display = 'none'
    })

    function showSingleImage(event, id) {
        let divImg = document.getElementsByClassName('images-request-remove-post')[id];
        let img = document.getElementsByClassName('img-request-remove-post')[id];
        let imgElement = document.getElementsByClassName('img')[id];
        const file = event.target.files[0]; // Lấy tệp ảnh đầu tiên từ ô input
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                imgElement.src = e.target.result; // Thiết lập src của thẻ img bằng kết quả từ FileReader
                imgElement.style.display = 'block'; // Hiển thị thẻ img
                divImg.style.display = 'none'
            }

            reader.readAsDataURL(file); // Đọc tệp ảnh dưới dạng URL
        }

    }

    function handleSubmit2 (btnComment, comment, id) {
        btnComment.disabled = true;
        comment.disabled = true;
        let loading = `
        <div class="spinner-border text-success" id="spinner" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
`;
        btnComment.innerHTML = `Gửi ${loading}`;
        btnComment.style.cursor = 'not-allowed';
        $.ajax({
            url : '/comments',
            method: 'POST',
            data: {
                _token: "{{csrf_token()}}",
                post : postId,
                comment : comment.value,
                reply : id,
            },
            success : function (data) {
                const parser = new DOMParser();
                const htmlDoc = parser.parseFromString(data, 'text/html');
                const newComments = htmlDoc.getElementById('navbarToggleExternalContent'+id).innerHTML;
                document.getElementById('navbarToggleExternalContent'+id).innerHTML = newComments;
                document.getElementById('navbarToggleExternalContent'+id).classList.add('show');
                document.getElementById('spinner').remove();
                document.getElementById('comment').value =''
                btnComment.disabled = false;
                comment.disabled = false;
                btnComment.style.cursor = 'pointer';
            },
            error: function () {
                alert('đã xảy ra lỗi')
            }
        });
    }

</script>

    <script src="{{ asset('js/comment.js') }}"></script>
    <script>
        // Lưu vị trí cuộn trước khi tải lại trang
        window.addEventListener('beforeunload', function() {
            localStorage.setItem('scrollPosition', window.scrollY);
        });
        // Lấy vị trí cuộn sau khi tải lại trang và cuộn trang đến vị trí đó
        window.addEventListener('load', function() {
            var scrollPosition = localStorage.getItem('scrollPosition');
            if (scrollPosition) {
                window.scrollTo(0, parseInt(scrollPosition, 10));
                localStorage.removeItem('scrollPosition')
            }
        });
        window.addEventListener('resize', ()=>{
            if (screen.width<=1650 && screen.width>= 1519) {
            document.getElementById('col-md-9').style.marginLeft = '-7.3px'
        }
        })
        if (screen.width<=1650 && screen.width>= 1519) {
            document.getElementById('col-md-9').style.marginLeft = '-7.3px'
        }
    </script>

@auth
    <script>
        function like(id) {

            $.ajax({
                url: '/like/' + id,
                method: 'GET',
                success: function(response) {
                    if (response == 'like') {
                        let num = document.getElementById('num' + id);
                        let a = document.getElementById('like' + id);
                        num = +num.innerText;
                        a.onclick = function() {
                            a.onclick = unlike(id);
                        }
                        a.innerHTML =
                            ` <img style="margin-bottom: 16px"src="{{ asset('images/content/dalike.svg') }}" alt=""><p>&nbsp;<span id="num${id}">${num+1}</span>  Thích &nbsp;&nbsp;</p>`
                    }
                },
            });
        }
        function unlike(id) {
            $.ajax({
                url: '/unlike/' + id,
                method: 'GET',
                success: function(response) {
                    let num = document.getElementById('num' + id);
                    let a = document.getElementById('like' + id);
                    num = +num.innerText;
                    a.onclick = function() {
                        a.onclick = like(id);
                    }
                    a.innerHTML =
                        `<img style="margin-bottom: 16px"src="{{ asset('images/content/chualike.svg') }}" alt=""><p>&nbsp;<span id="num${id}">${num-1}</span>  Thích &nbsp;&nbsp;</p>`
                },
            });
        }
    </script>
@else

@endauth
@endsection



