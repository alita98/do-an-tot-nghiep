@extends('welcome')
@section('clients')
<section class="w3l-team py-sm-5 pb-sm-0 pb-5">
    <div class="container py-md-5 py-4">
        <div class="row text-center">
                <div class="team-block-single" >
                    <div class="team-bottom-block p-4">
                        <h5 class="member mb-1 text-center">Thông tin cá nhân</h5>
                        <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                            <div class="col-2 text-end">
                                <label for="name" class="col-form-label ">Tên</label>
                            </div>
                            <div class="col-10">
                                <input type="text" disabled class="form-control" value="{{$users->name}}">
                            </div>
                        </div>
                        <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                            <div class="col-2 text-end">
                                <label for="email" class="col-form-label">Email</label>
                            </div>
                            <div class="col-10">
                                <input type="text" disabled class="form-control" value="{{$users->email}}">
                            </div>
                        </div>
                        <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                            <div class="col-2 text-end">
                                <label for="file" class="col-form-label">Avatar</label>
                            </div>
                            <div class="col-10">
                                <img src="{{asset('storage/'. $users->avatar)}}" alt="" width="200">
                            </div>
                        </div>
                        <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                            <div class="col-2 text-end">
                                <label for="birth_date" class="col-form-label">Giới tính</label>
                            </div>
                            <div class="col-10">
                                @if($users->gender == 0)
                                    <input type="text" disabled class="form-control" value="Nam">
                                @elseif($users->gender == 1)
                                    <input type="text" disabled class="form-control" value="Nữ">
                                @else
                                    <input type="text" disabled class="form-control" value="Khác">
                                @endif
                            </div>
                        </div>
                        <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                            <div class="col-2 text-end">
                                <label for="role" class="col-form-label" >Ngày sinh</label>
                            </div>
                            <div class="col-10">
                                <input type="date" disabled class="form-control" value="{{$users->birth_date}}">
                            </div>
                        </div>
                        <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                            <div class="col-2 text-end">
                                <label for="role" class="col-form-label" >Địa chỉ</label>
                            </div>
                            <div class="col-10">
                                <input type="text" disabled class="form-control" value="{{$users->address}}">
                            </div>
                        </div>
                        <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                            <div class="col-2 text-end">
                                <label for="role" class="col-form-label" >Số điện thoại</label>
                            </div>
                            <div class="col-10">
                                <input type="text" disabled class="form-control" value="+84{{$users->phone}}">
                            </div>
                        </div>
                        <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                            <div class="col-2 text-end">
                                
                            </div>
                            <div class="col-8">
                                <a href="{{route('profile.edit',['id'=>$users->id])}}" class="btn btn-primary">Sửa thông tin</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<section class="w3l-team py-sm-5 pb-sm-0 pb-5">

</section>
@endsection