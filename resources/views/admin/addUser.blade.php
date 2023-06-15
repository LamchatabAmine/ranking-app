<x-app-layout>
    {{-- <!--  per-loader --> --}}
    <div class="loader-container">
        <div class="loader-ripple">
            <div></div>
            <div></div>
        </div>
    </div>

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
                            <h2 class="sec__title font-size-24 mb-0">Add User</h2>
                        </div>
                        <ul class="list-items bread-list bread-list-2">
                            <li><a href="{{ route('home-page') }}">Home</a></li>
                            <li><a href="{{ route('admin') }}">Dashboard</a></li>
                            <li>Add User</li>
                        </ul>
                    </div><!-- end breadcrumb-content -->
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="block-card dashboard-card mb-4">
                                <div class="block-card-header">
                                    <h2 class="widget-title pb-0">Profile Form</h2>
                                </div>
                                <form action="{{ route('addUser.store') }}" method="POST" class="block-card-body">
                                    @csrf
                                    <div class="form-box row pt-4">
                                        <div class="col-lg-12">
                                            <div class="input-box">
                                                <label class="label-text">Full Name</label>
                                                <div class="form-group">
                                                    <span class="la la-user form-icon"></span>
                                                    <input class="form-control" type="text" name="fullName"
                                                        placeholder="full Name" value="{{ old('fullName') }}">
                                                </div>
                                                @error('fullName')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                        <div class="col-lg-12">
                                            <div class="input-box">
                                                <label class="label-text">Email</label>
                                                <div class="form-group">
                                                    <span class="la la-envelope-o form-icon"></span>
                                                    <input class="form-control" type="email" name="email"
                                                        placeholder="email@gmail.com" value="{{ old('fullName') }}">
                                                </div>
                                                @error('email')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                        <div class="col-lg-12">
                                            <div class="input-box">
                                                <label class="label-text">Password</label>
                                                <div class="form-group">
                                                    <span class="la la-lock form-icon"></span>
                                                    <input class="form-control" type="password" name="password"
                                                        placeholder="New password">
                                                </div>
                                                @error('password')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                        <div class="col-lg-12">
                                            <div class="input-box">
                                                <label class="label-text">Confirmer Password</label>
                                                <div class="form-group">
                                                    <span class="la la-lock form-icon"></span>
                                                    <input class="form-control" type="password"
                                                        name="password_confirmation" placeholder="Confirmer Password">
                                                </div>
                                                @error('password_confirmation')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                        <div class="col-lg-12">
                                            <div class="input-box">
                                                <label class="label-text">Add a role</label>
                                                <select name="role" class="form-control form-group"
                                                    aria-label="Default select example" required>
                                                    <option value="2">Consumer</option>
                                                    <option value="1">Manager</option>
                                                    <option value="0">Admin</option>
                                                </select>
                                                @error('role')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                        <div class="col-lg-12">
                                            <div class="btn-box pt-1">
                                                <button type="submit" class="theme-btn gradient-btn border-0">Save
                                                    Changes<i class="la la-arrow-right ml-2"></i></button>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                    </div>
                                </form><!-- end block-card-body -->
                            </div><!-- end block-card -->
                        </div><!-- end col-lg-6 -->
                    </div><!-- end row -->
                </div><!-- end dashboard-inner-body-container -->
            </div><!-- end dashboard-inner-body -->

            <div class="dashboard-footer bg-white">
                <div class="container-fluid">
                    <div class="copy-right d-flex align-items-center justify-content-between">
                        <p class="copy__desc">
                            &copy; Copyright RankingUP
                            <script>
                                document.write(new Date().getFullYear());
                            </script>. Made with
                            <span class="la la-heart-o"></span> by <a href="#amine">Amine Lamchatab</a>
                        </p>
                    </div>
                </div>
            </div>
        </div><!-- end dashboard-body -->

    </section>



</x-app-layout>
