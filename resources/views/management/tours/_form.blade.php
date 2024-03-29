<style>
    .ck-editor__editable_inline {
        min-height: 250px;
    }
</style>
@php
    $provides = [
        'Tây Bắc Bộ' =>	['Hòa Bình','Sơn La','Điện Biên','Lai Châu','Lào Cai','Yên Bái'],
        'Đông Bắc Bộ' => ['Phú Thọ','Hà Giang','Tuyên Quang','Cao Bằng','Bắc Kạn','Thái Nguyên','Lạng Sơn','Bắc Giang','Quảng Ninh'],
        'Đồng bằng sông Hồng' => ['Hà Nội','Bắc Ninh','Hà Nam','Hải Dương','Hải Phòng','Hưng Yên','Nam Định','Thái Bình','Vĩnh Phúc','Ninh Bình'],
        'Bắc Trung Bộ' => ['Thanh Hóa','Nghệ An','Hà Tĩnh','Quảng Bình','Quảng Trị','Thừa Thiên Huế'],
        'Nam Trung Bộ' => ['Đà Nẵng','Quảng Nam','Quảng Ngãi','Bình Định','Phú Yên','Khánh Hòa','Ninh Thuận','Bình Thuận'],
        'Tây Nguyên' => ['Kon Tum','Gia Lai','Đắk Lắk','Đắk Nông','Lâm Đồng'],
        'Đông Nam Bộ' => ['TP Hồ Chí Minh','Bà Rịa Vũng Tàu','Bình Dương','Bình Phước','Đồng Nai','Tây Ninh'],
        'Đồng bằng sông Cửu Long' => ['An Giang','Bạc Liêu','Bến Tre','Cà Mau','Cần Thơ','Đồng Tháp','Hậu Giang','Kiên Giang','Long An','Sóc Trăng','Tiền Giang','Trà Vinh','Vĩnh Long']
    ]
@endphp
<div class="container border">
    <div class="form-group">
        <label class="col-form-label">Tên tour</label>
        <input class="form-control" id="tour-title" name="tour[title]" type="text" value="{{ old("tour.title", $tour->title ?? '') }}">
        <div class="invalid-feedback d-block">{{ $errors->first("tour.title") }}</div>
    </div>
    <div class="form-group">
        <label class="col-form-label">Tên điểm đến</label>
        <select class="form-control" name="tour[destination_name]" id="tour-destination_name">
            @foreach($provides as $key => $provide)
                <optgroup label="{{$key}}">
                    @foreach($provide as $item)
                        <option <?php if(old("tour.destination_name", $tour->destination_name ?? '')== $item) { echo 'selected'; } ?> value="{{$item}}">{{$item}}</option>
                    @endforeach
                </optgroup>
            @endforeach
        </select>
{{--        <input class="form-control" id="tour-destination_name" name="tour[destination_name]" type="text" value="{{ old("tour.destination_name", $tour->destination_name ?? '') }}">--}}
        <div class="invalid-feedback d-block">{{ $errors->first("tour.destination_name") }}</div>
    </div>
    <div class="form-group row">
        <div class="col-6 input-group">
            <label class="col-form-label mr-3">Giá</label>
            <input class="form-control" id="tour-price" name="tour[price]" type="text" value="{{ old("tour.price", $tour->price ?? '') }}">
            <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2">VNĐ</span>
            </div>
            <div class="invalid-feedback d-block">{{ $errors->first("tour.price") }}</div>
        </div>
        <div class="col-6 input-group">
            <label class="col-form-label mr-3">Giá khuyến mại</label>
            <input class="form-control" id="tour-price-promotion" name="tour[price_promotion]" type="text" value="{{ old("tour.price_promotion", $tour->price_promotion ?? '') }}">
            <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2">VNĐ</span>
            </div>
            <div class="invalid-feedback d-block">{{ $errors->first("tour.price_promotion") }}</div>
        </div>
    </div>
    <div class="form-group">

    </div>
    <div class="form-group">
        <div>
            <label>Từ khóa</label>
            <input class="form-control" id="tour-tag" name="tour[tag]" type="text" value="{{ old("tour.tag", $tour->tag ?? '') }}">
            <div class="invalid-feedback d-block">{{ $errors->first("tour.tag") }}</div>
        </div>
    </div>
    <div class="form-group">
        <div>
            <label>SEO Description</label>
            <input class="form-control" id="tour-seo_description" name="tour[seo_description]" type="text" value="{{ old("tour.seo_description", $tour->seo_description ?? '') }}">
            <div class="invalid-feedback d-block">{{ $errors->first("tour.seo_description") }}</div>
        </div>
    </div>
    <div class="form-group">
        <div>
            <label>SEO Tag</label>
            <input class="form-control" id="tour-seo_tag" name="tour[seo_tag]" type="text" value="{{ old("tour.seo_tag", $tour->seo_tag ?? '') }}">
            <div class="invalid-feedback d-block">{{ $errors->first("tour.seo_tag") }}</div>
        </div>
    </div>
    <div class="form-group">
        <label>Thumbnail</label>
        <div>
            <input id="tour-thumbnail" name="tour[thumbnail]" type="file" hidden>
            <div class="holder">
                <label for="tour-thumbnail">
                    <img id="imgPreview" src="@isset($tour->thumbnail) {{ $tour->thumbnail }} @else {{asset('no-image.jpg')}}@endisset" class="img-reposive" alt="thumbnail" width="300" height="">
                </label>
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
{{--    <div class="row form-group">--}}
{{--        <div class="col-md-3">--}}
{{--            <label>Thời gian bắt đầu</label>--}}
{{--            <input class="form-control" id="tour-start_date" name="tour[start_date]" type="datetime-local" value="{{ old("tour.start_date", isset ($tour) ? \Carbon\Carbon::parse($tour->start_date)->format('Y-m-d\TH:i') : '') }}">--}}
{{--            <div class="invalid-feedback d-block">{{ $errors->first("tour.start_date") }}</div>--}}
{{--        </div>--}}
{{--        <span class="text-center" style="margin-top: 3%">~</span>--}}
{{--        <div class="col-md-3">--}}
{{--            <label>Thời gian kết thúc</label>--}}
{{--            <input class="form-control" id="tour-end_date" name="tour[end_date]" type="datetime-local" value="{{ old("tour.end_date", isset ($tour) ? \Carbon\Carbon::parse($tour->end_date)->format('Y-m-d\TH:i') : '') }}">--}}
{{--            <div class="invalid-feedback d-block">{{ $errors->first("tour.end_date") }}</div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="form-group">--}}
{{--        <div>--}}
{{--            <label>Loại</label>--}}
{{--        </div>--}}
{{--        @foreach(\App\Models\Tour::TYPES as $key => $status)--}}
{{--            <input type="radio" id="tour-type-{{ $key }}" name="tour[type]" value="{{$key}}" class="mr-1"--}}
{{--                   @if(old('tour.type', $tour->type ?? \App\Models\Tour::TYPE_NORMAL) == $key) checked @endif--}}
{{--            ><label class="mr-3" for="tour-type-{{ $key }}">{{ $status }}</label>--}}
{{--        @endforeach--}}
{{--        <div class="invalid-feedback d-block">{{ $errors->first("tour.type") }}</div>--}}
{{--    </div>--}}

    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary">@if(isset($tour) && !isset($copy)) Cập nhật @else Tạo mới @endif</button>
        @if(isset($tour) && !isset($copy))
            <a href="{{ route('management.tour.copy', $tour) }}" class="btn btn-warning" target="_blank">Sao chép</a>
        @endif

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
