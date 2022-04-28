@extends('layouts.admin.tutor-layout')
@section('content')
<div class="content-main">
    <div class="content-mid">
        <div class="col-md-12 mid-content-top">
            <div class="middle-content">
                <div class="col-md-6">
                    <h2>Thêm thông tin Chuyên ngành</h2>
                </div>
                <br>
                <div class="col-md-12">
                    @if(Session::has('msg'))
                            <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
                        @endif
                    <form action="" method="POST">
                        @csrf
                        <div>
                            <label for="">Chuyên ngành</label>
                            <input class="form-control" type="text" name="name">
                        </div>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div>
                            <label for="">Phòng ban</label>
                            <select name="department_id" class="form-select form-control" aria-label="Default select example">
                                @foreach($departments as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div>
                            <button type="submit" class="btn btn-warning">Thêm mới</button>
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