<div class="mt-5 container border">
    <div>
        <label>Tên bài viết</label>
        <input class="form-control" id="post-name" name="post[title]" type="text" value="{{ old('post.title', $post->title ?? null) }}">
        <div class="invalid-feedback d-block">{{ $errors->first("post.title") }}</div>
    </div>
    <div class="mt-3">
        <label>SEO Tag</label>
        <input class="form-control" id="post-seo_tag" name="post[seo_tag]" type="text" value="{{ old('post.seo_tag', $post->seo_tag ?? null) }}">
        <div class="invalid-feedback d-block">{{ $errors->first("post.seo_tag") }}</div>
    </div>
    <div class="mt-3">
        <label>SEO Description</label>
        <textarea class="form-control" rows="5" id="post-seo_description" name="post[seo_description]">{{ old('post.seo_description', $post->seo_description ?? null) }}</textarea>
        <div class="invalid-feedback d-block">{{ $errors->first("post.seo_description") }}</div>
    </div>
    <div class="mt-3">
        <div>
            <label>Từ khóa</label>
            <input class="form-control" id="post-seo_tag" name="post[key_word]" type="text" value="{{ old('post.key_word', $post->key_word ?? null) }}">
        </div>
        <div class="invalid-feedback d-block">{{ $errors->first("post.key_word") }}</div>
    </div>
    <div class="mt-3">
        <label>Nội dung</label>
        <textarea class="form-control" rows="5" id="post-description" name="post[description]" type="text">{{ old('post.description', $post->description ?? null) }}</textarea>
        <div class="invalid-feedback d-block">{{ $errors->first("post.description") }}</div>
    </div>
    <div class="mt-3">
        <button type="submit" name="submit" class="btn btn-secondary">Tạo mới</button>
    </div>
</div>
@push('scripts')
<script>
    CKEDITOR.replace('post-description')
</script>
@endpush
