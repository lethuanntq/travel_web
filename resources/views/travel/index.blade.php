@extends('travel.layout.app')
@section('travel_content')
    <div class="row" data-aos="fade-up">
        <div class="col-xl-8 stretch-card grid-margin">
            <div class="owl-carousel owl-theme">
                @foreach($newsTravel as $newTravel)
                    <div class="position-relative">
                        <div class="image">
                            <img
                                src="{{ $newTravel->thumbnail ?? '#'}}"
                                alt="travel"
                                class="img-fluid"
                                style="height: 700px"
                            />
                        </div>

                        <div class="banner-content" onclick="location.href='{!! route('travel.discount.detail', $newTravel ?? 0) !!}';">
                            <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                                Tour du lịch
                            </div>
                            <h1 class="mb-0">{{ $newTravel->title ?? null}}</h1>
                            <h1 class="mb-2">
                                {{ $newTravel->short_description ?? null }}
                            </h1>
                            <div class="fs-12">
                                <span class="mr-2">Cập nhật</span> {{ $newTravel->updated_at->diffForHumans() }}
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
                    <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between">
                        <div class="pr-3">
                            <h5>{{ $newDiscount->title ?? null}}</h5>
                            <div class="fs-12">
                                <span class="mr-2">Update </span>{{ $newDiscount->updated_at->diffForHumans() }}
                            </div>
                        </div>
                        <div class="rotate-img">
                            <img
                                src="{{ $newDiscount->thumbnail ?? '#'}}"
                                alt="thumb"
                                class="img-fluid img-lg"
                                style="max-width: 100%; max-height: 650px"
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
                        @foreach($news as $new)
                            <tr onclick="location.href='{!! route('travel.news.detail', $new) !!}';"
                                style="cursor: pointer;">
                                <th scope="col" class="w-25">
                                    <img src="{{ $new->thumbnail }}" alt="thumbnail" class="img-fluid" style="max-width: 100%; max-height: 200px">
                                </th>
                                <th scope="col" class="w-75">
                                    <div class="grid-margin ml-5">
                                        <h2 class="mb-2">{{ $new->title }}</h2>
                                        <div class="fs-13 mb-2">{{ $new->updated_at->diffForHumans() }}</div>
                                        <p class="mb-0">{{ $new->short_description }}</p>
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
