<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Picked Fresh</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Style CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif" />

    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">

    <!-- Tweaks for older IEs -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">

    <!-- Livewire Styles -->
    @livewireStyles
</head>
<body>
    <!-- Header Section Start -->
    <div class="header_section">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="logo"><a href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" alt="Logo"></a></div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">MAIN SHOP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/cartlist">CART @livewireStyles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">CONTACT US</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile') }}">Edit Profile</a>
                                    <a class="dropdown-item" href="{{ route('udata') }}">Your Data</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <div class="search_icon"><a href="#"><img src="{{ asset('images/search-icon.png') }}" alt="Search"></a></div>
                    </form>
                </div>
            </nav>
        </div>
    </div>
    <!-- Header Section End -->

    @yield('content')

    <x-flash-message />

    <!-- Footer Section Start -->
    <div class="footer_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h1 class="address_text">Address</h1>
                    <div class="location_text"><a href="#"><img src="{{ asset('images/map-icon.png') }}" alt="Map Icon"><span class="padding_left_15">No.123 Chalingt Gates,</span></a></div>
                    <div class="location_text"><a href="#"><img src="{{ asset('images/call-icon.png') }}" alt="Call Icon"><span class="padding_left_15">( +01 9876543210 )</span></a></div>
                    <div class="location_text"><a href="#"><img src="{{ asset('images/mail-icon.png') }}" alt="Mail Icon"><span class="padding_left_15">Locations</span></a></div>
                </div>
                <div class="col-md-4">
                    <h1 class="address_text">Social Links</h1>
                    <div class="location_text"><a href="#"><img src="{{ asset('images/fb-icon.png') }}" alt="Facebook Icon"><span class="padding_left_15">Facebook</span></a></div>
                    <div class="location_text"><a href="#"><img src="{{ asset('images/twitter-icon.png') }}" alt="Twitter Icon"><span class="padding_left_15">Twitter</span></a></div>
                    <div class="location_text"><a href="#"><img src="{{ asset('images/instagram-icon.png') }}" alt="Instagram Icon"><span class="padding_left_15">Instagram</span></a></div>
                    <div class="location_text"><a href="#"><img src="{{ asset('images/Linkedin-icon.png') }}" alt="LinkedIn Icon"><span class="padding_left_15">Linkedin</span></a></div>
                </div>
                <div class="col-md-4">
                    <h1 class="address_text">Newsletter</h1>
                    <input type="text" class="enter_text" placeholder="Enter Your Email">
                    <div class="subscribe_bt"><a href="#">subscribe</a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Section End -->

    <!-- Copyright Section Start -->
    <div class="copyright_section">
        <p class="copyright_text">Copyright 2023 All Right Reserved <a href="https://html.design">Free HTML Templates</a></p>
    </div>
    <!-- Copyright Section End -->

    <!-- Javascript Files -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('js/plugin.js') }}"></script>
    <!-- Sidebar -->
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <!-- Owl Carousel -->
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <!-- Fancybox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

    <!-- Livewire Scripts -->
    @livewireScripts
</body>
</html>
