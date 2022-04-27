@extends('layouts.admin.tutor-layout')
@section('content')
<div class="content-main">
    <div class="content-top">
        <div class="clearfix"> </div>
    </div>
    <div class="content-mid">
        <div class="col-md-12 mid-content-top">
            <div class="middle-content">
                <div class="col-md-6">
                    <h2>Thêm mới tutor</h2>
                </div>
                <div class="col-md-12">
                    @if(Session::has('msg'))
                            <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
                        @endif
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="">Tên tutor</label>
                            <input class="form-control" type="text" name="name">
                        </div>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div>
                            <label for="">Thông tin chi tiết</label>
                            <textarea name="information" id="" class="form-control" placeholder="Nội dung buổi tutor"></textarea>
                            <!-- <input class="form-control" type="text" name="information"> -->
                        </div>
                        @error('information')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div>
                            <label for="">Link trực tuyến / Phòng học</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        @error('link')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div>
                            <label for="">Ngày diễn ra</label>
                            <input class="form-control" type="date" name="date" min="{{$date}}">
                        </div>
                        @error('date')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div>
                            <label for="">Thời gian bắt đầu</label>
                            <input class="form-control" type="time" name="start_time">
                        </div>
                        @error('start_time')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div>
                            <label for="">Thời gian dự kiến kết thúc</label>
                            <input class="form-control" type="time" name="end_time">
                        </div>
                        @error('end_time')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div>
                            <input class="form-control" type="hidden" name="user_id" value="{{$idUser}}">
                        </div>
                        <div>
                            <label for="">Môn học</label>
                            <select class="form-select form-control" aria-label="Default select example" name="classmate_id">
                            @foreach($classmate as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <br>
                        <div>
                            <button class="btn btn-primary" type="submit" class="btn btn-warning">Thêm mới</button>
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