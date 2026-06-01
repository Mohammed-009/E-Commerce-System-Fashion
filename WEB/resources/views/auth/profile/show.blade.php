@extends('Layout.master')
    @section('content')
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            profile information
                        </div>
                        <div class="card-body">
                            @if(count($profiles) >0)
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>name</th>
                                            <th>username</th>
                                            <th>email</th>
                                            <th>phone</th>
                                            <th>gender</th>
                                            <th>county</th>
                                            <th>status</th>
                                            <th>approve</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                @foreach($profiles as $profile)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$profile->firstname}}</td>
                                            <td>{{$profile->username}}</td>
                                            <td>{{$profile->email}}</td>
                                            <td>{{$profile->phone}}</td>
                                            <td>{{$profile->gender}}</td>
                                            <td>{{$profile->county}}</td>
                                            <td>{{$profile->status}}</td>
                                            <td>
                                                @if($profile->status== 'pending')
                                                    <form action="{{route('approveUser', $profile->id)}}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-warning btn-sm">approve</button>
                                                    </form>
                                                    @else
                                                    <span class="badge rounded-pill bg-primary">Approved</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('editAdminProfile', $profile->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="{{route('deleteProfile', $profile->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                @endforeach
                                </table>
                            @else 
                                <p>no record found</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    @endsection