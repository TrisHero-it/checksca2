@extends('layouts.app')
@section('title', 'Dashboard')
@section('link')
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
@endsection
@section('content')
    <div class="cangiua">
        <div class="row">
            <div class="navigation col-2 search-computer" style="">
                <a class="text-decoration-none d-flex justify-content-between w-100" style="color: white" href="{{route('dashboard')}}"><div class="navigation-column navigation-hover"> Thông tin cá nhân <img src="{{asset('images/design/Arrows.svg')}}" alt=""></div></a>
                <a class="text-decoration-none d-flex justify-content-between w-100" style="color: white" href="{{route('dashboard.histories')}}"><div class="navigation-column navigation-hover">Lịch sử tố cáo<img src="{{asset('images/design/Arrows.svg')}}" alt=""></div></a>
                <div class="navigation-column navigation-hover">Phòng midman<img src="{{asset('images/design/Arrows.svg')}}" alt=""></div>
                <a class="text-decoration-none d-flex justify-content-between w-100" style="color: white" href="{{route('password.edit')}}"><div class="navigation-column navigation-hover">Đổi mật khẩu<img src="{{asset('images/design/Arrows.svg')}}" alt=""></div></a>
                <a href="/logout" class="text-light text-decoration-none"><div class="navigation-column navigation-hover">Đăng xuất<img src="{{asset('images/design/Arrows.svg')}}" alt=""></div></a>
            </div>

            <div class="col-10">

                <div class="navigation-column" style="height: unset;font-size: 20px; padding: unset">Lịch sử tố cáo</div>

                <div class="row" style="margin-top: 24px;">
                    <div class="col-12">
                        <div style="background: var(--Background-card, rgba(255, 255, 255, 0.08)); padding: 24px; border-radius: 16px; height: 100%">
                            <div class="d-flex" style="gap: 24px">
                                <p class="text-start"  style="min-width: 138px; margin-bottom: 16px;">Danh mục</p>
                                <p class="text-start"  style="min-width: 138px; margin-bottom: unset;">Tài khoản game</p>
                                <p class="text-start"  style="min-width: 138px; margin-bottom: unset;">Số tiền</p>
                                <p class="text-start"  style="min-width: 138px; margin-bottom: unset;">Trạng thái</p>
                                <p class="text-start"  style="min-width: 138px; margin-bottom: unset;">Ngày tạo</p>
                                <p class="text-start"  style="min-width: 138px; margin-bottom: unset;">Hành động</p>
                            </div>
                               @foreach($reports as $report)
                                <hr style="margin: 0 0 0 0">

                    <div class="post post-content" style="gap: 24px; height: 50px; display: flex; align-items: center; cursor: pointer">
                         <div class="d-flex post" onclick="toUrl({{$report->id}}, {{$report->status_id}})">
                             <p style="margin-bottom: unset; font-size: 14px; min-width: 138px;color: var(--Light-Grey, #939393);
                             width: 138px;
                                 overflow-x: hidden;
    text-overflow: ellipsis;
    font-style: normal;
    font-weight: 300;
    line-height: normal;
    text-wrap: nowrap;
                             ">{{$report->category->name}}</p>
                             <p style="margin-bottom: unset; font-size: 14px; min-width: 138px; max-width: 138px; overflow: hidden; text-overflow: ellipsis ; color: var(--Light-Grey, #939393);">{{$report->username?? '_ _'}}</p>
                             <p style="margin-bottom: unset; font-size: 14px;  color: var(--Light-primary, #009571);min-width: 138px;">{{number_format($report->moneys_scam, 0, ',', ',')}} VNĐ</p>
                             <div style="min-width: 138px; transform: translateY(-5px)" >
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
                             <p style="margin-bottom: unset; ;font-size: 14px; color: var(--Light-Grey, #939393);min-width: 138px;">
                                 {{$formatDate}}
                             </p>
                         </div>
                          <div class="d-flex" style="gap: 24px; transform: translateY(-5px)">
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
