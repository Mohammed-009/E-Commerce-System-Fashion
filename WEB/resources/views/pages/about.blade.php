@extends('Layout.app')
    @section('title', 'About Us | Fashion Store Kenya')

	@section('description', 'Learn more about Fashion Store Kenya, our mission, values and commitment to providing quality clothing, official wear, lifestyle 			outfits and shoes for men, women and children.')

	@section('keywords', 'about fashion store kenya, clothing store, fashion business kenya, official wear, lifestyle wear, shoes kenya')
    @section('content')
        <div class="container-fluid mt-5">
{{-- ############################################ about section ################################### --}}
            <section class="text-center bg-light">
                    <!-- Jumbotron -->
                    <div class="row justify-content-center bg-image p-5 text-center shadow-1-strong rounded mb-5 text-white" style="background-image: url({{url('images/men-fashion.jpg')}});">
                        <h1 class="mb-3">About Us</h1>
    						<p class="lead text-center mx-auto w-75">
    							Our mission is to provide high-quality fashion clothing, official wear,
    							lifestyle outfits and footwear while delivering exceptional customer service
    							and a seamless shopping experience.
							</p>
                    </div>
                    <!-- Jumbotron -->
            </section>

            <section class="text-center">
                <div class="container py-5">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-6">
                            <h3 class="mb-2">Our Story</h3>
                            <p class="lead py-5">
                                Founded with a passion for creativity and customer satisfaction,
                                our journey began with a simple goal: to make shopping easier and more enjoyable. 
                                From humble beginnings, we've grown into a brand that values authenticity, innovation, and our community.
                            </p>
                        </div>
                        <div class="col-12 col-lg-6 justify-content-center about-image">
                            <img src="{{asset('images/men-fashion.jpg')}}" class="img-fluid rounded-3" alt="Fashion Store Kenya team and clothing collection">
                        </div>
                    </div>
                </div>
            </section>

            <section class="text-center bg-light">
                <div class="container py-5">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-6 justify-content-center about-image">
                            <img src="{{asset('images/men-fashion.jpg')}}" class="img-fluid rounded-3" alt="Quality fashion clothing and footwear">
                        </div>
                        <div class="col-12 col-lg-6">
                            <h3 class="mb-2 pt-4">Our Values</h3>
                                <div class="mt-4">
                                    <p class="lead py-2">Integrity – We do what's right, even when no one's watching</p>
                                    <p class="lead py-2">Quality – Only the best products make it to our shelves</p>
                                    <p class="lead py-2">Customer-Centric – Your satisfaction drives everything we do</p>
                                    <p class="lead py-2">Innovation – We constantly improve to serve you better.</p>
                                </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="text-center mt-5">
                <div class="container py-3">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-4">
                            <div class="d-sm-flex justify-content-center align-items-center witness">
                                <img src="{{asset('images/category1.jpeg')}}" class="rounded-circle me-2" alt="Company CEO">
                                <div class="fw-bold mb-3">
                                    Mohammed
                                    <span class="text-primary mx-1">/</span>
                                    CEO
                                </div>
                            </div>
                        </div>
                            <div class="col-12 col-lg-4">
                                <div class="d-sm-flex justify-content-center align-items-center witness">
                                    <img src="{{asset('images/category1.jpeg')}}" class="rounded-circle me-2" alt="Company CEO">
                                    <div class="fw-bold mb-3">
                                        Mohammed
                                        <span class="text-primary mx-1">/</span>
                                        CEO
                                    </div>
                                </div>
                            </div>
                                <div class="col-12 col-lg-4">
                                    <div class="d-sm-flex justify-content-center align-items-center witness">
                                        <img src="{{asset('images/category1.jpeg')}}" class="rounded-circle me-2" alt="Company CEO">
                                        <div class="fw-bold mb-3">
                                            Mohammed
                                            <span class="text-primary mx-1">/</span>
                                            CEO
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </section>

{{-- ############################################ footer section ################################### --}}
            <section class="pt-5">
                <footer class="bg-dark text-light text-center pt-4 bottom-ff">
                  <div class="container p-4">
                    <div class="row">
                      <div class="col-lg-3 col-md-3">
                        <h6 class="text-uppercase mb-3 font-weight-bold text-warning">Company</h6>
                        <p>
                            Fashion Store Kenya offers quality clothing, official wear, lifestyle outfits and shoes for men, women and children. We are committed to providing affordable fashion, secure shopping and excellent customer service.
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
