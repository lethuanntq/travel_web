@extends('management.layouts.app')
@section('title', 'Tạo mới tour')
@section('content')
    <div class="ml-3 mr-3">
        <form method="post" action="{{ route('management.customer.store') }}">
            @csrf
            @include('management.customers._form')
        </form>
    </div>
@endsection
