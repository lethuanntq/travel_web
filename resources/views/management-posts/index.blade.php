@extends('layouts.app')
@section('content')
    <div class="ml-3 mr-3">
        @if(\Illuminate\Support\Facades\Session::has('message'))
            <div class="success alert-success" style="width: 30%">{{ \Illuminate\Support\Facades\Session::get('message') }}</div>
        @endif
        <div class="mt-sm-5">
        <div class="row">
            <div class="col-sm-8">
                <form >
                    <div class="input-group rounded mb-2"  style="width: 45%">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                               aria-describedby="search-addon" />
                        <button type="button" class="btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-sm-4">
                <a  href="{{ route('management-post.create') }}" class="btn btn-secondary float-right">Tạo mới</a>
            </div>
        </div>
            <table class="table table-striped" id="posts-table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col" style="width: 40%">Nội dung</th>
                    <th scope="col">Người tạo</th>
                    <th scope="col">Seo Tag</th>
                    <th scope="col">Seo Description</th>
                    <th scope="col" style="width: 20%">Action</th>
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
                ajax: '{!! route('management-post.data') !!}',
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


