<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Mini Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="../../css.css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('frontend')}}/fonts/icomoon/style.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/aos.css">

    <link rel="stylesheet" href="{{asset('frontend')}}/css/style.css">
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar" role="banner">
      <div class="container-fluid">
        <div class="row align-items-center">
          
          <div class="col-12 search-form-wrap js-search-form">
            <form method="get" action="#">
              <input type="text" id="s" class="form-control" placeholder="Search...">
              <button class="search-btn" type="submit"><span class="icon-search"></span></button>
            </form>
          </div>

          <div class="col-4 site-logo">
            <a href="index.html" class="text-black h2 mb-0">VMS</a>
          </div>

          <div class="col-8 text-right">
            <nav class="site-navigation" role="navigation">
              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('/visitor/index')}}">Visitor</a></li>
                <li><a href="{{url('/front-desk/create')}}">FrontDESK</a></li>
                <li>
                  @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Admin</a>
                            {{-- <a href="{{ url('/admin') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Admin</a> --}}
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
    
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                  @endif
                </li>
              </ul>
            </nav>
            <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a></div>
          </div>

      </div>
    </header>
    
    {{-- site-section  --}}
    <div class="bg-light">
      <div class="container ">
          {{-- <div class="row ">
            <div class="col-2"></div>
            <div class="col-8 my-3">
              <div class="row" id="message">
                  @if (Session::has('success'))
                      <div class="col-10">
                        <p class="alert alert-primary">{{Session::get('success')}}</p>
                      </div>
                      <div class="col-2" >
                        <button class="btn btn-primary" onclick="remove()">X</button>
                      </div>
                  @endif
              </div>
              <div class="card">
                <div class="card-header">
                  <h5 class="text-center">Visitor Create</h5>
                </div>
                <div class="card-body">
                  <form action="{{url('/visitor/create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label for="name">Visitor Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                          </div>
                          <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="number" class="form-control" name="phone_number" id="phone_number" placeholder="Enter Number">
                          </div>
                          <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                          </div>
                          <div class="form-group">
                            <label for="email">Age</label>
                            <input type="number" class="form-control" name="age" id="age" placeholder="Enter Your Age">
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Enter Your Addresss">
                          </div>
                          <div class="form-group">
                            <label for="address">Occupation</label>
                            <input type="text" class="form-control" name="occupation" id="occupation" placeholder="Enter Your Occupation">
                          </div>
                          <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" id="image" placeholder="Enter Your Occupation">
                          </div>
                        </div>
                        <div class="col-md-12 text-center">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-2"></div>
            
          </div> --}}
          @yield('visitor_content')
      </div>
    </div>
    
  </div>

  <script src="{{asset('frontend')}}/js/jquery-3.3.1.min.js"></script>
  <script src="{{asset('frontend')}}/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="{{asset('frontend')}}/js/jquery-ui.js"></script>
  <script src="{{asset('frontend')}}/js/popper.min.js"></script>
  <script src="{{asset('frontend')}}/js/bootstrap.min.js"></script>
  <script src="{{asset('frontend')}}/js/owl.carousel.min.js"></script>
  <script src="{{asset('frontend')}}/js/jquery.stellar.min.js"></script>
  <script src="{{asset('frontend')}}/js/jquery.countdown.min.js"></script>
  <script src="{{asset('frontend')}}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{asset('frontend')}}/js/bootstrap-datepicker.min.js"></script>
  <script src="{{asset('frontend')}}/js/aos.js"></script>

  <script src="{{asset('frontend')}}/js/main.js"></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="../../gtag/js.js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<script>
  function remove(){
      $("#message").hide();
  }
</script>
    
  </body>
</html>