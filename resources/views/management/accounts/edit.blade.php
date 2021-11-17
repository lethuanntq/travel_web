@extends('management.layouts.app')
@section('content')
    <div class="ml-3 mr-3">
        <form method="post" action="{{route('management.account.update', $user->id ?? 0)}}">
            @csrf
            @method('patch')
            @include('management.accounts._form')
        </form>
    </div>
@endsection
