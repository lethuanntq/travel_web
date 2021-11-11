@extends('layouts.app')
@section('content')
    <div class="ml-3 mr-3">
        <div>
            <h1>Tạo mới tài khoản</h1>
        </div>
        <form method="post" action="">
            @csrf
            @include('management-accounts._form')
        </form>
    </div>
@endsection
