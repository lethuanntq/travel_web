@extends('management.layouts.app')
@section('title', 'Chỉnh sửa thông số hệ thống')

@section('content')
    <div class="ml-3 mr-3">
        @if(Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
        <form method="post" action="{{ route('management.setting.update', $setting) }}">
            @csrf
            @method('patch')
            <div class="container border">
                <div class="form-group">
                    <div>
                        <label class="col-form-label">Số điện thoại</label>
                        <input class="form-control" name="setting[phone_number]" type="text" value="{{ old('setting.phone_number', $setting->phone_number ?? null) }}">
                        <div class="invalid-feedback d-block">{{ $errors->first("setting.phone_number") }}</div>
                    </div>
                    <div>
                        <label class="col-form-label">Hot line</label>
                        <input class="form-control"  name="setting[hot_line]" type="text" value="{{ old('setting.hot_line', $setting->hot_line ?? null) }}">
                        <div class="invalid-feedback d-block">{{ $errors->first("setting.hot_line") }}</div>
                    </div>
                    <div>
                        <label class="col-form-label">EMail hỗ trợ</label>
                        <input class="form-control" name="setting[support_email]" type="text" value="{{ old('setting.support_email', $setting->support_email ?? null) }}">
                        <div class="invalid-feedback d-block">{{ $errors->first("setting.support_email") }}</div>
                    </div>
                    <div>
                        <label class="col-form-label">Trụ sở chính</label>
                        <input class="form-control" name="setting[headquarters]" type="text" value="{{ old('setting.headquarters', $setting->headquarters ?? null) }}">
                        <div class="invalid-feedback d-block">{{ $errors->first("setting.headquarters") }}</div>
                    </div>
                    <div>
                        <label class="col-form-label">Chi nhánh 1</label>
                        <input class="form-control" name="setting[branch_1]" type="text" value="{{ old('setting.branch_1', $setting->branch_1 ?? null) }}">
                        <div class="invalid-feedback d-block">{{ $errors->first("setting.branch_1") }}</div>
                    </div>
                    <div>
                        <label class="col-form-label">Chi nhánh 2</label>
                        <input class="form-control" name="setting[branch_2]" type="text" value="{{ old('setting.branch_2', $setting->branch_2 ?? null) }}">
                        <div class="invalid-feedback d-block">{{ $errors->first("setting.branch_2") }}</div>
                    </div>
                    <div>
                        <label class="col-form-label">Website</label>
                        <input class="form-control" name="setting[website]" type="text" value="{{ old('setting.website', $setting->website ?? null) }}">
                        <div class="invalid-feedback d-block">{{ $errors->first("setting.website") }}</div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </div>
        </form>
    </div>
@endsection
