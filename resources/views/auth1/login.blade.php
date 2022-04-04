@extends('layouts.backend.master-without-nav')

@section('title')
    @lang('translation.Login')
@endsection

@section('body')

    <body>
    @endsection

    @section('content')
    @include('layouts.frontend.stylelib')
    @include('layouts.frontend.header')
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-soft">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="p-4">
                                            <p class="header-style text-center">Log in to Skadoosh</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="p-2">
                                    <form class="form-horizontal" method="POST" action="{{ route('login.post') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Email</label>
                                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="username" placeholder="Enter Email" autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <div class="float-end">
                                                @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}" class="text-muted">Forgot password?</a>
                                                @endif
                                            </div>
                                            <label class="form-label">Password</label>
                                            <div class="input-group auth-pass-inputgroup @error('password') is-invalid @enderror">
                                                <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" id="userpassword" value="{{ old('password') }}" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                                <button class="btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="form-label">remember me</label>
                                            <input type="checkbox" name="remember" value="1">
                                        </div>

                                        <div class="mt-3 d-grid">
                                            <button class="nav_signup_credential" type="submit">Continue with Email</button>
                                        </div>
                                    </form>
                                    
                                    <p class="notice-txt">Don't have an Skadoosh account?</p>
                                    
                                    <div class="mt-3 text-center">
                                        <a href="{{ url('/nx/signup') }}" class="first_sign_up">Sign up</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="mt-3 text-center">

                            <div>
                                <p>© <script>
                                        document.write(new Date().getFullYear())

                                    </script>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

    @endsection
