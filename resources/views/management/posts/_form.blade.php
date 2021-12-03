<div class="mt-5 container border">
    <div>
        <label>Tên bài viết</label>
        <input class="form-control" id="post-name" name="post[title]" type="text" value="{{ old('post.title', $post->title ?? null) }}">
        <div class="invalid-feedback d-block">{{ $errors->first("post.title") }}</div>
    </div>
    <div class="mt-3">
        <div>
            <label>Từ khóa</label>
            <input class="form-control" id="post-seo_tag" name="post[tag]" type="text" value="{{ old('post.tag', $post->tag ?? null) }}">
        </div>
        <div class="invalid-feedback d-block">{{ $errors->first("post.tag") }}</div>
    </div>
    <div class="mt-3">
        <label>Nội dung</label>
        <textarea class="form-control" rows="5" id="post-description" name="post[description]" type="text">{{ old('post.description', $post->description ?? null) }}</textarea>
        <div class="invalid-feedback d-block">{{ $errors->first("post.description") }}</div>
    </div>
    <div class="mt-3">
        <div>
            <label>Vùng miền</label>
        </div>
        @foreach(\App\Models\Post::REGIONS as $key => $status)
            <input type="radio" id="customer-status-{{ $key }}" name="post[region]" value="{{$key}}" class="mr-1"
                   @if(old('customer.status', $customer->status ?? []) == $key) checked @endif
            ><label class="mr-3" for="customer-status-{{ $key }}">{{ $status }}</label>
        @endforeach
        <div class="invalid-feedback d-block">{{ $errors->first("post.region") }}</div>
    </div>
    <div class="mt-3">
        <button type="submit" name="submit" class="btn btn-secondary">Tạo mới</button>
    </div>
</div>
@push('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#post-description'), {
                ckfinder: {
                    uploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Images&responseType=json",
                }
            }).catch(error => {
            console.error(error);
        });
    </script>
@endpush
