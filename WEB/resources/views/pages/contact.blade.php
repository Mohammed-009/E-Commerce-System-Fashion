@extends('Layout.app')
    @section('content')
        <div class="container-fluid mt-5">
{{-- ############################################ contact section ################################### --}}
            <section class="py-3">
                <div class="container mb-5 pt-3 text-center justify-content-center">
                  <h2 class="text-capitalize fw-bold py-2">Contact us</h2>
                  <p class="pb-2">Contact us using the form below or via the following methods</p>
                </div>
                <div class="container py-3">
                  <div class="row justify-content-center">
                    <div class="col-12 col-lg-6 mb-3">
                      <div class="card">
                        <div class="card-header">Contact form</div>
                        <div class="card-body">
                          {{-- <form action="{{route('storeMessage')}}" method="post">
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
                          </form> --}}
                          <form action="{{route('storeMessage')}}" method="post">
                            @csrf
                            <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" id="name" name="name" class="form-control" value="{{ old('name')}}" required>
                            </div>
                            <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" id="email" name="email" class="form-control" value="{{ old('email')}}" required>
                            </div>
                            <div class="form-group">
                              <label for="phone">Phone</label>
                              <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone')}}" required>
                            </div>
                            <div class="form-group">
                              <label for="message">Message</label>
                              <textarea name="message" id="message" cols="8" rows="5" class="form-control" value="{{ old('message')}}"></textarea>
                            </div>
                            <div class="form-group text-center">
                              <button type="submit" class="btn btn-primary btn-sm mt-3">submit</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-lg-6">
                      <div class="card">
                        <div class="card-header">Contact Information</div>
                        <div class="card-body">
                          <div>
                            <p class="lead py-2">
                              <i class="bi bi-envelope pr-2 text-warning"></i><span>mohammedtsuma014@gmail.com</span>
                            </p>
                            <p class="lead pb-2">
                              <i class="bi bi-telephone pr-2 text-success"></i><span>+254704895174</span>
                            </p>
                            <p class="lead pb-2">
                              <i class="bi bi-clock pr-2 text-primary"></i><span>Mon-Fri, 8:00am-5:00pm</span>
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="py-3 text-center">
                        <div id="map"></div>
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