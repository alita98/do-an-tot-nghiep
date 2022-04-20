<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('auth/css/style.css')}}">

</head>

<body class="img js-fullheight" style="background-image: url(auth/images/bg.jpg);">

    @if(session('alert'))
     <section class='alert alert-success'>{{session('alert')}}</section>
    @endif

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Đăng nhập</h2>

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        @if (session('msg'))
                        <p class="text-danger bg-light text-center">{{ session('msg') }}</p>
                        @elseif (session('msg1'))
                        <p class="text-danger bg-light text-center">{{ session('msg1') }}</p>
                        @else
                        <p class="login-box-msg"></p>
                        @endif
                        <form action="" class="signin-form" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" name="password" type="password" class="form-control"
                                    placeholder="Mật Khẩu" required>
                                <span toggle="#password-field"
                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Đăng nhập</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Ghi nhớ tài khoản
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="{{route('register')}}" style="color: #fff">Bạn chưa có tài khoản?</a>
                                </div>
                            </div>
                        </form>
                        <p class="w-100 text-center"><a href="">&mdash; Quên mật khẩu &mdash;</a></p>
                        <p class="w-100 text-center">&mdash; Hoặc đăng nhập bằng &mdash;</p>
                        <div class="social d-flex text-center">
                            <a href="{{route('login.google')}}" class="px-2 py-2 mr-md-1 rounded">Đăng nhập với Google</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{asset('auth/js/jquery.min.js')}}"></script>
    <script src="{{asset('auth/js/popper.js')}}"></script>
    <script src="{{asset('auth/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('auth/js/main.js')}}"></script>

</body>

</html>