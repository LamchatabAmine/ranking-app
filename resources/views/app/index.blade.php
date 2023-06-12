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

    {{--  HERO-WRAPPER AREA --}}
    <section class="hero-wrapper overflow-hidden">
        <div class="overlay"></div><!-- end overlay -->
        <div id="fullscreen-slide-container">
            <ul class="slides-container">
                <li><img class="lazy" src="{{ url('images/home-page-img.jpg') }}" alt=""></li>
                <li><img class="lazy" src="{{ url('images/home-page-img2.jpg') }}" alt=""></li>
                <li><img class="lazy" src="{{ url('images/home-page-img3.jpg') }}" alt=""></li>
            </ul>
        </div>
        <!-- End fullscreen-slide-container -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-heading text-center">
                        <div class="section-heading">
                            <h2 class="sec__title cd-headline slide">
                                What are you interested in
                                <span class="cd-words-wrapper py-0">
                                    @foreach ($categories->where('parent_category_id', null) as $key => $category)
                                        <b {{ $key == 0 ? 'class=is-visible' : '' }}>{{ $category->category_name }}</b>
                                    @endforeach
                                </span>
                            </h2>
                            <p class="sec__desc">
                                Discover the best places to stay, eat, shop & visit the city nearest to you.
                            </p>
                        </div>
                    </div><!-- end hero-heading -->
                    <form method="GET" action="{{ route('search') }}" class="main-search-input">
                        <div class="main-search-input-item">
                            <div action="#" class="form-box">
                                <div class="form-group mb-0">
                                    <span class="la la-search form-icon"></span>
                                    <input name="keyword" type="search" class="form-control"
                                        placeholder="What are you looking for?">
                                </div>
                            </div>
                        </div>
                        <div class="main-search-input-item user-chosen-select-container">
                            <select name="city" class="user-chosen-select">
                                <option value="">Select a City</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">
                                        {{ $city->parent_city ? $city->parent_city->city_name . ' > ' : '' }}
                                        {{ $city->city_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="main-search-input-item user-chosen-select-container">
                            <select name="category" class="user-chosen-select">
                                <option value="">Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->parent_category ? $category->parent_category->category_name . ' > ' : '' }}
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="main-search-input-item">
                            <button type="submit" class="theme-btn gradient-btn border-0 w-100"><i
                                    class="la la-search mr-2"></i>Search Now</button>
                        </div>
                    </form><!-- end main-search-input -->

                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

    {{--  CATEGORY AREA --}}
    <section class="category-area bg-gray arrow-down-shape position-relative section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <x-section-header>
                        <x-slot:svg>
                            <x-svgs.svg-one />
                            </x-slot>
                            <x-slot:title>
                                Most Popular Categories
                                </x-slot>

                                <x-slot:desc>
                                    Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, <br>
                                    a feugiat eros. Nunc ut lacinia tortors.
                                    </x-slot>
                    </x-section-header>
                    <!-- end section-heading -->
                </div><!-- end col-lg-12 -->
            </div>
            <!-- end row -->
            <div class="row mt-5">
                @foreach ($categories->where('parent_category_id', null)->slice(0, 5) as $category)
                    <x-category-item>
                        <x-slot:imageName>
                            home-page-img
                            </x-slot>

                            <x-slot:title>
                                {{ $category->category_name }}
                                </x-slot>

                                <x-slot:listing>
                                    12 Listings
                                    </x-slot>
                    </x-category-item>
                @endforeach
            </div>
            <!-- end row -->
            <div class="more-btn-box pt-3 text-center">
                <a href="all-categories.html" class="btn-gray hover-scale-2">Browse All Category <i
                        class="la la-arrow-right ml-2"></i></a>
            </div>
        </div><!-- end container -->
    </section>

    {{--  CARD AREA --}}
    <section class="card-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <x-section-header>
                        <x-slot:svg>
                            <x-svgs.svg-two />
                            </x-slot>
                            <x-slot:title>
                                Check out Our Newest Business
                                </x-slot>

                                <x-slot:desc>
                                    Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, <br>
                                    a feugiat eros. Nunc ut lacinia tortors.
                                    </x-slot>
                    </x-section-header>
                    {{--  end section-heading  --}}
                </div><!-- end col-lg-12 -->
            </div>
            <!-- end row -->
            <div class="row padding-top-60px">
                @if ($businesses)
                    @foreach ($businesses->take(3) as $business)
                        <div class="col-lg-4 responsive-column">
                            <x-card-item>
                                <x-slot:linkBusiness>
                                    {{ route('business.detail', $business->id) }}
                                    </x-slot>
                                    <x-slot:imageName>
                                        {{ $galleries->where('business_id', $business->id)->where('type', 1)->pluck('path')->first() }}
                                        </x-slot>
                                        <x-slot:linkUser>
                                            #linkUser
                                            </x-slot>
                                            <x-slot:businessLogo>
                                                {{ $business->logo }}
                                                </x-slot>
                                                <x-slot:cardTitle>
                                                    {{ $business->title }}
                                                    </x-slot>
                                                    <x-slot:cardSub>
                                                        {{ $business->address }}
                                                        </x-slot>
                                                        <x-slot:rate>
                                                            4.7
                                                            </x-slot>
                                                            <x-slot:review>
                                                                5
                                                                </x-slot>
                                                                <x-slot:category>
                                                                    {{ $categories->firstWhere('id', $business->category_id)['category_name'] }}
                                                                    </x-slot>
                                                                    <x-slot:linkWeb>
                                                                        {{ $business->website }}
                                                                        </x-slot>
                            </x-card-item>
                        </div>
                    @endforeach
                @endif
            </div><!-- end row -->
        </div><!-- end container -->
    </section>


    {{--  HIW AREA --}}
    <section class="hiw-area padding-top-100px bg-gradient-gray hiw-bottom-left-round">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <x-section-header>
                        <x-slot:svg>
                            <x-svgs.svg-tree />
                            </x-slot>
                            <x-slot:title>
                                Quick and Easy Search
                                </x-slot>

                                <x-slot:desc>
                                    unknown printer took a galley of type and scrambled it to make a type
                                    specimen book.<br>software like Aldus PageMaker including versions of Lorem
                                    Ipsum.
                                    </x-slot>
                    </x-section-header>
                </div><!-- end row -->
            </div>
            <div class="row padding-top-60px">
                <div class="col-lg-4 responsive-column">
                    <x-info-box>
                        <x-slot:num>
                            1
                            </x-slot>
                            <x-slot:title>
                                Find Great Place
                                </x-slot>
                                <x-slot:desc>
                                    Proin dapibus nisl ornare diam varius ecos tempus. Aenean a quam
                                    luctus, finibus tellus ut, convallis eros.
                                    </x-slot>
                    </x-info-box>
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4 responsive-column">
                    <x-info-box>
                        <x-slot:num>
                            2
                            </x-slot>
                            <x-slot:title>
                                Choose a Category
                                </x-slot>
                                <x-slot:desc>
                                    Proin dapibus nisl ornare diam varius ecos tempus. Aenean a quam
                                    luctus, finibus tellus ut, convallis eros.
                                    </x-slot>
                    </x-info-box>
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4 responsive-column">
                    <x-info-box>
                        <x-slot:num>
                            3
                            </x-slot>
                            <x-slot:title>
                                Go Have Fun
                                </x-slot>
                                <x-slot:desc>
                                    Proin dapibus nisl ornare diam varius ecos tempus. Aenean a quam
                                    luctus, finibus tellus ut, convallis eros.
                                    </x-slot>
                    </x-info-box>
                </div><!-- end col-lg-4 -->
            </div>
            <!-- end row -->
        </div><!-- end container -->
    </section>



    {{--  CARD AREA --}}
    <section class="card-area padding-top-160px padding-bottom-100px">
        <div class="container">
            <div class="row">
                <div class="container col-lg-12">
                    <x-section-header>
                        <x-slot:svg>
                            <x-svgs.svg-four />
                            </x-slot>
                            <x-slot:title>
                                Top Listings
                                </x-slot>
                                <x-slot:desc>
                                    It is a long established fact that a reader will be distracted <br>
                                    by the readable content of a page when looking at its layout.
                                    </x-slot>
                    </x-section-header>
                    {{-- <!-- end section-heading --> --}}
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="col-lg-12">
                <div class="row padding-top-60px">
                    @if ($businesses)
                        @foreach ($businesses->take(6) as $business)
                            <div class="col-lg-4 responsive-column">
                                <x-card-item>
                                    <x-slot:linkBusiness>
                                        {{ route('business.detail', $business->id) }}
                                        {{-- linkBusiness --}}
                                        </x-slot>
                                        <x-slot:imageName>
                                            {{ $galleries->where('business_id', $business->id)->where('type', 1)->pluck('path')->first() }}
                                            </x-slot>
                                            <x-slot:linkUser>
                                                #linkUser
                                                </x-slot>
                                                <x-slot:businessLogo>
                                                    {{ $business->logo }}
                                                    </x-slot>
                                                    <x-slot:cardTitle>
                                                        {{ $business->title }}
                                                        </x-slot>
                                                        <x-slot:cardSub>
                                                            {{ $business->address }}
                                                            </x-slot>
                                                            <x-slot:rate>
                                                                4.7
                                                                </x-slot>
                                                                <x-slot:review>
                                                                    5
                                                                    </x-slot>
                                                                    <x-slot:category>
                                                                        {{ $categories->firstWhere('id', $business->category_id)['category_name'] }}
                                                                        </x-slot>
                                                                        <x-slot:linkWeb>
                                                                            {{ $business->website }}
                                                                            </x-slot>
                                </x-card-item>
                            </div>
                        @endforeach
                    @endif
                    {{--  --}}
                </div><!-- end row -->
            </div>
        </div><!-- end container -->
    </section>



    {{--  FUN-FACT AREA --}}
    <section class="funfact-area bg-gradient-gray section--padding text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <x-section-header>
                        <x-slot:svg>
                            <x-svgs.svg-five />
                            </x-slot>
                            <x-slot:title>
                                Since 2004 & Still Counting
                                </x-slot>

                                <x-slot:desc>
                                    Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, <br>
                                    a feugiat eros. Nunc ut lacinia tortors.
                                    </x-slot>
                    </x-section-header>
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row padding-top-60px">
                <div class="col-lg-3 responsive-column">
                    <x-counter>
                        <x-slot:opacity>
                            4
                            </x-slot>
                            <x-slot:svg>
                                <x-svgs.svg-icon1 />
                                </x-slot>
                                <x-slot:color>
                                    3
                                    </x-slot>
                                    <x-slot:counter>
                                        18,200
                                        </x-slot>
                                        <x-slot:title>
                                            Listings Pages
                                            </x-slot>
                    </x-counter>
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column">
                    <x-counter>
                        <x-slot:opacity>
                            4
                            </x-slot>
                            <x-slot:svg>
                                <x-svgs.svg-icon2 />
                                </x-slot>
                                <x-slot:color>
                                    4
                                    </x-slot>
                                    <x-slot:counter>
                                        25,100
                                        </x-slot>
                                        <x-slot:title>
                                            Happy Clients
                                            </x-slot>
                    </x-counter>
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column">
                    <x-counter>
                        <x-slot:opacity>
                            4
                            </x-slot>
                            <x-slot:svg>
                                <x-svgs.svg-icon3 />
                                </x-slot>
                                <x-slot:color>
                                    5
                                    </x-slot>
                                    <x-slot:counter>
                                        12,100
                                        </x-slot>
                                        <x-slot:title>
                                            Company Joined
                                            </x-slot>
                    </x-counter>
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column">
                    <x-counter>
                        <x-slot:opacity>
                            4
                            </x-slot>
                            <x-slot:svg>
                                <x-svgs.svg-icon4 />
                                </x-slot>
                                <x-slot:color>
                                    6
                                    </x-slot>
                                    <x-slot:counter>
                                        18,200
                                        </x-slot>
                                        <x-slot:title>
                                            Five Star Ratings
                                            </x-slot>
                    </x-counter>
                </div><!-- end col-lg-3 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>



    {{--  TESTIMONIAL AREA --}}
    <section class="testimonial-area section-padding text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <x-section-header>
                        <x-slot:svg>
                            <x-svgs.svg-seven />
                            </x-slot>
                            <x-slot:title>
                                Don't Believe Us Check <br> Client's Word.
                                </x-slot>
                                <x-slot:desc>
                                    Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero,<br>
                                    a feugiat eros. Nunc ut lacinia tortors.
                                    </x-slot>
                    </x-section-header>
                </div>
            </div><!-- end row -->
            <div class="row padding-top-60px">
                <div class="col-lg-12">
                    <div class="testimonial-carousel owl-trigger-action">
                        <x-review-item>
                            <x-slot:desc>
                                Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave. Seitan
                                High Life reprehenderit consectetur cupidatat kogi.
                                </x-slot>
                                <x-slot:name>
                                    Richard Doe
                                    </x-slot>
                                    <x-slot:country>
                                        united states
                                        </x-slot>
                        </x-review-item>

                        <x-review-item>
                            <x-slot:desc>
                                Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave. Seitan
                                High Life reprehenderit consectetur cupidatat kogi.
                                </x-slot>
                                <x-slot:name>
                                    Denwen Evil
                                    </x-slot>
                                    <x-slot:country>
                                        united kingdom
                                        </x-slot>
                        </x-review-item>

                        <x-review-item>
                            <x-slot:desc>
                                Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave. Seitan
                                High Life reprehenderit consectetur cupidatat kogi.
                                </x-slot>
                                <x-slot:name>
                                    Collis Pong
                                    </x-slot>
                                    <x-slot:country>
                                        melbourne, australia
                                        </x-slot>
                        </x-review-item>

                        <x-review-item>
                            <x-slot:desc>
                                Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave. Seitan
                                High Life reprehenderit consectetur cupidatat kogi.
                                </x-slot>
                                <x-slot:name>
                                    Collis Pong
                                    </x-slot>
                                    <x-slot:country>
                                        united states
                                        </x-slot>
                        </x-review-item>

                        <x-review-item>
                            <x-slot:desc>
                                Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave. Seitan
                                High Life reprehenderit consectetur cupidatat kogi.
                                </x-slot>
                                <x-slot:name>
                                    Denwen Evil
                                    </x-slot>
                                    <x-slot:country>
                                        united kingdom
                                        </x-slot>
                        </x-review-item>

                        <x-review-item>
                            <x-slot:desc>
                                Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave. Seitan
                                High Life reprehenderit consectetur cupidatat kogi.
                                </x-slot>
                                <x-slot:name>
                                    Collis Pong
                                    </x-slot>
                                    <x-slot:country>
                                        melbourne, australia
                                        </x-slot>
                        </x-review-item>

                    </div>
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

    <div class="section-block"></div>
    {{--  CTA AREA --}}
    <section class="cta-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-content-box cta-content-box-2">
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="cta-img">
                                    <img class="lazy" src="images/img36.jpg" data-src="images/img37.jpg"
                                        alt="">
                                </div>
                            </div>
                            <div class="col-lg-4 mr-auto">
                                <div class="cta-content">
                                    <div class="section-heading">
                                        <h2 class="sec__title mb-1 font-size-30 line-height-40">Subscribe to Our
                                            Newsletter</h2>
                                        <p class="sec__desc mb-4">Want to be notified about latest update? just sign
                                            up.</p>
                                    </div><!-- end section-heading -->
                                    <form action="#" class="form-box">
                                        <div class="form-group">
                                            <span class="la la-envelope form-icon"></span>
                                            <input class="form-control form-control-styled" type="email"
                                                name="email" placeholder="Enter email address">
                                            <p class="font-size-12 font-weight-medium pt-1"><i
                                                    class="la la-lock mr-1"></i>Your are 100% protected with us</p>
                                        </div>
                                        <div class="btn-box pt-2">
                                            <button type="submit" class="theme-btn gradient-btn border-0">
                                                Subscribe Now <i class="la la-arrow-right ml-2"></i>
                                            </button>
                                        </div>
                                    </form><!-- end form-box -->
                                </div>
                            </div>
                        </div><!-- end row -->
                    </div><!-- end cta-content-box -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>


    {{--  FOOTER AREA --}}
    <x-footer />



    {{-- <!--  back-to-top --> --}}
    <div id="back-to-top"> <i class="la la-arrow-up" title="Go top"></i>

</x-app-layout>
