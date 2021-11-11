<div class="mt-5 container border">
    <div>
        <label>Họ và tên</label>
        <input class="form-control" id="account-name" name="account[name]" type="text" required>
    </div>
    <div class="mt-3">
        <div>
            <label>Tên tài khoản</label>
            <input class="form-control" id="account-user_name" name="account[user_name]" type="text" required>
        </div>
    </div>
    <div class="mt-3">
        <div>
            <label>Email</label>
            <input class="form-control" id="account-email" name="account[email]" type="email" required>
        </div>
    </div>
    <div class="mt-3">
        <div>
            <label>Số điện thoại</label>
            <input class="form-control" id="account-phone_number" name="account[phone_number]" type="text" required>
        </div>
    </div>
    <div class="mt-3">
        <div>
            <label>Mật khẩu</label>
            <input class="form-control" id="account-password" name="account[password]" type="password" required>
        </div>
    </div>
    <div class="mt-3">
        <div>
            <label class="label">Nhập lại mật khẩu</label>
            <input class="form-control" type="password" required>
        </div>
    </div>
    <div class="mt-3">
            <div>
                <label>Chức vụ</label>
            </div>
            @foreach(\App\Models\User::ROLES as $key => $role)
                <input type="radio" name="account[role]" value="{{$key}}" id="account-role-{{$key}}">
                <label for="account-role-{{$key}}">{{$role}}</label>
            @endforeach
    </div>
    <div class="mt-3">
        <button type="submit" name="submit" class="btn btn-secondary">Save</button>
    </div>
</div>
