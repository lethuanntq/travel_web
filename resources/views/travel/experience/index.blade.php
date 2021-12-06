@extends('travel.layout.app')

@section('travel_content')
    <div class="card">
        <div class="card-body" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-9">
                    {{ $posts->links('travel.layout.pagination') }}
                    <table>
                        <tbody>
                        @foreach($posts as $post)
                            <tr onclick="location.href='{!! route('travel.experience.detail', $post) !!}';" style="cursor: pointer;">
                                <th scope="col" class="w-25">
                                    <img src="{{ $post->thumbnail }}" alt="thumbnail" class="img-fluid">
                                </th>
                                <th scope="col" class="w-75">
                                    <div class="grid-margin ml-5">
                                        <h2 class="mb-2">{{ $post->title }}</h2>
                                        <div class="fs-13 mb-2">{{ $post->updated_at->diffForHumans() }}</div>
                                        <p class="mb-0">{{ $post->short_description }}</p>
                                    </div>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-3">
                    @include('travel.layout.right_menu')
                </div>
            </div>
        </div>
    </div>
@endsection
