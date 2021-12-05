@extends('travel.layout.app')

@section('travel_content')
    <style>
        .experiences-title {
            font-size: 30px;
            line-height: 38px;
            color: #0055a5;
            font-weight: 500;
            text-align: justify;
        }
        .summary {
            color: #333;
            font-size: 15px;
            line-height: 22px;
            margin-bottom: 10px;
            text-align: justify;
            font-weight: 700;
        }
        .description {
            line-height: 22px;
            font-size: 15px;
            margin-bottom: 20px;
            color: #333;
            text-align: justify;
        }
    </style>
    <div class="card">
        <div class="card-body" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-9">
                    <div>
                        <h1 class="experiences-title">{{ $post->title }}</h1>
                        <div class="experiences-date clearfix mt-4">
                            <span class="datetime"><img src="https://hanoitourist.com.vn/templates/default/images/icon-date.png">&nbsp{{ $post->updated_at->format('d/m/Y H:i') }}</span>
                        </div>
                        <div class="summary row-item mt-4">{{ $post->short_description }}</div>
                        <div class="description row-item mt-4">{!! $post->description !!}</div>
                    </div>
                </div>
                <div class="col-lg-3">
                    @include('travel.layout.right_menu')
                </div>
            </div>
        </div>
    </div>
@endsection
