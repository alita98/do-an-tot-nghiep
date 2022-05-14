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
    <link href="{{asset('assets/css/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/index.css')}}" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{asset('assets/css/light-bootstrap-dashboard.css?v=1.4.0')}}" rel="stylesheet" />


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('assets/css/demo.css')}}" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <!-- <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css')}}" rel="stylesheet"> -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <p>
                                    {{Auth::user()->name}}
                                    <b class="caret"></b>
                                </p>

                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('UserProfile')}}">Thông tin cá
                                        nhân</a></li>
                                <li><a class="dropdown-item" href="{{route('logout')}}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng
                                        xuất</a></li>
                                <form action="{{route('logout')}}" id="logout-form" method="GET">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                        <li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="sidebar" data-color="purple" data-image="{{asset('assets/img/sidebar-5.jpg')}}">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="http://www.creative-tim.com" class="simple-text">
                        Fpoly Tutor
                    </a>
                </div>

                <ul class="nav">
                    <li class="">
                        <a href="{{route('tutor.dashboard')}}">
                            <i class="pe-7s-graph"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('tutor.classmatetutor.list')}}">
                            <i class="pe-7s-note2"></i>
                            <p>Lịch Tutor</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('tutor.classmate.list')}}">
                            <i class="pe-7s-news-paper"></i>
                            <p>Môn học</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('tutor.major.list')}}">
                            <i class="pe-7s-note2"></i>
                            <p>Chuyên ngành</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('tutor.department.list')}}">
                            <i class="pe-7s-news-paper"></i>
                            <p>Phòng ban</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="header">
                            <h4 class="title text-center">Thống kê lượng sinh viên tham gia lớp của bạn</h4>
                            <p class="category text-center">Tính trên đầu người</p>
                        </div>
                        <div class="content">
                            <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                            <div class="footer">
                                <div class="legend d-flex justify-content-center">
                                    <i class="fa fa-circle text-info"></i> Tham gia
                                    <i class="fa fa-circle text-danger"></i> Không tham gia
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card ">
                        <div class="header">
                            <h4 class="title">Thống kê đánh giá tutor trong tháng {{$monthnow}}/{{$year}} </h4>
                            <p class="category">Đánh giá bởi sinh viên tham dự khóa học</p>
                        </div>
                        <div class="content">
                            <div id="chartActivity" class="ct-chart"></div>

                            <div class="footer">
                                <div class="legend">
                                    <i class="fa fa-circle text-info"></i> Tốt
                                    <i class="fa fa-circle text-warning"></i> Bình thường
                                    <i class="fa fa-circle text-danger"></i> Tệ
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
$(document).ready(function() {

    demo.initChartist();

    // $.notify({
    // 	icon: 'pe-7s-gift',
    // 	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

    // },{
    //     type: 'info',
    //     timer: 4000
    // });

});
type = ['', 'info', 'success', 'warning', 'danger'];


demo = {
    initPickColor: function() {
        $('.pick-class-label').click(function() {
            var new_class = $(this).attr('new-class');
            var old_class = $('#display-buttons').attr('data-class');
            var display_div = $('#display-buttons');
            if (display_div.length) {
                var display_buttons = display_div.find('.btn');
                display_buttons.removeClass(old_class);
                display_buttons.addClass(new_class);
                display_div.attr('data-class', new_class);
            }
        });
    },

    checkScrollForTransparentNavbar: debounce(function() {
        $navbar = $('.navbar[color-on-scroll]');
        scroll_distance = $navbar.attr('color-on-scroll') || 500;

        if ($(document).scrollTop() > scroll_distance) {
            if (transparent) {
                transparent = false;
                $('.navbar[color-on-scroll]').removeClass('navbar-transparent');
                $('.navbar[color-on-scroll]').addClass('navbar-default');
            }
        } else {
            if (!transparent) {
                transparent = true;
                $('.navbar[color-on-scroll]').addClass('navbar-transparent');
                $('.navbar[color-on-scroll]').removeClass('navbar-default');
            }
        }
    }, 17),

    initChartist: function() {

        var dataSales = {
            labels: ['9:00AM', '12:00AM', '3:00PM', '6:00PM', '9:00PM', '12:00PM', '3:00AM', '6:00AM'],
            series: [
                [287, 385, 490, 492, 554, 586, 698, 695, 752, 788, 846, 944],
                [67, 152, 143, 240, 287, 335, 435, 437, 539, 542, 544, 647],
                [23, 113, 67, 108, 190, 239, 307, 308, 439, 410, 410, 509]
            ]
        };

        var optionsSales = {
            lineSmooth: false,
            low: 0,
            high: 800,
            showArea: true,
            height: "245px",
            axisX: {
                showGrid: false,
            },
            lineSmooth: Chartist.Interpolation.simple({
                divisor: 3
            }),
            showLine: false,
            showPoint: false,
        };

        var responsiveSales = [
            ['screen and (max-width: 640px)', {
                axisX: {
                    labelInterpolationFnc: function(value) {
                        return value[0];
                    }
                }
            }]
        ];

        Chartist.Line('#chartHours', dataSales, optionsSales, responsiveSales);


        var data = {
            labels: <?= $names ?>,,
            series: [
                [20, 19],
                [20, 19],
                [20, 19],
            ]
        };

        var options = {
            seriesBarDistance: 10,
            axisX: {
                showGrid: false
            },
            height: "245px"
        };

        var responsiveOptions = [
            ['screen and (max-width: 640px)', {
                seriesBarDistance: 5,
                axisX: {
                    labelInterpolationFnc: function(value) {
                        return value[0];
                    }
                }
            }]
        ];

        Chartist.Bar('#chartActivity', data, options, responsiveOptions);

        var dataPreferences = {
            series: [
                [25, 30, 20, 25]
            ]
        };

        var optionsPreferences = {
            donut: true,
            donutWidth: 40,
            startAngle: 0,
            total: 100,
            showLabel: false,
            axisX: {
                showGrid: false
            }
        };

        Chartist.Pie('#chartPreferences', dataPreferences, optionsPreferences);

        Chartist.Pie('#chartPreferences', {
            labels: ['<?php echo e($percentStdJoined); ?>%','<?php echo e($percentStdNotParticipate); ?>%'],
            series: [<?php echo e($percentStdJoined); ?>, <?php echo e($percentStdNotParticipate); ?>]
        });
    },
}
</script>



</html>