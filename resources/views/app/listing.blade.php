@php
    // $image_principale = $galleries
    //     ->where('business_id', $businesses->id)
    //     ->where('type', 1)
    //     ->pluck('path')
    //     ->first();
    // $category_name = $categories->firstWhere('id', $businesses->category_id)['category_name'];
@endphp



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

    <section class="breadcrumb-area bread-bg bread-overlay overflow-hidden">
        <div class="overlay"></div><!-- end overlay -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                        <div class="section-heading">
                            <h2 class="sec__title text-white font-size-40 mb-0">Listing List</h2>
                        </div>
                        <ul class="list-items bread-list">
                            <li><a href="{{ route('home-page') }}">Home</a></li>
                            <li>Listing List</li>
                        </ul>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
        <div class="bread-svg">
            <x-svgs.svg-item />
        </div><!-- end bread-svg -->
    </section><!-- end breadcrumb-area -->






    <section class="card-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div
                        class="filter-bar d-flex flex-wrap justify-content-between align-items-center margin-bottom-30px">
                        <p class="result-text font-weight-medium">Showing 1 to 10 of 30,590 entries</p>
                        <div class="filter-bar-action d-flex flex-wrap align-items-center">
                            <a href="#" class="search-filter" data-toggle="modal"
                                data-target="#searchFilterModal">
                                <i class="la la-sliders mr-1"></i>Detailed Search
                            </a>
                            <div class="user-chosen-select-container ml-3">
                                <select class="user-chosen-select">
                                    <option value="sort-by-default">Sort by default</option>
                                    <option value="high-rated">High Rated</option>
                                    <option value="most-reviewed">Most Reviewed</option>
                                    <option value="popular-Listing">Popular Listing</option>
                                    <option value="newest-Listing">Newest Listing</option>
                                    <option value="older-Listing">Older Listing</option>
                                    <option value="price-low-to-high">Price: low to high</option>
                                    <option value="price-high-to-low">Price: high to low</option>
                                    <option value="all-listings">Random</option>
                                </select>
                            </div>
                        </div><!-- end filter-bar-action -->
                    </div><!-- end filter-bar -->
                </div><!-- end col-lg-12 -->
                <div class="col-lg-8">
                    <div class="row">
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
                                                                            <x-slot:linkWebSite>{{ $business->website }}
                                                                                </x-slot>
                                                                                <x-slot:webSite>
                                                                                    {{ $business->website }}
                                                                                    </x-slot>
                                    </x-card-list>
                                </div>
                            @endforeach
                        @else
                            <p class="text-danger">There is no businesses
                                <a href="{{ route('business.index') }}" class="btn btn-link">Go to add a business</a>
                            </p>
                        @endif
                    </div><!-- end row -->
                    <div class="row">
                        <div class="col-lg-12 pt-3 text-center">
                            <div class="pagination-wrapper d-inline-block">
                                <div class="section-pagination">
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination flex-wrap justify-content-center">
                                            <li class="page-item">
                                                <a class="page-link page-link-first" href="#"><i
                                                        class="la la-long-arrow-left mr-1"></i> First</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true"><i class="la la-angle-left"></i></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link page-link-active"
                                                    href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true"><i class="la la-angle-right"></i></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link page-link-last" href="#">Last <i
                                                        class="la la-long-arrow-right ml-1"></i></a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div><!-- end section-pagination -->
                            </div>
                        </div><!-- end col-lg-12 -->
                    </div><!-- end row -->
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="sidebar mb-0">
                        <div class="sidebar-widget">
                            <h3 class="widget-title">Search</h3>
                            <div class="stroke-shape mb-4"></div>
                            <form action="#" class="form-box">
                                <div class="form-group">
                                    <span class="la la-search form-icon"></span>
                                    <input class="form-control" type="search" placeholder="What are you looking for?">
                                </div>
                                <div class="form-group user-chosen-select-container">
                                    <select name="city" class="user-chosen-select">
                                        <option value="">Select a City</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">
                                                {{ $city->parent_city ? $city->parent_city->city_name . ' > ' : '' }}
                                                {{ $city->city_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div><!-- end form-group -->
                                <div class="form-group user-chosen-select-container">
                                    <select name="category" class="user-chosen-select">
                                        <option value="">Select a category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->parent_category ? $category->parent_category->category_name . ' > ' : '' }}
                                                {{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div><!-- end form-group -->
                                <div class="btn-box">
                                    <button type="submit" class="theme-btn gradient-btn border-0 w-100 mt-3">
                                        <i class="la la-search mr-2"></i>Search Now
                                    </button>
                                </div><!-- end btn-box -->
                            </form>
                        </div>

                        <div class="sidebar-widget">
                            <h3 class="widget-title">Filter by Cities</h3>
                            <div class="stroke-shape mb-4"></div>
                            <div class="checkbox-wrap">
                                @foreach ($cities->whereNotNull('parent_city_id')->slice(0, 4) as $city)
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="outerSunsetChb">
                                        <label for="outerSunsetChb">{{ $city->city_name }}</label>
                                    </div>
                                @endforeach


                                <div class="collapse collapse-content" id="showMoreOptionCollapse3">
                                    @foreach ($cities->whereNotNull('parent_city_id')->slice(4, 4) as $city)
                                        <div class="custom-checkbox">
                                            <input type="checkbox" id="outerSunsetChb">
                                            <label for="outerSunsetChb">{{ $city->city_name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <a class="collapse-btn" data-toggle="collapse" href="#showMoreOptionCollapse3"
                                    role="button" aria-expanded="false" aria-controls="showMoreOptionCollapse3">
                                    <span class="collapse-btn-hide">Show More <i class="la la-plus ml-1"></i></span>
                                    <span class="collapse-btn-show">Show Less <i class="la la-minus ml-1"></i></span>
                                </a>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <h3 class="widget-title">Filter by Category</h3>
                            <div class="stroke-shape mb-4"></div>
                            <div class="category-list">
                                @foreach ($categories->whereNotNull('parent_category_id')->slice(0, 4) as $category)
                                    <a href="#" class="generic-img-card d-block hover-y overflow-hidden mb-3">
                                        <img src="images/bleu-background.jpg" alt="image"
                                            class="generic-img-card-img lazy">
                                        <div
                                            class="generic-img-card-content d-flex align-items-center justify-content-between">
                                            <span class="badge">{{ $category->category_name }}</span>
                                            <span class="generic-img-card-counter">238</span>
                                        </div>
                                    </a>
                                @endforeach
                                <div class="collapse collapse-content" id="showMoreOptionCollapse2">
                                    @foreach ($categories->whereNotNull('parent_category_id')->slice(4, 4) as $category)
                                        <a href="#"
                                            class="generic-img-card d-block hover-y overflow-hidden mb-3">
                                            <img src="images/bleu-background.jpg" alt="image"
                                                class="generic-img-card-img lazy">
                                            <div
                                                class="generic-img-card-content d-flex align-items-center justify-content-between">
                                                <span class="badge">{{ $category->category_name }}</span>
                                                <span class="generic-img-card-counter">238</span>
                                            </div>
                                        </a>
                                    @endforeach
                                    {{-- <a href="#" class="generic-img-card d-block hover-y overflow-hidden mb-3">
                                        <img src="images/img-loading.html" data-src="images/generic-small-img-5.jpg"
                                            alt="image" class="generic-img-card-img lazy">
                                        <div
                                            class="generic-img-card-content d-flex align-items-center justify-content-between">
                                            <span class="badge">Shopping</span>
                                            <span class="generic-img-card-counter">321</span>
                                        </div>
                                    </a>
                                    <a href="#" class="generic-img-card d-block hover-y overflow-hidden mb-3">
                                        <img src="images/img-loading.html" data-src="images/generic-small-img-6.jpg"
                                            alt="image" class="generic-img-card-img lazy">
                                        <div
                                            class="generic-img-card-content d-flex align-items-center justify-content-between">
                                            <span class="badge">Travel</span>
                                            <span class="generic-img-card-counter">12</span>
                                        </div>
                                    </a>
                                    <a href="#" class="generic-img-card d-block hover-y overflow-hidden mb-3">
                                        <img src="images/img-loading.html" data-src="images/generic-small-img-7.jpg"
                                            alt="image" class="generic-img-card-img lazy">
                                        <div
                                            class="generic-img-card-content d-flex align-items-center justify-content-between">
                                            <span class="badge">Jobs</span>
                                            <span class="generic-img-card-counter">133</span>
                                        </div>
                                    </a> --}}
                                </div>
                                <a class="collapse-btn" data-toggle="collapse" href="#showMoreOptionCollapse2"
                                    role="button" aria-expanded="false" aria-controls="showMoreOptionCollapse2">
                                    <span class="collapse-btn-hide">Show More <i class="la la-plus ml-1"></i></span>
                                    <span class="collapse-btn-show">Show Less <i class="la la-minus ml-1"></i></span>
                                </a>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <h3 class="widget-title">Filter by Ratings</h3>
                            <div class="stroke-shape mb-4"></div>
                            <ul class="custom-radio">
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <label class="radio-label">
                                            <input type="radio" checked="checked" name="rating-radio">
                                            <span class="radio-mark"></span>
                                        </label>
                                        <div class="font-weight-medium">
                                            Show All
                                        </div>
                                    </div>
                                    <span class="font-size-14 font-weight-medium">
                                        48,473
                                    </span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <label class="radio-label">
                                            <input type="radio" name="rating-radio">
                                            <span class="radio-mark"></span>
                                        </label>
                                        <div class="stars">
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                        </div>
                                    </div>
                                    <span class="font-size-14 font-weight-medium">
                                        23,403
                                    </span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <label class="radio-label">
                                            <input type="radio" name="rating-radio">
                                            <span class="radio-mark"></span>
                                        </label>
                                        <div class="stars">
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star-o text-gray"></span>
                                        </div>
                                    </div>
                                    <span class="font-size-14 font-weight-medium">
                                        1403
                                    </span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <label class="radio-label">
                                            <input type="radio" name="rating-radio">
                                            <span class="radio-mark"></span>
                                        </label>
                                        <div class="stars">
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star-o text-gray"></span>
                                            <span class="la la-star-o text-gray"></span>
                                        </div>
                                    </div>
                                    <span class="font-size-14 font-weight-medium">
                                        988
                                    </span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <label class="radio-label">
                                            <input type="radio" name="rating-radio">
                                            <span class="radio-mark"></span>
                                        </label>
                                        <div class="stars">
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star-o text-gray"></span>
                                            <span class="la la-star-o text-gray"></span>
                                            <span class="la la-star-o text-gray"></span>
                                        </div>
                                    </div>
                                    <span class="font-size-14 font-weight-medium">
                                        200
                                    </span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <label class="radio-label">
                                            <input type="radio" name="rating-radio">
                                            <span class="radio-mark"></span>
                                        </label>
                                        <div class="stars">
                                            <span class="la la-star"></span>
                                            <span class="la la-star-o text-gray"></span>
                                            <span class="la la-star-o text-gray"></span>
                                            <span class="la la-star-o text-gray"></span>
                                            <span class="la la-star-o text-gray"></span>
                                        </div>
                                    </div>
                                    <span class="font-size-14 font-weight-medium">
                                        100
                                    </span>
                                </li>
                            </ul>
                        </div>

                        <div class="sidebar-widget">
                            <div class="btn-box">
                                <button type="submit" class="theme-btn gradient-btn w-100 border-0">
                                    Apply Filter <i class="la la-arrow-right ml-1"></i>
                                </button>
                                <button type="submit" class="btn-gray btn-gray-lg mt-3 w-100">
                                    <i class="la la-redo-alt mr-1"></i> Reset Filters
                                </button>
                            </div>
                        </div>
                    </div><!-- end sidebar -->
                </div>
            </div>
        </div>
    </section><!-- end card-area -->

    {{--  FOOTER AREA --}}
    <x-footer />

    <!-- start back-to-top -->
    <div id="back-to-top"><i class="la la-arrow-up" title="Go top"></i></div>
    <!-- end back-to-top -->

</x-app-layout>
