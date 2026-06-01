@extends('Layout.master')
    @section('content')
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Users
                        </div>
                        <div class="card-body">
                            @if(count($users) >0)
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->username}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>
                                                <a href="{{route('deleteUser', $user->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                @endforeach
                                </table>
                            @else
                                <p>No information found</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection