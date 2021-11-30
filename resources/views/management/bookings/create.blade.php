@extends('management.layouts.app')
@section('title', 'Tạo mới booking')
@section('content')
    <div class="ml-3 mr-3">
        <form method="post" action="{{ route('management.booking.store') }}">
            @csrf
            @include('management.bookings._form')
        </form>
    </div>
@endsection
