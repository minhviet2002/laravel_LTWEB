<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700;900&display=swap">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="https://www.fullstack.co.za/img/logobig2.png" type="image/gif" sizes="16x16">
  <link rel="stylesheet" href="{{asset('global/global.css')}}">
  <link rel="stylesheet" href="{{asset('css/header.css')}}">
  <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
  <link rel="stylesheet" href="{{asset('css/footer.css')}}">
  <link rel="stylesheet" href="{{asset('css/content.css')}}">
  <link rel="stylesheet" href="{{asset('css/lesson.css')}}">
  <link rel="stylesheet" href="{{asset('css/slickslider.css')}}">
  <link rel="stylesheet" href="{{asset('css/lessonSearch.css')}}">
  <link rel="stylesheet" href="{{asset('css/comments.css')}}">
  <link rel="stylesheet" href="{{asset('css/nav.css')}}">
  <link rel="stylesheet" href="{{asset('css/info.css')}}">
  <link rel="stylesheet" href="{{asset('css/navLesson.css')}}">
  <link rel="stylesheet" href="{{asset('css/updateInfo.css')}}">
  <link rel="stylesheet" href="{{asset('css/headerLessonItem.css')}}">
  <link rel="stylesheet" href="{{asset('css/personalPage.css')}}">




  <title> @yield('title')</title>
</head>

<div class="header">
  @yield('header')
</div>
@yield('nav')
<div class="content">
  @yield('hover-btn')
  <div class="sidebar-body">
    @yield('sidebar')
  </div>
  @yield('content-main')
</div>
@yield('footer')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.image-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 2,
      dots: true,
      centerMode: true,
      focusOnSelect: true,
      autoplay: true,
      autoplaySpeed: 2000,
      pauseOnFocus: true,
      arrows: true,
      prevArrow: "<button type='button' class='slick-prev pull-left'><i class='arrow-icon fa fa-angle-left' aria-hidden='true'></i></button>",
      nextArrow: "<button type='button' class='slick-next pull-right'><i class='arrow-icon fa fa-angle-right' aria-hidden='true'></i></button>",
    });
  });
</script>



</body>

</html>