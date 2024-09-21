@extends('admin.layouts.app')
@section('content')
    <div class="row" id="table">
        <!-- Zero config table start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Danh sách danh mục</h5>
                </div>
                <div class="card-body">

                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Ảnh</th>
                                <th>Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$category->name}}</td>
                                    <td><img style="width: 80px; height: 80px;" src="{{\Illuminate\Support\Facades\Storage::url($category->image)}}" alt=""></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{route('categories.edit', $category->id)}}" class="btn btn-warning">Sửa</a>
                                            <form onsubmit="return confirm('Bạn có muốn xoá không?')" action="{{route('categories.destroy', $category->id)}}" method="pOST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger">Xoá</button>
                                            </form>
                                        </div>
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
