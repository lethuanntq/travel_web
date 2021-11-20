@extends('management.layouts.app')
@section('title', 'Chỉnh sửa customer')
@section('content')
    <div class="ml-3 mr-3">
        <form method="post" action="{{ route('management.customer.update', $customer->id) }}">
            @csrf
            @method('patch')
            @include('management.customers._form')
        </form>
    </div>
@endsection
