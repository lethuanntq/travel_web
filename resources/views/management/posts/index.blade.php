@extends('management.layouts.app')
@section('title', 'Quản lý bài viết')
@section('content')
    <div class="ml-3 mr-3">
        @if(Session::has('message'))
            <div class="success alert-success" role="alert">{{ Session::get('message') }}</div>
        @endif
        <div>
            <div class="row mb-1">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <a id="create-account" href="{{  route('management.post.create') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i></a>
                </div>
            </div>
            <table class="table table-striped" id="posts-table">
                <thead>
                <tr>

                    <th scope="col" class="col-md-1">ID</th>
                    <th scope="col" class="col-md-3">Tiêu đề</th>
                    <th scope="col" class="col-md-5">Mô tả</th>
                    <th scope="col" class="col-md-1">Loại</th>
                    <th scope="col" class="col-md-1">Người tạo</th>
                    <th scope="col" class="col-md-1">Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {
            $('#posts-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('management.post.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'title', name: 'title' },
                    { data: 'short_description', name: 'short_description' },
                    { data: 'type', name: 'type' },
                    { data: 'created_by', name: 'created_by' },
                    { data: 'action', name: 'action' },
                ]
            });
        });
    </script>
@endpush


