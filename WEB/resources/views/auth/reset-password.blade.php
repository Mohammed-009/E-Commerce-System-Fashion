@extends('Layout.app')
@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow p-4" style="width: 400px;">

        <h3 class="text-center mb-4">Reset Password</h3>

        <form action="{{ route('password.update') }}" method="POST">
            @csrf

            <!-- Token -->
            <input type="hidden" name="token" value="{{ $token }}">

            <!-- Email -->
            <div class="mb-3">
                <input type="email"
                       name="email"
                       class="form-control"
                       placeholder="Your Email"
                       value="{{ old('email') }}"
                       required>

                @error('email')
                    <div class="text-danger small mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="New Password"
                       required>

                @error('password')
                    <div class="text-danger small mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <input type="password"
                       name="password_confirmation"
                       class="form-control"
                       placeholder="Confirm Password"
                       required>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-primary w-100">
                Reset Password
            </button>

        </form>

    </div>

</div>
@endsection