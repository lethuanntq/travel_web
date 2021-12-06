<h2 class="mb-4 text-primary font-weight-600">
    Tin tức du lịch nổi bật
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
<div class="trending">
    <h2 class="mb-4 text-primary font-weight-600">
        Trending
    </h2>
    <div class="mb-4">
        <div class="rotate-img">
            <img
                src="../assets/images/inner/inner_10.jpg"
                alt="banner"
                class="img-fluid"
            />
        </div>
        <h3 class="mt-3 font-weight-600">
            Virus Kills Member Of Advising Iran’s Supreme
        </h3>
        <p class="fs-13 text-muted mb-0">
            <span class="mr-2">Photo </span>10 Minutes ago
        </p>
    </div>
    <div class="mb-4">
        <div class="rotate-img">
            <img
                src="../assets/images/inner/inner_11.jpg"
                alt="banner"
                class="img-fluid"
            />
        </div>
        <h3 class="mt-3 font-weight-600">
            Virus Kills Member Of Advising Iran’s Supreme
        </h3>
        <p class="fs-13 text-muted mb-0">
            <span class="mr-2">Photo </span>10 Minutes ago
        </p>
    </div>
    <div class="mb-4">
        <div class="rotate-img">
            <img
                src="../assets/images/inner/inner_12.jpg"
                alt="banner"
                class="img-fluid"
            />
        </div>
        <h3 class="mt-3 font-weight-600">
            Virus Kills Member Of Advising Iran’s Supreme
        </h3>
        <p class="fs-13 text-muted mb-0">
            <span class="mr-2">Photo </span>10 Minutes ago
        </p>
    </div>
</div>
