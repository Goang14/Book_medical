@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                {{-- <div class="card-body"> --}}
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <body>
                            <div class="limiter">
                                <div class="container-login100" style="background-image: url('/images/bg/slider-bg-1.jpg');">
                                    <div class="wrap-login100 p-t-30 p-b-50">
                                        <span class="login100-form-title p-b-41">
                                            Account Login
                                        </span>
                                        <form class="login100-form validate-form p-b-33 p-t-5">

                                            <div class="wrap-input100 validate-input" data-validate = "Enter username">
                                                {{-- <input class="input100" type="text" name="username" placeholder="User name"> --}}
                                                <input id="email" type="email" class="form-control input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                                            </div>

                                            <div class="wrap-input100 validate-input" data-validate="Enter password">
                                                {{-- <input class="input100" type="password" name="pass" placeholder="Password"> --}}
                                                <input id="password" type="password" class="form-control input100  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                                            </div>

                                            <div class="container-login100-form-btn m-t-32">
                                                <button class="login100-form-btn">
                                                    {{ __('Login') }}
                                                </button>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6 offset-md-4 mt-3 ms-0">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label class="form-check-label text-white" for="remember">
                                                            {{ __('Remember Me') }}
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 offset-md-4 mt-3 ms-0 ms-auto">
                                                    <div class="form-check">
                                                        <label class="form-check-label text-white" type="button" for="remember">
                                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="dropDownSelect1"></div>
                        </body>
                    </form>
                {{-- </div> --}}
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/main.js') }}"></script>

@endsection
