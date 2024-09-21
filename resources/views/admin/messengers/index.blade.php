@extends('admin.layouts.app')
@section('content')
<div class="main pt-3 pb-3">
    <h1>Danh sách liên hệ</h1>
    <div class="alert alert-success d-none" role="alert">
        Huỷ thành công
    </div>
    <table class="table">
        <thead>
            <th>STT</th>
            <th>Người yêu cầu</th>
            <th>Tên hợp đồng</th>
            <th>Danh mục</th>
            <th>Số tiền giao dịch</th>
            <th>Vai trò</th>
            <th>Trạng thái</th>
            <th>Chức năng</th>
        </thead>
        <tbody>
            @foreach ($messages as $mess)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$mess->account->name}}</td>
                            <td>{{$mess->name}}</td>
                            <td>{{$mess->category->name}}</td>
                            <td>{{number_format($mess->moneys, 0, ',', '.')}} VNĐ</td>
                            <td>{{$mess->role == 'buyer' ? 'Người mua' : 'Người bán'}}</td>
                            <td> <span class="badge bg-<?php    if ($mess->status == 'Chờ xử lí')
                    echo "secondary";
                else if ($mess->status == 'Đã huỷ')
                    echo "danger";
                else
                    echo "success"; ?>">{{$mess->status}}</span></td>
                            <td>
                                <a href="/admin-messengers/{{$mess->id}}" class="btn btn-success position-relative">Xem chi tiết
                                    <span
                                        style="font-size: 10px; background-color: red; padding:2px; border-radius:20px; top:-8px; right:1px"
                                        class="position-absolute">
                                        {{$mess->count()}}
                                    </span>
                                </a>
                                @if ($mess->status == 'Chờ xử lí')
                                    <button id="cancel{{$loop->index}}" onclick="cancel({{$loop->index}}, {{$mess->id}})"
                                        class="btn btn-danger"> Huỷ
                                    </button>
                                @endif
                            </td>
                        </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    function cancel(index, id) {
        index = index + 3
        if (confirm('Bạn muốn huỷ bỏ đơn này')) {
            let mess = document.getElementsByClassName('badge')
            console.log(mess[index]);
            mess[index].innerHTML = 'Đã huỷ'
            mess[index].classList.add('bg-danger')
            document.getElementsByClassName('alert-success')[0].classList.remove('d-none')
            setTimeout(function () {
                $('.alert-success').fadeOut('slow');
            }, 2000)
        }

        $.ajax({
            url: '/admin-messengers/' + id,
            method: 'PUT',
            data: {
                _token: '{{csrf_token()}}',
                id: id,
                status: 'Đã huỷ'
            },
            success: function (data) {
                console.log(data);
            }

        })
    }
</script>
@endsection