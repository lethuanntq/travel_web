<div class="container border">
    <div class="form-group">
        <label class="col-form-label">Tên bài viết</label>
        <input class="form-control" id="post-name" name="post[title]" type="text" value="{{ old('post.title', $post->title ?? null) }}">
        <div class="invalid-feedback d-block">{{ $errors->first("post.title") }}</div>
    </div>
    <div class="form-group">
        <div>
            <label>Từ khóa</label>
            <input class="form-control" id="post-seo_tag" name="post[tag]" type="text" value="{{ old('post.tag', $post->tag ?? null) }}">
        </div>
        <div class="invalid-feedback d-block">{{ $errors->first("post.tag") }}</div>
    </div>
    <div class="form-group">
        <label>Thumbnail</label>
        <div>
            <input id="post-thumbnail" name="post[thumbnail]" type="file">
            <div class="holder">
                <img id="imgPreview" src="@isset($post->thumbnail) {{ $post->thumbnail }} @else {{ asset( 'avatar/'. 'default-avatar.jpg') }} @endisset" class="img-circle" alt="thumbnail" width="300" height="300">
            </div>
        </div>
        <div class="invalid-feedback d-block">{{ $errors->first("post.thumbnail") }}</div>
    </div>
    <div class="form-group">
        <label>Mô tả</label>
        <textarea class="form-control" rows="3" id="post-short_description" name="post[short_description]" type="text">{{ old('post.short_description', $post->short_description ?? null) }}</textarea>
        <div class="invalid-feedback d-block">{{ $errors->first("post.short_description") }}</div>
    </div>
    <div class="form-group">
        <label>Nội dung</label>
        <textarea class="form-control" rows="5" id="post-description" name="post[description]" type="text">{{ old('post.description', $post->description ?? null) }}</textarea>
        <div class="invalid-feedback d-block">{{ $errors->first("post.description") }}</div>
    </div>
    <div class="form-group">
        <div>
            <label>Loại</label>
        </div>
        @foreach(\App\Models\Post::TYPES as $key => $status)
            <input type="radio" id="post-type-{{ $key }}" name="post[type]" value="{{$key}}" class="mr-1"
                   @if(old('post.type', $post->type ?? []) == $key) checked @endif
            ><label class="mr-3" for="post-type-{{ $key }}">{{ $status }}</label>
        @endforeach
        <div class="invalid-feedback d-block">{{ $errors->first("post.type") }}</div>
    </div>
    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary">@isset($post) Cập nhật @else Tạo mới @endisset</button>
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

        $(document).ready(()=>{
            $('#post-thumbnail').change(function(){
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
