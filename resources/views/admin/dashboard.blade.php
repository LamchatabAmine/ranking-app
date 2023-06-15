<x-app-layout>
    {{-- <!--  per-loader --> --}}
    <div class="loader-container">
        <div class="loader-ripple">
            <div></div>
            <div></div>
        </div>
    </div>

    {{-- START DASHBOARD AREA --}}
    <section class="dashboard-wrap d-flex">
        <x-side-bar />
        <div class="dashboard-body d-flex flex-column">
            <div class="dashboard-inner-body flex-grow-1">
                <nav class="navbar navbar-expand bg-navbar dashboard-topbar mb-4">
                    <button id="sidebarToggleTop" class="btn rounded-circle mr-3">
                        <i class="la la-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle after-none" href="#" id="searchDropdown"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="la la-search"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="search-box">
                                    <div class="input-group">
                                        <label class="input-label mb-0">
                                            <input type="text" class="form-control" placeholder="Search here...">
                                        </label>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="la la-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item dropdown border-left pl-3 ml-4">
                            <a class="nav-link dropdown-toggle after-none" href="#" id="userDropdown"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="user-thumb user-thumb-sm position-relative">
                                    <img src="{{ $user->image }}" alt="author-image">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <span
                                    class="ml-2 small font-weight-medium d-none d-lg-inline">{{ $user->fullName }}</span>
                            </a>
                            <form method="POST" action="{{ route('logout') }}"
                                class="dropdown-menu dropdown-menu-sm dropdown-menu-right animated--grow-in py-2"
                                aria-labelledby="userDropdown">
                                @csrf
                                <a class="dropdown-item text-color font-size-15" href="{{ route('profile') }}">
                                    <i class="la la-user mr-2 text-gray font-size-18"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item text-color font-size-15" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="la la-power-off mr-2 text-gray font-size-18"></i>
                                    Logout
                                </a>
                            </form>
                        </li>
                    </ul>
                </nav><!-- end dashboard-topbar -->
                <div class="container-fluid dashboard-inner-body-container">
                    <div class="breadcrumb-content d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-24 mb-0">Howdy, {{ $user->fullName }}!</h2>
                        </div>
                        <ul class="list-items bread-list bread-list-2">
                            <li><a href="{{ route('home-page') }}">Home</a></li>
                            <li>Dashboard</li>
                        </ul>
                    </div><!-- end breadcrumb-content -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="card-item dashboard-stat">
                                <div class="card-content">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h2 class="card-title font-size-40"> {{ $CountUsers }}</h2>
                                            <p class="card-sub font-size-18 line-height-24">Total Users</p>
                                        </div>
                                        <div class="col-auto font-size-60">
                                            <i class="las la-users "></i>
                                        </div>
                                    </div><!-- end row -->

                                </div><!-- end card-content -->
                            </div><!-- end card-item -->
                        </div><!-- end col-lg-3 -->
                        <div class="col-lg-3 col-md-6">
                            <div class="card-item dashboard-stat">
                                <div class="card-content">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h2 class="card-title font-size-40">{{ $CountBusinesses }}</h2>
                                            <p class="card-sub font-size-18 line-height-24">Active Listings</p>
                                        </div>
                                        <div class="col-auto font-size-60">
                                            <i class="la la-map-marked text-primary"></i>
                                        </div>
                                    </div><!-- end row -->
                                </div><!-- end card-content -->
                            </div><!-- end card-item -->
                        </div><!-- end col-lg-3 -->
                        <div class="col-lg-3 col-md-6">
                            <div class="card-item dashboard-stat">
                                <div class="card-content">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h2 class="card-title font-size-40"> {{ $CountCategories }}</h2>
                                            <p class="card-sub font-size-18 line-height-24">Total Categories</p>
                                        </div>
                                        <div class="col-auto font-size-60">
                                            <i class="las la-tags text-success"></i>
                                        </div>
                                    </div><!-- end row -->
                                </div><!-- end card-content -->
                            </div><!-- end card-item -->
                        </div><!-- end col-lg-3 -->
                        <div class="col-lg-3 col-md-6">
                            <div class="card-item dashboard-stat">
                                <div class="card-content">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h2 class="card-title font-size-40">{{ $CountCities }}</h2>
                                            <p class="card-sub font-size-18 line-height-24">Total Cities</p>
                                        </div>
                                        <div class="col-auto font-size-60">
                                            <i class="las la-city text-warning"></i>
                                        </div>
                                    </div><!-- end row -->
                                </div><!-- end card-content -->
                            </div><!-- end card-item -->
                        </div><!-- end col-lg-3 -->


                    </div><!-- end row -->
                </div><!-- end dashboard-inner-body-container -->
            </div><!-- end dashboard-inner-body -->
        </div><!-- end dashboard-body -->
    </section>

</x-app-layout>
