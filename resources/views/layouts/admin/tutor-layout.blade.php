@extends('layouts.admin.dashboard')
@section('sidebar')
<div class="sidebar" data-color="purple" data-image="{{asset('assets/img/sidebar-5.jpg')}}">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                Fpoly Tutor
            </a>
        </div>

        <ul class="nav">
            <li class="">
                <a href="{{route('tutor.dashboard')}}">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="{{route('tutor.classmatetutor.list')}}">
                    <i class="pe-7s-note2"></i>
                    <p>Lịch Tutor</p>
                </a>
            </li>
            <li>
                <a href="{{route('tutor.classmate.list')}}">
                    <i class="pe-7s-news-paper"></i>
                    <p>Môn học</p>
                </a>
            </li>
            <li>
                <a href="{{route('tutor.major.list')}}">
                    <i class="pe-7s-note2"></i>
                    <p>Chuyên ngành</p>
                </a>
            </li>
            <li>
                <a href="{{route('tutor.department.list')}}">
                    <i class="pe-7s-news-paper"></i>
                    <p>Phòng ban</p>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="main-panel">
    
    @yield('content')
</div>
@endsection
