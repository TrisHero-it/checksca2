@extends('layouts.app')
@section('title', 'Contracts')
@section('link')
<link rel="stylesheet" href="{{ asset('css/style2.css') }}">
@endsection
@section('content')
@if (session('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Thành công",
                text: "Tạo hợp đồng thành công",
            });
        </script>
    @endif
<!-- Modal -->
<div style="color: black;" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color:black">Thêm hợp đồng</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


      <form style="margin-top: unset;" action="detail-contracts" method="POST" onsubmit="return validate()">
                    @csrf
                    <div class="d-flex">
                        <label for="" class="label-contract text-primary-emphasis">Danh mục</label>
                        <select class="form-select text-primary-emphasis" name="category_id" id="category_id">
                            <option value="" class="text-primary-emphasis">---Chọn danh mục---</option>
                        @foreach ($categories as $category)
                        <option @if (old('name')==$category->id)
                            selected
                        @endif value="{{$category->id}}" style="color:black">{{$category->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="error" style="color:red"></div>

                    <div class="d-flex mt-2">
                        <label for="" class="label-contract text-primary-emphasis">Tên hợp đồng</label>
                        <input type="text" placeholder="Nhập tên hợp đồng" value="{{old('name')}}" name="name" id="name" class="form-control">
                    </div>
                    <div class="error" style="color:red"></div>


                  <div class="d-flex mt-2">
                    <label for="" class="label-contract text-primary-emphasis">Số tiền giao dịch</label>
                  <div class="input-group">
                  <input type="text" class="form-control" name="moneys" id="moneys" value="{{old('moneys')}}" placeholder="0" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <span class="input-group-text" id="basic-addon2">VNĐ</span>
                    </div>
                  </div>
                  <div class="error" style="color:red"></div>

                  <div class="d-flex mt-2">
                        <label for="" class="label-contract text-primary-emphasis">Chọn vai trò</label>
                        <select class="form-select" name="role" id="role">
                            <option class="text-primary-emphasis" value="">---Chọn---</option>
                            <option class="text-primary-emphasis" @if (old('role')=='buyer')
                                selected
                            @endif  class="text-primary-emphasis" value="buyer">Người mua</option>
                            <option @if (old('role')=='seller')
                                selected
                            @endif  class="text-primary-emphasis" value="seller">Người bán</option>
                        </select>
                    </div>
                    <div class="error" style="color:red"></div>

                  <div class="d-flex mt-2">
                  <label for="" class="label-contract text-primary-emphasis">Người bán</label>
                  <input type="text" placeholder="Email" name="email_seller" value="{{old('email_seller')}}" id="email_seller" class="form-control">
                  <input type="text" placeholder="Tên" value="{{old('name_seller')}}" name="name_seller" id="name_seller" class="form-control ms-2">
                </div>
                <div class="error" style="color:red"></div>
                <div class="error" style="color:red"></div>

                <div class="d-flex mt-2">
                  <label for="" class="label-contract text-primary-emphasis">Người mua</label>
                  <input type="text" value="{{old('email_buyer')}}" placeholder="Email" name="email_buyer" id="email_buyer" class="form-control">
                  <input type="text" value="{{old('name_buyer')}}" placeholder="Tên" name="name_buyer" id="name_buyer" class="form-control ms-2">
                  </div>

                <div class="error" style="color:red"></div>
                <div class="error" style="color:red"></div>

                <div class="d-flex mt-2">
                        <label for="" class="label-contract text-primary-emphasis">Nội dung HĐ</label>
                        <textarea name="content" value="{{old('content')}}" id="content" class="form-control" style="height:120px" id=""></textarea>
                    </div>
                    <div class="error" style="color:red"></div>

                <div class="d-flex mt-2">
                    <label for="" class="label-contract text-primary-emphasis"></label>
                    <button class="btn btn-success w-100">
                        tạo hợp đồng
                        <i class="fa-solid fa-file-signature" style="color: #ffffff;"></i>
                    </button>

                </div>
                    </form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>

<div class="cangiua">
    <div class="text-center mt-5">
        <h3>Danh sách hợp đồng trung gian</h3>
    </div>
    <div class="text-end">
        <button class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm mới</button>
    </div>
    <div class="ta">
    <table class="table mt-2">
        <thead>
            <th style="background-color: #0d0d0d;color: wheat;">STT</th>
            <th style="background-color: #0d0d0d;color: wheat;">Tên hợp đồng</th>
            <th style="background-color: #0d0d0d;color: wheat;">Thể loại</th>
            <th style="background-color: #0d0d0d;color: wheat;">Số tiền</th>
            <th style="background-color: #0d0d0d;color: wheat;">Người tạo</th>
            <th style="background-color: #0d0d0d;color: wheat;">Trạng thái</th>
            <th style="background-color: #0d0d0d;color: wheat;">Hành động</th>
        </thead>
        <tbody>
            @foreach ($myContracts as $myContract)
                        <tr class="contract-column">
                            <td style="background-color: #0d0d0d;color: white;">{{$loop->iteration}}</td>
                            <td style="background-color: #0d0d0d;color: white;">{{$myContract->name}}</td>
                            <td style="background-color: #0d0d0d;color: white;">{{$myContract->category->name}}</td>
                            <td style="background-color: #0d0d0d;color: white;">{{number_format($myContract->moneys, 0, ',', '.')}} VNĐ</td>
                            <td style="background-color: #0d0d0d;color: white;">{{$myContract->account->name}}</td>
                            <td style="background-color: #0d0d0d;color: white;"><span
                                    class="badge bg-<?php    if ($myContract->status == 'Chờ xử lí')
                    echo "secondary";
                else if ($myContract->status == 'Đã huỷ')
                    echo "danger";
                else
                    echo "success"; ?>">{{$myContract->status}}</span>
                            </td>
                            <td style="background-color: #0d0d0d;color: white;"><a href="/my-contracts/{{$myContract->id}}" style="background:#0D6EFD;padding:4px; border-radius: 7px;"><i class="fa-solid fa-eye" style="color: #ffffff; padding:5px"></i></a>
                            <a onclick="deleteContract({{$loop->index}}, {{$myContract->id}})" style="background:#DC3545;padding:4px; border-radius: 7px;"><i class="fa-solid fa-trash" style="color: #ffffff; padding:5px"></i></a>
                            </td>
                        </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
<script>

   function deleteContract(index, id) {
    let contracts =document.getElementsByClassName('contract-column')
    if (confirm('Xoá hợp đồng?')) {
        $(contracts[index]).remove();

        $.ajax({
            url: '/my-contracts/'+id,
            method: 'DELETE',
            data : {
                _token: '{{csrf_token()}}',
                id:id
            },
            success:function(data){

            }
        })
    }

}
</script>
<script src="{{asset('js/contract.js')}}"></script>

@endsection
