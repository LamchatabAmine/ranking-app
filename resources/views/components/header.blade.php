<header class="header-area">
    <div class="header-top-bar bg-dark-opacity py-2 padding-right-30px padding-left-30px d-none d-md-block">
        <div class="container-fluid">
            <div class="row">
                {{-- social media --}}
                <div class="col d-flex align-items-center  header-top-info">
                    <span class="mr-2 text-white font-weight-semi-bold font-size-14">Follow Ranking on:</span>
                    <ul class="social-profile social-profile-colored">
                        <li>
                            <a href="#fb" class="facebook-bg"><i class="lab la-facebook-f"></i></a>
                            {{-- <a href="#" class="facebook-bg"><i class="lab la-facebook-f"></i></a></li> --}}
                        </li>
                        <li><a href="#" class="twitter-bg"><i class="lab la-twitter"></i></a></li>
                        <li><a href="#" class="instagram-bg"><i class="lab la-instagram"></i></a></li>
                        <li><a href="#" class="dribbble-bg"><i class="la la-dribbble"></i></a></li>
                    </ul>
                </div>
                {{-- login and signUp --}}
                <div class="col d-flex justify-content-end align-items-center header-top-info font-size-14">
                    <p class="login-and-signup-wrap">
                        <a href="{{ route('login-page') }}">
                            <span class="mr-1 la la-sign-in"></span>Login
                        </a>
                        <span class="or-text px-2">|</span>
                        <a href="{{ route('register-page') }}">
                            <span class="mr-1 la la-user-plus"></span>Sign Up
                        </a>
                    </p>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end header-top-bar -->
    <div class="header-menu-wrapper padding-right-30px padding-left-30px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu-full-width">
                        <div class="logo">
                            <a href="{{ route('home-page') }}"><img src="{{ url('images/logo-white.png') }}"
                                    alt="logo"></a>
                            <div class="d-flex align-items-center">
                                <a href="add-listing.html"
                                    class="btn-gray add-listing-btn-show font-size-24 mr-2 flex-shrink-0"
                                    data-toggle="tooltip" data-placement="left" title="Add Listing">
                                    <i class="la la-plus"></i>
                                </a>
                                <div class="menu-toggle">
                                    <span class="menu__bar"></span>
                                    <span class="menu__bar"></span>
                                    <span class="menu__bar"></span>
                                </div><!-- end menu-toggle -->
                            </div>
                        </div><!-- end logo -->
                        <div class="quick-search-form d-flex align-items-center">
                            <form action="#" class="w-100">
                                <div class="header-search position-relative">
                                    <i class="la la-search form-icon"></i>
                                    <input type="search" name="" placeholder="What are you looking for?">
                                </div>
                            </form>
                        </div><!-- end quick-search-form -->
                        <div class="main-menu-content ml-auto">
                            <nav class="main-menu">
                                <x-navigation-link />
                            </nav>
                        </div><!-- end main-menu-content -->
                        <div class="nav-right-content">
                            <a href="add-listing.html" class="theme-btn gradient-btn shadow-none add-listing-btn-hide">
                                <i class="la la-plus mr-2"></i>Add Listing
                            </a>
                        </div><!-- end nav-right-content -->
                    </div><!-- end menu-full-width -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end header-menu-wrapper -->
</header>
