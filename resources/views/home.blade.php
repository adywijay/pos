<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('load_extern/js/plugins/jquery-1.11.2.min.js') }}"></script>
    {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> --}}
    @extends('base.layout.load_css')
    <title>Laravel | Portofolio</title>
</head>

<body>
    <nav class="orange" role="navigation">
        <div class="nav-wrapper container"><a id="logo-container" href="#"
                class="brand-logo">{{ config('app.name', 'Laravel') }}</a>
            @if (Route::has('login'))
                @auth
                    <ul class="right hide-on-med-and-down">
                        <li>
                            <a href="{{ url('/home') }}">Home</a>
                        </li>
                    </ul>
                @else
                    <ul class="right hide-on-med-and-down">
                        <li><a href="{{ route('login') }}">Login</a></li>
                    </ul>
                    @if (Route::has('register'))
                        <ul class="right hide-on-med-and-down">
                            <li><a href="{{ route('register') }}">Register</a></li>
                        </ul>
                    @endif
                @endauth
            @endif

            <ul id="nav-mobile" class="sidenav">
                <li><a href="#">Navbar Link</a></li>
                @if (Route::has('login'))
                    @auth
                        <li>
                            <a href="{{ url('/home') }}">Home</a>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth
                @endif
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    <div id="index-banner" class="parallax-container">
        <div class="section no-pad-bot">
            <div class="container">
                <br><br>
                <h1 class="header center white-text">{{ config('app.name', 'Laravel') }} &nbsp; {{ App::VERSION() }}
                </h1>
                <div class="row center">
                    <h5 class="header col s12 light white-text">A modern responsive front-end framework based on
                        Material Design <br>
                        <?php
                        // prints e.g. 'Current PHP version: 4.1.1'
                        echo 'With PHP version: ' . phpversion();
                        ?>
                    </h5>
                </div>
                <div class="row center">
                    <a href="#" id="download-button"
                        class="btn waves-effect waves-light amber darken-3">Get Started<i
                            class="material-icons right">send</i></a>
                </div>
                <br>
                <br>

            </div>
        </div>
        <div class="parallax"><img src="{{ asset('load_extern/images/bg/user-profile-bg.jpg') }}"
                alt="Unsplashed background img 1">
        </div>
    </div>

<!-- Section: Icon Boxes -->
  <section class="section section-icons grey lighten-4 center">
    <div class="container">
      <div class="row">
        <div class="col s12 m4">
          <div class="card-panel">
            <i class="material-icons large blue-text">shopping_cart</i>
            <h4>Pick Where</h4>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quidem, velit.</p>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card-panel">
            <i class="material-icons large blue-text">store</i>
            <h4>Travel Shop</h4>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quidem, velit.</p>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card-panel">
            <i class="material-icons large blue-text">credit_card</i>
            <h4>Fly Cheap</h4>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quidem, velit.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section: Popular -->
  <section id="popular" class="section section-popular scrollspy">
    <div class="container">
      <div class="row">
        <div class="col s12 center">
          <a href="javascript:void(0)" onclick="get_product()" class="btn btn-large grey darken-3">
            <i class="material-icons left">send</i> Explore
          </a>
        </div>
      </div>
    </div>
  </section>
    <nav class="col s12  orange darken-4">
        <div class="container">
            <p class="row center">Made by Materialize</p>
        </div>
    </nav>
    <script type='text/javascript'>
    function get_product() {
        window.location = "{{route('beranda_guest')}}";
    }
    </script>
    <!--  Scripts-->
    @extends('base.layout.load_js')

</body>

</html>
