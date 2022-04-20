@extends('layouts.admin.dashboard')
@section('sidebar')
<div class="sidebar">
    <div class="scrollbar-inner sidebar-wrapper mt-2">
        <ul class="nav" style="width: 100%; margin-top: 0px;text-align: center;">
            <li>
                <a class="dropdown-item" href="{{route('tutor.dashboard')}}">Dashboard</a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item" href="{{route('tutor.classmatetutor.list')}}">Lịch Tutor</a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item" href="{{route('tutor.classmate.list')}}">Môn học</a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item" href="{{route('tutor.major.list')}}">Chuyên ngành</a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item" href="{{route('tutor.department.list')}}">Phòng ban</a>
            </li>
            <li><hr class="dropdown-divider"></li>
        </ul>
    </div>
</div>
<div id="page-wrapper" class="gray-bg dashbard-1">
    @yield('content')
</div>
@endsection
