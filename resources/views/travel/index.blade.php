@extends('travel.layout.app')
@section('travel_content')
    <div class="row" data-aos="fade-up">
        <div class="col-xl-8 stretch-card grid-margin">
            <div class="position-relative">
                <img
                    src="{{ asset('travel/assets/images/dashboard/banner.jpg') }}"
                    alt="banner"
                    class="img-fluid"
                />
                <div class="banner-content">
                    <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                        global news
                    </div>
                    <h1 class="mb-0">GLOBAL PANDEMIC</h1>
                    <h1 class="mb-2">
                        Coronavirus Outbreak LIVE Updates: ICSE, CBSE Exams
                        Postponed, 168 Trains
                    </h1>
                    <div class="fs-12">
                        <span class="mr-2">Photo </span>10 Minutes ago
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 stretch-card grid-margin">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <h2>Latest news</h2>
                    <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between">
                        <div class="pr-3">
                            <h5>Virus Kills Member Of Advising Iran’s Supreme</h5>
                            <div class="fs-12">
                                <span class="mr-2">Photo </span>10 Minutes ago
                            </div>
                        </div>
                        <div class="rotate-img">
                            <img
                                src="{{ asset('travel/assets/images/dashboard/home_1.jpg') }}"
                                alt="thumb"
                                class="img-fluid img-lg"
                            />
                        </div>
                    </div>

                    <div class="d-flex border-bottom-blue pb-4 pt-4 align-items-center justify-content-between">
                        <div class="pr-3">
                            <h5>Virus Kills Member Of Advising Iran’s Supreme</h5>
                            <div class="fs-12">
                                <span class="mr-2">Photo </span>10 Minutes ago
                            </div>
                        </div>
                        <div class="rotate-img">
                            <img
                                src="{{ asset('travel/assets/images/dashboard/home_2.jpg') }}"
                                alt="thumb"
                                class="img-fluid img-lg"
                            />
                        </div>
                    </div>

                    <div class="d-flex pt-4 align-items-center justify-content-between">
                        <div class="pr-3">
                            <h5>Virus Kills Member Of Advising Iran’s Supreme</h5>
                            <div class="fs-12">
                                <span class="mr-2">Photo </span>10 Minutes ago
                            </div>
                        </div>
                        <div class="rotate-img">
                            <img
                                src="{{ asset('travel/assets/images/dashboard/home_3.jpg') }}"
                                alt="thumb"
                                class="img-fluid img-lg"
                            />
                        </div>
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
                            <tr onclick="location.href='{!! route('travel.discount.detail', $new) !!}';" style="cursor: pointer;">
                                <th scope="col" class="w-25">
                                    <img src="{{ $new->thumbnail }}" alt="thumbnail" class="img-fluid">
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
