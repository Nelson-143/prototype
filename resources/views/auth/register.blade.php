@extends('layouts.auth')

@section('content')
<form class="card card-md" action="{{ route('register') }}" method="POST" autocomplete="off">
    @csrf

    <div class="card-body">
        <h2 class="card-title text-center mb-4">Create new account</h2>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username"
                   class="form-control @error('username') is-invalid @enderror"
                   value="{{ old('username') }}"
                   placeholder="Enter username"
            >

            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" name="name" id="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}"
                   placeholder="Enter Full Name"
            >

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" id="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}"
                   placeholder="Enter email"
            >

            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
 
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group input-group-flat">
                <input type="password" name="password" id="password"
                       class="form-control @error('password') is-invalid @enderror"
                       placeholder="Password"
                       autocomplete="off"
                >

                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <div class="input-group input-group-flat">
                <input type="password" name="password_confirmation" id="password_confirmation"
                       class="form-control @error('password') is-invalid @enderror"
                       placeholder="Password Confirmation"
                       autocomplete="off"
                >

                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
                 <div class="mb-3">
            
    <button type="submit" class="btn btn-primary w-100">
        Create new account
    </button>
    </div>
</div>


    </div>
</form>
<div class="text-center text-secondary mt-3">
    Already have account? <a href="{{ route('login') }}" tabindex="-1">
        Sign in
    </a>
</div>
@endsection
