@extends('management.layouts.app')
@section('title', 'Chỉnh sửa booking')
@section('content')
    <div class="ml-3 mr-3">
        <form method="post" action="{{ route('management.booking.update', $booking) }}">
            @csrf
            @method('patch')
            @include('management.bookings._form')
        </form>
    </div>
@endsection
