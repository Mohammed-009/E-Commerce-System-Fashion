@extends('Layout.app')
    @section('content')
        <div class="container-fluid px-4">
            <br>
            <br>
            <div class="col-sm-12">
                <div class="card mb-4 mt-5">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        men shoes
                        @auth
                        @if(Auth::user()->is_Admin==1)
                        <span><a href="{{route('adminDashboard')}}" class="btn btn-primary btn-sm float-end">DASHBOARD</a></span>
                        <span><a href="{{route('createMenShoes')}}" class="btn btn-primary btn-sm float-end mr-3">ADD PRODUCT</a></span>
                        @endif
                        @endauth
                    </div>
                    <div class="card-body">
                        @if(count($m__shoes)>0)
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Product Size</th>
                                        <th>Product Description</th>
                                        <th>Product Image</th>
                                    </tr>
                                </thead>
                                @foreach($m__shoes as $m__shoe)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$m__shoe->productName}}</td>
                                        <td>{{$m__shoe->productSize}}</td>
                                        <td>{{$m__shoe->productDescription}}</td>
                                        <td>
                                            <img src="/storage/men_shoes_images/{{$m__shoe->productImage}}" alt="" style="height: 100px" class="rounded mx-auto d-block" data-bs-toggle="modal" data-bs-target="#myModal-{{$m__shoe->id}}">
  
                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal-{{$m__shoe->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{$m__shoe->productName}}</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="container-fluid d-flex justify-content-center">
                                                                <div class="text-center">
                                                                    <img src="/storage/men_shoes_images/{{$m__shoe->productImage}}" class="rounded" alt="..." style="width: 200px">
                                                                    <br>
                                                                    <h3 class="text-warning">price:  {{$m__shoe->productPrice}}</h3>
                                                                    @if(Auth::user())
                                                                    <span><input type="button" value="Add to cart" class="btn btn-primary btn-sm" onclick="addToCart('{{$m__shoe->productName}}')"></span>
                                                                    @else 
                                                                    <p>Create account to start adding items to the cart  <span><a href="{{route('ViewCreateUserAccount')}}" class="link mr-3">Create one</a></span><span><a href="{{route('LoginPage')}}" class="link">Login</a></span></p>
                                                                    @endif
                                                                  </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                            @auth
                                                            @if(Auth::user()->is_Admin==1)
                                                            <a href="{{route('editMenShoes', $m__shoe->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                                            <a href="{{route('deleteMenShoes', $m__shoe->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this product?');">Delete</a>
                                                            @endif
                                                            @endauth
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <p>No record found</p>
                        @endif
                    </div>
                </div>
            </div>

            <section class="section-padding">
                <footer class="bg-dark text-light text-center pt-4">
                  <div class="container p-4">
                    <div class="row">
                      <div class="col-lg-3 col-md-3">
                        <h6 class="text-uppercase mb-3 font-weioght-bold text-warning">Online shop</h6>
                        <p>
                          This ia s simple description of the business which includes the types of products present and means of payments, and delivery. All customers are fairly served with good customer services from capable staff
                        </p>
                      </div>
                      {{--  --}}
                      <div class="col-md-2 col-lg-3">
                        <h6 class="text-uppercase font-weight-bold mb-3 text-warning">Categories</h6>
                        <ul class="list-unstyled">
                          <li>
                            <a href="#" class="text-white text-decoration-none">Men</a>
                          </li>
                          <li>
                            <a href="#" class="text-white text-decoration-none">Women</a>
                          </li>
                          <li>
                            <a href="#" class="text-white text-decoration-none">Children</a>
                          </li>
                          <li>
                            <a href="#" class="text-white text-decoration-none">Lifestyles</a>
                          </li>
                        </ul>
                      </div>
                      {{--  --}}
                      <div class="col-md-3 col-lg-3">
                        <h6 class="text-uppercase font-weight-bold mb-3 text-warning">Useful links</h6>
                        <ul class="list-unstyled">
                          <li>
                            <a href="#" class="text-white text-decoration-none">Home</a>
                          </li>
                          <li>
                            <a href="#" class="text-white text-decoration-none">About Us</a>
                          </li>
                          <li>
                            <a href="#" class="text-white text-decoration-none">Contact</a>
                          </li>
                          <li>
                            <a href="#" class="text-white text-decoration-none">Services</a>
                          </li>
                        </ul>
                      </div>
                      {{--  --}}
                      <div class="col-md-4 col-lg-3">
                        <h6 class="text-uppercase font-weigt-bold mb-3 text-warning">Social media links</h6>
                        <div class="social-icons">
                          <a href="#" class="text-decoration-none text-light pr-2"><i class="bi bi-twitter-x fs-3"></i></a>
                          <a href="#" class="text-decoration-none text-light pr-2"><i class="bi bi-google fs-3"></i></a>
                          <a href="#" class="text-decoration-none text-light pr-2"><i class="bi bi-facebook fs-3"></i></a>
                          <a href="#" class="text-decoration-none text-light"><i class="bi bi-linkedin fs-3"></i></a>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="d-sm-flex justify-content-between mt-5">
                        <p>&copy; <span id="year"></span> Mohaa Dev. All rights reserved.</p>
                      <div>
                        <a href="#" class="text-decoration-none text-light me-4">Terms of service</a>
                        <a href="#" class="text-decoration-none text-light">Privacy policy</a>
                      </div>
                    </div>
                  </div>
                </footer>
              </section>
        </div>
    @endsection