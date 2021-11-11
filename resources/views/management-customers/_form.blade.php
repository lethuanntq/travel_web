<div class="mt-5 container border">
    <div>
        <label>Tên khách hàng</label>
        <input class="form-control" id="customer-name" name="customer[name]" type="text" required>
    </div>
    <div class="mt-3">
        <div>
            <label>Số điện thoại</label>
            <input class="form-control" id="customer-phone_number" name="customer[phone_number]" type="text" required>
        </div>
    </div>
    <div class="mt-3">
        <div>
            <label>Email</label>
            <input class="form-control" id="customer-email" name="customer[email]" type="email" required>
        </div>
    </div>
    <div class="mt-3">
        <div>
            <label>Địa chỉ</label>
            <input class="form-control" id="customer-address" name="customer[address]" type="text" required>
        </div>
    </div>
    <div class="mt-3">
        <label>Note</label>
        <textarea class="form-control" rows="5" id="customer-note" name="customer[note]"></textarea>
    </div>
    <div class="mt-3">
        <label>Nội dung</label>
        <select class="form-control">
            <option value=""></option>
            @foreach(\App\Models\Customer::STATUS as $key => $status)
                <option value="{{$key}}">{{$status}}</option>
            @endforeach
        </select>
    </div>
    <div class="mt-3">
        <button type="submit" name="submit" class="btn btn-secondary">Tạo mới</button>
    </div>
</div>
