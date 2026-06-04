@extends('Layout.app')
@section('title', 'Fashion Store Kenya | Men, Women & Kids Clothing, Shoes and Lifestyle Wear')

@section('description', 'Shop quality fashion clothing, official wear, lifestyle outfits and shoes for men, women and children. Affordable prices and stylish collections.')

@section('keywords', 'fashion kenya, men clothing, women clothing, children clothing, shoes kenya, lifestyle wear, official wear, fashion store')
    @section('content')
        <div class="container-fluid">
          {{-- <section>
            <div class="modal fade" id="myEmailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Email</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="#" method="POST">
                      <div class="mb-3">
                        <label for="email" class="col-form-label">Recipient:</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{$message->email}}">
                      </div>
                      <div class="mb-3">
                        <label for="message" class="col-form-label">Message:</label>
                        <textarea class="form-control" name="message" id="message"></textarea>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send email</button>
                  </div>
                </div>
              </div>
            </div>
          </section> --}}
          {{-- ############################################ modal section ################################### --}}
          <section>
            <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{route('storeMessage')}}" method="post">
                        @csrf
                        <div class="mb-1">
                          <label for="name" class="col-form-label">Name:</label>
                          <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="mb-1">
                          <label for="email" class="col-form-label">Email:</label>
                          <input type="email" name="email" class="form-control" id="email">
                        </div>
                        <div class="mb-1">
                          <label for="phone" class="col-form-label">Phone:</label>
                          <input type="text" name="phone" class="form-control" id="phone">
                        </div>
                        <div class="mb-1">
                          <label for="message" class="col-form-label">Message:</label>
                          <textarea class="form-control" name="message" id="message"></textarea>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Send message</button>
                        </div>
                      </form>
                    </div>
                    {{-- <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div> --}}
                  </div>
                </div>
              </div>
          </section>

          {{-- ############################################# carousel section ####################################### --}}
            <section class="section-padding">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active div-height">
                        <img src="{{asset('images/men-fashion.jpg')}}" class="d-block w-100 img-height" alt="...">
                        <div class="carousel-caption">
                          <h3 class="display-3 fw-bolder text-capitalize">MEN FASHION</h3>
                          <p class="text-uppercase">Visit us and get the latest fashion in the market</p>
                          <button
                          class="btn btn-warning py-2 px-4 fs-5 fw-bolder reservation-button"
                          data-bs-toggle="modal"
                          data-bs-target="#myModal"
                        >
                          Learn more
                        </button>
                        </div>
                      </div>
                      <div class="carousel-item div-height">
                        <img src="{{asset('images/women-fashion.jpg')}}" class="d-block w-100 img-height" alt="...">
                        <div class="carousel-caption">
                          <h3 class="display-3 fw-bolder text-capitalize">WOMEN FASHION</h3>
                          <p class="text-uppercase">Visit us and get the latest fashion in the market</p>
                          <button
                          class="btn btn-warning py-2 px-4 fs-5 fw-bolder reservation-button"
                          data-bs-toggle="modal"
                          data-bs-target="#myModal"
                        >
                          Learn more
                        </button>
                        </div>
                      </div>
                      <div class="carousel-item div-height">
                        <img src="{{asset('images/kidswear6.jpg')}}" class="d-block w-100 img-height" alt="...">
                        <div class="carousel-caption">
                          <h3 class="display-3 fw-bolder text-capitalize">KIDS FASHION</h3>
                          <p class="text-uppercase">Visit us and get the latest fashion in the market</p>
                          <button
                          class="btn btn-warning py-2 px-4 fs-5 fw-bolder reservation-button"
                          data-bs-toggle="modal"
                          data-bs-target="#myModal"
                        >
                          Learn more
                        </button>
                        </div>
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </section>

            <section class="section-padding mt-5">
              <div class="row text-center shadow p-3 mb-5 bg-body rounded">
                <div class="col-lg-6 background">
                  <h6 class="font-weight-bold fs-2"><span class="text-warning"><i class="	fab fa-product-hunt"></i></span>  Quality product</h6>
                </div>
                <div class="col-lg-6 background">
                  <h6 class="font-weight-bold fs-2"><span class="text-warning"><i class="fas fa-phone-volume"></i></span>  24/7 operation</h6>
                </div>
              </div>
            </section>

            {{-- ############################################ categories section ################################### --}}
            <section class="section-padding mt-5">
              <p class="h3">CATEGORIES</p>
              <div class="shadow p-3 mb-5 bg-body rounded">
              <div class="row gy-3">
                <div class="col-md-4">
                  <div class="card mb-4">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="{{asset('images/category1.jpeg')}}" class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body card-hover">
                          <a href="{{route('showMenOfficial')}}" class="link"><h5 class="card-title">Men Officials Wear</h5></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- women officials --}}
              <div class="col-md-4">
                <div class="card mb-3">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="{{asset('images/women_official.jpeg')}}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body card-hover">
                        <a href="{{route('showWomenOfficial')}}" class="link"><h5 class="card-title">Women Officials Wear</h5></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

               {{-- children officials --}}
              <div class="col-md-4">
                <div class="card mb-3">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="{{asset('images/child_official.jpeg')}}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body card-hover">
                        <a href="{{route('showChildrenOfficial')}}" class="link"><h5 class="card-title">Children Officials Wear</h5></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
              
               {{-- men lifestyles --}}
                <div class="row gy-3">
                  <div class="col-md-4">
                    <div class="card mb-4">
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img src="{{asset('images/men_lifestyle.jpeg')}}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body card-hover">
                            <a href="{{route('showMenLifestyle')}}" class="link"><h5 class="card-title">Men lifestyles</h5></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                   {{-- women lifestyles --}}
                <div class="col-md-4">
                  <div class="card mb-3">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="{{asset('images/women_lifestyle.jpeg')}}" class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body card-hover">
                          <a href="{{route('showWomenLifestyle')}}" class="link"><h5 class="card-title">Women lifestyles</h5></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                 {{-- children lifestyles --}}
                <div class="col-md-4">
                  <div class="card mb-3">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="{{asset('images/children_lifestyle.jpeg')}}" class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body card-hover">
                          <a href="{{route('showChildLifestyle')}}" class="link"><h5 class="card-title">Children lifestyles</h5></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>

                 {{-- men shoes --}}
                  <div class="row gy-3">
                    <div class="col-md-4">
                      <div class="card mb-4">
                        <div class="row g-0">
                          <div class="col-md-4">
                            <img src="{{asset('images/men_shoes.jpeg')}}" class="img-fluid rounded-start" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body card-hover">
                              <a href="{{route('showMenShoes')}}" class="link"><h5 class="card-title">Men shoes</h5></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                     {{-- women shoes --}}
                  <div class="col-md-4">
                    <div class="card mb-3">
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img src="{{asset('images/women_shoes.jpeg')}}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body card-hover">
                           <a href="{{route('showWomenShoes')}}" class="link"><h5 class="card-title">Women shoes</h5></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                   {{-- children shoes --}}
                  <div class="col-md-4">
                    <div class="card mb-3">
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img src="{{asset('images/children_shoes.jpeg')}}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body card-hover">
                            <a href="{{route('showChildrenShoes')}}" class="link"><h5 class="card-title">Children shoes</h5></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                  </div>
            </section>

            {{-- ############################################ footer section ################################### --}}
            <section class="section-padding">
              <footer class="bg-dark text-light text-center pt-4">
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
