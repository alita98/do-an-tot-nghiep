
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Fpoly Tutor</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="{{asset('dashboard/css/ready.css')}}">
	<link rel="stylesheet" href="{{asset('dashboard/css/demo.css')}}">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    
</head>
    <body>
        <div id="wrapper">
        <div class="main-header">
			<div class="logo-header" style="padding-top: 10px;">
				<a href="" class="logo" style="text-decoration: none;color: red;text-align: center;">
					<h3 style="font-weight: 1000;">FPOLY TUTOR</h3>
				</a>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">
					<form class="navbar-left navbar-form nav-search mr-md-3" action="">
						<div class="input-group">
							<input type="text" placeholder="tìm kiếm..." class="form-control" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Tìm kiếm...';}">
                            <input class="input-group-text" type="submit" value="" class="fa fa-search">
							<div class="input-group-append">
								<span>
                                <i class="fa-solid fa-magnifying-glass"></i>
								</span>
							</div>
						</div>
					</form>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav ml-lg-auto">
                            @if(Route::has('login'))
                            @auth
                            @if(Auth::user()->role==="ADM")

                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    {{Auth::user()->name}}
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('UserProfile')}}">Thông tin cá nhân</a></li>
                                    <li><a class="dropdown-item" href="">Bảng điều khiển</a></li>
                                    <li><a class="dropdown-item" href="{{route('logout')}}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng
                                            xuất</a></li>
                                </ul>
                            </div>
                            @elseif(Auth::user()->role==="TT")
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    {{Auth::user()->name}}
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="">Thông tin cá nhân</a></li>
                                    <li><a class="dropdown-item" href="">Bảng điều khiển</a></li>
                                    <li><a class="dropdown-item" href="{{route('logout')}}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng
                                            xuất</a></li>
                                </ul>
                            </div>
                            @endif
                            <form action="{{route('logout')}}" id="logout-form" method="GET">
                                @csrf
                            </form>
                            @else
                            <li style="padding-left: 10px" class="login-form"><a href="{{route('register')}}"
                                    title="Register" style="text-decoration: none; color: black;">Đăng ký</a></li>
                            <li style="padding: 10px" title="Login"class="login-form"><a href="{{route('login')}}" title="Login" style="text-decoration: none;color: black;">Đăng
                                    nhập</a></li>
                            @endif
                            @endif
                            <!-- //search button -->
                        </ul>
                    </div>
				</div>
                
			</nav>
			</div>
            <div class="main-panel">
				<div class="content">
					<div class="container-fluid">
						<div class="row">
                            <div class="col-md-12">
                                @yield('sidebar')
                            </div>

						</div>
						
					</div>
				</div>
				<footer class="footer">
					<div class="container-fluid">
						<nav class="pull-left">
						</nav>
						<div class="copyright ml-auto">
							
						</div>				
					</div>
				</footer>
			</div>
            
        </div>
    </body>
    <script src="{{asset('dashboard/js/core/jquery.3.2.1.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
    <script src="{{asset('dashboard/js/core/popper.min.js')}}"></script>
    <script src="{{asset('dashboard/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugin/chartist/chartist.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugin/jquery-mapael/jquery.mapael.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugin/jquery-mapael/maps/world_countries.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugin/chart-circle/circles.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
    <script src="{{asset('dashboard/js/ready.min.js')}}"></script>
    <script src="{{asset('dashboard/js/demo.js')}}"></script>
</html>

