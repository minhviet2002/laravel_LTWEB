<div>
    <header class="header-lessonItem">
        <div class="header-lessonItem-iconLeft">
            <a style="display: block;" href="{{ URL::previous() }}">
                <i class="fa-solid fa-chevron-left"></i></div>
            </a>
        <div class="header-lessonItem-introduce">
            <a href="{{ route('home') }}">
                <img class="header-lessonItem-img" src="https://www.fullstack.co.za/img/logobig2.png" alt="">
            </a>
            <h4 class="header-lessonItem-text">{{$title}}</h4>
        </div>
    </header>
</div>