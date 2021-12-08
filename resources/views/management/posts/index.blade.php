@extends('management.layouts.app')
@section('title', 'Quản lý bài viết')
@section('content')
    <div class="ml-3 mr-3">
        @if(Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
            <div id="highlight-message"  class="text-center" role="alert" style="display: none;width: 15%"></div>
            <div>
            <div class="row mb-1">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <a id="create-account" href="{{  route('management.post.create') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Tạo Mới</a>
                </div>
            </div>
            <table class="table table-striped" id="posts-table">
                <thead>
                <tr>
                    <th scope="col" >ID</th>
                    <th scope="col" >Tiêu đề</th>
                    <th scope="col" width="50%">Mô tả</th>
                    <th scope="col" >Loại</th>
                    <th scope="col">Người tạo</th>
                    <th scope="col" width="100">Nổi bật</th>
                    <th scope="col" width="150"  class="text-center">Thao tác</th>
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
                    { data: 'highlight', name: 'highlight' },
                    { data: 'action', name: 'action' },
                ]
            });
        });
    </script>
@endpush


