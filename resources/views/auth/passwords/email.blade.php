@extends('auth.layout')
@section('content')
@if(\Illuminate\Support\Facades\Session::has('error'))
    <div class="danger alert-danger text-center justify-content-center" style="width: 30%">{{ \Illuminate\Support\Facades\Session::get('error') }}</div>
@endif
<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start mb-5">
        <h1 class="mb-0 me-3"><b>Reset Password</b></h1>
    </div>
    <!-- Email input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="email">Email address</label>
        <input id="email" type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
        <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>
        @enderror
    </div>

    <div class="text-center text-lg-start mt-4 pt-2">
        <button type="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Send Password Reset Link</button>
    </div>
</form>
@endsection
