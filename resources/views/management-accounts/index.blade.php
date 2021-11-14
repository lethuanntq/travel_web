@extends('layouts.app')
@section('content')
    <div class="ml-3 mr-3">
        @if(\Illuminate\Support\Facades\Session::has('message'))
            <div class="success alert-success" style="width: 30%">{{ \Illuminate\Support\Facades\Session::get('message') }}</div>
        @endif
        <div>
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
                    <a href="{{ route('management-account.create') }}" class="btn btn-secondary float-right">Tạo mới</a>
                </div>
            </div>
            <table class="table table-striped" id="users-table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Chức vụ</th>
                    <th scope="col"></th>
                </tr>
                </thead>
{{--                <tbody>--}}
{{--                <tr>--}}
{{--                    <th scope="row">1</th>--}}
{{--                    <td>Mark</td>--}}
{{--                    <td>Otto</td>--}}
{{--                    <td>@mdo</td>--}}
{{--                    <td style="width: 15%">--}}
{{--                        <a href="#"><u>Xem</u></a>--}}
{{--                        <a href="{{ route('management-account.edit', 2) }}"><u>Chỉnh sửa</u></a>--}}
{{--                        <a href="#"><u>Xóa</u></a>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                </tbody>--}}
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('management-account.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' }
                ]
            });
        });
    </script>
@endpush


