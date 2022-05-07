@extends('welcome')
@section('clients')
<section class="w3l-bottom-grids-6 pb-lg-5 text-center" id="services">
        <div class="container">
            <div class="grids-area-hny main-cont-wthree-fea row">
                <div class="col-4">
                    <div class="area-box color-2">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <h4><a class="title-head" style="text-decoration: none;">{{$countttp}} khóa học</a></h4>
                        <h4></h4>
                    </div>
                </div>
                <div class="col-4">
                    <div class="area-box color-3">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <h4><a class="title-head" style="text-decoration: none;">{{$countgv}} giảng viên</a></h4>
                    </div>
                </div>
                <div class="col-4">
                    <div class="area-box color-4">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        <h4><a class="title-head" style="text-decoration: none;">{{$countsv}} sinh viên tham gia</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //banner bottom section -->

    <div id="courses" class="course">
        <!-- courses section -->
        <div class="w3l-grids-block-5 py-5">
            <div class="container py-md-5 py-4">
                <div class="title-heading-w3 text-center mx-auto mb-5 pb-sm-4">
                    <h3 class="title-main">Khóa học <span>Sắp diễn ra</span></h3>
                </div>
                <div class="row">
                    @foreach($classmateTutor as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-card-single">
                            <div class="grids5-info position-relative">
                                <img src="{{asset('base/images/c1.jpg')}}" alt="" class="img-fluid" />
                            </div>
                            <div class="content-main-top">
                                <div class="content-top mb-4 mt-3">
                                    <ul class="list-unstyled d-flex align-items-center justify-content-between">
                                        <li>
                                            <i class="fa fa-signal" aria-hidden="true"> {{$item->classmateBelongTo->name}}</i>
                                        </li>
                                        <li>
                                            <i class="fa fa-clock-o" aria-hidden="true"> Ngày học: {{$item->date}}</i>
                                        </li>
                                    </ul>
                                </div>
                                <h4><a href="#courses" style="text-decoration: none;">Tên lớp học: {{$item->name}}</a></h4>
                                <p>Giảng viên:{{ $item->usersBelongTo->name }} </p>
                                <p>Thông tin thêm: {{$item->information}}</p>
                                <a class="btn btn-style btn-style-primary" href="{{route('detail.classmatetutor',['id'=>$item->id])}}">Xem chi tiết<i class="fa fa-arrow-right ml-2" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- //courses section -->
    </div>

    <div class="Instructors" id="Instructors">
        <!-- team section -->
        <section class="w3l-team py-sm-5 pb-sm-0 pb-5">
            <div class="container py-md-5 py-4">
                <div class="title-heading-w3 text-center mx-auto mb-5 pb-sm-4">
                    <h3 class="title-main">Giảng viên có trình độ <span>Quốc Tế</span></h3>
                </div>
                <div class="row text-center">
                    <div class="col-lg-3 col-sm-6">
                        <div class="team-block-single">
                            <div class="team-grids">
                                <a href="#team-single">
                                    <img src="{{asset('base/images/team1.jpg')}}" class="img-fluid" alt="">
                                    <div class="team-info">
                                        <div class="social-icons-section">
                                            <a class="fac" href="#facebook">
                                                <span class="fa fa-facebook"></span>
                                            </a>
                                            <a class="twitter mx-2" href="#twitter">
                                                <span class="fa fa-twitter"></span>
                                            </a>
                                            <a class="google" href="#google-plus">
                                                <span class="fa fa-google-plus"></span>
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="team-bottom-block p-4">
                                <h5 class="member mb-1"><a href="#team" style="text-decoration: none;">Trần Hữu Thiện</a></h5>
                                <small>Giảng viên Back-end</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mt-sm-0 mt-5">
                        <div class="team-block-single">
                            <div class="team-grids">
                                <a href="#team-single">
                                    <img src="{{asset('base/images/team2.jpg')}}" class="img-fluid" alt="">
                                    <div class="team-info">
                                        <div class="social-icons-section">
                                            <a class="fac" href="#facebook">
                                                <span class="fa fa-facebook"></span>
                                            </a>
                                            <a class="twitter mx-2" href="#twitter">
                                                <span class="fa fa-twitter"></span>
                                            </a>
                                            <a class="google" href="#google-plus">
                                                <span class="fa fa-google-plus"></span>
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="team-bottom-block p-4">
                                <h5 class="member mb-1 active"><a href="#team" style="text-decoration: none;">Nguyễn Tuyết Mai</a></h5>
                                <small>Giảng viên Back-end</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mt-lg-0 mt-5">
                        <div class="team-block-single">
                            <div class="team-grids">
                                <a href="#team-single">
                                    <img src="{{asset('base/images/team3.jpg')}}" class="img-fluid" alt="">
                                    <div class="team-info">
                                        <div class="social-icons-section">
                                            <a class="fac" href="#facebook">
                                                <span class="fa fa-facebook"></span>
                                            </a>
                                            <a class="twitter mx-2" href="#twitter">
                                                <span class="fa fa-twitter"></span>
                                            </a>
                                            <a class="google" href="#google-plus">
                                                <span class="fa fa-google-plus"></span>
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="team-bottom-block p-4">
                                <h5 class="member mb-1"><a href="#team" style="text-decoration: none;">Trần Thái Sơn </a></h5>
                                <small>Giảng viên Back-end</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mt-lg-0 mt-5">
                        <div class="team-block-single">
                            <div class="team-grids">
                                <a href="#team-single">
                                    <img src="{{asset('base/images/team4.jpg')}}" class="img-fluid" alt="">
                                    <div class="team-info">
                                        <div class="social-icons-section">
                                            <a class="fac" href="#facebook">
                                                <span class="fa fa-facebook"></span>
                                            </a>
                                            <a class="twitter mx-2" href="#twitter">
                                                <span class="fa fa-twitter"></span>
                                            </a>
                                            <a class="google" href="#google-plus">
                                                <span class="fa fa-google-plus"></span>
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="team-bottom-block p-4">
                                <h5 class="member mb-1"><a href="#team" style="text-decoration: none;">Nguyễn Văn Đạt</a></h5>
                                <small>Giảng viên Front-end</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- //team setion -->
        <div id="contact" class="contact">
            <!-- contact -->
            <section class="w3l-contact py-5" id="contact">
                <div class="container py-md-5 py-4 mb-5">
                    <div class="mx-auto" style="max-width:1000px">
                        <div class="row contact-block">
                            <div class="col-md-5 contact-left">
                                <h3 class="font-weight-bold mb-md-5 mb-4">Liên hệ với chúng tôi</h3>
                                <div class="cont-details">
                                    <div class="d-flex contact-grid">
                                        <div class="cont-left text-center mr-3">
                                            <span class="fa fa-globe"></span>
                                        </div>
                                        <div class="cont-right">
                                            <h6>Địa chỉ Công ty</h6>
                                            <p>92A, Nguyễn Trãi - Thanh Xuân - Hà Nội</p>
                                        </div>
                                    </div>
                                    <div class="d-flex contact-grid mt-4 pt-lg-2">
                                        <div class="cont-left text-center mr-3">
                                            <span class="fa fa-phone"></span>
                                        </div>
                                        <div class="cont-right">
                                            <h6>Liên hệ với chúng tôi</h6>
                                            <p><a href="tel:+1(21) 234 4567" style="text-decoration: none;">0989100123</a></p>
                                        </div>
                                    </div>
                                    <div class="d-flex contact-grid mt-4 pt-lg-2">
                                        <div class="cont-left text-center mr-3">
                                            <span class="fa fa-envelope-open"></span>
                                        </div>
                                        <div class="cont-right">
                                            <h6>Email của chúng tôi</h6>
                                            <p><a href="mailto:example@mail.com" class="mail" style="text-decoration: none;">example@mail.com</a></p>
                                        </div>
                                    </div>
                                    <div class="d-flex contact-grid mt-4 pt-lg-2">
                                        <div class="cont-left text-center mr-3">
                                            <span class="fa fa-headphones"></span>
                                        </div>
                                        <div class="cont-right">
                                            <h6>Hỗ trợ khách hàng</h6>
                                            <p><a href="mailto:info@support.com" class="mail" style="text-decoration: none;">info@support.com</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 mt-md-0 mt-4">
                                <div class="map-iframe">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.863855881457!2d105.74459841535469!3d21.038132792833228!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b991d80fd5%3A0x53cefc99d6b0bf6f!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1642649988580!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                </div>
                            </div>
                        </div>
                        <!-- //contact form -->
                    </div>
                </div>
            </section>
        </div>
    </div>
    @endsection