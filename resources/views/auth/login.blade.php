@extends('auth.layout')

@section('title')
    Login
@endsection

@section('content')
<div class="auth-form">
    <div class="card my-5 mx-3">
        <div class="card-header bg-dark">
            <h4 class="text-center text-white mb-0 f-w-500">Login</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf


                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            <div class="mb-3">
                <input  class="form-control @error('userName') is-invalid @enderror" name="userName" value="{{ old('userName') }}" id="userName" placeholder="Username" />
                @error('userName')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

                @error('userName')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

            </div>
            <div class="mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"  required placeholder="Password" />
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="d-flex mt-1 justify-content-between align-items-center">
                <div class="form-check">
                    <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="" />
                    <label class="form-check-label text-muted" for="customCheckc1">Remember me?</label>
                </div>
            </div>
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
            </div>
            <div class="saprator my-3">
                <span>OR</span>
            </div>
            <div class="row g-2" style="display: none">
                <div class="col-4">
                    <div class="d-grid">
                        <button type="button" class="btn mt-2 btn-light-primary bg-light text-muted">
                            <img src="../assets/images/authentication/google.svg" alt="img" />
                            <span class="d-none d-sm-inline-block"> Google</span>
                        </button>
                    </div>
                </div>
                <div class="col-4">
                    <div class="d-grid">
                        <button type="button" class="btn mt-2 btn-light-primary bg-light text-muted">
                            <img src="../assets/images/authentication/twitter.svg" alt="img" />
                            <span class="d-none d-sm-inline-block"> Twitter</span>
                        </button>
                    </div>
                </div>
                <div class="col-4">
                    <div class="d-grid">
                        <button type="button" class="btn mt-2 btn-light-primary bg-light text-muted">
                            <img src="../assets/images/authentication/facebook.svg" alt="img" />
                            <span class="d-none d-sm-inline-block"> Facebook</span>
                        </button>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <div class="card-footer border-top">
            <div class="d-flex justify-content-between align-items-end">
                <div>
                    <h6 class="f-w-500 mb-0">Don't have an Account?</h6>
                    <a href="{{ route('register') }}" class="link-primary">Create Account</a>
                </div>
{{-- <a href="../index.html"><img src="../assets/images/logo-dark-sm.svg" alt="img" /></a>--}}
            </div>
        </div>
    </div>
</div>
@endsection
