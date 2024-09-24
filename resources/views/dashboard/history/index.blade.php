@extends('layouts.app')
@section('title', 'Dashboard')
@section('link')
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
@endsection
@section('content')
    <div class="cangiua">
        <div class="row" style="margin-top: 24px;">
        <div class="navigation col-3 search-computer" style="">
                <a class="text-decoration-none d-flex justify-content-between w-100" style="color: white" href="{{route('dashboard')}}"><div class="d-flex navigation-column navigation-hover"><div class="d-flex" style="align-items: center; gap:8px;"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
<g clip-path="url(#clip0_2839_3916)">
<path d="M3.33398 15C3.33398 13.159 4.82637 11.6666 6.66732 11.6666H13.334C15.1749 11.6666 16.6673 13.159 16.6673 15V15C16.6673 15.9204 15.9211 16.6666 15.0007 16.6666H5.00065C4.08018 16.6666 3.33398 15.9204 3.33398 15V15Z" stroke="#808089" stroke-width="1.5" stroke-linejoin="round"/>
<ellipse cx="10" cy="5.83325" rx="2.5" ry="2.5" stroke="#808089" stroke-width="1.5"/>
</g>
<defs>
<clipPath id="clip0_2839_3916">
<rect width="20" height="20" fill="white"/>
</clipPath>
</defs>
</svg> Thông tin cá nhân</div>  <img src="{{asset('images/design/Arrows.svg')}}" alt=""></div></a>
                <a class="text-decoration-none d-flex justify-content-between w-100" style="color: white" href="{{route('dashboard.histories')}}"><div class="navigation-column navigation-hover"><div class="d-flex" style="align-items: center; gap:8px; color: var(--Light-primary, #009571);"><img src="{{asset('images/design/Report-green.png')}}" alt=""> Lịch sử tố cáo</div><img src="{{asset('images/design/Arrows-green.svg')}}" alt=""></div></a>
                <a class="text-decoration-none d-flex justify-content-between w-100" style="color: white" href="{{route('password.edit')}}"><div class="navigation-column navigation-hover"><div class="d-flex" style="align-items: center; gap:8px;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
<path d="M6.66602 8.33333V5.83333C6.66602 3.99238 8.1584 2.5 9.99935 2.5C11.8403 2.5 13.3327 3.99238 13.3327 5.83333V8.33333" stroke="#808089" stroke-width="1.5" stroke-linecap="round"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M3.41602 8.33337C3.41602 7.91916 3.7518 7.58337 4.16602 7.58337H15.8327C16.2469 7.58337 16.5827 7.91916 16.5827 8.33337V15.5C16.5827 17.0188 15.3515 18.25 13.8327 18.25H6.16602C4.64724 18.25 3.41602 17.0188 3.41602 15.5V8.33337ZM4.91602 9.08337V15.5C4.91602 16.1904 5.47566 16.75 6.16602 16.75H13.8327C14.523 16.75 15.0827 16.1904 15.0827 15.5V9.08337H4.91602Z" fill="#808089"/>
<ellipse cx="12.084" cy="12.9166" rx="1.25" ry="1.25" transform="rotate(-180 12.084 12.9166)" fill="#808089"/>
</svg> Đổi mật khẩu</div><img src="{{asset('images/design/Arrows.svg')}}" alt=""></div></a>
                <a href="/logout" class="text-light text-decoration-none"><div class="navigation-column navigation-hover"><div class="d-flex" style="align-items: center; gap:8px;"><img src="{{asset('images/design/logout.svg')}}" alt="">Đăng xuất</div> <img src="{{asset('images/design/Arrows.svg')}}" alt=""></div></a>
            </div>

            <div class="navigation col-lg-3 search-mobile" style="margin-bottom: 24px;">
                <div class="d-flex" style="overflow: auto; width: 100%;">
                    <div class="d-flex align-items-center justify-content-center" style="padding: 12px; width: 142px; min-width: 142px; text-align: center; border-radius: 100px; height: 36px;">
                        <p style="margin-bottom: unset; margin-top: 4px; font-size: 14px ; text-align: center !important;">Thông tin cá nhân</p>
                    </div>
                    <a href="{{route('dashboard.histories')}}" class="text-decoration-none">
                    <div class="d-flex align-items-center justify-content-center" style="padding: 12px; width: 130px; min-width: 130px;background: var(--Light-primary, #009571); text-align: center; border-radius: 100px; height: 36px;">
                        <p style="margin-bottom: unset; margin-top: 4px; font-size: 14px ; text-align: center !important;">Lịch sử tố cáo</p>
                    </div>
                    </a>
                    <div class="d-flex align-items-center justify-content-center" style="padding: 12px; width: 130px; min-width: 130px; text-align: center; border-radius: 100px; height: 36px;">
                        <p style="margin-bottom: unset; margin-top: 4px; font-size: 14px ; text-align: center !important;">Phòng midman</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-center" style="padding: 12px; width: 130px; min-width: 130px; text-align: center; border-radius: 100px; height: 36px;">         
                        <p style="margin-bottom: unset; margin-top: 4px; font-size: 14px ; text-align: center !important;">Đổi mật khẩu</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-center" style="padding: 12px; width: 130px; min-width: 130px; text-align: center; border-radius: 100px; height: 36px;">
                        <p style="margin-bottom: unset; margin-top: 4px; font-size: 14px ; text-align: center !important;"><a href="/logout" class="text-light text-decoration-none">Đăng xuất</a></p>
                    </div>
                </div>
            </div>

            <div class="col-sm-9">

                <div class="navigation-column" style="height: unset;font-size: 20px; padding: unset">Lịch sử tố cáo</div>

                <div class="row" style="margin-top: 24px;">
                    <div class="col-12 w-100" style="">
                        <div style="background: var(--Background-card, rgba(255, 255, 255, 0.08)); padding: 24px; border-radius: 16px; height: 100%; overflow: auto;">
                            <div class="d-flex" style="gap: 24px; border-bottom: 1px solid var(--white-12, rgba(255, 255, 255, 0.12)); width:max-content">
                                <p class="text-start"  style="min-width: 117px; margin-bottom: 16px; font-size: 14px;">Danh mục</p>
                                <p class="text-start"  style="min-width: 117px; margin-bottom: unset; font-size: 14px;">Tài khoản game</p>
                                <p class="text-start"  style="min-width: 117px; margin-bottom: unset; font-size: 14px;">Số tiền</p>
                                <p class="text-start"  style="min-width: 117px; margin-bottom: unset; font-size: 14px;">Trạng thái</p>
                                <p class="text-start"  style="min-width: 117px; margin-bottom: unset; font-size: 14px;">Ngày tạo</p>
                                <p class="text-start"  style="min-width: 117px; margin-bottom: unset; font-size: 14px;">Hành động</p>
                            </div>
                               @foreach($reports as $report)

                    <div class="post post-content" style="gap: 24px; height: 50px; display: flex; align-items: center; cursor: pointer; border-bottom: 1px solid var(--white-12, rgba(255, 255, 255, 0.12)); width:max-content">
                         <div class="d-flex post" onclick="toUrl({{$report->id}}, {{$report->status_id}})">
                             <p style="margin-bottom: unset; font-size: 14px; min-width: 117px;color: var(--Light-Grey, #939393);
                             width: 117px;
                                 overflow-x: hidden;
    text-overflow: ellipsis;
    font-style: normal;
    font-weight: 300;
    line-height: normal;
    text-wrap: nowrap;
                             ">{{$report->category->name}}</p>
                             <p style="margin-bottom: unset; font-size: 14px; min-width: 117px; max-width: 117px; overflow: hidden; text-overflow: ellipsis ; color: var(--Light-Grey, #939393);">{{$report->username?? '_ _'}}</p>
                             <p style="margin-bottom: unset; font-size: 14px;  color: var(--Light-primary, #009571);min-width: 117px;">{{number_format($report->moneys_scam, 0, ',', ',')}} VNĐ</p>
                             <div style="min-width: 117px; transform: translateY(-5px)" >
                                 @if($report->status_id==3)
                                     <p class="badge text-bg-success" style="margin-bottom: unset; font-size: 10px; color: #66E882 !important; border-radius: 100px; background: #00501B !important;">{{$report->status->status}}</p>
                                 @elseif($report->status_id==2)
                                     <p class="badge text-bg-success" style="margin-bottom: unset; font-size: 10px; color: #FF8989 !important; border-radius: 100px; background: #6B2323 !important;">{{$report->status->status}}</p>
                                 @else
                                     <p class="badge text-bg-success" style="margin-bottom: unset; font-size: 10px; color: #FFE26D !important; border-radius: 100px; background: #766105 !important;">{{$report->status->status}}</p>
                                 @endif
                             </div>
                             @php
                                 $date = explode(' ', $report->created_at);
                             $arrDate = explode('-', $date[0]);
                             $formatDate = $arrDate[2].'.'.$arrDate[1].'.'.$arrDate[0];
                             @endphp
                             <p style="margin-bottom: unset; ;font-size: 14px; color: var(--Light-Grey, #939393);min-width: 117px;">
                                 {{$formatDate}}
                             </p>
                         </div>
                          <div class="d-flex" style="gap: 24px; transform: translateY(-5px); width: 117px">
                              @if($report->status_id !=3 )
                                  <a href="{{route('dashboard.histories.edit', $report->id)}}"> <img src="{{asset('images/design/dashboard/edit.svg')}}" alt=""> </a>
                                  <a href="{{route('posts.destroy', $report->id)}}" onclick="return confirm('Bạn muốn xoá bài viết này không?')" > <img src="{{asset('images/design/dashboard/Delete.svg')}}" alt=""> </a>
                                @else
                                  @if($report->checkRequest==1 )
                                  <a>
                                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                          <path d="M3.33398 5.83447H16.6673" stroke="gray" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M8.33398 9.16748V14.1675" stroke="gray" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M11.666 9.16748V14.1675" stroke="gray" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M4.16602 5.83447L4.99935 15.8345C4.99935 16.2765 5.17494 16.7004 5.4875 17.013C5.80006 17.3255 6.22399 17.5011 6.66602 17.5011H13.3327C13.7747 17.5011 14.1986 17.3255 14.5112 17.013C14.8238 16.7004 14.9993 16.2765 14.9993 15.8345L15.8327 5.83447" stroke="gray" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M7.5 5.83431V3.33431C7.5 3.1133 7.5878 2.90133 7.74408 2.74505C7.90036 2.58877 8.11232 2.50098 8.33333 2.50098H11.6667C11.8877 2.50098 12.0996 2.58877 12.2559 2.74505C12.4122 2.90133 12.5 3.1133 12.5 3.33431V5.83431" stroke="gray" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                      </svg>
                                  </a>
                                  @else
                                      <a onclick="deleteReport({{$loop->index}})" id="deleteHistoryReport{{$loop->index}}">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                              <path d="M3.33398 5.83447H16.6673" stroke="white" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                              <path d="M8.33398 9.16748V14.1675" stroke="white" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                              <path d="M11.666 9.16748V14.1675" stroke="white" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                              <path d="M4.16602 5.83447L4.99935 15.8345C4.99935 16.2765 5.17494 16.7004 5.4875 17.013C5.80006 17.3255 6.22399 17.5011 6.66602 17.5011H13.3327C13.7747 17.5011 14.1986 17.3255 14.5112 17.013C14.8238 16.7004 14.9993 16.2765 14.9993 15.8345L15.8327 5.83447" stroke="white" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                              <path d="M7.5 5.83431V3.33431C7.5 3.1133 7.5878 2.90133 7.74408 2.74505C7.90036 2.58877 8.11232 2.50098 8.33333 2.50098H11.6667C11.8877 2.50098 12.0996 2.58877 12.2559 2.74505C12.4122 2.90133 12.5 3.1133 12.5 3.33431V5.83431" stroke="white" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                          </svg>
                                      </a>
                                  @endif
                              @endif
                          </div>
                    </div>
                                <div style="display:none; z-index: 1000;" class="pass-midroom" id="requestDeleteReport">
                                    <form action="{{route('job-remove-posts.store')}}" method="post">
                                        @csrf
                                        <input name="number" type="hidden" value="{{$report->id}}">
                                        <div class="d-flex align-items-center w-100 justify-content-between"><p style="color: var(--White, #F8F8F8); margin-bottom: unset; font-size: 16px"> Xoá bài tố cáo </p> <img id="closeMidRoom" src="{{asset('images/design/midman/Close.svg')}}" alt=""> </div>

                                        <div style="color: var(--Light-Grey, #939393); font-size: 14px; margin-top: 24px;">
                                            Bạn có thật sự muốn xóa bài tố cáo này không? Chúng tôi sẽ gửi yêu cầu của bạn đến Admin để được xem xét, và sẽ thông báo cho bạn kết quả sớm nhất.
                                        </div>

                                        <button style="background: rgba(255, 255, 255, 0.12); margin-top: 24px;; border-radius: 100px;" class="w-100 btnReport">Yêu cầu xoá</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @php
                    $totalPage = ceil($reports->total() / 10);
                    $currentPage = $_GET['page'] ?? 1;
                @endphp
                <div class="d-flex" id="panigation" style="margin-top: 24px; gap:12px; margin-left: 3px;">

                    @if($totalPage <=5)
                        @for($i=1; $i<=$totalPage; $i++)
                            <a href="{{request()->fullUrlWithQuery(['page' => $i])}}" class="page" @if($currentPage == $i) style="background: var(--Light-primary, #009571); border: 1px solid var(--Light-primary, #009571);" @endif>{{$i}}</a>
                        @endfor
                    @endif

                </div>
            </div>
        </div>
    </div>


    @if(session('successHistory'))
        <div style="display:block; z-index: 1000;" class="pass-midroom">
            <div class="d-flex align-items-center w-100 justify-content-between"><p style="color: var(--White, #F8F8F8); margin-bottom: unset; font-size: 16px"> Chỉnh sửa tố cáo </p> <img id="closeMidRoom" src="{{asset('images/design/midman/Close.svg')}}" alt=""> </div>

            <div style="color: var(--Light-Grey, #939393); font-size: 14px; margin-top: 24px;">
                Chúng tôi đã gửi yêu cầu của bạn đến Admin để được xem xét, và sẽ thông báo cho bạn kết quả sớm nhất.
            </div>
        </div>
    @endif
    <script src="{{asset('js/dashboard.js')}}"></script>
    <script>
        function toUrl(id, status) {
            if (status ==3) {
                window.location.href = `/posts/${id}`;
            } else {
                window.location.href = `/dashboard/histories/${id}/edit`;
            }
        }
    </script>
@endsection
