@extends('master.index')
@section('title')
Sửa thông tin
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
<x-sidebar></x-sidebar>
@endsection
@section('content-main')

<div class="info-body">
    <div class="info-wrap">
        <h1 style="color: var(--primary-color);">Trang sửa thông tin</h1>
    </div>
    @if($errors->any())
    <div class="alert alert-danger text-center">Sửa thông tin không thành công!</div>
    @endif
    @if(!empty($dataDetail))
    <div class="update_body">
        <form method="post" enctype="multipart/form-data" action="{{ route('learn.postInfoUpdate.index') }}" class="form_updateInfo">
            @csrf
            <div class="form_item">
                <label class="label_updateInfo" for="">Họ và tên: </label>
                <input class="input_updateInfo" type="text" name="fullname" value="{{old('fullname') ?? $dataDetail->fullname}}" placeholder="Nhập đầy đủ họ và tên của bạn">
                @error('fullname')
                <div class="form_input-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form_item">
                <label class="label_updateInfo" for="">Email: </label>
                <input class="input_updateInfo" type="email" name="email" value="{{old('email') ?? $dataDetail->email}}" placeholder="Nhập đúng email của bạn">
                @error('email')
                <div class="form_input-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form_item">
                <label class="label_updateInfo" for="">Tên đăng nhập: </label>
                <input class="input_updateInfo" type="text" name="name" value="{{old('name') ?? $dataDetail->name}}" placeholder="Nhập tên đăng nhập">
                @error('name')
                <div class="form_input-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form_item">
                <label class="label_updateInfo" for="">Ảnh đại diện: </label>
                <input type="file" name="file_upload">
                @if($dataDetail->avatar != null)
                <input type="hidden" name="file_old" value="{{$infoUser->avatar}}">
                @endif

            </div>
            <div class="info-wrap-item">
                <button type="submit" class="btn-info btn btn-success" href="">Sửa</button>
                <a class="btn-info btn btn-warning" href="{{ route('learn.info.index')}}">Quay lại</a>
            </div>
        </form>
    </div>
    @endif



</div>


@endsection
@section('footer')
<x-footer></x-footer>
@endsection