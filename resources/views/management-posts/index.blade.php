@extends('layouts.app')
@section('content')
    <div class="ml-3 mr-3">
        <div>
            <h1>Quản lý bài viết</h1>
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
                <button class="btn btn-secondary float-right">Tạo mới</button>
            </div>
        </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col" style="width: 40%">Nội dung</th>
                    <th scope="col">Người tạo</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td style="width: 40%">Otto</td>
                    <td>@mdo</td>
                    <td style="width: 15%">
                        <a href="#"><u>Chỉnh sửa</u></a>
                        <a href="#"><u>Xóa</u></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection


