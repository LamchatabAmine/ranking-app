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
                            <a href="{{ route('business.index') }}"
                                class="theme-btn gradient-btn shadow-none add-listing-btn-hide">
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
                        <div class="card-body p-5 text-center">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <h3 class="mb-5">Sign in</h3>
                                <div class="form-outline mb-4">
                                    <label class="form-label  d-flex" for="email">Email</label>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                                        class="form-control form-control-lg" />
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label  d-flex" for="password">Password</label>
                                    <input type="password" id="password" name="password"
                                        class="form-control form-control-lg" />
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- Checkbox -->
                                <div class="form-check d-flex justify-content-start mb-4">
                                    <label class="form-check-label" for="checkbox"> Remember password </label>
                                    <input class="form-check-input" type="checkbox" value="" id="checkbox" />
                                </div>
                                <button type="submit"
                                    class="btn btn-lg theme-btn-primary btn-block mx-auto">Login</button>
                                <div class="mt-2">Not registered?
                                    <a href="{{ route('register') }}">Register for free.</a>
                                </div>
                                <hr class="my-4">
                            </form>
                            <a class="btn-lg btn-block btn-google" href="{{ route('google-auth') }}">
                                <i class="fab fa-google "></i>
                                Sign in with google
                            </a>
                            <a class=" btn-lg btn-block  btn-facebook" href="#fb"><i
                                    class="fab fa-facebook-f "></i>Sign
                                in with facebook
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
