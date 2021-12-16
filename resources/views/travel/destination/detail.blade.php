@extends('travel.layout.app')
@section('title','Điểm đến: '.$tours[0]->destination_name)
@section('travel_content')
    <div class="card">
        <div class="card-body" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-9">
                        <h1 class="font-weight-600 mb-4">Điểm đến: {{$tours[0]->destination_name}}</h1>
                        @foreach($tours as $tour)
                            <div class="row">
                                <div class="col-sm-4 grid-margin">
                                    <div class="rotate-img">
                                        <img src="{{ $tour->thumbnail }}" alt="banner" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-sm-8 grid-margin">
                                    <h2 class="font-weight-600 mb-2">
                                        <a href="{!! route('travel.tour.detail', $tour->slug) !!}"> {{$tour->title}}</a>
                                    </h2>
                                    <p class="fs-13 text-muted mb-0">
                                        <?php $price = $tour->price; if( $tour->price_promotion){ $price = $tour->price_promotion;  } ?>
                                        <?php if($tour->price_promotion){ ?>
                                        <del>{{ number_format($tour->price) . \App\Models\Setting::CURRENCY }}</del>
                                        <?php } ?>
                                        <span class="price">{{ number_format($price) . \App\Models\Setting::CURRENCY }}</span>
                                    </p>
                                    <p class="fs-13 text-muted mb-0">
                                        <span class="mr-2">Cập nhật</span>{{ $tour->updated_at->diffForHumans() }}
                                    </p>
                                    <p class="fs-15">
                                       {{ $tour->short_description  }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                </div>
                <div class="col-lg-3">
                    @include('travel.layout.right_menu',  $highlightPosts)
                </div>
            </div>
        </div>
    </div>
    @include('travel.destination.booking')
@endsection
