@extends('welcome')
@section('clients')
<section class="w3l-team py-sm-5 pb-sm-0 pb-5">
    <div class="container py-md-5 py-4">
        <div class="row text-center">
            
            <div class="col-lg-12 col-sm-6">
                <div class="team-block-single" >
                    <div class="team-bottom-block p-4">
                        <h2 class="member mb-1" style="padding-bottom: 20px;"><a href="" style="text-decoration: none;color: red;">Chi tiết lớp học {{$classmateTutor->name}}</a></h2>
                        <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                            <div class="col-2">
                                <label for="name" class="col-form-label">Giảng viên của lớp</label>
                            </div>
                            <div class="col-10">
                                <input type="text" disabled class="form-control" value="{{$classmateTutor->usersBelongTo->name}}">
                            </div>
                        </div>
                        <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                            <div class="col-2">
                                <label for="email" class="col-form-label">Ngày học</label>
                            </div>
                            <div class="col-10">
                                <input type="text" disabled class="form-control" value="{{$classmateTutor->date}}">
                            </div>
                        </div>
                        <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                            <div class="col-2">
                                <label for="email" class="col-form-label">Thông tin lớp học</label>
                            </div>
                            <div class="col-10">
                                <input type="text" disabled class="form-control" value="{{$classmateTutor->information}}">
                            </div>
                        </div>
                        <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                            <div class="col-2">
                                <label for="email" class="col-form-label">Giờ học</label>
                            </div>
                            <div class="col-10">
                                <input type="text" disabled class="form-control" value="{{$classmateTutor->start_time}} - {{$classmateTutor->end_time}}">
                            </div>
                        </div>
                        <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                            <div class="col-2">
                                <label for="birth_date" class="col-form-label">Tổng số sinh viên đã tham gia</label>
                            </div>
                            <div class="col-10">
                                <input type="text" disabled class="form-control" value="{{$countClassmateTutor}}">
                            </div>
                        </div>
                        <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                            <div class="col-9">
                            @if(Session::has('msg'))
                            <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
                        @endif
                                <form action="" method="POST">
                                    @csrf
                                    <div>
                                        <input type="hidden" name="user_id" value="{{$idStudent}}">
                                    </div>
                                    <div>
                                        <input type="hidden" name="classmatetutor_id"  value="{{($classmateTutor->id)}}">
                                    </div>
                                   @if($checkIds=='true')
                                    <div>
                                        <button class="btn btn-info" disabled>Bạn đã tham gia lớp học</button>
                                    </div>
                                    @else
                                    <div>
                                        <button type="submit" class="btn btn-success" onclick="">Tham gia lớp học ngay</button>
                                    </div>
                                    @endif
                                </form>
                            </div>
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