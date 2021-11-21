@extends('management.layouts.app')
@section('title', 'Quản lý tour')
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
                    <a id="create-account" href="{{  route('management.tour.create') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i></a>
                </div>
            </div>
            <table class="table table-striped" id="tour-table">
                <thead>
                <tr>
                    <th scope="col" style="width: 5%">ID</th>
                    <th scope="col" style="width: 10%">Tiêu đề</th>
                    <th scope="col" style="width: 25%">Nội dung</th>
                    <th scope="col" style="width: 10%">Mức giá</th>
                    <th scope="col" style="width: 15%">Thời gian bắt đầu</th>
                    <th scope="col" style="width: 15%">Thời gian kết thúc</th>
                    <th scope="col" style="width: 10%">Người tạo</th>
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
            $('#tour-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('management.tour.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'title', name: 'title' },
                    { data: 'description', name: 'description' },
                    { data: 'price', name: 'price' },
                    { data: 'start_date', name: 'start_date' },
                    { data: 'end_date', name: 'end_date' },
                    { data: 'created_by', name: 'created_by' },
                    { data: 'action', name: 'action' }
                ]
            });
        });
    </script>
@endpush
