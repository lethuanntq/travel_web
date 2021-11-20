@extends('management.layouts.app')
@section('title', 'Quản lý khách hàng')
@section('content')
    <div class="ml-3 mr-3">
        @if(\Illuminate\Support\Facades\Session::has('message'))
            <div class="success alert-success" style="width: 30%">{{ \Illuminate\Support\Facades\Session::get('message') }}</div>
        @endif
        <div class="mt-sm-5">
            <div class="row mb-1">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <a id="create-account" href="{{  route('management.customer.create') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i></a>
                </div>
            </div>
            <table class="table table-striped" id="customer-table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Số lần book tour</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col" style="width: 10%">Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {
            $('#customer-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('management.customer.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'user_id', name:'user_id' },
                    { data: 'number_booked', name: 'number_booked' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action' }
                ]
            });
        });
    </script>
@endpush
