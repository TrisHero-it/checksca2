@extends('admin.layouts.app')
@section('content')
<div class="row" id="table">
    <!-- Zero config table start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header" >
                <h5>Danh sách hợp đồng</h5>
            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                        <th>STT</th>
                        <th>Tên hợp đồng</th>
                        <th>Hình ảnh đại diện</th>
                        <th>Màu của khung</th>
                        <th>Chức năng</th>
                        </thead>
                        <tbody>
                        @foreach ($contracts as $contract)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$contract->name}}</td>
                                <td>
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($contract->image)}}" alt="">
                                </td>
                                <td>
                                    <p>
                                    <div style="width:20px; height:20px; background-color: #{{$contract->color}};"></div>
                                    </p>
                                </td>
                                <td>
                                    <a href="/admin-contracts/{{$contract->id}}/edit" class="btn btn-warning">Sửa</a>
                                    <form style="margin-top: 10px;" action="/admin-contracts/{{$contract->id}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button onclick="return confirm('Bạn có muốn xoá không?')" class="btn btn-danger">Xoá</button>
                                    </form>
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
