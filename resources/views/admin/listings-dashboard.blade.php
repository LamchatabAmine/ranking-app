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
                            <h2 class="sec__title font-size-24 mb-0">listings</h2>
                        </div>
                        <ul class="list-items bread-list bread-list-2">
                            <li><a href="{{ route('home-page') }}">Home</a></li>
                            <li><a href="{{ route('admin') }}">Dashboard</a></li>
                            <li>listings</li>
                        </ul>
                    </div><!-- end breadcrumb-content -->
                    <div class="row">
                        <div class="col-lg-12">
                            @if ($businesses->isNotEmpty())
                                @foreach ($businesses as $business)
                                    <div class="col-lg-12">
                                        <x-card-list>
                                            <x-slot:linkItem>{{ route('business.detail', $business->id) }}</x-slot>
                                                <x-slot:image_business>
                                                    {{ $galleries->where('business_id', $business->id)->where('type', 1)->pluck('path')->first() }}
                                                    </x-slot>
                                                    <x-slot:logo>{{ $business->logo }}</x-slot>
                                                        <x-slot:title>{{ $business->title }}</x-slot>
                                                            <x-slot:linkAddress>{{ $business->address }}</x-slot>
                                                                <x-slot:address>{{ $business->address }}</x-slot>
                                                                    <x-slot:rate>0</x-slot>
                                                                        <x-slot:linkCategory>
                                                                            #{{ $categories->firstWhere('id', $business->category_id)['category_name'] }}
                                                                            </x-slot>
                                                                            <x-slot:category>
                                                                                {{ $categories->firstWhere('id', $business->category_id)['category_name'] }}
                                                                                </x-slot>
                                                                                <x-slot:linkWebSite>
                                                                                    {{ $business->website }}
                                                                                    </x-slot>
                                                                                    <x-slot:webSite>
                                                                                        {{ $business->website }}
                                                                                        </x-slot>
                                                                                        <x-slot:btn>
                                                                                            <form
                                                                                                action="{{ route('listings.destroy', $business->id) }}"
                                                                                                method="post"
                                                                                                class="action-buttons position-absolute top-0 right-0 mt-3 mr-3">
                                                                                                @csrf
                                                                                                @method('DELETE')
                                                                                                <button type="submit"
                                                                                                    class="btn bg-rgb-danger font-weight-medium">
                                                                                                    <i
                                                                                                        class="la la-trash mr-1"></i>Delete
                                                                                                </button>
                                                                                            </form>
                                                                                            </x-slot>
                                        </x-card-list>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-warning" role="alert">
                                    There is no Businesses !
                                </div>
                            @endif
                        </div><!-- end col-lg-12 -->

                        <div class="col-lg-12 pb-4">
                            <div class="pagination-wrapper d-inline-block">
                                <div class="section-pagination">
                                    {{ $businesses->appends(request()->except('page'))->links() }}
                                </div><!-- end section-pagination -->
                            </div>
                        </div><!-- end col-lg-12 -->
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



    {{--  back-to-top  --}}
    <div id="back-to-top"><i class="la la-arrow-up" title="Go top"></i></div>
</x-app-layout>
