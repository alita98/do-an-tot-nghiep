@extends('layouts.admin.tutor-layout')
@section('content')
<div class="content-main">

    <div class="content-mid">
        <div class="col-md-12 mid-content-top">
            <div class="middle-content">
                <div class="col-md-12">
                    <h2>Sửa thông tin Phòng ban</h2>
                </div>
                <div class="col-md-12">
                    <a href="{{route('tutor.department.list')}}" class="btn btn-success">Xem tất cả</a>
                </div>
                <div class="col-md-12">
                    @if(Session::has('msg'))
                            <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
                        @endif
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="">Name</label>
                            <input class="form-control" type="text" name="name" value="{{$departments->name}}">
                        </div>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror 
                        <div>
                            <label for="">Inforation</label>
                            <textarea class="form-control"  type="text" name="information" >{{$departments->information}}</textarea>
                        </div>
                        <br>
                        <div>
                            <button class="btn btn-success" type="submit" class="btn btn-warning">Sửa</button>
                        </div>
                    </form>
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