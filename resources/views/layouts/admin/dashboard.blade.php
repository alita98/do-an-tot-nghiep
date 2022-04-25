<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="{{asset('assets/img/favicon.ico')}}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Tutor Fpoly</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{asset('assets/css/animate.min.css')}}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{asset('assets/css/light-bootstrap-dashboard.css?v=1.4.0')}}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('assets/css/demo.css')}}" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('assets/css/pe-icon-7-stroke.css')}}" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid">
            <div class="col-md-2"></div>
            <div class="navbar-header">
                
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
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
                                        <li><a class="dropdown-item" href="{{route('tutor.dashboard')}}">Bảng điều khiển</a></li>
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
                                        <li><a class="dropdown-item" href="{{route('UserProfile')}}">Thông tin cá nhân</a></li>
                                        <li><a class="dropdown-item" href="{{route('tutor.dashboard')}}">Bảng điều khiển</a></li>
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
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('sidebar')
</div>


</body>

    <!--   Core JS Files   -->
    <script src="{{asset('assets/js/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="{{asset('assets/js/chartist.min.js')}}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{asset('assets/js/bootstrap-notify.js')}}"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="{{asset('assets/js/light-bootstrap-dashboard.js?v=1.4.0')}}"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="{{asset('assets/js/demo.js')}}"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>

</html>


