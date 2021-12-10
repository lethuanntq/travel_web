<h2 class="mb-4 text-primary font-weight-600">
    Bài viết nổi bật
</h2>
@foreach($highlightPosts as $highlightPost)
<div class="row">
    <div class="col-sm-12">
        <div class="border-bottom pb-4 pt-4">
            <div class="row">
                <div class="col-sm-8">
                    <h5 class="font-weight-600 mb-1">
                        {{ $highlightPost->title ?? null}}
                    </h5>
                    @php

                    @endphp
                    <p class="fs-13 text-muted mb-0">
                        <span class="mr-2">Tin tức </span>{{ $highlightPost->created_at ?  \Carbon\Carbon::now()->diffForHumans($highlightPost->created_at) : null }}
                    </p>
                </div>
                <div class="col-sm-4">
                    <div class="rotate-img">
                        <img
                            src="{{ $highlightPost->thumbnail ?? '#'}}"
                            class="img-fluid"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
