@extends('Layout.app')
@section('content')
<br>
<div class="container mt-5">
    <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">create account</div>
                <div class="card-body">
                    <form action="{{route('CreateNewUserAccount')}}" method="POST">
                        @csrf
                        <div class="row gy-3">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="user" class="form-control" value="{{old('username')}}">
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="phone" name="phone" id="phone" class="form-control" value="{{old('phone')}}">
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="confirm-password">Confirm Password</label>
                                    <input type="password" name="confirm_password" id="confirm-password" class="form-control">
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-primary btn-sm w-100 form-control" value="Register">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
