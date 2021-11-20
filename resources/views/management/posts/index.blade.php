@extends('management.layouts.app')
@section('title', 'Quản lý bài viết')
@section('content')
    <div class="ml-3 mr-3">
        @if(\Illuminate\Support\Facades\Session::has('message'))
            <div class="success alert-success" style="width: 30%">{{ \Illuminate\Support\Facades\Session::get('message') }}</div>
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
                    <th scope="col" style="width: 4%">ID</th>
                    <th scope="col" style="width: 20%">Tiêu đề</th>
                    <th scope="col" style="width: 30%">Nội dung</th>
                    <th scope="col" style="width: 10%">Người tạo</th>
                    <th scope="col" style="width: 10%">Seo Tag</th>
                    <th scope="col" style="width: 10%">Seo Description</th>
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
            $('#posts-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('management.post.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'title', name: 'title' },
                    { data: 'description', name: 'description' },
                    { data: 'created_by', name: 'created_by' },
                    { data: 'seo_description', name: 'seo_description' },
                    { data: 'seo_tag', name: 'seo_tag' },
                    { data: 'action', name: 'action' },
                ]
            });
        });
    </script>
@endpush


