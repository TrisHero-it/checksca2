@extends('admin.layouts.app')
@section('content')
<div class="row" id="table">
    <!-- Zero config table start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header" >
                <h5>Danh sách tài khoản</h5>
            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                        <th>ID tài khoản</th>
                        <th>Tên tài khoản</th>
                        <th>Ảnh</th>
                        <th>Phương thức đăng nhập</th>
                        <th>Số điện thoại</th>
                        <th>Chức vụ</th>
                        <th>Tình trạng</th>
                        <th>Thao tác</th>
                        </thead>

                        <tbody>
                        @foreach ($accounts as $account)
                            <tr>
                                <td>{{ $account->id }}</td>
                                <td>{{ $account->name }}</td>
                                @if(filter_var($account->avatar, FILTER_VALIDATE_URL))
                                    <td><img src="{{ $account->avatar }}" style="width:30px; height:30px" alt=""></td>
                                @else
                                    <td><img src="{{ \Illuminate\Support\Facades\Storage::url($account->avatar) }}" style="width:30px; height:30px" alt=""></td>
                                @endif
                                <td>{{ $account->uid ? 'Facebook' : 'Google' }}</td>
                                <td>{{ $account->numberphone ? $account->numberphone : 'Chưa xác thực số điện thoại' }}</td>
                                <td>{{ $account->role_id == 2 ? 'Admin' : 'Người dùng' }}</td>
                                <td>{{ $account->ban == 1 ? 'Bị khoá' : 'Không khoá' }}</td>
                                <td>
                                    @if ($account->id != Auth::id())
                                        @if ($account->ban == 1)
                                            <form action="/admin-accounts/update/{{ $account->id }}" method="Post">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="ban" value="0">
                                                <button class="btn btn-success">Ân xá</button>
                                            </form>
                                        @else
                                            <form action="/admin-accounts/update/{{ $account->id }}" method="Post">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="ban" value="1">
                                                <button class="btn btn-danger">Ban</button>
                                            </form>
                                        @endif
                                    @else
                                        <span class="badge bg-primary">Đang sử dụng</span>
                                    @endif
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
