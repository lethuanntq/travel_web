@extends('management.layouts.app')
@section('title', 'Quản lý tài khoản')
@section('content')
    <div class="ml-3 mr-3">
        @if(\Illuminate\Support\Facades\Session::has('message'))
            <div class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('message') }}</div>
        @endif
        <div>
            <div class="row mb-1">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <a id="create-account" href="{{ route('management.account.create') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Tạo Mới</a>
                </div>
            </div>
            <div class="row">
               <div class="col-sm-12">
                   <table class="table table-bordered" id="users-table">
                       <thead>
                       <tr>
                           <th scope="col" style="width: 10px">id</th>
                           <th scope="col" >Họ và tên</th>
                           <th scope="col" style="width: 20%">Email</th>
                           <th scope="col" style="width: 20%">Chức vụ</th>
                           <th scope="col" width="150" class="text-center">Thao tác</th>
                       </tr>
                       </thead>
                   </table>
               </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('management.account.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'role', name: 'role' },
                    { data: 'action', name: 'action' }
                ]
            });
        });
    </script>
@endpush


