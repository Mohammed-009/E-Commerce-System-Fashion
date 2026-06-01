@extends('Layout.app')

@section('content')
<br>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-4">
            <div class="card mt-5">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form action="{{route('LoginUserLogic')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        
                        <div class="form-group text-center">
                            <input type="submit" value="login" class="btn btn-primary mt-3">
                        </div>
                        
                        <div class="form-group text-center">
                            <a href="{{route('password.request')}}" class="nav-link text-primary">forget password</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
