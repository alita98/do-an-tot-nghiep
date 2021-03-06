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
                
             
                    <h2>Danh sách sinh viên đăng kí tham gia</h2>
            
               
                <div>
                <a href="{{route('export-tasks',['id'=>$classmateTutor->id])}}" id="export" onclick="exportTasks(event.target);" class="btn btn-primary">Xuất file excel</a>

                    <table class="table">
                        @csrf
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Họ và tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Trạng thái điểm danh
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
                                    <td scope="row">
                                        @if($item->action_id == 1)
                                            Da tham gia
                                        
                                       
                                        @elseif($item->action_id == 2)
                                            Da diem danh
                                        
                                        @endif
                                            
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
            <script>
                function exportTasks(_this) {
                   let _url = $(_this).data('href');
                   window.location.href = _url;
                }
             </script>
        </div>
        <div class="clearfix"> </div>
    </div>
    
</div>
@endsection