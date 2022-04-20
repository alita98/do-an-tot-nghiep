@extends('layouts.admin.tutor-layout')
@section('content')
<div class="content-main">
    <div class="banner">
    </div>
    <div class="content-top">
        <div class="clearfix"> </div>
    </div>
    <div class="content-mid">
        <div class="col-md-12 mid-content-top">
        <div class="middle-content">
                <div class="col-md-6">
                    <h2>Danh sách Lớp học hôm nay</h2>
                </div>
                <div>
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Information</th>
                                <th scope="col">Link</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Classmate_id</th>
                                <th scope="col">Số sinh viên đã tham gia</th>
                                <th scope="col">Danh sách sinh viên</th>
                                <th scope="col">
                                    <a href="{{route('tutor.classmatetutor.add')}}" class="btn btn-primary">Thêm mới</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($classmateTutorToday as $item)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->information}}</td>
                                    <td><a href="{{$item->link}}">Link phòng học</a></td>
                                    <td>{{$item->date}}</td>
                                    <td>{{$item->start_time}} - {{$item->end_time}}</td>
                                    <td>{{$item->classmateBelongTo->name}}</td>
                                    <td>{{count($item->listStudent)}}</td>
                                    <td>
                                        <a href="{{route('tutor.classmatetutor.detail',['id'=>$item->id])}}" class="btn btn-info">Xem chi tiết</a>
                                    </td>
                                    <td>
                                        <a href="{{route('tutor.classmatetutor.edit',['id'=>$item->id])}}" class="btn btn-warning">Sửa</a>
                                        <a href="{{route('tutor.classmatetutor.delete',['id'=>$item->id])}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        <div class="middle-content">
            <form action="" method="GET">
                <div>
                    <label for="" >Thời gian</label>
                    <select name="order_by" class="form-select">
                        @foreach(config('common.classmateTutor_order_by') as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select><br>
                    <h6>Lựa chọn thời gian để hiển thị chi tiết lịch học</h6>
                </div><br>
                    <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                </div><br>
            </form>
        </div>
            <div class="middle-content">
                <div class="col-md-6">
                    <h2>Danh sách Lớp học</h2>
                </div>
                <div>
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Information</th>
                                <th scope="col">Link</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Classmate_id</th>
                                <th scope="col">Số sinh viên đã tham gia</th>
                                <th scope="col">Danh sách sinh viên</th>
                                <th scope="col">
                                    
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($classmateTutor as $item)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$item->name}}</td>
                                    <td><img src="{{asset('storage/'. $item->image)}}" alt="" width="200"></td>
                                    <td>{{$item->information}}</td>
                                    <td><a href="{{$item->link}}">Link phòng học</a></td>
                                    <td>{{$item->date}}</td>
                                    <td>{{$item->start_time}} - {{$item->end_time}}</td>
                                    <td>{{$item->classmateBelongTo->name}}</td>
                                    <td>{{count($item->listStudent)}}</td>
                                    <td>
                                        <a href="{{route('tutor.classmatetutor.detail',['id'=>$item->id])}}" class="btn btn-info">Xem chi tiết</a>
                                    </td>
                                    <td>
                                        <a href="{{route('tutor.classmatetutor.edit',['id'=>$item->id])}}" class="btn btn-warning">Sửa</a>
                                        <a href="{{route('tutor.classmatetutor.delete',['id'=>$item->id])}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <link href="{{asset('dashboard/css/owl.carousel.css')}}" rel="stylesheet">
            <script src="{{asset('dashboard/js/owl.carousel.js')}}"></script>
            <script>
                $(document).ready(function() {
                    $("#owl-demo").owlCarousel({
                        items : 3,
                        lazyLoad : true,
                        autoPlay : true,
                        pagination : true,
                        nav:true,
                    });
                });
            </script>
        </div>
        <div class="clearfix"> </div>
    </div>
    
</div>
@endsection