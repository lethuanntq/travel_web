@extends('management.layouts.app')
@section('content')
    <div class="ml-3 mr-3">
        <form method="post" action="{{route('management.account.store')}}" enctype="multipart/form-data">
            @csrf
            @include('management.accounts._form')
        </form>
    </div>
@endsection
