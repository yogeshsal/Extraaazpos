@extends('layouts.app')
@extends('layouts.footer')


@section('content')
<style>
    .centered-div {
        /* Add styling for the centered div */
        margin-top: 150px;
    }
</style>

<section class="auth-page-wrapper-2 py-4 position-relative d-flex align-items-center justify-content-center min-vh-100 bg-light">
    <div class="container">
        <div class="row g-0">
            <div class="col-lg-5">
                <div class="auth-card card bg-primary h-100 rounded-0 rounded-start border-0 d-flex align-items-center justify-content-center overflow-hidden p-4">
                    <div class="auth-image">
                        <img src="images/login-image-1.png" alt="" height="42" />
                        <img src="images/effect-pattern/auth-effect-2.png" alt="" class="auth-effect-2" />
                        <img src="images/effect-pattern/auth-effect.png" alt="" class="auth-effect" />
                        <img src="images/effect-pattern/auth-effect.png" alt="" class="auth-effect-3" />
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card mb-0 rounded-0 rounded-end border-0">
                    <div class="card-body p-4 p-sm-5 m-lg-4">
                        <div class="text-center mt-2">
                            <h5 class="text-primary fs-20">{{ __('Login') }}</h5>
                            <!-- <p class="text-muted">Get your free Hybrix account now</p> -->
                        </div>
                        <div class="p-2 mt-5">
                            <form class="needs-validation" method="post" novalidate action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="useremail" class="form-label">{{ __('Email Address') }} <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="ri-mail-line"></i></span>
                                        <input id="email" type="email" placeholder="Enter Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <!-- <div class="invalid-feedback">
                                        Please enter email
                                    </div> -->
                                </div>

                                <!-- <div class="mb-3">
                                    <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="ri-user-3-line"></i></span>
                                        <input type="text" class="form-control" id="username" placeholder="Enter username" required>
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter username
                                    </div>
                                </div> -->

                                <div class="mb-3">
                                    <div class="float-end">
                                        @if (Route::has('password.request'))
                                        <!-- <a class="btn btn-link" href="">
                                            {{ __('Forgot Your Password?') }}
                                        </a> -->
                                        <a href="{{ route('password.request') }}" class="text-muted">Forgot password?</a>
                                        @endif
                                    </div>
                                    <label class="form-label" for="password-input">Password</label>
                                    <div class="position-relative auth-pass-inputgroup overflow-hidden">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="ri-lock-2-line"></i></span>
                                            <input type="password" class="form-control pe-5 password-input @error('password') is-invalid @enderror" placeholder="Enter password" name="password" id="password" aria-describedby="passwordInput" required>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <!-- <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"></button> -->
                                        <!-- <i class="ri-eye-fill align-middle"></i> -->
                                    </div>
                                    <!-- <div class="invalid-feedback">
                                        Please enter password
                                    </div> -->
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="auth-remember-check"> {{ __('Remember Me') }}</label>
                                </div>
                                <!-- <div class=" mb-3">
                                    <div class=" offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class=" mb-3">
                                    <div class=" offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div> -->




                                <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                    <h5 class="fs-13">Password must contain:</h5>
                                    <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                                    <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
                                    <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                                    <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
                                </div>

                                <div class="mt-4">
                                    <button class="btn btn-primary w-100" type="submit"> {{ __('Login') }}</button>
                                </div>

                                <div class="mt-4 text-center">
                                    <div class="signin-other-title">
                                        <!-- <h5 class="fs-13 mb-4 title text-muted">Create account with</h5> -->
                                    </div>


                                </div>
                                <!-- <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                        @endif
                                    </div>
                                </div> -->
                                <div class="text-center mt-5">
                                    <p class="mb-0">Don't have an account ? <a href="{{ route('register') }}" class="fw-semibold text-secondary text-decoration-underline">
                                            {{ __('Register') }}</a> </p>
                                </div>
                            </form>
                        </div>

                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
        </div>
    </div>
</section>
<!-- <div class="container">
    <div class="centered-div">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header"></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

@endsection