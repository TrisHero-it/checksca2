@extends('admin.layouts.app')
@section('content')

<div class="main pt-3 pb-3">
    <h4 class="mt-3">Yêu cầu chỉnh sửa thông tin</h4>
    <div style="min-height: 700px">
        <table class="table table-striped">
            <thead>
                <th>STT</th>
                <th>Người yêu cầu chỉnh sửa</th>
                <th>Zalo</th>
                <th>Facebook</th>
                <th>Website</th>
                <th>Mô tả</th>
                <th>Ảnh</th>
                <th>Họ và tên</th>
                <th>Tài khoản</th>
                <th>Phí</th>
                <th>Chức năng</th>
            </thead>
            <tbody id="trader-table-body">
                @foreach ($traders as $trader)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><a href="/admin-traders/{{$trader->trader->id}}">
                                {{$trader->trader->fullname}}
                            </a></td>
                        <td>{{$trader->zalo ?? 'N/A'}}</td>
                        <td>{{$trader->facebook ?? "N/A"}}</td>
                        <td>{{$trader->website ?? "N/A"}}</td>
                        <td>{{$trader->describe ?? "N/A"}}</td>
                        <td>{{$trader->img ?? "N/A"}}</td>
                        <td>{{$trader->fullname ?? "N/A"}}</td>
                        <td>{{$trader->bank ?? "N/A"}}</td>
                        <td>{{$trader->fee ?? "N/A"}}</td>
                        <td><button onclick="duyet({{$loop->index}}, {{$trader->trader_id}},'duyệt')"
                                class="btn btn-success">Duyệt</button>
                            <button onclick="duyet({{$loop->index}}, {{$trader->trader_id}},'từ chối')" class="btn btn-danger">Từ chối</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <?php
$pages = ceil($traders->total() / 10);
            ?>
    @for ($i = 1; $i <= $pages; $i++)
        <a id="pages" style="<?php
        if (!isset($_GET['page'])) {
            $_GET['page'] = 1;
        }
        if ($_GET['page'] == $i) {
            echo 'background-color: rgba(6, 16, 109, 0.753);color: white;font-weight: 700;';
        } ?>" href="{{request()->fullUrlWithQuery(['page' => $i])}}">{{ $i }}</a>
    @endfor
</div>
<script>
    function duyet(index, id, value) {
        let method;
        let url;
        if (value=='duyệt'){
            method ='PUT'
            url = "/admin-traders/"+id
        }else{
            method = 'DELETE'
            url = "/admin-requests/"+id
        }
           if (confirm('Bạn muốn thực hiện?'))
           {
               $.ajax({
                   url: url,
                   method: method,
                   data: {
                       _token:"{{csrf_token()}}" ,
                       _method: method,
                       id:id
                   },
                   success: function (data)
                   {
                        reloadTable()
                   }
               })
           }
    }

    function reloadTable() {
        $.ajax({
            url: "{{ request()->fullUrlWithQuery(['page' => $_GET['page'] ?? 1]) }}",
            method: 'GET',
            success: function(data) {
                const parser = new DOMParser();
                const htmlDoc = parser.parseFromString(data, 'text/html');
                const newTableBody = htmlDoc.getElementById('trader-table-body').innerHTML;
                document.getElementById('trader-table-body').innerHTML = newTableBody;
            },
            error: function(xhr) {
                alert('Có lỗi xảy ra khi tải lại bảng.');
            }
        });
    }

</script>
@endsection
