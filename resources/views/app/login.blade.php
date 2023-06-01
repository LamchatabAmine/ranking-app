<x-app-layout>
    <!-- end header-top-bar -->
    <div class="header-menu-wrapper ps-st bg-pr padding-right-30px padding-left-30px">
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
                        <div class="main-menu-content ml-auto">
                            <nav class="main-menu">
                                <x-navigation-link />
                            </nav>
                        </div><!-- end main-menu-content -->
                        <div class="nav-right-content">
                            <a href="add-listing.html" class="theme-btn gradient-btn shadow-none add-listing-btn-hide">
                                <i class="la la-plus mr-2"></i>Add Listing
                            </a>
                            {{-- <a href="add-listing.html" class="theme-btn gradient-btn shadow-none add-listing-btn-hide">
                                <i class="la la-plus mr-2"></i>Add Listing
                            </a> --}}
                        </div><!-- end nav-right-content -->
                    </div><!-- end menu-full-width -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div>
    <!-- end header-menu-wrapper -->
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <form class="card-body p-5 text-center">
                            <h3 class="mb-5">Sign in</h3>
                            <div class="form-outline mb-4">
                                <label class="form-label  d-flex" for="email">Email</label>
                                <input type="email" id="email" class="form-control form-control-lg" />
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label  d-flex" for="typePasswordX-2">Password</label>
                                <input type="password" id="typePasswordX-2" class="form-control form-control-lg" />
                            </div>
                            <!-- Checkbox -->
                            <div class="form-check d-flex justify-content-start mb-4">
                                <label class="form-check-label" for="form1Example3"> Remember password </label>
                                <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                            </div>
                            <button type="submit" class="btn btn-lg theme-btn-primary btn-block mx-auto">Login</button>
                            <hr class="my-4">
                            <button class=" btn-lg btn-block  btn-google" type="submit">
                                <i class="fab fa-google "></i>
                                Sign in with google
                            </button>
                            <button class=" btn-lg btn-block  btn-facebook" type="submit"><i
                                    class="fab fa-facebook-f "></i>Sign in with facebook
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
