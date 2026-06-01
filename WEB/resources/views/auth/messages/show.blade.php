@extends('Layout.master')
    @section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        messages
                    </div>
                    <div class="card-body">
                        @if(count($messages) >0)
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>phone</th>
                                        <th>message</th>
                                        <th>status</th>
                                        <th>approve</th>
                                        <th>reply</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                @foreach($messages as $message)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$message->name}}</td>
                                        <td>{{$message->email}}</td>
                                        <td>{{$message->phone}}</td>
                                        <td>{{$message->message}}</td>
                                        <td class="text-danger">{{$message->status}}</td>
                                        <td>
                                            @if($message->status== 'pending')
                                                <form action="{{route('approveMessage', $message->id)}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-warning btn-sm">approve</button>
                                                </form>
                                                @else
                                                <span class="badge rounded-pill bg-primary">Approved</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#myEmailModal-{{ $message->id }}">Reply</button>
                                            <div class="modal fade" id="myEmailModal-{{ $message->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Email</h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <form action="{{route('sendEmail')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="mb-3">
                                                          <label for="email" class="col-form-label">Recipient:</label>
                                                          <input type="email" name="email" class="form-control" id="email" value="{{$message->email}}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="subject" class="col-form-label">Subject:</label>
                                                            <input type="text" name="subject" class="form-control" id="subject">
                                                          </div>
                                                        <div class="mb-3">
                                                          <label for="message" class="col-form-label">Message:</label>
                                                          <textarea class="form-control" name="body" id="message"></textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Send email</button>
                                                          </div>
                                                      </form>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                        </td>
                                        <td>
                                            <a href="{{route('deleteMessage', $message->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else 
                            <p>no message found</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div> 
    @endsection