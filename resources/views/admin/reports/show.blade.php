@extends('admin.layouts.app')
@section('content')
    <div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification">

    </div>
    <div class="col-md-12" id="post">
        <div class="card">
            <div class="card-header">
                <div class="d-flex"><h5>Chi tiết bài viết</h5> @if($post->status_id==3)
                        <span class="badge rounded-pill text-bg-success" style="display: flex;align-items: center;width: max-content;">{{$post->status->status}}</span>
                    @elseif($post->status_id==1)
                        <span class="badge rounded-pill text-bg-secondary" style="display: flex;align-items: center;width: max-content;">{{$post->status->status}}</span>
                    @else
                        <span class="badge rounded-pill text-bg-danger" style="display: flex;align-items: center;width: max-content;">{{$post->status->status}}</span>
                    @endif  </div>
            </div>
            @section('link')
                <link rel="stylesheet" href="{{asset('assets/js/plugins/uppy/uppy.min.css')}}">
            @endsection
            <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Tài khoản game</label>
                                <input name="username" type="text" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" value="{{$post->username}}" disabled placeholder="Tài khoản game">
                                <div class="thongbao" style="font-size: .875em; color: red"></div>

                            </div>
                            <div class="mb-3">
                                <label class="form-label"
                                       for="exampleInputPassword1">Link facebook</label>
                                <input disabled value="{{$post->linkfb}}" name="linkfb" type="text" class="form-control"
                                       id="exampleInputPassword1" placeholder="https://....">
                                <div class="thongbao" style="font-size: .875em; color: red"></div>

                            </div>
                            <div class="mb-3">
                                <label class="form-label"
                                       for="exampleInputPassword1">Họ và tên người lừa đảo</label>
                                <input disabled value="{{$post->fullname}}" name="fullname" type="text" class="form-control"
                                       id="exampleInputPassword1" placeholder="Nguyễn Văn A">
                                <div class="thongbao" style="font-size: .875em; color: red"></div>

                            </div>
                            <div class="mb-3">
                                <label class="form-label"
                                       for="exampleInputPassword1">Số điện thoại</label>
                                <input disabled value="{{$post->numberphone}}" name="numberphone" type="number" class="form-control"
                                       id="exampleInputPassword1" placeholder="098....">
                                <div class="thongbao" style="font-size: .875em; color: red"></div>

                            </div>

                            <div class="mb-3">
                                <label class="form-label"
                                       for="exampleInputPassword1">Số tiền lừa đảo</label>
                                <input disabled value="{{$post->moneys_scam}}" name="moneys_scam" type="number" class="form-control"
                                       id="exampleInputPassword1" placeholder="100.000.000">
                                <div class="thongbao" style="font-size: .875em; color: red"></div>

                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label class="form-label"
                                       for="exampleInputPassword1">Số tài khoản</label>
                                <input disabled value="{{$post->numberbank}}" name="numberbank" type="number" class="form-control"
                                       id="exampleInputPassword1" placeholder="098....">
                                <div class="thongbao" style="font-size: .875em; color: red"></div>

                            </div>
                            <div class="mb-3">
                                <label class="form-label"
                                       for="exampleFormControlSelect1">Ngân hàng</label>
                                <select disabled name="namebank" class="form-control" id="exampleFormControlSelect1">
                                    <option value="">{{$post->namebank}}</option>

                                </select>
                                <div class="thongbao" style="font-size: .875em; color: red"></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"
                                       for="exampleFormControlSelect1">Danh mục</label>
                                <select disabled name="category_id" class="form-control" id="exampleFormControlSelect1">
                                    <option value="">{{$post->category->name}}</option>
                                </select>
                                <div class="thongbao" style="font-size: .875em; color: red"></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"
                                       for="exampleFormControlTextarea1">Nội dung</label>
                                <textarea disabled name="content" class="form-control" id="exampleFormControlTextarea1"
                                          placeholder="Aa..."
                                          style="height: 139px">{{$post->content}}
                                </textarea>
                                <div class="thongbao" style="font-size: .875em; color: red"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 w-100">
                        <div class="card">
                            <div class="card-header">
                                <h5>Ảnh chụp bằng chứng</h5>
                            </div>
                            <div class="card-body">
                                <div class="pc-uppy d-flex" style="gap: 16px" id="pc-uppy-3">
                                   @isset($post->images)
                                        @foreach($post->images as $image)
                                            <img id="imageDisplay{{$loop->index}}" onclick="largeImg({{$loop->index}})" src="{{\Illuminate\Support\Facades\Storage::url($image)}}" style="width: 150px; height: 150px;  cursor: pointer" alt="">
                                        @endforeach
                                    @endisset
                                </div>
                            </div>
                            <div class="thongbao" style="font-size: .875em; color: red"></div>
                        </div>
                    </div>
                   @if($post->status_id == 1)
                        <button type="submit" class="btn btn-success" onclick="changeStatus({{$post->id}}, 3)">Duyệt</button>
                        <button type="submit" class="btn btn-danger" onclick="changeStatus({{$post->id}}, 2)">Huỷ</button>
                   @endif

            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="card-header-text">Bình luận của bài viết</h5>
            </div>
            <div class="card-body task-comment">
                <ul class="media-list p-0">
                    @foreach($comments as $comment)
                        <li class="d-flex">
                            <div class="media-left me-3">
                                <a href="#!">
                                    <img class="img-fluid media-object img-radius comment-img"
                                         src="{{$comment->account->avatar}}"
                                         alt="Generic placeholder image">
                                </a>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="media-heading txt-primary">{{$comment->account->name}}<span
                                        class="f-12 text-muted ms-1">Just now</span></h6>
                                <p>{{$comment->comment_content}}.</p>
                                <div class="m-t-10 m-b-25">
                                    <div class="d-flex">
                                         <span><a href="#!"
                                                  class="m-r-10 text-secondary"><span style="color: #0b5ed7">{{$comment->like}}</span> Lượt thích</a></span>
                                         <span><a
                                                href="#!" class="m-r-10 text-secondary"><span style="color: #0b5ed7">{{$comment->number}}</span> Lượt trả lời</a>
                                                                </span>

                                        <span><a onclick="deleteComment({{$comment->id}})" class="m-r-10 text-secondary"><i class="fas fa-trash"></i></a>
                                                                </span>
                                    </div>
                                </div>
                                <hr>
                                @foreach($comment->replies as $reply)
                                    <div class="d-flex mt-2">
                                        <a class="media-left me-3" href="#!">
                                            <img class="img-fluid media-object img-radius comment-img"
                                                 src="{{$reply->account->avatar}}"
                                                 alt="Generic placeholder image">
                                        </a>
                                        <div class="flex-grow-1">
                                            <h6 class="media-heading txt-primary">{{$reply->account->name}}<span
                                                    class="f-12 text-muted ms-1">Just now</span></h6>
                                            <p>{{$reply->comment_content}}.</p>
                                            <div class="m-t-10 m-b-25">
                                                               <span><a
                                                        href="#!" class="m-r-10 text-secondary"> <span style="color: #0b5ed7">{{$reply->like}}</span> Lượt thích</a>
                                                                </span>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script !src="">
        const largeImg = (id) => {
            let img = document.getElementById('imageDisplay' + id)
            let overlay = document.getElementById('over')
            overlay.style.display = 'block'
            img.style.zIndex = '3000'
            img.style.width = '500px'
            img.style.height = 'auto'
            img.style.position = 'fixed'
            img.style.top = '50%'
            img.style.left = '50%'
            img.style.transform = 'translate(-50%, -50%)'

            document.getElementById('over').addEventListener('click', () => {
                document.getElementById('over').style.display = 'none'
                img.style.zIndex = 'unset'
                img.style.width = '150px'
                img.style.height = '150px'
                img.style.position = 'unset'
                img.style.transform = 'translate(0)'
            })
        }

        function deleteComment(id) {
            if (confirm('Bạn muốn xoá comment này ?')){
                $.ajax({
                    url : 'delete-comments/'+id,
                    method : 'get',
                    data : {
                        _token : "{{csrf_token()}}" ,
                        id : id,
                    },
                    success : function (data) {
                        console.log(data)
                        reload(id)
                    }
                });
            }
        }

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
                        _token : "<?php echo e(csrf_token()); ?>" ,
                        id : id,
                        status_id : status_id,
                    },
                    success : function (data) {
                        console.log(data)
                        let html = '';
                        html += `<div class="toast toast-3 mb-2 fade show" id="toast${id}" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="<?php echo asset('images/design/favicon_io/favicon.ico'); ?>" alt="" class="img-fluid m-r-5" style="width:20px;">
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
                        reload(id)
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

        function reload(id)
        {
            $.ajax({
                url : '/admin-reports/'+id,
                method : 'get',
                success : function (data) {
                    console.log(data)
                    const parser = new DOMParser();
                    const htmlDoc = parser.parseFromString(data, 'text/html');
                    const newTable = htmlDoc.getElementById('post').innerHTML;
                    document.getElementById('post').innerHTML = newTable;
                }
            })
        }
    </script>

    @if(session('success'))
        <script !src="">
            let html = `
        <div class="toast toast-3 mb-2 fade show" id="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="{{asset('images/design/favicon_io/favicon.ico')}}" alt="" class="img-fluid m-r-5" style="width:20px;">
                <strong class="me-auto">CheckSca</strong>
                <small class="text-muted">1 Giây</small>
                <button type="button" class="m-l-5 mb-1 mt-1 btn-close" data-bs-dismiss="toast" aria-label="Close">
                </button>
            </div>
            <div class="toast-body">
                Thêm thành công !!
            </div>
        </div> `
            $('#notification').prepend(html)
            setTimeout(()=> {
                let a = document.getElementById('toast');
                a.style.transition = '0.2s ease all';
                a.style.transform = 'translateX(200%)';
                setTimeout(()=> {
                    document.getElementById('toast').remove()
                }, 1000)
            }, 2000)
        </script>
    @endif

@endsection
