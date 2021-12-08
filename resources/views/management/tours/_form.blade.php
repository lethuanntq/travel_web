<div class="container border">
    <div class="form-group">
        <label class="col-form-label">Tên tour</label>
        <input class="form-control" id="tour-title" name="tour[title]" type="text" value="{{ old("tour.title", $tour->title ?? '') }}">
        <div class="invalid-feedback d-block">{{ $errors->first("tour.title") }}</div>
    </div>
    <div class="form-group">
        <div>
            <label>Giá</label>
            <input class="form-control" id="tour-price" name="tour[price]" type="text" value="{{ old("tour.price", $tour->price ?? '') }}">
            <div class="invalid-feedback d-block">{{ $errors->first("tour.price") }}</div>
        </div>
    </div>
    <div class="form-group">
        <div>
            <label>Giá khuyến mại</label>
            <input class="form-control" id="tour-price-promotion" name="tour[price_promotion]" type="text" value="{{ old("tour.price_promotion", $tour->price_promotion ?? '') }}">
            <div class="invalid-feedback d-block">{{ $errors->first("tour.price_promotion") }}</div>
        </div>
    </div>
    <div class="form-group">
        <div>
            <label>Từ khóa</label>
            <input class="form-control" id="tour-tag" name="tour[tag]" type="text" value="{{ old("tour.tag", $tour->tag ?? '') }}">
            <div class="invalid-feedback d-block">{{ $errors->first("tour.tag") }}</div>
        </div>
    </div>
    <div class="form-group">
        <label>Thumbnail</label>
        <div>
            <input id="tour-thumbnail" name="tour[thumbnail]" type="file">
            <div class="holder">
                <img id="imgPreview" src="@isset($tour->thumbnail) {{ $tour->thumbnail }} @else {{ asset( 'avatar/'. 'default-avatar.jpg') }} @endisset" class="img-circle" alt="thumbnail" width="300" height="300">
            </div>
        </div>
        <div class="invalid-feedback d-block">{{ $errors->first("tour.thumbnail") }}</div>
    </div>
    <div class="form-group">
        <label>Mô tả</label>
        <textarea class="form-control" rows="3" id="tour-short_description" name="tour[short_description]" type="text">{{ old('tour.short_description', $tour->short_description ?? null) }}</textarea>
        <div class="invalid-feedback d-block">{{ $errors->first("tour.short_description") }}</div>
    </div>
    <div class="form-group">
        <label>Nội dung</label>
        <textarea class="form-control" rows="5" id="tour-description" name="tour[description]" type="text">{{ old("tour.description", $tour->description ?? '') }}</textarea>
        <div class="invalid-feedback d-block">{{ $errors->first("tour.description") }}</div>
    </div>
    <div class="row form-group">
        <div class="col-md-3">
            <label>Thời gian bắt đầu</label>
            <input class="form-control" id="tour-start_date" name="tour[start_date]" type="datetime-local" value="{{ old("tour.start_date", isset ($tour) ? \Carbon\Carbon::parse($tour->start_date)->format('Y-m-d\TH:i') : '') }}">
            <div class="invalid-feedback d-block">{{ $errors->first("tour.start_date") }}</div>
        </div>
        <span class="text-center" style="margin-top: 3%">~</span>
        <div class="col-md-3">
            <label>Thời gian kết thúc</label>
            <input class="form-control" id="tour-end_date" name="tour[end_date]" type="datetime-local" value="{{ old("tour.end_date", isset ($tour) ? \Carbon\Carbon::parse($tour->end_date)->format('Y-m-d\TH:i') : '') }}">
            <div class="invalid-feedback d-block">{{ $errors->first("tour.end_date") }}</div>
        </div>
    </div>
    <div class="form-group">
        <div>
            <label>Loại</label>
        </div>
        @foreach(\App\Models\Tour::TYPES as $key => $status)
            <input type="radio" id="tour-type-{{ $key }}" name="tour[type]" value="{{$key}}" class="mr-1"
                   @if(old('tour.type', $tour->type ?? []) == $key) checked @endif
            ><label class="mr-3" for="tour-type-{{ $key }}">{{ $status }}</label>
        @endforeach
        <div class="invalid-feedback d-block">{{ $errors->first("tour.type") }}</div>
    </div>
    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary">@isset($tour) Cập nhật @else Tạo mới @endisset</button>
    </div>
</div>
@push('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#tour-description'), {
                ckfinder: {
                    uploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Images&responseType=json",
                }
            }).catch(error => {
            console.error(error);
        });

        $(document).ready(()=>{
            $('#tour-thumbnail').change(function(){
                const file = this.files[0];
                if (file){
                    let reader = new FileReader();
                    reader.onload = function(event){
                        $('#imgPreview').attr('src', event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endpush
