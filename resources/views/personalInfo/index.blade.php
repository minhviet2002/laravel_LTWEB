@extends('master.index')
@section('title')
Trang chủ
@endsection

<style>
    .active-info {
        background-color: #e8ebed !important;
        color: #1a1a1a !important;
    }
</style>

@section('header')
<x-header :infoUser="$infoUser"></x-header>
@endsection
@section('sidebar')
<x-sidebar ></x-sidebar>
@endsection
@section('content-main')

<div class="info-body">
    @if(!empty($dataDetail))
    <div class="info-wrap">
        <h1 style="color: var(--primary-color);">Xin chào, <span>{{ $dataDetail->fullname }}</span>!</h1>
        @if(session('message'))
        <div class="alert alert-success text-center">{{session('message')}}</div>
        @endif

        <h2 style="padding: 10px 0px 10px 0px;">Thông tin tài khoản của bạn</h2>
        @if($dataDetail->avatar != null)
            <img class="info-avatar" src="{{asset('avatar')}}/{{$infoUser->avatar}}" alt="">
        @endif
        <div class="info-wrap-item">
            <h3 class="text-info-heading">Họ và tên: </h3>
            <span class="text-info-span">{{ $dataDetail->fullname }}</span>
        </div>
        <div class="info-wrap-item">
            <h3 class="text-info-heading">Tên tài khoản: </h3>
            <span class="text-info-span">{{ $dataDetail->name }}</span>
        </div>
        <div class="info-wrap-item">
            <h3 class="text-info-heading">Email: </h3>
            <span class="text-info-span">{{ $dataDetail->email }}</span>
        </div>
        
        <div class="info-wrap-item">
            <a class="btn-info btn btn-success" href="{{ route('learn.infoUpdate.index') }}">Sửa thông tin</a>
            <a class="btn-info btn btn-warning" href="">Đổi mật khẩu</a>
        </div>
    </div>
    @endif


</div>


@endsection
@section('footer')
<x-footer></x-footer>
@endsection