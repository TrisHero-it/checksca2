@extends('admin.layouts.app')
@section('content')
<div class="row" id="table">
    <!-- Zero config table start -->

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header" >
                <h5>Cộng đồng game</h5>
            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Ảnh</th>
                        <th>Thông tin</th>
                        <th>Link</th>
                        <th>Thao tác</th>
                        </thead>
                        <tbody>
                        @foreach ($communities as $community)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$community->name}}</td>
                                <td><img style="width: 50px; height:50px" src="{{asset('images/communities/' . $community->image)}}"
                                         alt=""></td>
                                <td>{{$community->infor}}</td>
                                <td><a href="{{$community->link}}">Link</a></td>
                                <td>
                                    <div class="d-flex justify-content-between" style="width: 108px">
                                        <form action="/admin-communities/{{$community->id}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger"
                                                    onclick="return confirm('Bạn coá muốn xoá?')">Xoá</button>
                                        </form>
                                        <a href="/admin-communities/{{$community->id}}/edit" class="btn btn-warning">Sửa</a>
                                    </div>
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
@endsection
