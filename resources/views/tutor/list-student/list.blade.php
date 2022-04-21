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
            <div class="middle-content row">
                <div class="col-10">
                    <h2>Danh sách Sinh viên</h2>
                </div>
                <div class="col-2">
                <button type="button" class="btn btn-info">Thống kê</button>
                </div>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên sinh viên</th>
                                <th scope="col">Email</th>
                                <th scope="col">
                                    
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                        $stt = 1;
                        @endphp
                            @foreach($listStudent as $item)
                                <tr>
                                    <td scope="row">{{$stt++}}</td>
                                    <td scope="row">{{$item->name_student}}</td>
                                    <td scope="row">{{$item->email}}</td>
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