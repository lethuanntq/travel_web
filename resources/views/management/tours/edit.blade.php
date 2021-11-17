@extends('management.layouts.app')
@section('content')
    <div class="ml-3 mr-3">
        <form method="post" action="{{ route('management.tour.update', $tour->id) }}">
            @csrf
            @method('patch')
            @include('management.tours._form')
        </form>
    </div>
@endsection
