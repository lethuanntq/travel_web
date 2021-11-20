@extends('management.layouts.app')
@section('title', 'Tạo mới tour')
@section('content')
    <div class="ml-3 mr-3">
        <form method="post" action="{{ route('management.tour.store') }}">
            @csrf
            @include('management.tours._form')
        </form>
    </div>
@endsection
