<x-app-layout>


    {{--  HEADER AREA --}}
    <x-header />


    <!--  per-loader -->
    <div class="loader-container">
        <div class="loader-ripple">
            <div></div>
            <div></div>
        </div>
    </div>



    {{--  BREADCRUMB AREA --}}
    <section class="breadcrumb-area bread-bg-3 bread-overlay overflow-hidden">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                        <div class="section-heading">
                            <h2 class="sec__title text-white font-size-40 mb-0">Profile edit</h2>
                        </div>
                        <ul class="list-items bread-list ">
                            <li><a href="{{ route('home-page') }}">Home</a></li>
                            <li><a href="{{ route('myAccount') }}">my account</a></li>
                            <li> edit</li>
                        </ul>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
        <div class="bread-svg">
            <x-svgs.svg-contact />
        </div>
    </section>
    {{-- END BREADCRUMB AREA --}}



    <section>

        <!-- OUR BLOG START -->
        <div class="section-full p-t120 p-b90 site-bg-white">
            <div class="container">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <form class="row" method="post" action="{{ route('profile.update') }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="col-xl-3 col-lg-4 col-md-12 rightSidebar m-b30">
                        <div class="side-bar-st-1">
                            <div class="candidate-profile-pic">
                                <img src="{{ $user->image }}" alt="image-profile" />
                                <div class="upload-btn-wrapper">
                                    <div id="upload-image-grid"></div>
                                    <button class="site-button button-sm">Upload Photo</button>
                                    <input type="file" name="image" id="file-uploader"
                                        accept=".jpg, .jpeg, .png" />
                                </div>
                            </div>
                            <div class="mid-content text-center">
                                <a href="#" class="job-title">
                                    <h4>{{ $user->fullName }}</h4>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-9 col-lg-8 col-md-12 m-b30">
                        <!--Filter Short By-->
                        <div class="right-section-panel site-bg-gray">
                            <!--Basic Information-->
                            <div class="panel panel-default">
                                <div class="panel-heading wt-panel-heading p-a20">
                                    <h4 class="panel-tittle m-a0">Basic Informations</h4>
                                </div>
                                <div class="panel-body wt-panel-body p-a20 m-b30">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="fullName" type="text"
                                                        value="{{ $user->fullName }}" required />

                                                </div>
                                                @error('fullName')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="email" type="email"
                                                        value="{{ $user->email }}" required />
                                                </div>
                                                @error('email')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="password" type="password"
                                                        placeholder="**********" required />

                                                </div>
                                                @error('password')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Confirmed Password</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="password_confirmation"
                                                        type="password" placeholder="**********" required />
                                                </div>
                                                @error('password_confirmation')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="text-left">
                                                <button type="submit" class="site-button">Save Changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- OUR BLOG END -->
    </section>





    {{--  FOOTER AREA --}}
    <x-footer />



    <!--  back-to-top -->
    <div id="back-to-top">
        <i class="la la-arrow-up" title="Go top"></i>
    </div>
    <!-- end back-to-top -->


</x-app-layout>
