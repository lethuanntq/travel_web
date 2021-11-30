<div class="mt-5 container border">
    <div>
        <label>Tên tour</label>
        <input class="form-control" id="tour-title" name="tour[title]" type="text" value="{{ old("tour.title", $tour->title ?? '') }}">
        <div class="invalid-feedback d-block">{{ $errors->first("tour.title") }}</div>
    </div>
    <div class="mt-3">
        <div>
            <label>Giá</label>
            <input class="form-control" id="tour-price" name="tour[price]" type="text" value="{{ old("tour.price", $tour->price ?? '') }}">
            <div class="invalid-feedback d-block">{{ $errors->first("tour.price") }}</div>
        </div>
    </div>
    <div class="mt-3">
        <div>
            <label>Giá khuyến mại</label>
            <input class="form-control" id="tour-price-promotion" name="tour[price_promotion]" type="text" value="{{ old("tour.price_promotion", $tour->price_promotion ?? '') }}">
            <div class="invalid-feedback d-block">{{ $errors->first("tour.price_promotion") }}</div>
        </div>
    </div>
    <div class="mt-3">
        <div>
            <label>Từ khóa</label>
            <input class="form-control" id="tour-tag" name="tour[tag]" type="text" value="{{ old("tour.tag", $tour->tag ?? '') }}">
            <div class="invalid-feedback d-block">{{ $errors->first("tour.tag") }}</div>
        </div>
    </div>
    <div class="mt-3">
        <label>Nội dung</label>
        <textarea class="form-control" rows="5" id="tour-description" name="tour[description]" type="text">{{ old("tour.description", $tour->description ?? '') }}</textarea>
        <div class="invalid-feedback d-block">{{ $errors->first("tour.description") }}</div>
    </div>
    <div class="row mt-3">
        <div class="col-md-3">
            <label>Thời gian bắt đầu</label>
            <input class="form-control" id="tour-start_date" name="tour[start_date]" type="datetime-local" value="{{ old("tour.start_date", \Carbon\Carbon::parse($tour->start_date)->format('Y-m-d\TH:i') ?? '') }}">
            <div class="invalid-feedback d-block">{{ $errors->first("tour.start_date") }}</div>
        </div>
        <span class="text-center" style="margin-top: 3%">~</span>
        <div class="col-md-3">
            <label>Thời gian kết thúc</label>
            <input class="form-control" id="tour-end_date" name="tour[end_date]" type="datetime-local" value="{{ old("tour.end_date", \Carbon\Carbon::parse($tour->end_date)->format('Y-m-d\TH:i') ?? '') }}">
            <div class="invalid-feedback d-block">{{ $errors->first("tour.end_date") }}</div>
        </div>
    </div>
    <div class="mt-3">
        <button type="submit" name="submit" class="btn btn-secondary">Tạo mới</button>
    </div>
</div>
@push('scripts')
    <script>
        CKEDITOR.replace('tour-description')
    </script>
@endpush
