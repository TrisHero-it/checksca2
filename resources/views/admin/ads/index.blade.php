            @extends('admin.layouts.app')
            @section('content')
                <div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification">
                </div>
                <div class="row" id="table">
                    <!-- Zero config table start -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">

                                <h5>Quảng cáo ở trang chủ</h5>
                                <div class="form-group" style="margin-bottom: unset;">
                                    <div class="switch d-inline m-r-10">
                                        <input type="checkbox" class="switcher-input" name="validation-switcher" id="switch-1">
                                        <label for="switch-1" class="cr"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="dt-responsive table-responsive">
                                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                                        <thead>
                                        <tr>
                                            <th>Hình ảnh</th>
                                            <th>Link của hình ảnh</th>
                                            <th>Chức năng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($ads as $ad)
                                                <tr>
                                                    <td><img src=" {{\Illuminate\Support\Facades\Storage::url($ad->image)}} ">
                                                    </td>
                                                    <td><a href="{{$ad->link}}">{{$ad->link}}</a></td>
                                                    <td>
                                                        <a href="{{route('ads.edit', $ad->id)}}" class="btn btn-outline-warning">Sửa</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Zero config table end -->
                </div>

                <div class="row" id="table">
                    <!-- Zero config table start -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h5>Quảng cáo ở trang tin tức</h5>
                                <div class="form-group" style="margin-bottom: unset;">
                                    <div class="switch d-inline m-r-10">
                                        <input type="checkbox" class="switcher-input" name="validation-switcher" id="switch-2">
                                        <label for="switch-2" class="cr"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="dt-responsive table-responsive">
                                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                                        <thead>
                                        <tr>
                                            <th>Hình ảnh</th>
                                            <th>Link của hình ảnh</th>
                                            <th>Chức năng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img src="{{\Illuminate\Support\Facades\Storage::url($newsAd->image)}}" alt=""></td>
                                                <td><a href="{{$newsAd->link}}">{{$newsAd->link}}</a></td>
                                                <td>
                                                    <a href="{{route('ads.edit', $newsAd->id)}}" class="btn btn-outline-warning">Sửa</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Zero config table end -->
                </div>

                <script !src="">
                    let adsHome = document.getElementsByClassName('switcher-input')[0];
                    let adsNews = document.getElementsByClassName('switcher-input')[1];

                    adsHome.addEventListener('change', ()=> {
                        let status =  'off'
                        if (adsHome.checked == true) {
                            status = 'on';
                        }
                        $.ajax({
                            url : 'api/ads/home',
                            method : 'put',
                            data : {
                                _token : "{{csrf_token()}}",
                                status : status,
                            },
                            success : function (data) {
                                console.log(data)
                            }
                        })
                    })

                    adsNews.addEventListener('change', ()=> {
                        let status =  'off'
                        if (adsNews.checked == true) {
                            status = 'on';
                        }
                        $.ajax({
                            url : 'api/ads/home',
                            method : 'put',
                            data : {
                                _token : "{{csrf_token()}}",
                                status : status,
                            },
                            success : function (data) {
                                console.log(data)
                            }
                        })
                    })
                </script>
                @if($checkAdsHome->status == 'on')
                <script !src="">
                    adsHome.checked = true;
                </script>
                @endif

                @if($newsAd->status =='on')
                    <script !src="">
                        adsNews.checked = true;
                    </script>
                @endif

            @endsection
