@extends('layouts.admin.tutor-layout')
@section('content')
<div class="content-main">
    <div class="content-mid">
        <div class="col-md-12 mid-content-top">
            <div class="middle-content">
                <div class="col-md-12">
                    <h2>Thêm thông tin Môn học</h2>
                </div>
                <div class="col-md-12">
                    <a href="{{route('tutor.classmate.list')}}" class="btn btn-success">Xem tất cả</a>
                </div>
                <div class="col-md-12">
                    @if(Session::has('msg'))
                            <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
                        @endif
                    <form action="" method="POST">
                        @csrf
                        <div>
                            <label for="">Name</label>
                            <input class="form-control" type="text" name="name" value="{{$classmates->name}}">
                        </div>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div>
                            <label for="">Chuyên ngành</label>
                            <select class="form-select" aria-label="Default select example" name="major_id" value="{{$classmates->name}}">
                                @foreach($majors as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="">Số buổi</label>
                            <input class="form-control" type="text" name="number" value="{{$classmates->number}}">
                        </div>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div>
                            <label for="">Thông tin thêm</label>
                            <input class="form-control" type="text" name="information" value="{{$classmates->information}}">
                        </div>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>
                        <div>
                            <button type="submit" class="btn btn-primary">Sửa</button>
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