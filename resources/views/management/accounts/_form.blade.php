@php
@endphp
<div class="container">
    <div>
        <label>Họ và tên</label>
        <input class="form-control" id="account-name" name="account[name]" type="text" value="{{ old('account.name', $user->name ?? null) }}">
        <div class="invalid-feedback d-block">{{ $errors->first("account.name") }}</div>
    </div>
    <div class="mt-3">
        <div>
            <label>Email</label>
            <input class="form-control" id="account-email" name="account[email]" type="email" required value="{{ old('account.email', $user->email ?? null) }}">
            <div class="invalid-feedback d-block">{{ $errors->first("account.email") }}</div>
        </div>
    </div>
    <div class="mt-3">
        <div>
            <label>Số điện thoại</label>
            <input class="form-control" id="account-phone_number" name="account[phone_number]" type="text" value="{{ old('account.phone_number', $user->phone_number ?? null) }}">
            <div class="invalid-feedback d-block">{{ $errors->first("account.phone_number") }}</div>
        </div>
    </div>
    <div class="mt-3">
        <div>
            <label>Mật khẩu</label>
            <input class="form-control" id="account-password" name="account[password]" type="password" required value="{{ old('account.password') }}">
            <div class="invalid-feedback d-block">{{ $errors->first("account.password") }}</div>
        </div>
    </div>
    <div class="mt-3">
        <div>
            <label class="label">Nhập lại mật khẩu</label>
            <input class="form-control" type="password" required id="account-password_confirmation" name="account[password_confirmation]" value="{{ old('account.password_confirmation') }}">
            <div class="invalid-feedback d-block">{{ $errors->first("account.password_confirmation") }}</div>
        </div>
    </div>
    <div class="mt-3">
            <div>
                <label>Chức vụ</label>
            </div>
            @foreach(\App\Models\User::ROLES as $key => $role)
                <input type="radio" name="account[role]" value="{{$key}}" id="account-role-{{$key}}" @if( old('account.role', $user->role ?? null) == $key) checked @endif>
                <label for="account-role-{{$key}}">{{$role}}</label>
            @endforeach
            <div class="invalid-feedback d-block">{{ $errors->first("account.role") }}</div>
    </div>
    <div class="mt-3">
        <div>
            <div>
                <label class="label">Trạng thái</label>
            </div>
            <input type="checkbox" value="1" id="account-active" name="account[active]" @if( old('account.active', $user->active ?? null) == 1) checked @endif><span class="ml-2">Active</span>
            <div class="invalid-feedback d-block">{{ $errors->first("account.active") }}</div>
        </div>
    </div>
    <div class="mt-3">
        <div>
            <div>
                <label class="label">Avatar</label>
            </div>
            <input type="file" id="account-avatar" name="account[avatar]" hidden value="{{ old('account.avatar', $image->path_image ?? null) }}">

            <div style="width: 30%; height: 30%">
                <label id="image-upload" for="account-avatar">
                    <img id="blah" src="{{ asset('avatar/'.old('account.avatar', $image->path_image ?? 'default-avatar.jpg')) }}" style="width: 50%; height: 50%">
                </label>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <button type="submit" name="submit" class="btn btn-secondary" value="save">Save</button>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function () {
                readURL($('#account-avatar'))
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                    $('#image-upload').attr('for', 'account-avatar');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#account-avatar").change(function(){
            readURL(this);
        });

    </script>
@endpush