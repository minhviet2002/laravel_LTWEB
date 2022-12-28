@extends('master.index')
@section('title')
Trang cá nhân - {{$data_user_detail->fullname}}
@endsection

<style>
    .header {
        position: fixed;
        display: flex !important;
        width: 100% !important;
        justify-content: space-between !important;
        z-index: 1 !important;
    }

    .header-body {
        width: 100%;
    }

    .content {
        padding-top: 95px !important;
        position: relative;
    }

    .content-body {
        margin-top: -75px;
        padding-top: 0px !important;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;

    }

    .header-item-search {
        display: none !important;
    }

    .sidebar-body {
        position: absolute;
        margin-left: -96px;
        left: 0;
        transition: all .8s ease-in-out;
    }

    .sidebar-body::before {
        content: "";
        display: block;
        position: absolute;
        right: 10px;
        top: 10px;
        height: 92%;
        width: 4px;
        background-color: #ccc;
    }

    .sidebar-body:hover {
        margin-left: 0px;
    }

    .sidebar-body:hover .sidebar-body::before {
        opacity: 0;
    }

    .sidebar {
        border-right: 1px solid transparent !important;

    }
</style>

@section('header')
<x-header :infoUser="$infoUser"></x-header>
@endsection

@section('sidebar')
<x-sidebar></x-sidebar>
<!-- <div class="hover-btn">
    <i class="fa-solid fa-arrow-right"></i>
</div> -->
@endsection

@section('content-main')
@if(!empty($infoUser))

<div class=" content-body">

    <div class="Profile_banner">
        <div class="Profile_user">
            <div class="Profile_user-avatar">
                @if($infoUser->avatar != null)
                <img class="info-avatar" src="{{asset('avatar')}}/{{$data_user_detail->avatar}}" alt="">
                @else
                <img class="info-avatar" src="{{asset('avatar/avatarDefault.jpg')}}" alt="">
                @endif


                <img src="" alt="" class="Profile_crown">
            </div>
            <div class="Profile_user-name">
                <span class="Profile_user-name-text">{{$data_user_detail->fullname}}</span>
                @if(session('name') == $data_user_detail->name)
                <a class="personalPage" href="{{ route('learn.infoUpdate.index') }}">
                    <div class="update-info"><i class="fa-solid fa-pen"></i><span class="update-info-text">Chỉnh sửa</span></div>
                </a>
                @endif
            </div>
        </div>
    </div>
    <div class="index-module_row">
        <div class="content-left">
            <div class="Box_wrapper">
                <h3 class="Box_title">Giới thiệu</h3>
                <div class="Profile_participation">
                    <div class="Profile_participation-icon">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <span>Thành viên của <span class="Profile_highlight">F8 - Học lập trình từ Zezo đến Hero</span> từ 14 ngày trước</span>
                </div>
            </div>
            <div class="Box_wrapper">
                <h3 class="Box_title">Hoạt động gần đây</h3>
                @if(!empty($content))
                @foreach( $content as $key=>$item)
                <div class="ActivityItem_wrapper">
                    <div class="ActivityItem_avatar-wrapper">
                        <img class="avatar-user" src="{{asset('avatar')}}/{{$item->avatar}}" alt="">
                    </div>
                    <div class="ActivityItem_main-content">
                        <a href="" class="ActivityItem_author"><span>{{$item->fullname}}</span></a>
                        <span>đã bình luận trong hỏi đáp: </span>
                        <a class="ActivityItem_message" href="{{ route('learn.comments.index')}}">
                            <span>"{{$item->content}}"</span>
                        </a>
                    </div>
                </div>
                @endforeach
                @endif
                @if(!empty($content_reply))
                @foreach( $content_reply as $key=>$item)
                <div class="ActivityItem_wrapper">
                    <div class="ActivityItem_avatar-wrapper">
                        <img class="avatar-user" src="{{asset('avatar')}}/{{$item->avatar}}" alt="">
                    </div>
                    <div class="ActivityItem_main-content">
                        <a href="" class="ActivityItem_author"><span>{{$item->fullname}}</span></a>
                        <span>đã bình luận trong hỏi đáp: </span>
                        <a class="ActivityItem_message" href="{{ route('learn.comments.index')}}">
                            <span>"{{$item->content_reply}}"</span>
                        </a>
                    </div>
                </div>
                @endforeach
                @endif
                @if(empty($content_reply) && empty($content))
                <h4>Chưa có hoạt động nào gần đây</h4>
                @endif
            </div>
        </div>
        <div class="content-right">
            <div class="Box_wrapper">
                <h3 class="Box_title">Các khóa học đã tham gia</h3>
                <ul class="lesson-info">
                    <li class="Profile_inner">
                        <a href="{{route('lessonHTML.index')}}" class="Profile_thumb">
                            <img class="Profile_thumb-image" src=" {{asset('image/html.png')}} " alt="">
                        </a>
                        <div class="info">
                            <h3 class="Profile_info-title"><a href="{{route('lessonHTML.index')}}">
                                    HTML CSS
                                </a></h3>
                            <p class="Profile_info-desc">
                                Từ cơ bản tới chuyên sâu, thực hành 8 dự án, hàng trăm bài tập, trang hỏi đáp riêng, cấp chứng chỉ sau khóa học và mua một lần học mãi mãi.
                            </p>
                        </div>
                    </li>

                    <li class="Profile_inner">
                        <a href="{{route('lessonJS.index')}}" class="Profile_thumb">
                            <img class="Profile_thumb-image" src=" {{asset('image/js.png')}} " alt="">
                        </a>
                        <div class="info">
                            <h3 class="Profile_info-title"><a href="{{route('lessonJS.index')}}">
                                    JavaScript căn bản
                                </a></h3>
                            <p class="Profile_info-desc">
                                Để có cái nhìn tổng quan về ngành IT - Lập trình web các bạn nên xem các videos tại khóa này trước nhé.
                            </p>
                        </div>
                    </li>

            </div>
        </div>
    </div>
</div>
@endif
@endsection
@section('footer')
<x-footer></x-footer>
@endsection