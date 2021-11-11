@extends('layouts.app')
@section('content')
    <div class="ml-3 mr-3">
        <div>
            <h1>Tạo mới tour</h1>
        </div>
        <form method="post" action="">
            @csrf
            @include('management-tours._form')
        </form>
    </div>
@endsection
