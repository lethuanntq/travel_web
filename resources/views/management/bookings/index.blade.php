@extends('management.layouts.app')
@section('title', 'Quản lý booking')
@section('content')
    <div class="ml-3 mr-3">
        @if(\Illuminate\Support\Facades\Session::has('message'))
            <div class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('message') }}</div>
        @endif
            <div class="form-group form-inline" id="levelFilterWrapper">
                <label for="booking-status-filter" class="col-form-label mr-3">Trạng thái :</label>
                <select id="booking-status-filter" name="booking-status-filter" class="form-control">
                    <option value="">Tất cả</option>
                    <option value="0">Mới</option>
                    <option value="1">Đang đợi phản hồi</option>
                    <option value="2">Đã đặt cọc</option>
                    <option value="3">Đang tiến hành</option>
                    <option value="4">Đã hoàn thành</option>
                    <option value="5">Đã hủy</option>
                </select>
            </div>
        <div class="">
            <table class="table table-striped" id="booking-table">
                <thead>
                <tr>
                    <th scope="col" width="50px">ID</th>
                    <th scope="col">Khách hàng</th>
                    <th scope="col">Tour</th>
{{--                    <th scope="col">Ghi Chú</th>--}}
                    <th scope="col">Trạng thái</th>
                    <th scope="col" width="150px">Thao tác</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
       var bookingTable =  $('#booking-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url :    '{!! route('management.booking.data') !!}',
                data: function(d){
                    d.status =   $('#booking-status-filter').val()
                }
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'customer', name:'customer' },
                { data: 'tour', name:'tour' },
                // { data: 'note', name:'note' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action' }
            ]
        });

        $('#booking-status-filter').change(function (e) {
            bookingTable.draw();
        });
    </script>
@endpush
