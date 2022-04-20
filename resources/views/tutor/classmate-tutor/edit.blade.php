@extends('layouts.admin.tutor-layout')
@section('content')
<div class="content-main">
    <div class="content-mid">
        <div class="col-md-12 mid-content-top">
            <div class="middle-content">
                <div class="col-md-6">
                    <h2>Cập nhật lớp học</h2>
                </div>
                <div class="col-md-6">
                    <a href="{{route('tutor.classmatetutor.list')}}" class="btn btn-success">Xem tất cả</a>
                </div>
                <div class="col-md-12">
                    @if(Session::has('msg'))
                            <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
                        @endif
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="">Name</label>
                            <input class="form-control" type="text" name="name" value="{{$classmateTutor->name}}">
                        </div>
                        <!-- <div>
                            <label for="">Image</label>
                            <input class="form-control" type="file" name="file_upload">
                        </div> -->
                        <div>
                            <label for="">Inforation</label>
                            <input class="form-control" type="text" name="information" value="{{$classmateTutor->information}}">
                        </div>
                        <div>
                            <label for="">Link</label>
                            <input class="form-control" type="text" name="link" value="{{$classmateTutor->link}}">
                        </div>
                        <div>
                            <label for="">Date</label>
                            <input class="form-control" type="date" name="date" value="{{$classmateTutor->date}}">
                        </div>
                        <div>
                            <label for="">Start Time</label>
                            <input class="form-control" type="time" name="start_time" value="{{$classmateTutor->start_time}}">
                        </div>
                        <div>
                            <label for="">End Time</label>
                            <input class="form-control" type="time" name="end_time" value="{{$classmateTutor->end_time}}">
                        </div>
                        <div>
                            <input class="form-control" type="hidden" disabled name="user_id" value="{{$classmateTutor->user_id}}">
                        </div>
                        <div>
                            <label for="">Classmate_id</label>
                            <select name="classmate_id" class="form-select" aria-label="Default select example" value="{{$classmateTutor->classmate_id}}">
                            @foreach($classmate as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                            </select>
                        </div><br>
                        <div>
                            <button class="btn btn-warning" type="submit">Update</button>
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