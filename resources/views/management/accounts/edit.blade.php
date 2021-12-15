@extends('management.layouts.app')
@section('title', 'Chỉnh sửa tài khoản')

@section('content')
    <div class="ml-3 mr-3">
        <form method="post" action="{{route('management.account.update', $user)}}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            @include('management.accounts._form')
        </form>
    </div>
@endsection
