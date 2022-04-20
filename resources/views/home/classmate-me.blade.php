@extends('welcome')
@section('clients')
    <div id="courses" class="course">
        <!-- courses section -->
        <div class="w3l-grids-block-5 py-5">
            <div class="container py-md-5 py-4">
                <div class="title-heading-w3 text-center mx-auto mb-5 pb-sm-4">
                    <h3 class="title-main">Khóa học <span>Của bạn</span></h3>
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
                                            <i class="fa fa-signal" aria-hidden="true"> {{$item->name_classmate}}</i>
                                        </li>
                                        <li>
                                            <i class="fa fa-clock-o" aria-hidden="true"> Ngày học: {{$item->date_classmatetutor}}</i>
                                        </li>
                                    </ul>
                                </div>
                                <h4><a href="#courses" style="text-decoration: none;">Tên lớp học: {{$item->name_classmate_tutor}}</a></h4>
                                <p>Giảng viên: {{$item->name_tutor}}</p>
                                <p>Thông tin thêm: {{$item->information_classmatetutor}}</p>
                                <a class="btn btn-style btn-style-primary" href="">Xem chi tiết<i class="fa fa-arrow-right ml-2" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- //courses section -->
    </div>
    @endsection