@extends('management.layouts.app')
@section('title', 'Cập nhật tour')
@section('content')
    <div class="ml-3 mr-3">
        <form method="post" action="{{ route('management.tour.update', $tour->id) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            @include('management.tours._form')
        </form>
    </div>
@endsection
