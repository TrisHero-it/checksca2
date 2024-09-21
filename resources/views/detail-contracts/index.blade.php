@extends('layouts.app')
@section('link')
<link rel="stylesheet" href="{{ asset('css/style3.css') }}">
@endsection
@php
    $menu = true;
@endphp

@section('content')
<div class="body" id="body">
    <img class="hanhtinh hanhtinh1" src="{{ asset('images/hanhtinh1.png') }}" alt="">
    <img class="hanhtinh hanhtinh2" src="{{ asset('images/hanhtinh2.png') }}" alt="">
    <div class="hanhtinh3_wrapper"><img class="hanhtinh hanhtinh3" src="{{ asset('images/hanhtinh3.png') }}" alt="">
    </div>

    <div class="cangiua pt-5">

        <h2 class="mb-3">
            <img src="{{asset('images/elip.png')}}" alt="">
            Hợp đồng
        </h2>
        <div class='text-end'>
            <a href="/my-contracts" class="btn btn-success">Hợp đồng của tôi</a>
        </div>

        <div id="nomargin">
            {{-- start content --}}
            <div class="cangiua">
                <div class="body-con">
                    <div class="contenter">
                        <table class="table mt-2" style="z-index: 1;">
                            <thead>
                                <th  style="background-color: #0d0d0d;color: wheat;" >STT</th>
                                <th  style="background-color: #0d0d0d;color: wheat;" >Danh mục</th>
                                <th  style="background-color: #0d0d0d;color: wheat;" >Tên HĐ</th>
                                <th  style="background-color: #0d0d0d;color: wheat;" >Số tiền giao dịch</th>
                                <th  style="background-color: #0d0d0d;color: wheat;"  class="text-start">Trạng thái</th>
                            </thead>
                            <tbody>
                                @foreach ($contracts as $contract)
                                                                <tr>
                                                                    <td style="background-color: #0d0d0d;color: white;">{{$loop->iteration}}</td>
                                                                    <td style="background-color: #0d0d0d;color: white;">{{$contract->category->name}}</td>
                                                                    <td style="background-color: #0d0d0d;color: white;">{{$contract->name}}</td>
                                                                    <td style="background-color: #0d0d0d;color: white;">{{number_format($contract->moneys, 0, ',', '.')}} VNĐ</td>
                                                                    <td style="background-color: #0d0d0d;color: white;" class="text-start">
                                                                        <span class="badge bg-<?php    if ($contract->status == 'Chờ xử lí')
                                        echo "secondary";
                                    else if ($contract->status == 'Đã huỷ')
                                        echo "danger";
                                    else
                                        echo "success"; ?>">{{$contract->status}}</span>
                                                                    </td>
                                                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div> {{-- end cangiua --}}
</div> {{-- end body --}}
<script>
    $(document).ready(function () {
        var offset = 8;
        let url = window.location.href;
        url = url.replace('news', 'images/news/');
        $('#loadMore').click(function () {
            let html = '';
            $('.contenter').append(`
                <div class="loading" id="loading">Loading&#8230;</div>
                `);
            $.ajax({
                url: '/news-more',
                method: 'get',
                data: {
                    offset: offset
                },
                success: function (data) {

                    $.each(data, function (index, news) {
                        html += `
                         <a class="none" href="/news/${news.id}">
                                <div class="content news">
                                    <p><img src="${url + news.image}"
                                            alt=""><span>${news.title}</span></p>
                                    <p>
                                    ${news.content}
                                    </p>
                                </div>
                            </a>
                        `
                    })

                    if (data.length < 8) {
                        $('#loadMore').text('Không còn bài report nào').prop(
                            'disabled',
                            true);
                    }
                    document.getElementById('loading').remove()
                    $('.contenter').append(html)
                    offset += 8
                }
            })
        })
    })
</script>
@endsection