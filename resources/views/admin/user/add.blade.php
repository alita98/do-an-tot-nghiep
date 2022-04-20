@extends('layouts.admin.admin-layout')
@section('content')
    <div class="content-mid">
        <div class="col-md-12 mid-content-top">
            <div class="middle-content">
                <div>
                    <h2>Thêm mới người dùng</h2>
                </div>
                <div class="">
                    @if(Session::has('msg'))
                            <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
                        @endif
                    <form action="" method="POST">
                        @csrf
                        <div>
                            <label for="">Name</label>
                            <input class="form-control" type="text" name="name">
                        </div>
                        <div>
                            <label for="">Email</label>
                            <input class="form-control" type="text" name="email">
                        </div>
                        <div>
                            <label for="">Password</label>
                            <input class="form-control" type="password" name="password">
                        </div>
                        <div>
                            <label for="">Role</label>
                            <select name="role" class="form-select" aria-label="Default select example">
                                <option value="TT">Tutor</option>
                                <option value="USR">User</option>
                            </select>
                        </div>
                        <br>
                        <div>
                            <button class="btn btn-success" type="submit">Add New</button>
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