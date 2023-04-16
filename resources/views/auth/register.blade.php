@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <body>
                        <div class="limiter">
                            <div class="container-login100" style="background-image: url('/images/bg/slider-bg-1.jpg');">
                                <div class="wrap-login100 p-t-30 p-b-50">
                                    <span class="login100-form-title p-b-41">
                                        Account Register
                                    </span>
                                    <div class="wrap-input100 validate-input text-white">
                                        Name
                                        <input id="name" type="text" class="form-control input100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="wrap-input100 validate-input text-white">
                                        Email
                                        <input id="email" type="email" class="form-control input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="wrap-input100 validate-input text-white" data-validate="Enter password">
                                        Password
                                        <input id="password" type="password" class="form-control input100 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="wrap-input100 validate-input text-white" data-validate="Enter password">
                                        Confirm Password
                                        <input id="password-confirm" type="password" class="form-control input100" name="password_confirmation" required autocomplete="new-password">
                                    </div>

                                    <div class="container-login100-form-btn m-t-32">
                                        <button class="login100-form-btn">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </body>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


