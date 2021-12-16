@extends('travel.layout.app')
@section('travel_content')
    <div class="row" data-aos="fade-up">
        <div class="col-xl-8 stretch-card grid-margin">
            <div class="owl-carousel owl-theme">
                @foreach($newsTravel as $tour)
                    <div class="position-relative" onclick="location.href='{!! route('travel.tour.detail', $tour) !!}';"
                    style="cursor:pointer;">
                        <div class="image">
                            <div style="">
                                <img
                                    src="{{ $tour->thumbnail ?? '#'}}"
                                    alt="travel"
                                    class="img-fluid"
                                />
                            </div>
                        </div>

                        <div class="banner-content" style="background: rgba(0, 0, 0, 0.2); width: 100%">
                            <h2 class="mb-0 d-block" style="font-size: 30px;">{{ $tour->title}}</h2>
                            <p class="mb-2">
                                {{ $tour->short_description }}
                            </p>
                            <div class="fs-12">
                                <span class="mr-2">Cập nhật</span> {{ $tour->updated_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-xl-4 stretch-card grid-margin">
            <div class="card bg-gradient-blue text-black">
                <div class="card-body">
                    <h2>Thông tin khuyến mại</h2>
                    @foreach($newsDiscount as $newDiscount)
                    <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between"
                         onclick="location.href='{!! route('travel.tour.detail', $newDiscount) !!}';"
                         style="cursor:pointer;">
                        <div class="pr-3">
                            <h5>{{ $newDiscount->title ?? null}}</h5>
                            <div class="fs-12">
                                    <span style="text-decoration: line-through">{{ number_format($newDiscount->price) . \App\Models\Setting::CURRENCY }}</span>
                                    <span style="color: red"><b>{{ number_format($newDiscount->price_promotion) . \App\Models\Setting::CURRENCY }}</b></span>
                            </div>
                        </div>
                        <div class="rotate-img" style="max-width: 100%; max-height: 650px">
                            <img
                                src="{{ $newDiscount->thumbnail ?? '#' }}"
                                alt="thumb"
                                class="img-fluid img-lg"
                            />
                        </div>
                    </div>
                    @endforeach
                    <div class="d-flex pt-4 align-items-center justify-content-between">
                        <div class="justify-content-end"><a href="{{ route('travel.discount.index') }}" class="btn btn-primary">Đọc thêm &#xbb;</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" data-aos="fade-up">
        <div class="col-lg-12 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class="font-weight-600 mb-4">
                                Tin tức mới
                            </h2>
                        </div>
                    </div>
                    @foreach($news as $post)
                        <div class="row">
                            <div class="col-sm-4 grid-margin">
                                <div class="rotate-img">
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
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class="font-weight-600 mb-4">
                                Tour nổi bật
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                            @foreach($randomTour as $tour)
                            <div class="col-4 grid-margin">
                                <div class="rotate-img">
                                    <a href="{!! route('travel.tour.detail', $tour->slug) !!}"><img src="{{ $tour->thumbnail }}" alt="banner" class="img-fluid"></a>
                                </div>
                                <p class="fs-13 text-muted mb-0">
                                    <?php $price = $tour->price; if( $tour->price_promotion){ $price = $tour->price_promotion;  } ?>
                                    <?php if($tour->price_promotion){ ?>
                                    <del>{{ number_format($tour->price) . \App\Models\Setting::CURRENCY }}</del>
                                    <?php } ?>
                                    <span class="price">{{ number_format($price) . \App\Models\Setting::CURRENCY }}</span>
                                </p>
                                <h3><a href="{!! route('travel.tour.detail', $tour->slug) !!}">{{$tour->title}}</a></h3>
                            </div>
                            @endforeach
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" data-aos="fade-up">
    </div>

@endsection
@push('travel-scripts')
    <script>
        $(document).ready(function () {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                items: 1,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true
            });
        });
    </script>

@endpush
