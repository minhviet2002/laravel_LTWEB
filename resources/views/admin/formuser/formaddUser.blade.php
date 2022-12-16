@extends('admin.index')
@section('title')

Thêm học viên
@endsection
@section('header')
<x-header :infoUser="$infoUser"></x-header>
@endsection
@section('content-main')


<div class="flex">
    <h1>Thêm học viên</h1>
</div>
<div class="formAdd_wrapper">
    <div class="formAdd_container">
        @if(session('message'))
        <div class="alert alert-success text-center">{{session('message')}}</div>
        @endif
        @if(session('msg'))
        <div class="alert alert-danger text-center">{{session('msg')}}</div>
        @endif
        @if($errors->any())
        <div class="alert alert-danger text-center">Thêm học viên không thành công</div>
        @endif
        <div class="formAdd_body">
            <form action="{{ route('user.post')}}" method="post" class="form_formAdd">
                @csrf
                <div class="form_item">
                    <label class="label_login" for="">Họ và tên: </label>
                    <input class="input_login" type="text" name="fullname" value="{{old('fullname')}}" placeholder="Nhập đầy đủ họ và tên">
                    @error('fullname')
                    <div class="form_input-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form_item">
                    <label class="label_login" for="">Email: </label>
                    <input class="input_login" type="email" name="email" value="{{old('email')}}" placeholder="Nhập đúng email">
                    @error('email')
                    <div class="form_input-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form_item">
                    <label class="label_login" for="">Tên đăng nhập: </label>
                    <input class="input_login" type="text" name="name" value="{{old('name')}}" placeholder="Nhập tên đăng nhập cần đăng kí">
                    @error('name')
                    <div class="form_input-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form_item">
                    <label class="label_login" for="">Mật khẩu: </label>
                    <input class="input_login" type="password" value="{{old('password')}}" name="password" placeholder="Nhập mật khẩu">
                    @error('password')
                    <div class="form_input-message">{{ $message }}</div>
                    @enderror
                </div>
                <div style="display: flex;">
                    <input style="padding: 8px 13px;font-size: 1.6rem;margin-top: 20px; margin-right: 10px;" class="btn btn-success" type="submit" value="Thêm tài khoản">
                    <a style="padding: 8px 13px;font-size: 1.6rem;margin-top: 20px;" class="btn btn-warning" href="{{ route('manage.users.index') }}">Quay lại</a>
                </div>
            </form>
        </div>
    </div>

</div>
</div>
@endsection