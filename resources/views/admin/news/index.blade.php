@extends('admin.layouts.app')
@section('content')
    <div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification">
    </div>
    <div class="row" id="table">
        <!-- Zero config table start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">

                    <h5>Tin tức</h5>

                </div>
                <div class="card-body">

                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tiêu đề bài viết</th>
                                <th>Hình thu nhỏ</th>
                                <th>Nội dung thu gọn</th>
                                <th>Trạng thái</th>
                                <th>Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($news as $currentNews)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$currentNews->title}}</td>
                                    <td><img src="{{\Illuminate\Support\Facades\Storage::url($currentNews->image)}}" style="width: 200px;" alt=""></td>
                                    <td style="white-space: wrap;"><p style="display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;">{{$currentNews->content}}</p></td>
                                    <td><span class="badge bg-warning text-dark">
                                            {{$currentNews->currentStatus}}
                                        </span></td>
                                    <td>
                                       <div class="d-flex">
                                           <a href="{{route('admin-news.edit', $currentNews->id)}}" class="btn btn-outline-warning">Sửa</a>
                                           <form onsubmit="return confirm('Bạn có muốn xoá?')" action="{{route('admin-news.delete', $currentNews->id)}}" method="POST">
                                               @csrf
                                               @method('delete')
                                               <button class="btn btn-outline-danger">Xoá</button>
                                           </form>
                                       </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                <div>
                    {{ $news->links('pagination::bootstrap-4') }}
                </div>
                </div>
            </div>
        </div>
        <!-- Zero config table end -->
    </div>


@endsection
