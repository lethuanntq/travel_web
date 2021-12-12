@extends('travel.layout.app')

@section('travel_content')
    <div class="card">
        <div class="card-body" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-9">
                    <div>
                        <h1 class="post-title">{{ $tour->title }}</h1>
                        <div class="clearfix mt-4">
                            <span class="datetime"><img src="https://hanoitourist.com.vn/templates/default/images/icon-date.png">&nbsp{{ $tour->updated_at->format('d/m/Y H:i') }}</span>
                        </div>
                        <div class="clearfix mt-4">
                            Giá tiền: <span><b>{{ number_format($tour->price_promotion) . \App\Models\Setting::CURRENCY }}</b></span>
                        </div>
                        <div class="post-summary row-item mt-4">{{ $tour->short_description }}</div>
                        <div class="post-description row-item mt-4">{!! $tour->description !!}</div>
                    </div>
                </div>
                <div class="col-lg-3">
                    @include('travel.layout.right_menu',  $highlightPosts)
                </div>
            </div>
        </div>
    </div>
@endsection
