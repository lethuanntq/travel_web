@extends('management.layouts.app')
@section('title', 'Quản lý tour')
@section('content')
    <style>
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #a5a3ab;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 30px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

    </style>
    <div class="ml-3 mr-3">
        @if(\Illuminate\Support\Facades\Session::has('message'))
            <div class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('message') }}</div>
        @endif
            <div id="display-message"  class="alert alert-success" role="alert" style="display: none;width: 15%"></div>
        <div>
            <div class="row mb-1">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <a id="create-account" href="{{  route('management.tour.create') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Tạo mới</a>
                </div>
            </div>
            <table class="table table-striped" id="tour-table">
                <thead>
                <tr>
                    <th scope="col" style="width: 3%">ID</th>
                    <th scope="col" >Tiêu đề</th>
                    <th scope="col" >Mô tả</th>
                    <th scope="col" style="width: 10%">Mức giá</th>
{{--                    <th scope="col" class="col-md-1">Loại</th>--}}
{{--                    <th scope="col" style="width: 13%">Thời gian bắt đầu</th>--}}
{{--                    <th scope="col" style="width: 13%">Thời gian kết thúc</th>--}}
                    <th scope="col" style="width: 10%">Người tạo</th>
                    <th scope="col" style="width: 10%">Hiển thị</th>
                    <th scope="col" width="150" class="text-center">Thao Tác</th>
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
                    { data: 'short_description', name: 'short_description' },
                    { data: 'price', name: 'price' },
                    // { data: 'type', name: 'type' },
                    // { data: 'start_date', name: 'start_date' },
                    // { data: 'end_date', name: 'end_date' },
                    { data: 'created_by', name: 'created_by' },
                    { data: 'display', name: 'display' },
                    { data: 'action', name: 'action' }
                ]
            });
        });
    </script>
@endpush

