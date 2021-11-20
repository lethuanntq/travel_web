<div class="mt-5 container border">
    <div>
        <label>Tên khách hàng</label>
        <select id="customer-user_id" name="customer[user_id]" class="form-control" style="width: 50%">
            <option value=""></option>
            @foreach($listCustomers as $listCustomer)
                <option value="{{ $listCustomer->id  }}" @if(old('customer.user_id', $customer->user_id ?? null) == $listCustomer->id) selected @endif>{{ $listCustomer->name }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback d-block">{{ $errors->first("customer.user_id") }}</div>
    </div>
    <div class="mt-3">
        <div>
            <label>Chọn tour</label>
            <select id="customer-tour_id" name="customer[tour_id]" class="form-control" style="width: 50%">
                <option value=""></option>
                @foreach($tours as $tour)
                    <option value="{{ $tour->id  }}" @if(old('customer.tour_id', $customer->tour_id ?? null) == $tour->id) selected @endif>{{ $tour->title }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback d-block">{{ $errors->first("customer.tour_id") }}</div>
        </div>
    </div>
    <div class="mt-3">
        <label>Note</label>
        <textarea class="form-control" rows="5" id="customer-note" name="customer[note]">{{ old('customer.note', $customer->note ?? null) }}</textarea>
        <div class="invalid-feedback d-block">{{ $errors->first("customer.name") }}</div>
    </div>
    <div class="mt-3">
        <div>
            <label>Trạng thái</label>
        </div>
        @foreach(\App\Models\Customer::STATUS as $key => $status)
            <input type="radio" id="customer-status-{{ $key }}" name="customer[status]" value="{{$key}}" class="mr-1"
            @if(old('customer.status', $customer->status ?? null) == $key) checked @endif
            ><label class="mr-3" for="customer-status-{{ $key }}">{{ $status }}</label>
        @endforeach
        <div class="invalid-feedback d-block">{{ $errors->first("customer.status") }}</div>
    </div>
    <div class="mt-3">
        <div>
            <label>Số lần đã book tour</label>
            <input id="customer-number_booked" name="customer[number_booked]" value="0" readonly class="form-control" style="width: 10%">
        </div>
    </div>
    <div class="mt-3">
        <button type="submit" name="submit" class="btn btn-secondary">Tạo mới</button>
    </div>
</div>
