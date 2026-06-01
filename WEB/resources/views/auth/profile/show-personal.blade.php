@extends('Layout.master')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">profile information</div>
              <div class="card-body">
                @if(count($profiles) >0)
                      <table class="table table-responsive table-bordered">
                  @foreach($profiles as $profile)
                          <tr>
                            <td>firstname:</td>
                            <td class="text-center">{{$profile->firstname}}</td>
                          </tr>
                          <tr>
                            <td>lastname:</td>
                            <td class="text-center">{{$profile->lastname}}</td>
                          </tr>
                          <tr>
                            <td>username:</td>
                            <td class="text-center">{{$profile->username}}</td>
                          </tr>
                          <tr>
                            <td>phone:</td>
                            <td class="text-center">{{$profile->phone}}</td>
                          </tr>
                          <tr>
                            <td>email:</td>
                            <td class="text-center">{{$profile->email}}</td>
                          </tr>
                          <tr>
                            <td>role:</td>
                            <td class="text-center">{{$profile->role}}</td>
                          </tr>
                          <tr>
                            <td>date of birth:</td>
                            <td class="text-center">{{$profile->date_of_birth}}</td>
                          </tr>
                          <tr>
                            <td>gender:</td>
                            <td class="text-center">{{$profile->gender}}</td>
                          </tr>
                          <tr>
                            <td>religion:</td>
                            <td class="text-center">{{$profile->religion}}</td>
                          </tr>
                          <tr>
                            <td>nationality:</td>
                            <td class="text-center">{{$profile->nationality}}</td>
                          </tr>
                          <tr>
                            <td>county:</td>
                            <td class="text-center">{{$profile->county}}</td>
                          </tr>
                    @endforeach
                      </table>
                      @if(Auth::User()->is_Admin==1)
                      <div class="text-center">
                        <a href="{{route('editAdminProfile', $profile->id)}}" class="btn btn-primary btn-sm w-25">Edit</a>
                      </div>
                      @endif
                  @else
                      <p>No profile information</p>
                  @endif
              </div>
          </div>
          </div>
        </div>
      </div>
@endsection