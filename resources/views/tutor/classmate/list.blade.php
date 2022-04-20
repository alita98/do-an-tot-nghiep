@extends('layouts.admin.tutor-layout')
@section('content')
<div class="content-main">
    <div class="content-mid">
        <div class="col-md-12 mid-content-top">
            <div class="middle-content">
                <div class="col-md-12">
                    <h2>Danh sách Môn học</h2>
                </div>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên môn học</th>
                                <th scope="col">Chuyên Ngành</th>
                                <th scope="col">Số buổi</th>
                                <th scope="col">Thông tin thêm</th>
                                <th scope="col">
                                    <a href="{{route('tutor.classmate.add')}}" class="btn btn-primary">Thêm mới</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($classmates as $item)
                                <tr>
                                    <th scope="row">{{$item->id}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->majorBeLong->name}}</td>
                                    <td>{{$item->number}}</td>
                                    <td>{{$item->information}}</td>
                                    <td>
                                        <a href="{{route('tutor.classmate.edit',['id'=>$item->id])}}" class="btn btn-warning">Sửa</a>
                                        <a href="{{route('tutor.classmate.delete',['id'=>$item->id])}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
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