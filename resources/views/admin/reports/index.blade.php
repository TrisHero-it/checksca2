@extends('admin.layouts.app')
@section('content')
    <div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification">
    </div>
    <div class="row" id="table">
        <!-- Zero config table start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header" >
                    <h5>Danh sách bài viết tố cáo</h5>
                </div>
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>Danh mục</th>
                                <th>Tên Ingame</th>
                                <th>Link bài tố cáo</th>
                                <th>Người bị tố cáo</th>
                                <th>Người tố cáo</th>
                                <th>Số tiền lừa đảo</th>
                                <th>Trạng thái</th>
                                <th>Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reports as $report)
                                    <tr>
                                        <td>{{$report->category->name}}</td>
                                        <td>{{$report->username?? '_ _'}}</td>
                                        <td>{{$report->linkfb?? '_ _'}}</td>
                                        <td>{{$report->fullname}}</td>
                                        <td>{{$report->account->name}}</td>
                                        <td style="color: #009571">{{number_format($report->moneys_scam, 0, ',', ',')}} VNĐ</td>
                                        <td >@if($report->status_id==3)
                                                <span class="badge rounded-pill text-bg-success" style="display: flex;align-items: center;width: max-content;">{{$report->status->status}}</span>
                                            @elseif($report->status_id==1)
                                                <span class="badge rounded-pill text-bg-secondary" style="display: flex;align-items: center;width: max-content;">{{$report->status->status}}</span>
                                            @else
                                                <span class="badge rounded-pill text-bg-danger" style="display: flex;align-items: center;width: max-content;">{{$report->status->status}}</span>
                                            @endif
                                        </td>
                                        <td>@if($report->status_id==1)
                                                <button type="button" class="btn btn-outline-success"
                                                        title="btn btn-outline-success" data-bs-toggle="tooltip" onclick="changeStatus({{$report->id}}, 3)">Duyệt</button>
                                                <button type="button" class="btn btn-outline-danger"
                                                        title="btn btn-outline-danger" data-bs-toggle="tooltip" onclick="changeStatus({{$report->id}}, 2)">Huỷ</button>
                                        @endif
                                            <a href="/admin-reports/{{$report->id}}" class="btn btn-outline-info">Xem chi tiết</a>
                                        </td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $reports->links('pagination::bootstrap-4') }}

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
           if (status_id==2){
               flag = 'huỷ'
           }
               if (confirm(`Ban muốn ${flag} bài này`)) {
                   $.ajax({
                       url : '/admin-reports/'+id,
                       method : 'PUT',
                       data : {
                           _token : "{{csrf_token()}}" ,
                           id : id,
                           status_id : status_id,
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
               url : '/admin-reports',
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
