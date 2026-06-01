@extends('Layout.master')
    @section('content')
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            profile
                        </div>
                        <div class="card-body">
                            <form action="{{route('updateProfile', $profile->id)}}" method="POST">
                                @csrf
                                <div class="row pb-2">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="firstname" class="pb-1">firstname</label>
                                            <input type="text" name="firstname" id="firstname" class="form-control" value="{{$profile->firstname}}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="lastname" class="pb-1">lastname</label>
                                            <input type="text" name="lastname" id="lastname" class="form-control" value="{{$profile->lastname}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row pb-2">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="username" class="pb-1">username</label>
                                            <input type="text" name="username" id="username" class="form-control" value="{{$profile->username}}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="phone" class="pb-1">phone</label>
                                            <input type="text" name="phone" id="phone" class="form-control" value="{{$profile->phone}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row pb-2">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="email" class="pb-1">email</label>
                                            <input type="email" name="email" id="email" class="form-control" value="{{$profile->email}}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="role">role</label>
                                            <input type="text" name="role" id="role" class="form-control" value="{{$profile->role}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row pb-2">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="date_of_birth" class="pb-1">date of birth</label>
                                            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{$profile->date_of_birth}}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="gender" class="pb-1">gender</label>
                                            <select name="gender" id="gender" class="form-select">
                                                <option value="{{$profile->gender}}">{{$profile->gender}}</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            {{-- <input type="text" name="gender" id="gender" class="form-control" value="{{old(gender)}}"> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="row pb-2">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="religion" class="pb-1">religion</label>
                                            <input type="text" name="religion" id="religion" class="form-control" value="{{$profile->religion}}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="nationality" class="pb-1">nationality</label>
                                            <input type="text" name="nationality" id="nationality" class="form-control" value="{{$profile->nationality}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="county" class="pb-1">county</label>
                                    <input type="text" name="county" id="county" class="form-control" value="{{$profile->county}}">
                                </div>

                                <div class="form-group text-center mt-2">
                                    <input type="submit" class="btn btn-primary btn-sm" value="update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
