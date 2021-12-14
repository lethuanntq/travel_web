@extends('travel.layout.app')

@section('travel_content')
    <div class="card">
        <div class="card-body" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-9">
                    {{ $tours->links('travel.layout.pagination') }}
                    <table>
                        <tbody>
                        @foreach($tours as $tour)
                            <tr onclick="location.href='{!! route('travel.discount.detail', $tour) !!}';" style="cursor: pointer;">
                                <th scope="col" class="w-25">
                                    <img src="{{ $tour->thumbnail }}" alt="thumbnail" class="img-fluid">
                                </th>
                                <th scope="col" class="w-75">
                                    <div class="grid-margin ml-5">
                                        <h2 class="mb-2">{{ $tour->title }}</h2>
                                        <div class="fs-13 mb-2">
                                            <span>{{ $tour->updated_at->diffForHumans() }}</span>
                                        </div>
                                        <div class="fs-13 mb-2">
                                            <span style="text-decoration: line-through">{{ number_format($tour->price) . \App\Models\Setting::CURRENCY }}</span>
                                            <span style="color: red"><b>{{ number_format($tour->price_promotion) . \App\Models\Setting::CURRENCY }}</b></span>
                                        </div>
                                        <p class="mb-0">{{ $tour->short_description }}</p>
                                    </div>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-3">
                    @include('travel.layout.right_menu',  $highlightPosts)
                </div>
            </div>
        </div>
    </div>
@endsection
