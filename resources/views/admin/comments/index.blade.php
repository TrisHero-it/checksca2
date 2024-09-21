@extends('admin.layouts.app')
@section('content')
<div class="main pt-3 pb-3">
    <h1>Danh sách bình luận</h1>
    
    <div style="display: flex;">
    <select onchange="loadReports()" class="form-select" name="" id="select">
        <option value="{{request()->fullUrlWithoutQuery(['popular'])}}">Mới nhất</option>
        <option @if (request()->input('popular')=='oldest') selected @endif value="{{request()->fullUrlWithQuery(['popular'=> 'oldest'])}}">Cũ nhất</option>
        <option @if (request()->input('popular')=='popular') selected @endif value="{{request()->fullUrlWithQuery(['popular'=> 'popular'])}}">Phổ biến nhất</option>
    </select>
    <select onchange="loadReports2()" class="form-select" name="" id="select">
        <option value="{{request()->fullUrlWithoutQuery(['post'])}}">Lọc theo bài</option>
        @foreach ($posts as $post)
        <option @if (request()->input('post')==$post->id) selected @endif  value="{{request()->fullUrlWithQuery(['post'=> $post->id])}}">{{$post->id}}</option>
    @endforeach
    </select>
    </div>
    <div style="min-height: 700px">
        <table class="table table-striped">
            <thead>
                <th>Người comments</th>
                <th>Comment của bài viết số</th>
                <th>Nội dung comment</th>
                <th>Lượt thích</th>
                <th>Chức năng</th>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{$comment->account->name}}</td>
                        <td>{{$comment->post_id}}</td>
                        <td>{{$comment->comment_content}}</td>
                        <td>{{$comment->like}}</td>
                        <td><button class="btn btn-danger">Xoá</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <?php
            $pages = ceil($comments->total() / 10);
            $page = request()->get('page',1);
            ?>
            <div class="d-flex" style="gap:10px">
                @if ($pages>3)
                @if ($page<3)
                   @for ($i=1; $i<=3; $i++)
                <a style="color: #8D493A" href="{{request()->fullUrlWithQuery(['page'=>$i])}}"><span style="<?php 
                 if ($page==$i) {
                    echo "background:#007bff; color:white";
                 }   ?>" class="pagination">{{$i}} </span></a>
                @endfor
                @elseif($page>=3 && $page!=$pages)
                <a style="color: #8D493A" href="{{request()->fullUrlWithQuery(['page'=>1])}}"><span style="<?php 
                 if ($page==1) {
                    echo "background:#007bff; color:white";
                 }   ?>" class="pagination">{{1}} </span></a>
                <a style="color: #8D493A" ><span style="border:none" class="pagination">... </span></a> 

                @if ($page!=$pages-1)
                @for ($i=$page-1; $i<=$page+1; $i++)
                 <a style="color: #8D493A" href="{{request()->fullUrlWithQuery(['page'=>$i])}}"><span style="<?php 
                 if ($page==$i) {
                    echo "background:#007bff; color:white";
                 }   ?>" class="pagination">{{$i}} </span></a>
                 @endfor
                 @else
                 @for ($i=$page-1; $i<=$page; $i++)
                 <a style="color: #8D493A" href="{{request()->fullUrlWithQuery(['page'=>$i])}}"><span style="<?php 
                 if ($page==$i) {
                    echo "background:#007bff; color:white";
                 }   ?>" class="pagination">{{$i}} </span></a>
                 @endfor
                @endif
                 @elseif ($page>=3 && $page==$pages)
                 <a style="color: #8D493A" href="{{request()->fullUrlWithQuery(['page'=>1])}}"><span style="<?php 
                 if ($page==1) {
                    echo "background:#007bff; color:white";
                 }   ?>" class="pagination">{{1}} </span></a>
                <a style="color: #8D493A" ><span style="border:none" class="pagination">... </span></a> 
                <a style="color: #8D493A" href="{{request()->fullUrlWithQuery(['page'=>$pages-2])}}"><span style="<?php 
                 if ($page==$pages-2) {
                    echo "background:#007bff; color:white";
                 }   ?>" class="pagination">{{$pages-2}} </span></a>
                  <a style="color: #8D493A" href="{{request()->fullUrlWithQuery(['page'=>$pages-1])}}"><span style="<?php 
                 if ($page==$pages-1) {
                    echo "background:#007bff; color:white";
                 }   ?>" class="pagination">{{$pages-1}} </span></a>
                @endif
               
                @endif

               @if ($pages>3)
               @if ($page<$pages-2)
               <a style="color: #8D493A" href="{{request()->fullUrlWithQuery(['page'=>$pages])}}"><span style="border:none;" class="pagination">... </span></a>
               @endif
               @if ($pages != 1)
                <a style="color: #8D493A" href="{{request()->fullUrlWithQuery(['page'=>$pages])}}"><span style="<?php 
                 if ($page==$pages) {
                    echo "background:#007bff; color:white";
                 }   ?>" class="pagination">{{$pages}} </span></a>
                @endif
               @endif
            </div>
</div>
<script>

    function loadReports() {
        let value = document.querySelectorAll('.form-select')
        window.location.href =value[0].value
    }

    function loadReports2() {
        let value = document.querySelectorAll('.form-select')
        window.location.href =value[1].value
    }
</script>
@endsection