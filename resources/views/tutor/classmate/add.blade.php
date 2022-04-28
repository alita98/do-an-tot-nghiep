@extends('layouts.admin.tutor-layout')
@section('content')
<div class="content-main">
    <div class="content-mid">
        <div class="col-md-12 mid-content-top">
            <div class="middle-content">
                <div class="col-md-12">
                    <h2>Thêm Môn học</h2>
                </div>
                <div class="col-md-12">
                    @if(Session::has('msg'))
                            <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
                        @endif
                    <form action="" method="POST">
                        @csrf
                        <div>
                            <label for="">Môn học</label>
                            <input class="form-control" type="text" name="name">
                        </div>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div>
                            <label for="">Chuyên ngành</label>
                            <select name="major_id" class="form-select form-control" aria-label="Default select example">
                                @foreach($majors as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="">Số buổi</label>
                            <input class="form-control" type="number" min='1' name="number">
                        </div>
                        @error('number')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div>
                            <label for="">Thông tin thêm</label>
                            <textarea name="information" class="form-control" id=""></textarea>
                            <!-- <input class="form-control" type="text" name="information"> -->
                        </div>
                        @error('information')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>
                        <div>
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
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