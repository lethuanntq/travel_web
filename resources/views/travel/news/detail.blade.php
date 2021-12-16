@extends('travel.layout.app')
@section('title', $post->title)
@section('meta_keywords', $post->seo_tag)
@section('meta_description', $post->seo_description)
@section('travel_content')
    <div class="card">
        <div class="card-body" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-9">
                    <h1 class="post-title">{{ $post->title }}</h1>
                    <div class="clearfix mt-4">
                        <span class="datetime"><img src="https://hanoitourist.com.vn/templates/default/images/icon-date.png">&nbsp{{ $post->updated_at->format('d/m/Y H:i') }}</span>
                    </div>
                    <div class="post-summary row-item mt-4">{{ $post->short_description }}</div>
                    <div class="post-description row-item mt-4">{!! $post->description !!}</div>
                </div>
                <div class="col-lg-3">
                    @include('travel.layout.right_menu',  $highlightPosts)
                </div>
            </div>
        </div>
    </div>
@endsection
