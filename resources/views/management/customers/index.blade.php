@extends('management.layouts.app')
@section('content')
    <div class="ml-3 mr-3">
        <div>
            <h1>Quản lý khách hàng</h1>
        </div>
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
                    <a href="{{ route('management.customer.create') }}" class="btn btn-secondary float-right">Tạo mới</a>
                </div>
            </div>
            <table class="table table-striped" id="customer-table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Số lần book tour</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Action</th>
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
