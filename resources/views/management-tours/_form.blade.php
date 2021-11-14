<div class="mt-5 container border">
    <div>
        <label>Tên tour</label>
        <input class="form-control" id="tour-name" name="tour[name]" type="text" required>
    </div>
    <div class="mt-3">
        <label>Nội dung</label>
        <textarea class="form-control" rows="5" id="tour-description" name="tour[description]" type="text"></textarea>
    </div>
    <div class="mt-3">
        <div>
            <label>Giá</label>
            <input class="form-control" id="tour-price" name="tour[price]" type="text" required>
        </div>
    </div>
    <div class="mt-3">
        <div>
            <label>Giá khuyến mại</label>
            <input class="form-control" id="tour-price-promotion" name="tour[price_promotion]" type="text" required>
        </div>
    </div>
    <div class="mt-3">
        <div>
            <label>Từ khóa</label>
            <input class="form-control" id="tour-key_word" name="tour[key_word]" type="text" required>
        </div>
    </div>
    <div class="mt-3">
        <label>SEO Tag</label>
        <input class="form-control" id="tour-seo_tag" name="tour[seo_tag]" type="text" required>
    </div>
    <div class="mt-3">
        <label>SEO Description</label>
        <textarea class="form-control" rows="5" id="tour-seo_tag" name="tour[seo_description]"></textarea>
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
