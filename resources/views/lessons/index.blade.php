@extends('master.index')

@section('title')
Bài học
@endsection
<style>
    .active-lessons {
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
<div class="lesson-body">
    <div class="defaultLayout_container">
        <div class="defaultLayout_container-top">
            <h1 class="defaultLayout_heading">Khóa học</h1>
            <p class="defaultLayout_heading-text">Các khóa học được thiết kế phù hợp cho cả người mới, nhiều khóa học miễn phí, chất lượng, nội dung dễ hiểu.</p>
        </div>
    </div>
    <x-nav-lesson></x-nav-lesson>
    <div class="suggestionBox_wrapper">
        <div class="suggestionBox_info">
            <h2>Tham gia cộng đồng học viên của chúng tôi trên Facebook</h2>
            <p class="suggestionBox_des">Hàng nghìn người khác đang học lộ trình giống như bạn. Hãy tham gia hỏi đáp, chia sẻ và hỗ trợ nhau trong quá trình học nhé.</p>
            <a class="suggestionBox_cta" target="_blank" href="https://www.facebook.com/groups/f8official" rel="">Tham gia nhóm</a>
        </div>
        <div class="suggestionBox_image">
            <img src="{{asset('image/routeImage.png')}}" alt="Học lập trình web (F8 - Fullstack.edu.vn)">
        </div>
    </div>
</div>
@endsection
@section('footer')
<x-footer></x-footer>
@endsection