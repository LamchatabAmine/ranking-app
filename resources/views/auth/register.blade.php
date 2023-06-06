<x-app-layout>

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
                        <form class="card-body p-5 text-center" method="POST" action="{{ route('register') }}">
                            @csrf
                            <h3 class="mb-5">Sign Up</h3>
                            <!-- Full Name input -->
                            <div class="form-outline mb-4 mt-4">
                                <label class="form-label  d-flex" for="Full-Name">Full Name</label>
                                <input type="text" id="full-Name" name="fullName" class="form-control"
                                    value="{{ old('fullName') }}" />
                                @error('fullName')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Email input -->
                            <div class="form-outline mb-4 ">
                                <label class="form-label  d-flex" for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    value="{{ old('email') }}" />
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Password input -->
                            <div class="form-outline mb-4 ">
                                <label class="form-label d-flex" for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control"
                                    value="{{ old('password') }}" />
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Repeat Password input -->
                            <div class="form-outline mb-4 ">
                                <label class="form-label d-flex" for="password_confirmation">Repeat password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control" />
                            </div>
                            <button type="submit" class="btn btn-lg theme-btn-primary btn-block mx-auto">Sign
                                Up</button>
                            <div class="mt-3">Already have an account?
                                <a href="{{ route('login') }}">Sign in</a>
                            </div>
                            <hr class="my-4">
                            <a class=" btn-lg btn-block  btn-google" href="{{ route('google-auth') }}">
                                <i class="fab fa-google "></i>
                                Sign Up with google
                            </a>
                            <a class=" btn-lg btn-block  btn-facebook" href="#fb"><i
                                    class="fab fa-facebook-f "></i>Sign Up with facebook
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
