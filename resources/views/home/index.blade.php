@extends('master.index')
@section('title')
Trang chủ
@endsection

<style>
    .active-home {
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

<div class=" content-body">
    <div class="image-slider">
        <div class="image-item">
            <div class="image">
                <img src="{{asset('image\1.png')}}" alt="">
            </div>
        </div>
        <div class="image-item">
            <div class="image">
                <img src="{{asset('image\2.jpg')}}" alt="">
            </div>
        </div>
        <div class="image-item">
            <div class="image">
                <img src="{{asset('image\3.jpg')}}" alt="">
            </div>
        </div>
        <div class="image-item">
            <div class="image">
                <img src="{{asset('image\4.png')}}" alt="">
            </div>
        </div>
    </div>
    

    <x-nav-lesson></x-nav-lesson>
</div>

@endsection
@section('footer')
<x-footer></x-footer>
@endsection