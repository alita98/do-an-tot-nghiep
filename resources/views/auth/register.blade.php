<!doctype html>
<html lang="en">
  <head>
  	<title>Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('auth/css/style.css')}}">

	</head>
	<body class="img js-fullheight" style="background-image: url(auth/images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Đăng ký tài khoản</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
                        @if(Session::has('msg'))
                            <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
                        @endif
                        <form action="" class="signin-form" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="Email">
                            </div>
                                @error('email')
                                <div class="alert alert-danger">
                                <span class="text-danger">{{$message}}</span>
                                </div>
                                @enderror
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Họ và tên">
                            </div>
                                @error('name')
                                <div class="alert alert-danger">
                                    <span class="text-danger">{{$message}}</span>
                                </div>
                                @enderror
                            <div class="form-group">
                                <input id="password-field" name="password" type="password" class="form-control" placeholder="Mật khẩu">
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <input id="password-field" name="password_confirmation" type="password" class="form-control" placeholder="Xác nhận mật khẩu">
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            @error('password_confirmation')
                                <div class="alert alert-danger">
                                    <span class="text-danger">{{$message}}</span>
                                </div>
                            @enderror
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Đăng ký tài khoản</button>
                            </div>
                        </form>
                        <div class="w-100 text-md-right">
                            <a href="{{route('login')}}" style="color: #fff">Bạn đã có tài khoản?</a>
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