@extends('travel.layout.app')
@section('travel_content')
    <div class="row" data-aos="fade-up">
        <div class="col-xl-8 stretch-card grid-margin">
            <div class="owl-carousel owl-theme">
                @foreach($newsTravel as $tour)
                    <div class="position-relative" onclick="location.href='{!! route('travel.destination.detail', $tour) !!}';"
                    style="cursor:pointer;">
                        <div class="image">
                            <div style="height: 700px;width: 710px">
                                <img
                                    src="{{ $tour->thumbnail ?? '#'}}"
                                    alt="travel"
                                    class="img-fluid"
                                />
                            </div>
                        </div>

                        <div class="banner-content">
                            <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                                Tour du lịch
                            </div>
                            <h1 class="mb-0">{{ $tour->title ?? null}}</h1>
                            <h1 class="mb-2">
                                {{ $tour->short_description ?? null }}
                            </h1>
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
                         onclick="location.href='{!! route('travel.discount.detail', $newDiscount) !!}';"
                         style="cursor:pointer;">
                        <div class="pr-3">
                            <h5>{{ $newDiscount->title ?? null}}</h5>
                            <div class="fs-12">
                                <span class="mr-2">Update </span>{{ $newDiscount->updated_at->diffForHumans() }}
                            </div>
                        </div>
                        <div class="rotate-img" style="max-width: 100%; max-height: 650px">
                            <img
                                src="{{ $newDiscount->thumbnail ?? '#'}}"
                                alt="thumb"
                                class="img-fluid img-lg"
                            />
                        </div>
                    </div>
                    @endforeach
                    <div class="d-flex pt-4 align-items-center justify-content-between">
                        <div class="justify-content-end"><a href="{{ route('travel.discount.index') }}">Đọc thêm >></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" data-aos="fade-up">
        <div class="col-lg-12 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <table>
                        <tbody>
                        @foreach($news as $post)
                            <tr onclick="location.href='{!! route('travel.news.detail', $post) !!}';"
                                style="cursor: pointer;">
                                <th scope="col" class="w-25">
                                    <img src="{{ $post->thumbnail }}" alt="thumbnail" class="img-fluid" style="max-width: 100%; max-height: 200px">
                                </th>
                                <th scope="col" class="w-75">
                                    <div class="grid-margin ml-5">
                                        <h2 class="mb-2">{{ $post->title }}</h2>
                                        <div class="fs-13 mb-2">{{ $post->updated_at->diffForHumans() }}</div>
                                        <p class="mb-0">{{ $post->short_description }}</p>
                                    </div>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
