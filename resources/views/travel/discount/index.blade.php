@extends('travel.layout.app')
@section('title','Khuyến mại')
@section('travel_content')
    <div class="card">
        <div class="card-body" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-9">

                    <h1 class="font-weight-600 mb-4">Tour khuyến mại hot</h1>
                    @foreach($tours as $tour)
                        <div class="row">
                            <div class="col-sm-4 grid-margin">
                                <div class="rotate-img img_list">
                                    <img src="{{ $tour->thumbnail }}" alt="banner" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-sm-8 grid-margin">
                                <h2 class="font-weight-600 mb-2">
                                    <a href="{!! route('travel.tour.detail', $tour->slug) !!}"> {{$tour->title}}</a>
                                </h2>
                                <p class="fs-13 text-muted mb-0">
                                    <span style="text-decoration: line-through">{{ number_format($tour->price) . \App\Models\Setting::CURRENCY }}</span>
                                    <span style="color: red"><b>{{ number_format($tour->price_promotion) . \App\Models\Setting::CURRENCY }}</b></span>
                                </p>
                                <p class="fs-15">
                                    {{ $tour->short_description  }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                    {{ $tours->links('travel.layout.pagination') }}
                </div>
                <div class="col-lg-3">
                    @include('travel.layout.right_menu',  $highlightPosts)
                </div>
            </div>
        </div>
    </div>
@endsection
