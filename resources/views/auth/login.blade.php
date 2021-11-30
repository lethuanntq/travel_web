@extends('auth.layout')
@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start mb-5">
            <h1 class="mb-0 me-3"><b>Welcome to travel website</b></h1>
        </div>
        @if(\Illuminate\Support\Facades\Session::has('error'))
            <div class="danger alert-danger text-center justify-content-center">{{ \Illuminate\Support\Facades\Session::get('error') }}</div>
        @endif
        @if(\Illuminate\Support\Facades\Session::has('success'))
            <div class="success alert-success text-center justify-content-center" >{{ \Illuminate\Support\Facades\Session::get('success') }}</div>
    @endif
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="email">Email address</label>
            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <!-- Password input -->
        <div class="form-outline mb-3">
            <label class="form-label" for="password">Password</label>
            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
                <input class="form-check-input  me-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    Remember me
                </label>
            </div>
            <a href="{{ route('password.request') }}" class="text-body">Forgot password?</a>
        </div>

        <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
        </div>
    </form>
@endsection
