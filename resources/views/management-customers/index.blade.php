@extends('layouts.app')
@section('content')
    <div class="ml-3 mr-3">
        <div>
            <h1>Quản lý khách hàng</h1>
        </div>
        <div class="mt-sm-5">
            <form>
                <div class="input-group rounded mb-2" style="width: 30%">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                           aria-describedby="search-addon" />
                    <button type="button" class="btn">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td style="width: 15%">
                        <a href="#"><u>Xem</u></a>
                        <a href="#"><u>Chỉnh sửa</u></a>
                        <a href="#"><u>Xóa</u></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection


@extends('layouts.app')
