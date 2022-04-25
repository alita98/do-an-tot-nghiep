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
                <a href="{{route('admin.dashboard')}}">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="{{route('user.list.admin')}}">
                    <i class="pe-7s-note2"></i>
                    <p>Người dùng</p>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="main-panel">
    @yield('content')
</div>
@endsection
