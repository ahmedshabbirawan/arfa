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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                        >
                    </div>

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="user_name" class="form-label">User Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="user_name"
                            name="user_name"
                            value="{{ old('user_name') }}"
                            required
                            autofocus
                        >
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input
                            type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                        >
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input
                            type="password"
                            class="form-control"
                            id="password"
                            name="password"
                            required
                            autocomplete="new-password"
                        >
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input
                            type="password"
                            class="form-control"
                            id="password_confirmation"
                            name="password_confirmation"
                            required
                        >
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('login') }}" class="text-decoration-none">
                            Already registered?
                        </a>

                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
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
