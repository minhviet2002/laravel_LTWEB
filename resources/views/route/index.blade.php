@extends('master.index')
@section('title')
    Lộ trình
@endsection
<style>
    .active-routes {
        background-color: #e8ebed !important    ;
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
<div class="content_route">

    <!-- Route 1 -->
    <div class="defaultLayout_container">
        <div class="defaultLayout_container-top">
            <h1 class="defaultLayout_heading">Lộ trình học</h1>
            <p class="defaultLayout_heading-text">Để bắt đầu một cách thuận lợi, bạn nên tập trung vào một lộ trình học. Ví dụ: Để đi làm với vị trí “Lập trình viên Front-end” bạn nên tập trung vào lộ trình “Front-end”.</p>
        </div>
    </div>

    <!-- Route 2 -->
    <div class="container-body">
        <div class="learningPathsList_content">
            <div class="learningPathItem_wrapper">
                <h2 class="learningPathsList_content-heading">Lộ trình học Front-end</h2>
                <div class="learningPathsList_content-info">Front end là một phần của một website ở đó người dùng có thể tương tác để sử dụng, tất cả những gì mà bạn nhìn thấy trên một website bao gồm: font chữ, màu sắc, danh mục sản phẩm, menu, thanh trượt, v.v. đều là sự kết hợp hoàn hảo giữa HTML, CSS và Javascript.</div>
                <div style="font-weight: 700;" class="learningPathsList_content-info">Lập trình viên Front-end là người xây dựng ra giao diện websites. Trong phần này F8 sẽ chia sẻ cho bạn lộ trình để trở thành lập trình viên Front-end nhé.</div>
            </div>
            <div class="learningPathItem_thumb-wrap">
                <a class="learningPathItem_thumb-round" href="" class="">
                    <img class="learningPathItem_thumb" src="https://files.fullstack.edu.vn/f8-prod/learning-paths/2/61a0439062b82.png" alt="">
                </a>
            </div>
        </div>
        <div>
            <a class="learn_button" href="{{ route('learn.routes.frontend.index')}}">Xem chi tiết</a>
        </div>
    </div>
    <div class="container-body">
        <div class="learningPathsList_content">
            <div class="learningPathItem_wrapper">
                <h2 class="learningPathsList_content-heading">Lộ trình học Back-end</h2>
                <div class="learningPathsList_content-info">BackEnd là tất cả những phần hỗ trợ hoạt động của website hoặc ứng dụng mà người dùng không thể nhìn thấy được. Có thể cho rằng BackEnd giống như bộ não của con người. Nó xử lý những yêu cầu, câu lệnh và lựa chọn thông tin chính xác để hiển thị lên màn hình.</div>
                <div style="font-weight: 700;" class="learningPathsList_content-info">Trái với Front-end thì lập trình viên Back-end là người làm việc với dữ liệu, công việc thường nặng tính logic hơn. Chúng ta sẽ cùng tìm hiểu thêm về lộ trình học Back-end nhé.</div>
            </div>
            <div class="learningPathItem_thumb-wrap">
                <a class="learningPathItem_thumb-round" href="" class="">
                    <img class="learningPathItem_thumb" src="https://files.fullstack.edu.vn/f8-prod/learning-paths/3/61a0439cc779b.png" alt="">
                </a>
            </div>
        </div>
        <div>
            <a class="learn_button" href="{{ route('learn.routes.backend.index')}}">Xem chi tiết</a>
        </div>
    </div>

    <!-- Route 3 -->
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
    <x-footer ></x-footer>
@endsection