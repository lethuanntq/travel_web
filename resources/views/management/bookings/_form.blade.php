@php
    $currentTime = \Carbon\Carbon::now();
    $customers = \App\Models\User::where('role', \App\Models\User::ROLE_EDITOR)->get();
    $tours = \App\Models\Tour::whereDate('start_date', '>=', $currentTime)
        ->whereDate('end_date', '>=', $currentTime)
        ->get();
@endphp
<div class="container border">
    <div class="form-group">
        <label>Tên khách hàng</label>
        <select id="booking-user_id" name="booking[user_id]" class="form-control" style="width: 50%">
            <option value=""></option>
            @foreach($customers as $customer)
                <option value="{{ $customer->id  }}" @if(old('booking.user_id', $booking->user_id ?? []) == $customer->id) selected @endif>{{ $customer->name }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback d-block">{{ $errors->first("booking.user_id") }}</div>
    </div>
    <div  class="form-group">
        <div>
            <label>Chọn tour</label>
            <select id="booking-tour_id" name="booking[tour_id]" class="form-control" style="width: 50%">
                <option value=""></option>
                @foreach($tours as $tour)
                    <option value="{{ $tour->id  }}" @if(old('booking.tour_id', $booking->tour_id ?? []) == $tour->id) selected @endif>{{ $tour->title }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback d-block">{{ $errors->first("booking.tour_id") }}</div>
        </div>
    </div>
    <div  class="form-group">
        <label>Note</label>
        <textarea class="form-control" rows="5" id="booking-note" name="booking[note]">{{ old('booking.note', $booking->note ?? null) }}</textarea>
        <div class="invalid-feedback d-block">{{ $errors->first("booking.name") }}</div>
    </div>
    <div  class="form-group">
        <div>
            <label>Trạng thái</label>
        </div>
        @foreach(\App\Models\Booking::STATUS as $key => $status)
            <input type="radio" id="booking-status-{{ $key }}" name="booking[status]" value="{{$key}}" class="mr-1"
            @if(old('booking.status', $booking->status ?? null) == $key) checked @endif
            ><label class="mr-3" for="booking-status-{{ $key }}">{{ $status }}</label>
        @endforeach
        <div class="invalid-feedback d-block">{{ $errors->first("booking.status") }}</div>
    </div>
    <div  class="form-group">
        <button type="submit" name="submit" class="btn btn-primary">Tạo mới</button>
    </div>
</div>
