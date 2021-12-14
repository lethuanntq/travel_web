@php
    $currentTime = \Carbon\Carbon::now();
    $customers = \App\Models\User::where('role', \App\Models\User::ROLE_EDITOR)->get();
    $tours = \App\Models\Tour::all()
@endphp
<style>
    .ck-editor__editable_inline {
        min-height: 250px;
    }
</style>
<div class="container border">
    <div class="form-group">
        <label>Tên khách hàng</label>
        <input class="form-control w-50" name="booking[name]" value="{{ old('booking.name', $booking->name) }}">
        <div class="invalid-feedback d-block">{{ $errors->first("booking.name") }}</div>
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
    <div class="form-group">
        <label>Số điện thoại</label>
        <input class="form-control w-50" name="booking[phone]" value="{{ old('booking.phone', $booking->phone) }}">
        <div class="invalid-feedback d-block">{{ $errors->first("booking.phone") }}</div>
    </div>
    <div class="form-group">
        <label>Số lượng người lớn</label>
        <input type="number" class="form-control w-50" name="booking[adult]" value="{{ old('booking.adult', $booking->adult) }}">
        <div class="invalid-feedback d-block">{{ $errors->first("booking.adult") }}</div>
    </div>
    <div class="form-group">
        <label>Số lượng trẻ em</label>
        <input type="number" class="form-control w-50" name="booking[child]" value="{{ old('booking.child', $booking->child) }}">
        <div class="invalid-feedback d-block">{{ $errors->first("booking.child") }}</div>
    </div>
    <div class="row form-group w-50">
        <div class="col-md-5">
            <label>Thời gian bắt đầu</label>
            <input class="form-control" id="booking-start_date" name="booking[start_date]"
                   type="datetime-local" value="{{ old("booking.start_date", isset ($booking) ? \Carbon\Carbon::parse($booking->start_date)->format('Y-m-d\TH:i') : '') }}">
            <div
                class="invalid-feedback d-block">{{ $errors->first("booking.start_date") }}</div>
        </div>
        <span class="text-center" style="margin-top: 7%">~</span>
        <div class="col-md-5">
            <label>Thời gian kết thúc</label>
            <input class="form-control" id="booking-end_date" name="booking[end_date]"
                   type="datetime-local" value="{{ old("booking.start_date", isset ($booking) ? \Carbon\Carbon::parse($booking->start_date)->format('Y-m-d\TH:i') : '') }}">
            <div class="invalid-feedback d-block">{{ $errors->first("booking.end_date") }}</div>
        </div>
    </div>
    <div  class="form-group">
        <label>Note</label>
        <textarea class="form-control" rows="5" id="booking-note" name="booking[note]">{{ old('booking.note', $booking->note ?? null) }}</textarea>
        <div class="invalid-feedback d-block">{{ $errors->first("booking.note") }}</div>
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
        <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
    </div>
</div>
