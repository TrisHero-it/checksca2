@extends('layouts.app')
@section('title', 'Tố cáo')
@section('link')
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
@endsection
@section('content')
   <div class="cangiua">
    <div class="row">
        <div class="col-xl-9" id="createReport" style="">
            <h5>Thông tin Scam</h5>
            <form action="/posts" method="POST" onsubmit="return checkImages()" enctype="multipart/form-data">
                @csrf
                <div class="create-mobile">
                <div class="form-group">
                        <select name="danhmuc" class="form-select form2">
                            <option value="">Danh mục <span style="color: forestgreen">*</span></option>
                            @foreach ($cates as $cate)
                                <option @if (old('danhmuc') == $cate['id']) {{ 'selected' }} @endif
                                    value="{{ $cate['id'] }}">{{ $cate['name'] }}</option>
                            @endforeach
                        </select>
                        @error('danhmuc')
                            <div style="color: red">Vui lòng chọn danh mục</div>
                        @enderror
                    </div>

                    <div class="form-group input-mobile position-relative">
                        <input class="form-input" autocomplete="off" name='username' type="text" id="email" placeholder=" "
                            value="{{ old('username') }}">
                        <label class="form-label" for="email">Tài khoản game</label>
                        @error('username')
                            <div style="color: red">{{$message}}</div>
                    @enderror
                    <img class="position-absolute get-video" src="{{asset('images/design/hoicham.svg')}}" alt="">
                    </div>

                </div>

                <div class="create-mobile">
                    <div class="form-group input-mobile position-relative">
                        <input class="form-input" autocomplete="off" name='link' type="text" id="email" placeholder=" "
                            value="{{ old('link') }}">
                        <label class="form-label" for="email">Link bài viết report</label>
                    <img class="position-absolute get-video" src="{{asset('images/design/hoicham.svg')}}" alt="">
                    </div>
                    <div class="form-group">
                        <input class="form-input" autocomplete="off" name='hovaten' type="text" id="email" placeholder=" "
                            value="{{ old('hovaten') }}">
                        <label class="form-label" for="email">Họ và tên <span style="color: forestgreen">*</span></label>
                        @error('hovaten')
                            <div style="color: red">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="create-mobile">

                <div class="form-group">
                    <input class="form-input" autocomplete="off" name='scam' type="text" value="{{ old('scam') }}"
                            id="number" placeholder=" ">
                        <label class="form-label" for="number">Số tiền Chiếm đoạt <span
                                style="color: forestgreen">*</span></label>
                        @error('scam')
                            <div style="color: red">{{$message}}</div>
                        @enderror
                    </div>


                    <div  class="form-group input-mobile">
                        <input class="form-input" autocomplete="off" name='sodienthoai' type="text" id="email" placeholder=" "
                            value="{{ old('sodienthoai') }}">
                        <label class="form-label" for="email">Số điện thoại </label>
                        @error('sodienthoai')
                            <div style="color: red">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="create-mobile">
                <div  class="form-group">
                        <input class="form-input" autocomplete="off" name='sotaikhoan' type="text" value="{{ old('sotaikhoan') }}"
                            id="email" placeholder=" ">
                        <label class="form-label" for="email">Số tài khoản <span
                                style="color: forestgreen">*</span></label>
                        @error('sotaikhoan')
                            <div style="color: red">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <select name="nganhang" class="form-select form2 no-scroll">
                            <option value="" style="background: #1A2E32">Ngân hàng <span style="color: forestgreen">*</span></option>
                           @foreach($banks as $bank)
                                <option style="background: #1A2E32; " value="{{$bank['shortName']}}">{{$bank['shortName']}}</option>
                           @endforeach
                        </select>
                        @error('nganhang')
                        <div style="color: red">Vui lòng chọn ngân hàng</div>
                        @enderror
                    </div>
                    </div>

                <div style="color: var(--Light-White, #B5AB9A); margin-top:24px">Upload Bill chuyển tiền & ảnh đoạn chat lừa đảo:</div>

                <div>
                    <textarea style="padding-left:12px; margin-top:24px ;" name="noidung" id="text" cols="121" rows="10"
                        placeholder="Nội dung report *">{{ old('noidung') }}</textarea>
                </div>
                @error('noidung')
                    <div style="color: red">{{ $message }}</div>
                @enderror
                <p style="color: #DA8F2D;font-size:14px; margin-top: 10px;" >
                Điều 156 Bộ luật Hình sự 2015 (sửa đổi, bổ sung 2017) quy định hành vi vu khống người khác có thể bị phạt tiền từ 10-50 triệu đồng và phạt tù với mức cao nhất từ 03 năm đến 07 năm.
                </p>

                <div style="display: flex">
                    <div id="img">
                        <div id="mar">
                            <input name='image[]' onchange="debounceImages(event)" type="file" id="file" accept="image/*" multiple />
                            <label for="file" class="custom-file-upload show-input-image"></label>
                        </div>
                        @error('image')
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
                    @foreach ($account as $row)
                        <div class="form-group">
                            <input autocomplete="off" class="form-input" type="text" id="name" name="post_name" disabled value="{{ $row->name }}"
                                placeholder=" ">
                            <label class="form-label" for="email">Họ và tên <span
                                    style="color: forestgreen">*</span></label>
                        </div>

                        <div  class="form-group input-mobile">
                            <input autocomplete="off" class="form-input" name="post_phone" type="text" id="email" placeholder=" "
                                value="{{$row->numberphone}}" disabled>
                            <label class="form-label" for="email">Số điện thoại </label>
                                    @error('post_phone')
                    <div style="color: red">{{ $message }}</div>
                @enderror
                        </div>
                    @endforeach
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
    <button class="btnReport " id="guiduyet" type="submit">Gửi duyệt</button>
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
   <div class="image_overlay" id="over" style="z-index: 1;"></div>
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
@endsection
