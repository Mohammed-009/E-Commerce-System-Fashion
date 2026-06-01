<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{asset('js/script.js')}}"></script>
    {{-- <script src="script.js"></script> --}}
</head>
<body>

  <section class="section-padding">
    <div class="text-center mt-5 bg-warning fixed-top">
      <div onclick="cartToggle()">
        <div class="div-cart">
        <a href="#"><i class="fa fa-shopping-cart"></i></a>
        <span id="cart-count">0</span>
        </div>
      </div>
    </div>
  </section>

  <section class="section-padding mt-5">
      <div class="cart-layout" id="cart-layout" onclick="cartToggle()"></div>
      <div class="cart" id="cart">
          <h3 class="text-warning">Your Cart Items</h3>
          <ul id="cart-items"></ul>
          <button onclick="clearCart()" class="clearcart-content">Clear Cart</button>
      </div>
  </section>


    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
        <div class="container">
        <a class="navbar-brand" href="#">ECOMMERCE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="myNav">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="{{route('homePage')}}">Home</a>
            </li>
    
            <li class="nav-item">
              <a class="nav-link" href="{{route('aboutPage')}}">About</a>
            </li> 
    
            <li class="nav-item">
              <a class="nav-link" href="{{route('contactPage')}}">Contact</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="{{route('servicesPage')}}">Services</a>
          </li>
        
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Category 1</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{route('showMenOfficial')}}">Men officials</a>
                  <a class="dropdown-item" href="{{route('showWomenOfficial')}}">Women Officials</a>
                  <a class="dropdown-item" href="{{route('showChildrenOfficial')}}">Children Officials</a>
                </div>
            </li> 

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Category 2</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('showMenLifestyle')}}">Men lifestyles</a>
                <a class="dropdown-item" href="{{route('showWomenLifestyle')}}">Women lifestyles</a>
                <a class="dropdown-item" href="{{route('showChildLifestyle')}}">Children lifestyles</a>
              </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Category 3</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{route('showMenShoes')}}">Men shoes</a>
              <a class="dropdown-item" href="{{route('showWomenShoes')}}">Women shoes</a>
              <a class="dropdown-item" href="{{route('showChildrenShoes')}}">Children shoes</a>
            </div>
        </li>

            @auth
            @if(Auth::User()->is_Admin==1)
            <li class="nav-item">
              <a class="nav-link" href="{{route('adminDashboard')}}">Dashboard</a>
            </li>
            @endif
            @endauth

        @if(Route::has('LoginUserLogic'))          
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><span class="text-warning">{{auth()->user()->username}}</span></a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                <a class="dropdown-item" href="{{route('password.request')}}">change password</a>
                @if(Auth::User()->is_Admin==1)
                <a class="dropdown-item" href="{{route('showPersonalInfo')}}">profile</a>
                @endif
              </div>
          </li> 
          @else
          <li class="nav-item mr-3">
            <a class="btn btn-primary btn-sm" href="{{route('LoginPage')}}">Login</a>
          </li> 
          
          <li class="nav-item">
            <a class="btn btn-success btn-sm" href="{{route('ViewCreateUserAccount')}}">Sign up</a>
          </li> 
          @endauth
        @endif
          </ul>
        </div>  
      </nav>
</body>
</html>


