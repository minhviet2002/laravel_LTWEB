@extends('master.index')
@section('title')
    Lộ trình Back-end
@endsection
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
            <h1 class="defaultLayout_heading">Lộ trình học Back-end</h1>
            <p class="defaultLayout_heading-text">Hầu hết các websites hoặc ứng dụng di động đều có 2 phần là Front-end và Back-end. Front-end là phần giao diện người dùng nhìn thấy và có thể tương tác, đó chính là các ứng dụng mobile hay những website bạn đã từng sử dụng. Vì vậy, nhiệm vụ của lập trình viên Front-end là xây dựng các giao diện đẹp, dễ sử dụng và tối ưu trải nghiệm người dùng.</p>
            <p class="defaultLayout_heading-text">Tại Việt Nam, <a href=""> lương trung bình </a> cho lập trình viên front-end vào khoảng 16.000.000đ / tháng.</p>
            <p class="defaultLayout_heading-text">Dưới đây là các khóa học F8 đã tạo ra dành cho bất cứ ai theo đuổi sự nghiệp trở thành một lập trình viên Front-end.</p>
        </div>
    </div>



    <!-- Route 2 -->
    <div class="defaultLayout_container defaultLayout_container-active ">
        <div class="defaultLayout_container-top">
            <h1 class="defaultLayout_heading">1. Tìm hiểu về ngành IT</h1>

            <p class="defaultLayout_heading-text"> <a href="https://daivietdanang.edu.vn/dao-tao/bai-viet/it-la-gi-hoc-gi-va-lam-gi-855.html" class="defaultLayout_heading-text-a"> IT – Information Technology (Công nghệ thông tin) </a> là một thuật ngữ bao gồm phần mềm, mạng lưới internet, hệ thống máy tính sử dụng cho việc phân phối và xử lý dữ liệu, trao đổi, lưu trữ và sử dụng thông tin dưới hình thức khác nhau. Nói nôm na, đây là việc sử dụng công nghệ hiện đại vào việc tạo ra, xử lý, truyền dẫn thông tin, lưu trữ, khai thác thông tin.</p>
            <p class="defaultLayout_heading-text">Hiện nay, ngành Công nghệ thông tin thường phân chia thành 5 chuyên ngành phổ biến, gồm: Khoa học máy tính, kỹ thuật máy tính, hệ thống thông tin, mạng máy tính truyền thông, kỹ thuật phần mềm. Trong đó, hai ngành đang "hot" nhất hiện nay và trong tương lai đó là Kỹ thuật phần mềm và an toàn thông tin.</p>
            <p class="defaultLayout_heading-text">Công nghệ thông tin hầu như được sở dụng phổ biến trong lĩnh vực kinh tế. Các dịch vụ cốt lõi để giúp thực thi các chiến lược kinh doanh đó là: quá trình tự động kinh doanh, cung cấp thông tin, kết nối với khách hàng và các công cụ sản xuất.</p>
        </div>
        <div>
            <img class="defaultLayout_container-top-img" src="{{asset('image/sach-hay-ve-logic-hoc-780x405.jpg')}}" alt="">
        </div>
    </div>

    <div class="defaultLayout_container defaultLayout_container-active ">
        <div class="defaultLayout_container-top">
            <h1 class="defaultLayout_heading">2. HTML và CSS</h1>
            <p class="defaultLayout_heading-text">Để học web Front-end chúng ta luôn bắt đầu với ngôn ngữ HTML và CSS, đây là 2 ngôn ngữ có mặt trong mọi website trên internet. Trong khóa học này F8 sẽ chia sẻ từ những kiến thức cơ bản nhất. Sau khóa học này bạn sẽ tự làm được 2 giao diện websites là The Band và Shopee.</p>
            <p class="defaultLayout_heading-text"> <a href="" class="defaultLayout_heading-text-a"> HTML (HyperText Markup Language) :</a> là một ngôn ngữ đánh dấu được thiết kế ra để tạo nên các trang web, nghĩa là các mẩu thông tin được trình bày trên World Wide Web.</p>

            <p class="defaultLayout_heading-text"> <a href="" class="defaultLayout_heading-text-a"> CSS (Cascading Style Sheets) :</a>  định nghĩa về cách hiển thị của một tài liệu HTML. CSS đặc biệt hữu ích trong việc thiết kế Web. Nó giúp cho người thiết kế dễ dàng áp đặt các phong cách đã được thiết kế lên bất kì page nào của website một cách nhanh chóng, đồng bộ.</p>
        </div>
        <div>
            <img class="defaultLayout_container-top-img" src="{{asset('image/html-css.jpg')}}" alt="">
        </div>
    </div>

    <div class="defaultLayout_container defaultLayout_container-active ">
        <div class="defaultLayout_container-top">
            <h1 class="defaultLayout_heading">3. JavaScript</h1>
            <p class="defaultLayout_heading-text">Với HTML, CSS bạn mới chỉ xây dựng được các websites tĩnh, chỉ bao gồm phần giao diện và gần như chưa có xử lý tương tác gì. Để thêm nhiều chức năng phong phú và tăng tính tương tác cho website bạn cần học Javascript.</p>
            
            <p class="defaultLayout_heading-text"> <a href="" class="defaultLayout_heading-text-a">JavaScript :</a>  là ngôn ngữ lập trình phổ biến dùng để tạo ra các trang web tương tác. Được tích hợp và nhúng vào HTML giúp website trở nên sống động hơn. JavaScript đóng vai trò như một phần của trang web, thực thi cho phép Client-Side Script từ phía người dùng cũng như phía máy chủ (Nodejs) tạo ra các trang web động.</p>

            <p class="defaultLayout_heading-text"> <a href="" class="defaultLayout_heading-text-a"> JavaScript :</a>
            là một ngôn ngữ lập trình thông dịch với khả năng hướng đến đối tượng. Là một trong 3 ngôn ngữ chính trong lập trình web và có mối liên hệ lẫn nhau để xây dựng một website sống động, chuyên nghiệp.</p>
        </div>
        <div>
            <img class="defaultLayout_container-top-img" src="{{asset('image/javascript.jpg')}}" alt="">
        </div>
    </div>

    <div class="defaultLayout_container defaultLayout_container-active ">
        <div class="defaultLayout_container-top">
            <h1 class="defaultLayout_heading">4. Sử dụng Ubuntu/Linux</h1>
            <p class="defaultLayout_heading-text">Cách làm việc với hệ điều hành Ubuntu/Linux qua Windows Terminal & WSL. Khi đi làm, nhiều trường hợp bạn cần nắm vững các dòng lệnh cơ bản của Ubuntu/Linux.</p>
            <p class="defaultLayout_heading-text"><a href="" class="defaultLayout_heading-text-a"> Ubuntu là :</a>  một hệ điều hành trên máy tính, và nó được phát triển dựa trên Linux/Debian GNU. Lần đầu được giới thiệu vào năm 2004, tính đến năm 2007, Ubuntu đây là phiên bản chiếm 30% số bản tùy biến của Linux được cài đặt trên máy tính, và cũng là bản tuỳ biến Linux phổ biến nhất. Công ty Canonical đã và đang chịu trách nhiệm trong việc tài trợ Ubuntu, giúp cho hệ điều hành này có thể phát triển trong tương lai.</p>
            <p class="defaultLayout_heading-text">Có ba loại phiên bản Ubuntu mà người dùng cần biết đến, bao gồm Ubuntu phiên bản thông thường, phiên bản hỗ trợ lâu dài (LTS) và các dự án khác. Thông thường, bạn nên sử dụng phiên bản hỗ trợ lâu dài để nhận được hỗ trợ trong vòng 3 năm đối với máy tính để bàn và 5 năm đối với máy chủ.</p>
        </div>
        <div>
            <img class="defaultLayout_container-top-img" src="{{asset('image/ubuntu.png')}}" alt="">
        </div>
    </div>

    <div class="defaultLayout_container defaultLayout_container-active ">
        <div class="defaultLayout_container-top">
            <h1 class="defaultLayout_heading">5. Libraries and Frameworks</h1>
            <p class="defaultLayout_heading-text">Một ứng dụng Back-end hiện đại có thể rất phức tạp, việc sử dụng code thuần (tự tay code từ đầu) không phải là một lựa chọn tốt. Vì vậy các Libraries và Frameworks ra đời nhằm đơn giản hóa, tiết kiệm thời gian và tiền bạc để nhanh chóng tạo ra được sản phẩm cuối cùng.
        </div>
        <div>
            <img class="defaultLayout_container-top-img" src="{{asset('image/node.jpg')}}" alt="">
        </div>
    </div>
    <!-- <div class="container-body">
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
    </div> -->

    <!-- Route 3 -->
    <!-- <div class="suggestionBox_wrapper">
        <div class="suggestionBox_info">
            <h2>Tham gia cộng đồng học viên của chúng tôi trên Facebook</h2>
            <p class="suggestionBox_des">Hàng nghìn người khác đang học lộ trình giống như bạn. Hãy tham gia hỏi đáp, chia sẻ và hỗ trợ nhau trong quá trình học nhé.</p>
            <a class="suggestionBox_cta" target="_blank" href="https://www.facebook.com/groups/f8official" rel="">Tham gia nhóm</a>
        </div>
        <div class="suggestionBox_image">
            <img src="{{asset('image/routeImage.png')}}" alt="Học lập trình web (F8 - Fullstack.edu.vn)">
        </div>
    </div> -->
</div>
@endsection

@section('footer')
    <x-footer ></x-footer>
@endsection