@extends('management.layouts.app')
@section('title', 'Bảng thống kê')
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-sm-3 mt-sm-5">
                <h5 class="p-2 bg-gradient-dark">Thống kê về quản lý</h5>
                <ul class="list-group">
                    <li class="list-group-item">Tổng số bài viết : <a href="{{ route('management.post.index') }}">{{ \App\Models\Post::count() }}</a></li>
                    <li class="list-group-item">Tổng số tour : <a href="{{ route('management.tour.index') }}">{{ \App\Models\Tour::count() }}</a></li>
                    <li class="list-group-item">Tổng số khách hàng : <a href="{{ route('management.account.index') }}">{{ \App\Models\User::where('role', \App\Models\User::ROLE_EDITOR)->count() }}</a></li>
                    <li class="list-group-item">Tổng số tài khoản : <a href="{{ route('management.account.index') }}">{{ \App\Models\User::count() }}</a></li>
                </ul>
            </div>
            <div class="col-sm-3 mt-sm-5">
                <h5 class="p-2 bg-gradient-dark">Thống kê về khách hàng</h5>
                <ul class="list-group" style="font-size: 14px">
                    <li class="list-group-item">Tổng số KH chờ xác nhận : <a href="{{ route('management.booking.index') }}">{{ \App\Models\Booking::where('status', \App\Models\Booking::BOOKING)->count() }}</a></li>
                    <li class="list-group-item">Tour đang tiến hành: <a href="{{ route('management.booking.index') }}">{{ App\Models\Booking::where('status', \App\Models\Booking::IN_PROCESS)->count() }}</a></li>
                    <li class="list-group-item">Tổng số KH đã hoàn thành tour: <a href="{{ route('management.booking.index') }}">{{ App\Models\Booking::where('status', \App\Models\Booking::COMPLETED)->count() }}</a></li>
                    <li class="list-group-item">Tổng số KH hủy tour: <a href="{{ route('management.booking.index') }}">{{ \App\Models\Booking::where('status', \App\Models\Booking::CANCEL)->count() }}</a></li>
                </ul>
            </div>
            <div class="col-sm-6 mt-sm-5">
                <h5 class="p-2 bg-gradient-dark">Tour book nhiều nhất</h5>
                <ul class="list-group">
                    @foreach($bookingBiggest as $item)
                        <li class="list-group-item"><a style="font-size: 14px" target="_blank" href="{{  route('travel.tour.detail', $item['slug']) }}">{{ $item['tour_title'] }}</a>({{$item['count']}})</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
           <dib class="col-sm-12">
               <div class="bg-gradient-dark">
                   <div class="card-header border-0">
                       <h3 class="card-title">
                           <i class="fas fa-th mr-1"></i>
                           Số lượng booking 10 ngày gần nhất
                       </h3>
                   </div>
                   <div class="card-body">
                       <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                   </div>
               </div>
           </dib>
        </div>
    </div>
@endsection
@push('scripts')
    <!-- ChartJS -->
            <script src="{{ asset('/vendors/plugins/chart.js/Chart.min.js')}}"></script>
            <script type="text/javascript">
                $(function () {
                    'use strict'
                    // Sales graph chart
                    var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d')
                    // $('#revenue-chart').get(0).getContext('2d');

                    var salesGraphChartData = {
                        labels: {!! json_encode($analytic['month']) !!},
                        datasets: [
                            {
                                label: 'Tổng tour',
                                fill: false,
                                borderWidth: 2,
                                lineTension: 0,
                                spanGaps: true,
                                borderColor: '#efefef',
                                pointRadius: 3,
                                pointHoverRadius: 7,
                                pointColor: '#efefef',
                                pointBackgroundColor: '#efefef',
                                data: {!!  json_encode($analytic['totals']) !!},
                            }
                        ]
                    }

                    var salesGraphChartOptions = {
                        maintainAspectRatio: false,
                        responsive: true,
                        legend: {
                            display: false
                        },
                        scales: {
                            xAxes: [{
                                ticks: {
                                    fontColor: '#efefef'
                                },
                                gridLines: {
                                    display: false,
                                    color: '#efefef',
                                    drawBorder: false
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    stepSize: 5000,
                                    fontColor: '#efefef'
                                },
                                gridLines: {
                                    display: true,
                                    color: '#efefef',
                                    drawBorder: false
                                }
                            }]
                        }
                    }

                    // This will get the first returned node in the jQuery collection.
                    // eslint-disable-next-line no-unused-vars
                    var salesGraphChart = new Chart(salesGraphChartCanvas, { // lgtm[js/unused-local-variable]
                        type: 'line',
                        data: salesGraphChartData,
                        options: salesGraphChartOptions
                    })
                })
            </script>
@endpush
