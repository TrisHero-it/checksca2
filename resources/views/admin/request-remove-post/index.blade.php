@extends('admin.layouts.app')
@section('content')
    <div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification">
    </div>
    <div class="row" id="table">
        <!-- Zero config table start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header" >
                    <h5>Danh sách yêu cầu gỡ bài</h5>
                </div>
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>Danh mục</th>
                                <th>Tài khoản game</th>
                                <th>Số tiền</th>
                                <th>Ngày tạo</th>
                                <th>Người gửi</th>
                                <th>Phía yêu cầu</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>
                                        {{$post->post->category->name}}
                                    </td>
                                    <td>
                                        {{$post->account->name}}
                                    </td>
                                    <td style="color: var(--Light-primary, #009571);">
                                        {{number_format($post->post->moneys_scam, 0, ',', ',')}} VNĐ
                                    </td>
                                    <td>
                                        @php
                                        $date = explode(' ', $post->post->created_at);
                                        $arrDate = explode('-', $date[0]);
                                        $formatDate = $arrDate[2].'.'.$arrDate[1].'.'.$arrDate[0];
                                        @endphp
                                            {{$formatDate}}
                                    </td>
                                    <td>
                                        {{$post->account->name}}
                                    </td>
                                   @if($post->account->id== $post->post->account_id )
                                        <td>
                                            <span class="badge text-bg-primary">Chính chủ</span>
                                        </td>
                                       @else
                                        <td>
                                            <span class="badge text-bg-danger">Người lạ</span>
                                        </td>
                                   @endif
                                    <td>
                                        @if($post->status == 0 )
                                            <span class="badge text-bg-secondary">{{$post->currentStatus}}</span>
                                        @else
                                            <span class="badge text-bg-success">{{$post->currentStatus}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($post->account->id != $post->post->account_id )
                                            <a class="btn btn-outline-info">Xem chi tiết</a>
                                        @endif
                                            @if($post->status == 0 )
                                        <a  onclick="changeStatus({{$post->post->id}}, 2)" class="btn btn-outline-success">Duyệt</a>
                                        <a onclick="changeStatus({{$post->post->id}}, 1)" class="btn btn-outline-danger">Từ chối</a>
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
    <script !src="">
        function changeStatus(id, status_id) {
            let flag = 'duyệt';
            let success = `
           <span class="badge rounded-pill text-bg-success" style="display: flex;align-items: center;width: max-content;">Duyệt</span>
           `
            let notification = document.getElementById('notification')
            if (status_id!=3){
                flag = 'huỷ'
            }
            if (confirm(`Ban muốn ${flag} bài này`)) {
                $.ajax({
                    url : '/request-remove-post/'+id,
                    method : 'PUT',
                    data : {
                        _token : "{{csrf_token()}}" ,
                        id : id,
                        status : status_id,
                    },
                    success : function (data) {
                        console.log(data)
                        let html = '';
                        html += `<div class="toast toast-3 mb-2 fade show" id="toast${id}" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="{{'images/design/favicon_io/favicon.ico'}}" alt="" class="img-fluid m-r-5" style="width:20px;">
                <strong class="me-auto">CheckSca</strong>
                <small class="text-muted">1 Giây</small>
                <button type="button" class="m-l-5 mb-1 mt-1 btn-close" data-bs-dismiss="toast" aria-label="Close">
                </button>
            </div>
            <div class="toast-body">
                Trạng thái cập nhập thành công !!
            </div>
        </div>`
                        $('#notification').append(html)
                        reload()
                        setTimeout(()=> {
                            let a = document.getElementById('toast'+id);
                            a.style.transition = '0.2s ease all';
                            a.style.transform = 'translateX(200%)';
                            setTimeout(()=> {
                                document.getElementById('toast'+id).remove()
                            }, 300)
                        }, 2000)
                    },
                });
            }
        }
        function reload()
        {
            $.ajax({
                url : '/request-remove-post',
                method : 'get',
                success : function (data) {
                    console.log(data)
                    const parser = new DOMParser();
                    const htmlDoc = parser.parseFromString(data, 'text/html');
                    const newTable = htmlDoc.getElementById('table').innerHTML;
                    document.getElementById('table').innerHTML = newTable;
                }
            })
        }


    </script>
@endsection
