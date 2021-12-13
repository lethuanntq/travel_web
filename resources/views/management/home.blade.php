@extends('management.layouts.app')
@section('title', 'Bảng thống kê')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 mt-sm-5">
                <h4 class="mb-3">Thống kê về quản lý</h4>
                <ul class="list-group">
                    <li class="list-group-item">Tổng số bài viết : <a href="{{ route('management.post.index') }}">{{ \App\Models\Post::count() }}</a></li>
                    <li class="list-group-item">Tổng số tour : <a href="{{ route('management.tour.index') }}">{{ \App\Models\Tour::count() }}</a></li>
                    <li class="list-group-item">Tổng số khách hàng : <a href="{{ route('management.account.index') }}">{{ \App\Models\User::where('role', \App\Models\User::ROLE_EDITOR)->count() }}</a></li>
                    <li class="list-group-item">Tổng số tài khoản : <a href="{{ route('management.account.index') }}">{{ \App\Models\User::count() }}</a></li>
                </ul>
            </div>
            <div class="col-sm-6 mt-sm-5">
                <h4 class="mb-3">Thống kê về khách hàng</h4>
                <ul class="list-group">
                    <li class="list-group-item">Tổng số khách hàng hủy tour : <a href="{{ route('management.booking.index') }}">{{ \App\Models\Booking::where('status', \App\Models\Booking::CANCEL)->count() }}</a></li>
                    <li class="list-group-item">Tổng số khách đang chờ xác nhận : <a href="{{ route('management.booking.index') }}">{{ \App\Models\Booking::where('status', \App\Models\Booking::BOOKING)->count() }}</a></li>
                    <li class="list-group-item">Tổng số khách đang tiến hành tour : <a href="{{ route('management.booking.index') }}">{{ App\Models\Booking::where('status', \App\Models\Booking::IN_PROCESS)->count() }}</a></li>
                    <li class="list-group-item">Tổng số khách đã hoàn thành tour : <a href="{{ route('management.booking.index') }}">{{ App\Models\Booking::where('status', \App\Models\Booking::COMPLETED)->count() }}</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
