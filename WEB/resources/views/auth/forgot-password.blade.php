@extends('Layout.app')
@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow p-4" style="width: 380px;">

        <h3 class="text-center mb-3">Forgot Password</h3>

        @if(session('status'))
            <div class="alert alert-success py-2">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST">
            @csrf

            <div class="mb-3">
                <input type="email"
                       name="email"
                       class="form-control"
                       placeholder="Enter Email"
                       required>
            </div>

            @error('email')
                <div class="text-danger small mb-2">
                    {{ $message }}
                </div>
            @enderror

            <button type="submit" class="btn btn-primary w-100">
                Send Reset Link
            </button>
        </form>

    </div>

</div>
@endsection