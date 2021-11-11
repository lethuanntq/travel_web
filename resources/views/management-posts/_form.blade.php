<div class="mt-5 container border">
    <div>
        <label>Tên bài viết</label>
        <input class="form-control" id="post-name" name="post[name]" type="text" required>
    </div>
    <div class="mt-3">
        <label>SEO Tag</label>
        <input class="form-control" id="post-seo_tag" name="post[seo_tag]" type="text" required>
    </div>
    <div class="mt-3">
        <label>Nội dung</label>
        <textarea class="form-control" rows="5" id="post-description" name="post[description]" type="text"></textarea>
    </div>
    <div class="mt-3">
        <label>SEO Description</label>
        <textarea class="form-control" rows="5" id="post-seo_tag" name="post[seo_description]"></textarea>
    </div>
    <div class="mt-3">
        <div>
            <label>Từ khóa</label>
            <input class="form-control" id="post-seo_tag" name="post[key_word]" type="text" required>
        </div>
    </div>
    <div class="mt-3">
        <button type="submit" name="submit" class="btn btn-secondary">Tạo mới</button>
    </div>
</div>
@push('custom-script')
<script>
    CKEDITOR.replace('post-description')
</script>
@endpush
