<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí</title>
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
                        <img class="login_header-img" src="https://www.fullstack.co.za/img/logobig2.png" alt="">  
                        <h1>Đăng kí tài khoản</h1>
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger text-center">Đăng kí không thành công!</div>
                    @endif
                    <div class="login_body">
                        <form method="post" action="{{ route('registerPost')}}" class="form_login">
                            @csrf
                            <div class="form_item">
                                <label class="label_login" for="">Họ và tên: </label>
                                <input class="input_login" type="text" name="fullname" value="{{old('fullname')}}" placeholder="Nhập đầy đủ họ và tên của bạn">
                                @error('fullname')
                                    <div class="form_input-message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form_item">
                                <label class="label_login" for="">Email: </label>
                                <input class="input_login" type="email" name="email" value="{{old('email')}}" placeholder="Nhập đúng email của bạn">
                                @error('email')
                                    <div class="form_input-message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form_item">
                                <label class="label_login" for="">Tên đăng nhập: </label>
                                <input class="input_login" type="text" name="name" value="{{old('name')}}" placeholder="Nhập tên đăng nhập cần đăng kí của bạn">
                                @error('name')
                                    <div class="form_input-message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form_item">
                                <label class="label_login" for="">Mật khẩu: </label>
                                <input class="input_login" type="password" value="{{old('password')}}" name="password" placeholder="Nhập mật khẩu của bạn">
                                @error('password')
                                    <div class="form_input-message">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- <div class="form_item">
                                <label class="label_login" for="">ADMIN:  </label>
                                <input class="input_login" type="text" value="{{old('is_admin')}}" name="is_admin" placeholder="Là admin thì nhập số 1">
                                @error('password')
                                    <div class="form_input-message">{{ $message }}</div>
                                @enderror
                            </div> -->
                            <div class="btn-submit">
                                <input class="input-submit" type="submit" value="Đăng kí">
                            </div>
                            
                        </form>
                        <p class="login_dontHaveAcc">Bạn đã có tài khoản?<a class="login_dontHaveAcc-a" href="{{ route('login') }}">Đăng nhập</a></p>
                            <div class="login_container-bottom">
                                Việc bạn tiếp tục sử dụng trang web này đồng nghĩa bạn đồng ý với<a class="login_dontHaveAcc-a" href="">Điều khoản sử dụng</a>
                                của chúng tôi
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>