@extends('management.layouts.app')
@section('title', 'Bảng thống kê')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 mt-sm-5">
                <div class="mb-3">Thống kê về quản lý</div>
                <ul class="list-group">
                    <li class="list-group-item">Tổng số bài viết : <a href="{{ route('management.post.index') }}">{{ $posts ?? 0 }}</a></li>
                    <li class="list-group-item">Tổng số tour : <a href="{{ route('management.tour.index') }}">{{ $tours ?? 0}}</a></li>
                    <li class="list-group-item">Tổng số khách hàng : <a href="{{ route('management.account.index') }}">{{ $customers ?? 0 }}</a></li>
                    <li class="list-group-item">Tổng số tài khoản : <a href="{{ route('management.account.index') }}">{{ $accounts ?? 0}}</a></li>
                </ul>
            </div>
            <div class="col-sm-6 mt-sm-5">
                <div class="mb-3">Thống kê về khách hàng</div>
                <ul class="list-group">
                    <li class="list-group-item">Tổng số khách hàng hủy tour : <a href="{{ route('management.customer.index') }}">{{ $customerCancel ?? 0}}</a></li>
                    <li class="list-group-item">Tổng số khách đang chờ xác nhận : <a href="{{ route('management.customer.index') }}">{{ $tourWaitingConfirm ?? 0}}</a></li>
                    <li class="list-group-item">Tổng số khách đang tiến hành tour : <a href="{{ route('management.customer.index') }}">{{ $tourBooking ?? 0}}</a></li>
                    <li class="list-group-item">Tổng số khách đã hoàn thành tuor : <a href="{{ route('management.customer.index') }}">{{ $tourCompleted ?? 0}}</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
