@extends('travel.layout.app')
@section('title','Điểm đến du lịch')
@section('travel_content')
    <div class="text-center">
        <h1  class="font-weight-600 mb-4">Địa điểm du lịch</h1>
        <img src="https://hanoitourist.com.vn/blocks/location/assets/images/bg-diemden.png" alt="Điểm đến">
        <p>Tất cả những người hay mơ mộng đều biết rằng hoàn toàn có thể nhớ nhung một nơi hoàn toàn xa lạ, và thậm chí
            nhớ nhung nhiều hơn cả</p>
        <p>những vùng đất quen thuộc. Đích đến không phải là nơi bạn kết thúc chuyến đi mà đó là những rủi ro và những
            kỷ niệm</p>
        <p>bạn đã tạo ra trên suốt chặng đường.</p>
    </div>
    <div class="container mt-5" style="display: inline">
        <div class="row">

            @foreach($destinations as $destination)
                <div class="col-3">
                    <a class="size-destination d-block text-center"
                         href="{!! route('travel.destination.detail', $destination->destination_slug) !!}">
                        <img src="<?= asset('/travel/assets/images/destination/'.rand(1, 4).'.png') ?>" alt="travel" class="img-fluid img-thumbnail" style="opacity: 0.7">
                        <div class="size-banner-content text-center">
                            <i class="mdi mdi-airplane"></i>
                            <div class="text-center">
                                {{ $destination->destination_name ?? null}}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
