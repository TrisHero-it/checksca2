@extends('admin.layouts.app')
@section('link')

@endsection
@section('content')

    <div class="row" id="table">
        <!-- Zero config table start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Danh sách người trung gian</h5>
                </div>
                <div class="card-body">

                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Ảnh</th>
                            <th>Tựa game</th>
                            <th>Ảnh chụp căn cước công dân</th>
                            <th>Zalo</th>
                            <th>Rank</th>
                            <th>Chức năng</th>
                            </thead>
                            <tbody>
                            @foreach ($traders as $trader)
                                <tr class="trader">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$trader->fullname}}</td>
                                    <td><img src="{{\Illuminate\Support\Facades\Storage::url($trader->img)}}" style="width: 50px; height:50px;" alt="">
                                    </td>
                                    <td>
                                        @foreach($trader->categories as $category)
                                            <button class="btn btn-secondary btn-sm">{{$category->name}}</button>
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="d-flex" style="gap: 8px">
                                        @if($trader->identity != null)
                                                @foreach($trader->identity as $identity)
                                                    <img src="{{\Illuminate\Support\Facades\Storage::url($identity)}}" style="height: 200px;" alt="">
                                                @endforeach
                                        @endif
                                        </div>
                                    </td>
                                    <td>{{$trader->zalo}}</td>

                                    <td><img src="{{\Illuminate\Support\Facades\Storage::url($trader->contract->image)}}" alt=""></td>
                                    <td>
                                        <a href="/admin-traders/{{$trader->id}}" class="btn btn-info">Xem chi tiết</a>
                                        <button onclick="delete2({{$loop->index}}, {{$trader->id}})" class="btn btn-danger">Xoá</button>
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

    {{ $traders->links('pagination::bootstrap-4') }}
</div>
<script>
    function delete2(index, id) {
        let trader = document.getElementsByClassName('trader')[id]
        if (confirm('Bạn có muốn xoá?')) {
            $.ajax({
                url: '/admin-traders/' + id,
                method: 'DELETE',
                data: {
                    _token: '{{csrf_token()}}',
                    _method: 'DELETE',
                },
                success: function (data) {
                    document.getElementsByClassName('trader')[index].classList.add('d-none');
                    document.getElementById('noti').classList.remove('d-none');
                    setTimeout(() => {
                        document.getElementById('noti').classList.add('d-none');
                    }, 3000)
                }
            })
        }
    }
</script>
@endsection
