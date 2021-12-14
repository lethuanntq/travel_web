<div class="footer-top" style="font-family: 'Roboto'">
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                @php
                    $setting = \App\Models\Setting::first();
                @endphp
                <h3 class="font-weight-bold mb-3">TRAVEL COMPANY JSC </h3>
                <div>
                    <b>Trụ sở chính :</b>{{ $setting->headquarters }}
                </div>
                <div class="mt-1">
                    <b>Chi nhánh Hà Nội:</b> {{ $setting->branch_1 }}
                </div>
                <div class="mt-1">
                    <b>Điện thoại:</b> {{ $setting->phone_number }}| Hotline: {{  $setting->hot_line }}
                </div>
                <div class="mt-1">
                    <a href="{{ $setting->website }}"><b>Website:</b> {{ $setting->website }}</a>
                </div>
                <div class="mt-5">
                    Kết nối với Travel Company
                </div>
                <ul class="social-media mt-3">
                    <li>
                        <a href="https://www.facebook.com/">
                            <i class="mdi mdi-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/">
                            <i class="mdi mdi-youtube"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/">
                            <i class="mdi mdi-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="tel:123-456-7890">
                            <i class="mdi mdi-cellphone-basic"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-4">
                <h3 class="font-weight-bold mb-3">Truy cập nhanh</h3>
                <div class="footer-border-bottom pb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <a class="mb-0 font-weight-600" href="{!! route('about-me') !!}">Về chúng
                            tôi</a>
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
                <div class="footer-border-bottom pb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <a class="mb-0 font-weight-600"
                            href="{!! route('travel.discount.index') !!}">Khuyến mại</a>
                    </div>
                </div>
                <div class="footer-border-bottom pb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <a class="mb-0 font-weight-600"
                            href="{!! route('travel.experience.index') !!}">Kinh nghiệm</a>
                    </div>
                </div>
                <div class="footer-border-bottom pb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <a class="mb-0 font-weight-600" href="{!! route('about-me') !!}">Điểm
                            đến</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <h5 class="font-weight-bold mb-3">NHẬN ƯU ĐÃI TỪ CHÚNG TÔI</h5>
                <p><i>Cập nhật thông tin du lịch ưu đãi mới nhất từ travel jsc đến email của bạn</i></p>
                <form id="form-email" method="post" action="#">
                    <input type="email" class="form-control" placeholder="Nhập email của bạn" style="height: 14%" name="email">
                    <a class="btn btn-info mt-2" id="submit">Đăng ký</a>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="d-sm-flex justify-content-between align-items-center">
                    <div class="fs-14 font-weight-600">
                        © 2020 @ <a href="https://www.bootstrapdash.com/" target="_blank" class="text-white"> Travel
                            Company</a>. All rights reserved.
                    </div>
                    <div class="fs-14 font-weight-600">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('travel-scripts')
    <script>
        $('#submit').click(function () {
            $.ajax({
                url: '{{ route('travel.email.notification') }}',
                data: $('#form-email').serializeArray(),
                type: 'post'
            }).done(function (response) {
                alert(response.message)
            }).fail(function (message) {
                console.log(message);
            })
        })
    </script>
@endpush

