@extends('admin.index')
<style>
    .active-lesson {
        background-color: #e8ebed;
        color: var(--primary-color);
    }
</style>
@section('title')
Manage React
@endsection
@section('header')
<x-header :infoUser="$infoUser"></x-header>
@endsection
@section('content-main')
<style>
    .active-lesson {
        background-color: #e8ebed;
        color: var(--primary-color);
    }
</style>
<div style="display: flex;  align-items: center; justify-content: center;">
    <h2> Trang này đang được cập nhật. Vui lòng truy cập lại sau. </h2>
</div>
@endsection
