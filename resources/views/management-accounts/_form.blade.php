<div class="mt-5 container border">
    <div>
        <label>Họ và tên</label>
        <input class="form-control" id="account-name" name="account[name]" type="text" value="{{ old('account.name') }}">
        <div class="invalid-feedback">{{ $errors->first("account.name") }}</div>
    </div>
    <div class="mt-3">
        <div>
            <label>Email</label>
            <input class="form-control" id="account-email" name="account[email]" type="email" required value="{{ old('account.email') }}">
            <div class="invalid-feedback">{{ $errors->first("email") }}</div>
        </div>
    </div>
    <div class="mt-3">
        <div>
            <label>Số điện thoại</label>
            <input class="form-control" id="account-phone_number" name="account[phone_number]" type="text" value="{{ old('account.phone_number') }}">
            <div class="invalid-feedback">{{ $errors->first("phone_number") }}</div>
        </div>
    </div>
    <div class="mt-3">
        <div>
            <label>Mật khẩu</label>
            <input class="form-control" id="account-password" name="account[password]" type="password" required>
            <div class="invalid-feedback">{{ $errors->first("password") }}</div>
        </div>
    </div>
    <div class="mt-3">
        <div>
            <label class="label">Nhập lại mật khẩu</label>
            <input class="form-control" type="password" required id="account-password_confirm" name="account[password_confirm]">
            <div class="invalid-feedback">{{ $errors->first("password_confirm") }}</div>
        </div>
    </div>
    <div class="mt-3">
            <div>
                <label>Chức vụ</label>
            </div>
            @foreach(\App\Models\User::ROLES as $key => $role)
                <input type="radio" name="account[role]" value="{{$key}}" id="account-role-{{$key}}" @if( old('account.role') == $key) checked @endif>
                <label for="account-role-{{$key}}">{{$role}}</label>
            @endforeach
            <div class="invalid-feedback">{{ $errors->first("role") }}</div>
    </div>
    <div class="mt-3">
        <div>
            <div>
                <label class="label">Trạng thái</label>
            </div>
            <input type="checkbox" value="1" id="account-active" name="account[active]"><span class="ml-2" @if( old('account.active') == 1) checked @endif>Active</span>
            <div class="invalid-feedback">{{ $errors->first("active") }}</div>
        </div>
    </div>
    <div class="mt-3">
        <button type="submit" name="submit" class="btn btn-secondary" value="save">Save</button>
    </div>
</div>
