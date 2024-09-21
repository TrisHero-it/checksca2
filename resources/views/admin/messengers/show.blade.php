@extends('admin.layouts.app')
@section('link')
<link rel="stylesheet" href="{{asset('css/loading2.css')}}">
@endsection
@section('content')
<div class="main pt-3 pb-3">

    <div class="cangiua mt-5">
        <div class="row">
            <div class="col-8">
                <div class="title-scammer">Thông tin hợp đồng</div>
                <div class="border rounded-bottom rounded-end px-3 py-3">

                    <div class="d-flex">
                        <label class="label-contract" for="">Hạng mục</label>
                        <input type="text" class="form-control" value="{{$contract->category->name}}" disabled>
                    </div>
                    <hr>
                    <div class="d-flex">
                        <label class="label-contract" for="">Tên hợp đồng</label>
                        <input type="text" class="form-control" value="{{$contract->name}}" disabled>
                    </div>
                    <hr>
                    <div class="d-flex">
                        <label class="label-contract" for="">Số tiền</label>
                        <input type="text" class="form-control"
                            value="{{number_format($contract->moneys, 0, ',', '.')}} VNĐ" disabled>
                    </div>
                    <hr>
                    <div class="d-flex">
                        <label class="label-contract" for="">Phí giao dịch</label>
                        <input type="text" class="form-control" value="1.000 VNĐ" disabled>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center">
                        <label class="label-contract" for="">Trạng thái</label>
                        <span style="height:20px" class="noti badge bg-<?php    if ($contract->status == 'Chờ xử lí')
    echo "secondary";
else if ($contract->status == 'Đã huỷ')
    echo "danger";
else
    echo "success"; ?>">{{$contract->status}}</span>
                    </div>
                    <hr>
                    <div class="d-flex">
                        <label class="label-contract" for="">Mô tả</label>
                        <input type="text" class="form-control" value="{{$contract->content}}" disabled>
                    </div>
                    @if ($contract->status == 'Chờ xử lí')
                        <div class="d-flex">
                            <button id="clear" class="btn btn-success mt-3">Hoàn thành</button>
                        </div>
                    @endif

                </div>

                <h4 class="mt-5">Đoạn chat với {{$contract->account->name}}</h4>
                <div id="container" style="height:530px;overflow-y: auto; flex-direction: column;"
                    class="d-flex position-relative border border-bottom-0 rounded-top w-100 px-3 py-3">

                    @foreach ($mess as $mes)
                        @isset($mes->account2)
                            <div class="mess d-flex justify-content-end ">
                                <div class="chat-admin bg-primary">{{$mes->content}}</div>
                            </div>
                        @else
                            <div class="mess d-flex">
                                <img src="https://api-muakey.cdn.vccloud.vn/_nuxt/img/male.fa119a1.png"
                                    style="width:28px;height:28px" alt="">
                                <div class="chat-admin">{{$mes->content}}</div>
                            </div>
                        @endisset


                    @endforeach
                </div>

                <div style="padding-top:20px; padding-bottom: 6px;"
                    class="f-flex border position-relative input-chat border-top-0 rounded-bottom">
                    <form>
                        @csrf
                        <i class="fa-solid fa-camera" style="color: #007BFF;"></i>
                        <textarea placeholder="Aa..." class="rounded w-90 ps-2" name="" id="content"></textarea>
                        <i id="submit" class="fa-solid fa-paper-plane" style="color: #007BFF;"></i>
                    </form>
                </div>
            </div>

            <div class="col-4">
                <div class="title-scammer">Người bán</div>
                <div class="border rounded-bottom rounded-end px-3 py-3">
                    @php
                        $seller = json_decode($contract->infor_seller);
                        $buyer = json_decode($contract->infor_buyer);
                    @endphp
                    <div class="d-flex">
                        <label class="label-contract" for="">Họ và tên</label>
                        <input type="text" class="form-control" value="{{$seller->name}}" disabled>
                    </div>
                    <hr>
                    <div class="d-flex">
                        <label class="label-contract" for="">Email</label>
                        <input type="text" class="form-control" value="{{$seller->email}}" disabled>
                    </div>
                </div>

                <div class="title-scammer mt-5">Người mua</div>
                <div class="border rounded-bottom rounded-end px-3 py-3">
                    <div class="d-flex">
                        <label class="label-contract" for="">Họ và tên</label>
                        <input type="text" class="form-control" value="{{$buyer->name}}" disabled>
                    </div>
                    <hr>
                    <div class="d-flex">
                        <label class="label-contract" for="">Email</label>
                        <input type="text" class="form-control" value="{{$buyer->email}}" disabled>
                    </div>
                </div>

                <div class="title-scammer mt-5">Admin</div>
                <div class="border rounded-bottom rounded-end px-3 py-3">
                    <div class="d-flex align-items-center">
                        <label class="label-contract" for="">SĐT</label>
                        <span>09844123JQK</span>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center ">
                        <label class="label-contract" for="">Facebook</label>
                        <a href="" class="text-decoration-none">Fanpage</a>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center ">
                        <label class="label-contract" for="">Telegram</label>
                        <a href="" class="text-decoration-none">Liên hệ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        let container = document.getElementById('container');
        let mess = document.getElementsByClassName('chat-admin');
        let content = document.getElementById('content')
        container.scrollTop = container.scrollHeight;
        let check = 0;
        let tri = container.scrollHeight;
        let offset = 15;

        document.getElementById('content').addEventListener('keypress', function (event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Ngăn chặn hành vi mặc định của phím Enter (không thêm dòng mới)
                $.ajax({
                    url: '/messengers',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        content: content.value,
                        admin_rep: {{Auth::id()}},
                        detail_contract_id: {{$contract->id}},
                        account_id: {{$contract->account_id}},
                        seen: 1
                    },
                    success: function (data) {
                        console.log(data);
                        let html = `<div class="mess d-flex justify-content-end ">
                    <div class="chat-admin bg-primary">${content.value}</div>
                    </div>`
                        $('#container').append(html)
                        container.scrollTop = container.scrollHeight;
                        content.value = ''
                    }
                })
            }
        });
        container.addEventListener('scroll', () => {
            let html = ' ';
            if (container.scrollTop === 0) {
                $('#container').prepend(`<div  class="loader">
                        <div id="loader" class="loader-wheel"></div>
                    </div>`)
                offset += 10
                $.ajax({
                    url: '/api/messengers-more',
                    method: 'GET',
                    data: {
                        offset: offset,
                        account: {{$contract->account_id}}
                    },
                    success: function (data) {
                        if (data.length == 10) {
                        }
                        $.each(data, function (index, mess) {
                            if (mess.admin_rep != null) {
                                html += `<div class="mess d-flex justify-content-end ">
                                <div class="chat-admin bg-primary">${mess.content}</div>
                            </div>`
                            } else {
                                html += `<div class="mess d-flex">
                                <img src="https://api-muakey.cdn.vccloud.vn/_nuxt/img/male.fa119a1.png"
                                    style="width:28px;height:28px" alt="">
                                <div class="chat-admin">${mess.content}</div>
                            </div>`
                            }
                        })
                        document.getElementById('loader').remove()
                        let a = container.scrollHeight
                        $('#container').prepend(html)
                        let b = container.scrollHeight
                        container.scrollBy(0, b-a)
                    }
                })
            }
        })

        document.getElementById('submit').addEventListener('click', () => {
            $.ajax({
                url: '/messengers-admin',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    content: content.value,
                    admin_rep: {{Auth::id()}},
                    detail_contract_id: {{$contract->id}},
                },
                success: function (data) {
                    console.log(data);
                    let html = `<div class="mess d-flex justify-content-end ">
                    <div class="chat-admin bg-primary">${content.value}</div>
                    </div>`
                    $('#container').append(html)
                    container.scrollTop = container.scrollHeight;
                    content.value = ''
                }
            })
        })

        document.getElementById('clear').addEventListener('click', () => {
            if (confirm('Xác nhận hoàn thành đơn')) {
                $('.btn-success').remove()
                $('.noti').removeClass('bg-secondary');
                $('.noti').addClass('bg-success');
                document.getElementsByClassName('noti')[0].innerHTML = 'Hoàn thành'

                $.ajax({
                    url: '/admin-messengers/' +{{$contract->id}},
                    method: 'PUT',
                    data: {
                        id: {{$contract->id}},
                        _token: '{{csrf_token()}}',
                        status: 'Hoàn thành'
                    },
                    success: function (data) {
                        console.log(data);
                    }
                })
            }
        })

        setInterval(function () {
            console.log(container.scrollHeight);
           $.ajax({
               url: '/admin-messengers/' +{{$contract->id}},
               method: 'GET',
               data: {
                   offset: offset
               },
               success: function (data) {
                   const parser = new DOMParser();
                   const htmlDoc = parser.parseFromString(data, 'text/html');
                   const chatWithAdmin = htmlDoc.getElementById('container').innerHTML;
                   document.getElementById('container').innerHTML = chatWithAdmin;
               },
               error: function (xhr) {
                   alert('Có lỗi xảy ra khi tải lại bảng.');
               }
           });
        }, 3000)

    </script>
</div>
@endsection
