@extends('admin.index')
@section('title')
Manage User Accounts
@endsection
@section('header')
<x-header :infoUser="$infoUser"></x-header>
@endsection
@section('content-main')
<style>
    .active-user {
        background-color: #e8ebed;
        color: var(--primary-color);
    }
</style>

<div class="flex padiing_bottom_20">
    <h1>Trang quản lí tài khoản học viên tại FullStack</h1>
</div>

<div class="padiing_bottom_20">
    <a href="{{ route('user.index') }}">
        <button class="btn btn-success">Thêm tài khoản học viên</button>
    </a>
</div>
@if(session('message'))
<div style="margin-top: 0px !important;" class="alert alert-success text-center">{{session('message')}}</div>
@endif
@if(session('msg'))
<div style="margin-top: 0px !important;" class="alert alert-danger text-center">{{session('msg')}}</div>
@endif
<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên tài khoản</th>
            <th>Mật khẩu</th>
            <th>Họ và tên</th>
            <th>Email</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        @if(!empty($users))
        @foreach($users as $key=>$value)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->password }}</td>
            <td>{{ $value->fullname}}</td>
            <td>{{ $value->email}}</td>
            <td>
                <a onclick="return confirm('Bạn có chắc muốn xóa học viên này')" href="{{ route('user.delete', [ 'id' => $value->id ]) }}">
                    <button class="btn btn-danger">Xóa</button>
                </a>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
@endsection
