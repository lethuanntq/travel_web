@extends('travel.layout.app')
@section('title', $tour->title)
@section('meta_keywords', $tour->seo_tag)
@section('meta_description', $tour->seo_description)
@section('travel_content')
    <div class="alert alert-success text-danger" id="booking-success" style="display: none"></div>
    <div class="card">
        <div class="card-body" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-9">
                    <div>
                        <h1 class="post-title">{{ $tour->title }}</h1>
                        <div class="clearfix mt-4">
                            <span class="datetime"><img src="https://hanoitourist.com.vn/templates/default/images/icon-date.png">&nbsp{{ $tour->updated_at->format('d/m/Y H:i') }}</span>
                        </div>
                        <div class="clearfix p-3 row">
                            <div class="col-6" style="">
                                <p>
                                    <?php $price = $tour->price; if( $tour->price_promotion){ $price = $tour->price_promotion;  } ?>
                                    <strong>Giá: </strong>
                                        <?php if($tour->price_promotion){ ?>
                                        <del>{{ number_format($tour->price) . \App\Models\Setting::CURRENCY }}</del>
                                        <?php } ?>
                                        <span class="price">{{ number_format($price) . \App\Models\Setting::CURRENCY }}</span>
                                </p>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#booking-tour">
                                    ĐẶT TOUR
                                </button>

                            </div>
                            <div class="col-6">
                                Đánh giá:
                                <!-- Add icon library -->
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                                <style type="text/css">
                                    .checked {
                                        color: orange;
                                    }
                                    .rating-star span {
                                        cursor: pointer;
                                    }
                                </style>
                                <span data-id="{{$tour->id}}" class="rating-star {{ Session::has('rating_'. $tour->id) ? 'disable' : '' }}">
                                    @for($i = 1; $i <= 5; $i++)
                                    <span data-star="{{$i}}" class="star-{{$i}} fa fa-star {{ ($tour->vote >= $i) ? 'checked' : '' }}"></span>
                                    @endfor
                                </span>
                                (<strong class="tour-vote" style="color: #fa549d;">{{$tour->vote}}</strong>)
{{--                                <a class="rating social-like {{ Session::has('rating_'. $tour->id) ? 'disable' : '' }}" data-type="like" data-id="{{$tour->id}}">--}}
{{--                                    <span class="like"><i class="mdi mdi-thumb-up-outline"></i></span>--}}
{{--                                    <span class="count c-like" >{{ $tour->like }}</span>--}}
{{--                                </a>--}}
{{--                                &nbsp;--}}
{{--                                <a class="rating social-dislike {{ Session::has('rating_'. $tour->id) ? 'disable' : '' }}" data-type="dislike" data-id="{{$tour->id}}" >--}}
{{--                                    <span class="count c-dislike" >{{ $tour->dislike }}</span>--}}
{{--                                    <span class="like"><i class="mdi mdi-thumb-down-outline"></i></span>--}}
{{--                                </a>--}}
{{--                                <div class="clearfix"></div>--}}
                                <br>
                                <small class="font-italic text-warning rating-warning"></small>
                                <small class="font-italic text-success rating-success"></small><br>
                            </div>
                        </div>
                        <div class="post-summary row-item mt-4">{{ $tour->short_description }}</div>
                        <div class="post-description row-item mt-4">{!! $tour->description !!}</div>
                        <div class="fb-comments"  data-href="{{ route('travel.tour.detail',['tour' => $tour->slug ]) }}" data-width="100%" data-numposts="5"></div>
                    </div>

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
        $('.rating').click(function () {
            if($(this).hasClass('disable'))
            {
                $('.rating-success').empty();
                $('.rating-warning').text('Bạn đã đánh giá rồi!');
                return;
            }
            $('.rating').addClass('disable');
            type = $(this).data('type');
            id = $(this).data('id');
            currentCount = $(this).find('.count').text();
            $(this).find('.count').empty().html(parseInt(currentCount) + 1);
            $.ajax({
                url: '{{ route('travel.tour.rating') }}',
                type: 'post',
                data: {type, id}
            }).done(function (response) {
                $('.rating-success').text(response.message)
            }).fail(function (error) {

            })
        })
        $('.rating-star span').click(function(){
            ratingStar = $('.rating-star');
            if(ratingStar.hasClass('disable'))
            {
                $('.rating-success').empty();
                $('.rating-warning').text('Bạn đã đánh giá rồi!');
                return;
            }
            ratingStar.addClass('disable');
            star = $(this).data('star');
            id = ratingStar.data('id');

            $.ajax({
                url: '{{ route('travel.tour.rating.star') }}',
                type: 'post',
                data: {star, id}
            }).done(function (response) {
                $('.tour-vote').text(parseInt(response.vote));
                $('.rating-success').text(response.message);

                $( ".rating-star span" ).each(function( index ) {
                    if ( $(this).data('star') >  response.vote) {
                        $(this).removeClass('checked');
                    }else{
                        $(this).addClass('checked');
                    }

                });

            }).fail(function (error) {

            })

        });

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
