@extends('layouts.app')
@section('content')
    <div class="ml-3 mr-3">
        <form method="post" action="{{ route('management-post.update', $post->id) }}">
            @csrf
            @method('patch')
            @include('management-posts._form')
        </form>
    </div>
@endsection
