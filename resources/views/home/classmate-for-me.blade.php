@extends('welcome')
@section('clients')
<section class="w3l-team py-sm-5 pb-sm-0 pb-5">
    <div class="container py-md-5 py-4">
        <div class="row text-center">
            
            <div class="col-lg-12 col-sm-6">
                <div class="team-block-single" >
                    @foreach($classmateTutorMe as $item)
                    <div class="team-bottom-block p-4">
                        <h2 class="member mb-1" style="padding-bottom: 20px;"><a href="" style="text-decoration: none;color: red;">Chi tiết lớp học {{$item->name_classmatetutor}}</a></h2>
                        <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                            <div class="col-2">
                                <label for="name" class="col-form-label">Giảng viên của lớp</label>
                            </div>
                            <div class="col-10">
                                <input type="text" disabled class="form-control" value="{{$item->name_tutor}}">
                            </div>
                        </div>
                        <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                            <div class="col-2">
                                <label for="name" class="col-form-label">Link học</label>
                            </div>
                            <div class="col-10">
                                <a href="{{$item->link_classmatetutor}}" style="text-decoration: none;" class="form-control">Link học</a>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                            <div class="col-2">
                                <label for="email" class="col-form-label">Ngày học</label>
                            </div>
                            <div class="col-10">
                                <input type="text" disabled class="form-control" value="{{$item->date_classmatetutor}}">
                            </div>
                        </div>
                        <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                            <div class="col-2">
                                <label for="email" class="col-form-label">Giờ học</label>
                            </div>
                            <div class="col-10">
                                <input type="text" disabled class="form-control" value="{{$item->start_time_classmatetutor}} - {{$item->end_time_classmatetutor}}">
                            </div>
                        </div>
                        <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                            <div class="col-2">
                                <label for="email" class="col-form-label">Thông tin lớp học</label>
                            </div>
                            <div class="col-10">
                                <textarea type="text" disabled class="form-control">{{$item->information_classmatetutor}}</textarea>
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
                        @if(isset($test[0]))
                            <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                                <div class="col-2">
                                    <label for="" class="col-form-label">Đánh giá chất lượng lớp học</label>
                                </div>
                                <div class="col-10">
                                    <form action="{{route('vote')}}" method="POST">
                                        @csrf
                                        @if($checkIds=='true')
                                            <div>
                                                @if($item->vote == 1)
                                                <input type="text" disabled class="form-control" value="Tốt">
                                                @elseif($item->vote == 2)
                                                <input type="text" disabled class="form-control" value="Trung bình">
                                                @elseif($item->vote == 3)
                                                <input type="text" disabled class="form-control" value="Chưa được">
                                                @endif
                                            </div><br>
                                            <div>
                                                <button class="btn btn-info" disabled>Cảm ơn phản hồi của bạn</button>
                                            </div>
                                        @else
                                            <div>
                                                <select name="vote" class="form-select" aria-label="Default select example">
                                                    <option value="1">Tốt</option>
                                                    <option value="2">Bình thường</option>
                                                    <option value="3">Chưa đạt</option>
                                                </select>
                                            </div>
                                            <div>
                                                <input type="hidden" name="user_id" value="{{$IdUser}}">
                                            </div>
                                            <div>
                                                <input type="hidden" name="classmatetutor_id" value="{{$item->id_classmatetutor}}">
                                            </div><br>
                                            <div>
                                                <button type="submit" class="btn btn-success" onclick="">Gửi</button>
                                            </div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                    @if($val1 < $test6 && $test6<$val4 && $val6 == $test7)
                        @if($checkList == 'true')
                        <div class="row g-3 align-items-center" style="padding-bottom: 10px;">
                            <form action="{{route('diem.danh')}}" method="POST">
                                @csrf
                                <input type="hidden" name="list_id" value="{{$item->id_list}}">
                                <button type="submit" class="btn btn-success">Điểm danh</button>
                            </form>
                        </div>
                        @else
                        <div>
                            <button class="btn btn-info" disabled>Đã điểm danh</button>
                        </div>
                        @endif
                    @endif

                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
</div>
<section class="w3l-team py-sm-5 pb-sm-0 pb-5">

</section>
@endsection