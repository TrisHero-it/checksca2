@extends('admin.layouts.app')
@section('content')


    <div class="row" id="table">
        <!-- Zero config table start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Chi tiết</h5>
                </div>
                <div class="card-body">

                    <div class="dt-responsive">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Ảnh đại diện</label>
                            <div class="col-sm-10">
                                <img src="{{\Illuminate\Support\Facades\Storage::url($trader->img)}}" class="form-control-plaintext" style="width:100px"
                                     alt="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Zalo - Số điện thoại</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$trader->zalo ?? '_ _'}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Mô tả</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" style="white-space: pre-wrap" id="staticEmail"
                                       value="{{$trader->describe ?? '_ _'}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Ngân hàng</label>
                            <div class="col-sm-10">
                                <p class="form-control-plaintext" style="white-space: pre-wrap">{{$trader->bank ?? '_ _'}}</p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Facebook</label>
                            <div class="col-sm-10">
                                <a href="{{$trader->facebook}}">{{$trader->facebook ?? '_ _'}}</a>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Danh mục</label>
                            <div class="col-sm-10">
                                @foreach($categories as $category)
                                    <button class="btn btn-secondary">{{$category->category->name}}</button>
                                @endforeach
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Website</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$trader->website ?? '_ _'}}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Phí giao dịch</label>
                            <div class="col-sm-10">
                                <p class="form-control-plaintext" style="white-space: pre-wrap">{{$trader->fee ?? '_ _'}}</p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Loại hợp đồng</label>
                            <div class="col-sm-10 d-flex" style="gap: 8px; width: max-content;" >
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" style="width: max-content;"
                                       value="{{$trader->contract->name}}">
                                <img src="{{\Illuminate\Support\Facades\Storage::url($trader->contract->image)}}" alt="">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Ảnh chụp căn cước công dân</label>
                            <div class="col-sm-10 d-flex">
                                @if($trader->identity != null)
                                    @foreach ($trader->identity as $identity)
                                        <img src="{{\Illuminate\Support\Facades\Storage::url($identity)}}" class="form-control-plaintext me-3" style="width:100px"
                                             alt="">
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Zero config table end -->
        @endsection

