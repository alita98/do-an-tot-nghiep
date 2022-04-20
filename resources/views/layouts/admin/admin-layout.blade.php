@extends('layouts.admin.dashboard')
@section('sidebar')
<div class="sidebar">
    <div class="scrollbar-inner sidebar-wrapper mt-2">
        <ul class="nav" style="width: 100%; margin-top: 0px;text-align: center;">
            <li>
                <a class="dropdown-item" href="{{route('admin.dashboard')}}">Dashboard</a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item" href="{{route('user.list.admin')}}">Người dùng</a>
            </li>
            <li><hr class="dropdown-divider"></li>
        </ul>
    </div>
</div>
<div id="page-wrapper" class="gray-bg dashbard-1">
    @yield('content')
</div>
@endsection
