@extends('travel.layout.app')
@section('title','Tin tức du lịch')
@section('travel_content')
    <div class="card">
        <div class="card-body" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-9">
                    <h1 class="font-weight-600 mb-4">Tin Tức</h1>
                    @foreach($posts as $post)
                        <div class="row">
                            <div class="col-sm-4 grid-margin">
                                <div class="rotate-img img_list">
                                    <img src="{{ $post->thumbnail }}" alt="banner" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-sm-8 grid-margin">
                                <h2 class="font-weight-600 mb-2">
                                    <a href="{!! route('travel.news.detail', $post->slug) !!}"> {{$post->title}}</a>
                                </h2>
                                <p class="fs-13 text-muted mb-0">
                                    <span class="mr-2">Cập nhật</span>{{ $post->updated_at->diffForHumans() }}
                                </p>
                                <p class="fs-15">
                                    {{ $post->short_description  }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                    {{ $posts->links('travel.layout.pagination') }}
                </div>
                <div class="col-lg-3">
                    @include('travel.layout.right_menu', ['highlightPosts' => $highlightPosts])
                </div>
            </div>
        </div>
    </div>
@endsection
