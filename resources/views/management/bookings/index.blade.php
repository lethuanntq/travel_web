@extends('management.layouts.app')
@section('title', 'Quản lý booking')
@section('content')
    <div class="ml-3 mr-3">
        @if(\Illuminate\Support\Facades\Session::has('message'))
            <div class="success alert-success" style="width: 30%">{{ \Illuminate\Support\Facades\Session::get('message') }}</div>
        @endif
        <div class="">
            <table class="table table-striped" id="booking-table">
                <thead>
                <tr>
                    <th scope="col" class="col-md-1">ID</th>
                    <th scope="col">Khách hàng</th>
                    <th scope="col">Tour</th>
{{--                    <th scope="col">Ghi Chú</th>--}}
                    <th scope="col">Trạng thái</th>
                    <th scope="col" class="col-md-1">Thao tác</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {
            $('#booking-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('management.booking.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'customer', name:'customer' },
                    { data: 'tour', name:'tour' },
                    // { data: 'note', name:'note' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action' }
                ]
            });
        });
    </script>
@endpush
