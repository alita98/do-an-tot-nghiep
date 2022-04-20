@extends('layouts.admin.tutor-layout')
@section('content')
<div class="content-main">
    <div class="content-mid">
        <div class="col-md-12 mid-content-top">
            <div class="middle-content">
                <div class="col-md-12">
                    <h2>Danh sách Phòng ban</h2>
                </div>
                <div class="col-md-12">
                @if(Session::has('msg'))
                        <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
                    @endif
                </div>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên phòng ban</th>
                                <th scope="col">Thông tin chi tiết</th>
                                <th scope="col">
                                    <a href="{{route('tutor.department.add')}}" class="btn btn-primary">Thêm mới</a>
                                </th>
                            </tr>
                        </thead>
                        @php
                        $stt = 1;
                    @endphp
                        <tbody>
                            @foreach($departments as $item)
                                <tr>
                                    <th scope="row">{{$stt++}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->information}}</td>
                                    <td>
                                        <a href="{{route('tutor.department.edit',['id'=>$item->id])}}" class="btn btn-warning">Sửa</a>
                                        <a href="{{route('tutor.department.delete',['id'=>$item->id])}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
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