@extends('travel.layout.app')
@section('travel_content')
    <div class="card">
        <div class="card-body" data-aos="fade-up">
            <div class="row">
                @if(\Illuminate\Support\Facades\Session::has('success'))
                    <div class="success alert-success" >{{ \Illuminate\Support\Facades\Session::get('success') }}</div>
                @endif
                <div class="col-lg-9">
                    <h1 class="mb-4 text-primary font-weight-600 border-bottom-blue w-50">
                        <div class="d-inline"><i class="mdi mdi-contact-mail m"></i></div>
                        <div class="d-inline"><span>Gửi thông tin liên hệ</span></div>
                    </h1>
                    <form action="{{ route('post.contact') }}" method="post">
                        <div class="mt-5 container">
                            <div>
                                <label class="mb-2">Họ và tên(*)</label>
                                <input class="form-control" id="contact-name" name="contact[name]" type="text" value="{{ old('contact.name') }}">
                                <div class="invalid-feedback d-block">{{ $errors->first("contact.name") }}</div>
                            </div>
                            <div class="mt-3">
                                <div>
                                    <label>Email(*)</label>
                                    <input class="form-control" id="contact-email" name="contact[email]" type="email" value="{{ old('contact.email') }}">
                                </div>
                                <div class="invalid-feedback d-block">{{ $errors->first("contact.email") }}</div>
                            </div>
                            <div class="mt-3">
                                <div>
                                    <label>Số điện thoại(*)</label>
                                    <input class="form-control" id="contact-phone_number" name="contact[phone_number]" type="text" value="{{ old('contact.phone_number', $post->tag ?? null) }}">
                                </div>
                                <div class="invalid-feedback d-block">{{ $errors->first("contact.phone_number") }}</div>
                            </div>
                            <div class="mt-3">
                                <label class="">Nội dung(*)</label>
                                <textarea class="form-control" rows="5" id="contact-description" name="contact[description]" type="text">{{ old('contact.description', $post->description ?? null) }}</textarea>
                                <div class="invalid-feedback d-block">{{ $errors->first("contact.description") }}</div>
                            </div>
                            <div class="mt-3" style="color: red">
                                * Chúng tôi cam kết bảo mật thông tin tuyệt đối cho bạn
                            </div>
                            <div class="mt-3 text-center">
                                <button type="submit" class="btn btn-primary">Gửi đi &nbsp;&nbsp;<i class="mdi mdi-telegram"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3">
                    @include('travel.layout.right_menu', ['highlightPosts' => $highlightPosts])
                </div>
            </div>
        </div>
    </div>
@endsection
