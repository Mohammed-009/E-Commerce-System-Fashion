@extends('Layout.app')
    @section('content')
        <div class="container-fluid mt-5">
            <section class="py-3">
                <div class="container text-center pt-3 mb-5 justify-content-center">
                    <h2 class="text-capitalize py-2 fw-bold">Services</h2>
                    <p class="pb-2">We offer a wide range of ecommerce services to meet your needs</p>
                </div>
                <div class="container py-3">
                    <div class="row justify-content-center mb-5">
                        <div class="col-12 col-lg-6 text-center mb-3">
                            <div class="card">
                                <div class="card-body bg-light">
                                    <div class="mb-3">
                                        <i class="bi bi-rocket-takeoff-fill fs-1 text-warning"></i>
                                    </div>
                                    <h4 class="fw-bold text-capitalize">Fast shipping</h4>
                                    <p class="lead">Quick and reliable <br> shipping on all orders</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 text-center">
                            <div class="card">
                                <div class="card-body bg-light">
                                    <div class="mb-3">
                                        <i class="bi bi-file-lock2-fill fs-1 text-warning"></i>
                                    </div>
                                    <h4 class="fw-bold text-capitalize">Secure Checkout</h4>
                                    <p class="lead">Safe and secure<br> payment options</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-6 text-center mb-3">
                            <div class="card">
                                <div class="card-body bg-light">
                                    <div class="mb-3">
                                        <i class="bi bi-arrow-clockwise fs-1 text-warning"></i>
                                    </div>
                                    <h4 class="fw-bold text-capitalize">Easy Returns</h4>
                                    <p class="lead">Hassle-free returns <br> within 30 days</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 text-center">
                            <div class="card">
                                <div class="card-body bg-light">
                                    <div class="mb-3">
                                        <i class="bi bi-question-circle fs-1 text-warning"></i>
                                    </div>
                                    <h4 class="fw-bold text-capitalize">24/7 Support</h4>
                                    <p class="lead">Customer supportbr <br> available at anytime</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center my-4">
                        <a href="{{route('homePage')}}" class="btn btn-outline-primary btn-sm w-25">Browse Products</a>
                    </div>
                </div>
            </section>

            <section class="pt-1">
                <footer class="bg-dark text-light text-center pt-4 bottom-ff">
                  <div class="container p-2">
                    <div class="row">
                      <div class="col-lg-3 col-md-3">
                        <h6 class="text-uppercase mb-3 font-weight-bold text-warning">Company</h6>
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
                      <div>
                        <p>&copy; <span id="year"></span> Mohaa Dev. All rights reserved.</p>
                      </div>
                      {{-- <p>2024 @ copyright. All rights reserved</p> --}}
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