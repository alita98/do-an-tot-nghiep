@extends('layouts.admin.admin-layout')
@section('content')
<div class="content-main">
    <div class="content-mid">
        <div class="col-md-12 mid-content-top">
            <div class="middle-content">
                <div class="col-md-12">
                    <h2>Danh sách Người dùng của Tôi</h2>
                </div>
                <div class="col-md-12">
                    @if(Session::has('msg'))
                            <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
                        @endif
                    <form action="" method="POST">
                        @csrf
                        <div>
                            <label for="">Name</label>
                            <input class="form-control" type="text" name="name" value="{{$user->name}}">
                        </div>
                        <div>
                            <label for="">Email</label>
                            <input class="form-control" type="text" name="email" value="{{$user->email}}">
                        </div>
                        <div>
                            <input class="form-control" type="hidden" name="password" value="{{$user->password}}">
                        </div>
                        <div>
                            <label for="">Role</label>
                            <select name="role" class="form-select" >
                                <option value="TT">TT</option>
                                <option value="USR">USR</option>
                            </select>
                        </div>
                        <br>
                        <div>
                            <button class="btn btn-success" type="submit">Update</button>
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