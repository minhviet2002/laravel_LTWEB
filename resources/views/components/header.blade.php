<header class="header-body">
    <div class="header-item-img">
        <a href="{{ route('home') }}">
            <img src="https://www.fullstack.co.za/img/logobig2.png" alt="">
        </a>
        <h4 class="test">Học Lập Trình Từ Zero đến Hero </h4>
    </div>
    @if(session('name') != 'admin')
    <form class="header-item-search" action="{{ route('search.search') }}" method="get">
        @csrf
        <div class="div-input-search">
            <input placeholder="Tìm kiếm bài học" name="search" value="{{ old('search') }}" type="text">
        </div>
        <button class="btn-submit"> <i class="fa-sharp fa-solid fa-magnifying-glass"></i> </button>
    </form>
    @endif
    @if(session('name'))
    <a class="personalPage" href="{{ route('personalPage.index',  ['name' => session('name') ])}}">
        <div class="header-login-wrap">
            <div class="header-item-login">
                @if(!empty($infoUser))
                @if($infoUser->avatar != null)
                <div class="header-item-login-wrap">
                    <img class="header-item-login-avatar" src="{{asset('avatar')}}/{{$infoUser->avatar}}" alt="">
                    <span class="header-item-login-text"> {{ session('name') }}</span>
                </div>
                @else
                <span class="header-item-login-text"><i style="padding-right: 4px;" class="fa-sharp fa-solid fa-user-tie"></i> {{ session('name') }}</span>
                @endif
                <div class="header-item-logout">
                    <a onclick="return confirm('Bạn có muốn đăng xuất không?')" class="header-item-logout-text" href="{{ route('logout')}}"><i style="padding-right: 8px;" class="fa-solid fa-arrow-right-from-bracket"></i>Đăng xuất</a>
                    <a class="header-item-logout-text" href="{{ route('personalPage.index',  ['name' => session('name')])}}"><i style="padding-right: 8px;" class="fa-solid fa-user"></i>Trang cá nhân</a>
                    <a class="header-item-logout-text" href="{{ route('learn.info.index')}}"><i style="padding-right: 8px;" class="fa-solid fa-gear"></i>Cài đặt</a>

                </div>
                @endif
            </div>
        </div>
    </a>

    @else
    <div class="header-item-login">
        <a class="header-item-login-text" href="{{ route('login')}}"><i style="padding-right: 4px;" class="fa-solid fa-user-plus"></i>Đăng nhập</a>
    </div>
    @endif
</header>