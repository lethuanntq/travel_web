@extends('travel.layout.app')
@section('travel_content')
    <div class="text-center">
        <img src="https://hanoitourist.com.vn/blocks/location/assets/images/bg-diemden.png" alt="Điểm đến">
        <p>Tất cả những người hay mơ mộng đều biết rằng hoàn toàn có thể nhớ nhung một nơi hoàn toàn xa lạ, và thậm chí
            nhớ nhung nhiều hơn cả</p>
        <p>những vùng đất quen thuộc. Đích đến không phải là nơi bạn kết thúc chuyến đi mà đó là những rủi ro và những
            kỷ niệm</p>
        <p>bạn đã tạo ra trên suốt chặng đường.</p>
    </div>
    <div class="container mt-5" style="display: inline">
        <div class="row">
            <aside>
                <ul class="destinations-list">
                    @foreach($destinations as $destination)
                    <li>
                        <div class="size-destination" onclick="location.href='{!! route('travel.destination.detail', $destination->id ?? 0) !!}';">
                            <img
                                src="{{ asset('travel/assets/images/travel/halong.jpg') }}"
                                alt="travel"
                                class="img-fluid img-thumbnail size-img"
                            />
                            <div class="size-banner-content">
                                <div class="ml-5">
                                    <i class="mdi mdi-airplane"></i>
                                </div>
                                <div>
                                    {{ $destination->destination_name ?? null}}
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
@endsection
