<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700;900&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('global/global.css')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>

<body>
    <div id="root">
        <div class="login_wrapper">
            <div class="login_container">
                <div class="login_content">

                    <div class="login_header">
                        <a class="login_header" href="/">
                            <img class="login_header-img" src="https://www.fullstack.co.za/img/logobig2.png" alt="">
                            <h1>Đăng nhập vào FullStack</h1>

                        </a>
                    </div>
                    @if(session('message'))
                    <div class="alert alert-success text-center">{{session('message')}}</div>
                    @endif
                    @if(session('msg'))
                    <div class="alert alert-danger text-center">{{session('msg')}}</div>
                    @endif
                    @if($errors->any())
                    <div class="alert alert-danger text-center">Đăng nhập không thành công!</div>
                    @endif
                    <div class="login_body">
                        <form action="{{route('loginPost')}}" method="post" class="form_login">
                            @csrf
                            <div class="form_item">
                                <label class="label_login" for="">Tên đăng nhập: </label>
                                <input class="input_login" type="text" name="name" value="{{old('name')}}">
                                @error('name')
                                <div class="form_input-message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form_item">
                                <label class="label_login" for="">Mật khẩu: </label>
                                <input class="input_login" type="password" name="password" value="{{old('password')}}">
                                @error('password')
                                <div class="form_input-message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="btn-submit">
                                <input class="input-submit" type="submit" value="Đăng nhập">
                            </div>

                        </form>
                        <p class="login_dontHaveAcc">Bạn chưa có tài khoản?<a class="login_dontHaveAcc-a" href="{{ route('register') }}">Đăng kí</a></p>

                    </div>
                    <div class="login_container-bottom">
                        Việc bạn tiếp tục sử dụng trang web này đồng nghĩa bạn đồng ý với<a class="login_dontHaveAcc-a" href="">Điều khoản sử dụng</a>
                        của chúng tôi
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>