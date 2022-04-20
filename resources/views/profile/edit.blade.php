@extends('welcome')
@section('clients')
<section class="w3l-team py-sm-5 pb-sm-0 pb-5">
    <div class="container py-md-5 py-4">
        <div class="row text-center">
            <div class="col-lg-3 col-sm-6">
                <div class="team-block-single">
                    <div class="team-grids">
                        <a href="#team-single">
                            <img src="{{$users->avatar}}" class="img-fluid" width="" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-sm-6">
                <div class="team-block-single" >
                    <div class="team-bottom-block p-4">
                        <h5 class="member mb-1" style="padding-bottom: 20px;"><a href="#team">Thông tin cá nhân</a></h5>
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                                <div class="col-2">
                                    <label for="name" class="col-form-label">Tên</label>
                                </div>
                                <div class="col-7">
                                    <input type="text" name="name" class="form-control" value="{{$users->name}}">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                                <div class="col-2">
                                    <label for="email" class="col-form-label">Email</label>
                                </div>
                                <div class="col-7">
                                    <input type="text" disabled name="email"  class="form-control" value="{{$users->email}}">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                                <div class="col-2 text-end">
                                    <label for="file" class="col-form-label">Avatar</label>
                                </div>
                                <div class="col-10">
                                    <input class="form-control" type="file" name="file_upload">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                                <div class="col-2">
                                    <label for="birth_date" class="col-form-label">Giới tính</label>
                                </div>
                                <div class="col-7">
                                    <select name="gender" id="disabledSelect" class="form-select">
                                        <option value="0">Nam</option>
                                        <option value="1">Nữ</option>
                                        <option value="2">Khác</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                                <div class="col-2">
                                    <label for="role" class="col-form-label" >Ngày sinh</label>
                                </div>
                                <div class="col-7">
                                    <input type="date" name="birth_date" class="form-control" value="{{$users->birth_date}}">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                                <div class="col-2">
                                    <label for="role" class="col-form-label" >Địa chỉ</label>
                                </div>
                                <div class="col-7">
                                    <input type="text" name="address" class="form-control" value="{{$users->address}}">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                                <div class="col-2">
                                    <label for="role" class="col-form-label" >Số điện thoại</label>
                                </div>
                                <div class="col-7">
                                    <input type="text" name="phone" class="form-control" value="{{$users->phone}}">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                                <div class="col-2">
                                    
                                </div>
                                <div class="col-8">
                                    <button class="btn btn-primary">Lưu</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    <section class="w3l-team py-sm-5 pb-sm-0 pb-5">

    </section>
    @endsection