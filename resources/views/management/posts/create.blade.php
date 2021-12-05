@extends('management.layouts.app')
@section('title', 'Thêm mới bài viết')

@section('content')
    <div class="ml-3 mr-3">
        <form method="post" action="{{ route('management.post.store') }}" enctype="multipart/form-data">
            @csrf
            @include('management.posts._form')
        </form>
    </div>
@endsection
