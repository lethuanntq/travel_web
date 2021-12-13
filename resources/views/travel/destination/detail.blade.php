@extends('travel.layout.app')
@section('travel_content')
    <div class="alert alert-success" id="booking-success" style="display: none"></div>
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#booking-tour">
                        Đặt tour này
                    </button>
                </div>
                <div class="col-lg-3">
                    @include('travel.layout.right_menu',  $highlightPosts)
                </div>
            </div>
        </div>
    </div>
    @include('travel.destination.booking')
@endsection
@push('travel-scripts')
    <script>
        $('#submit-booking-tour').click(function () {
            $.ajax({
                url: '{{ route('travel.booking.store') }}',
                type: 'post',
                data: $('#form-booking-tour').serialize()
            }).done(function (response) {
                removeError()
                $('#booking-tour').modal('toggle');
                $('#booking-success').css('display', 'block')
                $('#booking-success').text(response.message)
            }).fail(function (error) {
                var message = null ;
                if(error.responseJSON.errors) {
                    message = error.responseJSON.errors ;
                }
                if(message['booking.name']) {
                    $('#error-name').text(message['booking.name']);
                }

                if(message['booking.phone']) {
                    $('#error-phone').text(message['booking.phone']);
                }

                if(message['booking.adult']) {
                    $('#error-adult').text(message['booking.adult']);
                }

                if(message['booking.child']) {
                    $('#error-child').text(message['booking.child']);
                }

                if(message['booking.start_date']) {
                    $('#error-start_date').text(message['booking.start_date']);
                }

                if(message['booking.end_date']) {
                    $('#error-end_date').text(message['booking.end_date']);
                }
            })
        })

        function removeError() {
            $('#error-name').text('');
            $('#error-phone').text('');
            $('#error-adult').text('');
            $('#error-child').text('');
            $('#error-start_date').text('');
            $('#error-end_date').text('');
        }
    </script>
@endpush
