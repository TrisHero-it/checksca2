@extends('layouts.app')
@section('title', 'Sửa bài viết')
@section('link')
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <style>
        .form2 {
            font-size: 14px;
        }

        .form-input {
            font-size: 14px;
        }

        textarea {
            font-size: 14px;
        }
    </style>
@endsection
@section('content')
    <div class="cangiua">
        <div class="row">
            <div class="col-xl-9" id="createReport" style="">
                <div class="d-flex justify-content-between">
                    <h5>Thông tin Scam</h5>
                    @if($post->status_id==3)
                        <p class="badge text-bg-success" style="font-size: 10px; color: #66E882 !important; border-radius: 100px; background: #00501B !important;">{{$post->status->status}}</p>
                    @elseif($post->status_id==2)
                        <p class="badge text-bg-success" style="font-size: 10px; color: #FF8989 !important; border-radius: 100px; background: #6B2323 !important;">{{$post->status->status}}</p>
                    @else
                        <p class="badge text-bg-success" style="font-size: 10px; color: #FFE26D !important; border-radius: 100px; background: #766105 !important;">{{$post->status->status}}</p>
                    @endif

                </div>
                <form action="{{route('dashboard.histories.update', $post->id)}}" method="POST" enctype="multipart/form-data" onsubmit="checkImages2()">
                    @csrf
                    @method('PUT')
                    <div class="create-mobile">
                        <div class="form-group">
                            <select name="category_id" style="color: white" class="form-select form2">
                                <option style="background: #1A2E32; " value="">Danh mục <span style="color: forestgreen">*</span></option>
                                @foreach ($cates as $cate)
                                    <option style="background: #1A2E32; " @if (old('category_id') == $cate['id']) {{ 'selected' }} @endif
                                            @if($post->category_id == $cate['id']) selected @endif
                                            value="{{ $cate['id'] }}">{{ $cate['name'] }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div style="color: red">Vui lòng chọn danh mục</div>
                            @enderror
                        </div>

                        <div class="form-group input-mobile position-relative">
                            <input class="form-input" name='username' type="text" id="email" placeholder=" "
                                   value="{{$post->username}}">
                            <label class="form-label" for="email">Tài khoản game</label>
                            @error('username')
                            <div style="color: red">{{$message}}</div>
                            @enderror
                            <img class="position-absolute get-video" src="{{asset('images/design/hoicham.svg')}}" alt="">
                        </div>

                    </div>

                    <div class="create-mobile">
                        <div class="form-group input-mobile position-relative">
                            <input class="form-input" name='linkfb' type="text" id="email" placeholder=" "
                                   value="{{$post->linkfb}}">
                            <label class="form-label" for="email">Link bài viết report</label>
                            <img class="position-absolute get-video" src="{{asset('images/design/hoicham.svg')}}" alt="">
                        </div>
                        <div class="form-group">
                            <input class="form-input" name='fullname' type="text" id="email" placeholder=" "
                                   value="{{$post->fullname}}">
                            <label class="form-label" for="email">Họ và tên <span style="color: forestgreen">*</span></label>
                            @error('fullname')
                            <div style="color: red">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="create-mobile">

                        <div class="form-group">
                            <input class="form-input" name='moneys_scam' type="text" value="{{$post->moneys_scam}}"
                                   id="number" placeholder=" ">
                            <label class="form-label" for="number">Số tiền Chiếm đoạt <span
                                    style="color: forestgreen">*</span>
                            </label>
                            @error('moneys_scam')
                            <div style="color: red">{{$message}}</div>
                            @enderror
                        </div>


                        <div  class="form-group input-mobile">
                            <input class="form-input" name='numberphone' type="text" id="email" placeholder=" "
                                   value="{{$post->numberphone}}">
                            <label class="form-label" for="email">Số điện thoại </label>
                            @error('numberphone')
                            <div style="color: red">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <input class="form-input" name='post_id' type="hidden" value="{{$post->id}}"
                           id="email" placeholder=" ">
                    <input type="hidden" name="delete_old_images">
                    <div class="create-mobile">
                        <div  class="form-group">
                            <input class="form-input" name='numberbank' type="text" value="{{$post->numberbank}}"
                                   id="email" placeholder=" ">
                            <label class="form-label" for="email">Số tài khoản <span
                                    style="color: forestgreen">*</span></label>
                            @error('numberbank')
                            <div style="color: red">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select name="namebank" style="color: white" class="form-select form2 no-scroll">
                                <option value="" style="background: #1A2E32">Ngân hàng <span style="color: forestgreen">*</span></option>
                                @foreach($banks as $bank)
                                    <option style="background: #1A2E32; "
                                            @if($post->namebank==$bank['shortName']) selected @endif
                                            value="{{$bank['shortName']}}">{{$bank['shortName']}}</option>
                                @endforeach
                            </select>
                            @error('namebank')
                            <div style="color: red">Vui lòng chọn ngân hàng</div>
                            @enderror
                        </div>
                    </div>

                    <div style="color: var(--Light-White, #B5AB9A); margin-top:24px">Upload Bill chuyển tiền & ảnh đoạn chat lừa đảo:</div>

                    <div>
                    <textarea style="padding-left:12px; margin-top:24px ; color: white" name="content" id="text" cols="121" rows="10"
                              placeholder="Nội dung report *">{{$post->content}}</textarea>
                    </div>
                    @error('content')
                    <div style="color: red">{{ $message }}</div>
                    @enderror
                    <p style="color: #DA8F2D;font-size:14px; margin-top: 10px;" >
                        Điều 156 Bộ luật Hình sự 2015 (sửa đổi, bổ sung 2017) quy định hành vi vu khống người khác có thể bị phạt tiền từ 10-50 triệu đồng và phạt tù với mức cao nhất từ 03 năm đến 07 năm.
                    </p>

                    <div style="display: flex">
                        <div id="img" class="d-flex">
                            @foreach($post->images as $image)
                                <div class="image-container" id="imageContainer{{$loop->index}}">
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($image)}}" id="oldImage{{$loop->index}}" alt="Image" class="image2" style="display: block;">
                                    <div class="overlayImages"></div>
                                    <div class="option">
                                        <img src="{{env('APP_URL').'/images/Eye.svg'}}" onclick="largeImg2({{$loop->index}})" id="viewImage" alt="Image">
                                        <img src="{{env('APP_URL'). '/images/DeleteOutlined.svg'}}" id="delImage0" onclick="deleteOldImage({{$loop->index}})" alt="Image">
                                    </div>
                                </div>
                            @endforeach
                            <div id="mar">
                                <input name='new_images[]' onchange="debounceImages(event)" type="file" id="file" accept="image/*" multiple />
                                <label for="file" class="custom-file-upload show-input-image"></label>
                            </div>
                            @error('new_images')
                            <div style="color: red">{{ $message }}</div>
                            @enderror
                            @if (session('error'))
                                <div style="color: red">Ảnh không đúng định dạng</div>
                            @endif
                        </div>

                    </div>
                    <div style="color:red" id="error">Ảnh không đúng định dạng</div>
                    <h5 style="margin-top:  26px;">Người đăng</h5>
                    <div class="create-mobile">
                            <div class="form-group">
                                <input class="form-input" type="text" id="name" name="post_name" disabled value="{{ $account->name }}"
                                       placeholder=" ">
                                <label class="form-label" for="email">Họ và tên <span
                                        style="color: forestgreen">*</span></label>
                            </div>

                            <div  class="form-group input-mobile">
                                <input class="form-input" name="post_phone" type="text" id="email" placeholder=" "
                                       value="{{$account->numberphone}}" disabled>
                                <label class="form-label" for="email">Số điện thoại </label>
                                @error('post_phone')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                    </div>
                    <p
                        style="
                    margin-top: 24px;
              color: var(--w-60, rgba(255, 255, 255, 0.60));
              font-family: Mulish;
              font-size: 12px;
              font-style: normal;
              font-weight: 400;
              line-height: normal;  color: #DA8F2D;">
                            Để tránh việc bị vu khống, bạn cần điền thông tin của người đăng. Thông tin này sẽ được ẩn.</p>

                    <div class="text-start">
                        <button class="btnReport" id="guiduyet" type="submit" >Chỉnh sửa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="guide-get-username">
        <div class="d-flex justify-content-between">
            <h6>Hướng dẫn lấy tài khoản game</h6>
            <img class="" style="cursor: pointer;" id="closePopUp" src="{{asset('images/design/Close.svg')}}" alt="">
        </div>
        <p>hướng dẫn nè hii</p>
        <video controls loop id="video">
            <source src="{{asset('images/design/fifa.mp4')}}" type="video/mp4" />
        </video>
    </div>
    <div class="image_overlay" id="over"></div>
    <div  class="notification" id="success">
        <img src="{{asset('images/success.png')}}" alt="">
        <div>
            <p>Gửi report thành công</p>
            <p>Chúng tôi sẽ kiểm tra và xét duyệt đơn của bạn</p>
            <button class="btnReport" style="padding: 6px 38px" id="closeNoti">Đóng</button>
        </div>
    </div>

    <script src="{{ asset('js/img.js') }}"></script>
    @if (session('success'))
        <script src="{{ asset('js/success.js') }}"></script>
    @endif

    <script src="{{ asset('js/createPoster.js') }}"></script>

    <script !src="">
        let arrImages = [];
        let a = 1;
        function deleteOldImage(id) {
            if (confirm('Bạn muốn xoá ảnh này không')) {
                let imgContainer = document.getElementById('imageContainer'+id);
                let imageDisplay = document.getElementById('oldImage'+id);
                arrImages.push(imageDisplay.src);
                imgContainer.style.display = 'none'
            }
        }

        function checkImages2() {
            document.getElementsByName('delete_old_images')[0].value = arrImages

            return true
        }
    </script>

@endsection
