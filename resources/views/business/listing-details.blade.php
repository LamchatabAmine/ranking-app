@php
    $user = $users->where('id', $business->user_id)->first();
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



    <section class="breadcrumb-area bread-bg-2 bread-overlay overflow-hidden" style="padding-top: 160px;">
        <div class="overlay"></div><!-- end overlay -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                        <div class="section-heading">
                            <h2 class="sec__title text-white font-size-40 mb-0">Listing Details</h2>
                        </div>
                        <ul class="list-items bread-list ">
                            <li><a href="{{ route('home-page') }}">Home</a></li>
                            <li>Listing Details</li>
                        </ul>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
        <div class="bread-svg">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="50px" viewBox="0 0 1200 150"
                preserveAspectRatio="none">
                <g>
                    <path fill-opacity="0.2"
                        d="M0,150 C600,100 1000,50 1200,-1.13686838e-13 C1200,6.8027294 1200,56.8027294 1200,150 L0,150 Z">
                    </path>
                </g>
                <g class="pix-waiting animated" data-anim-type="fade-in-up" data-anim-delay="300">
                    <path fill="rgba(255,255,255,0.8)"
                        d="M0,150 C600,120 1000,80 1200,30 C1200,36.8027294 1200,76.8027294 1200,150 L0,150 Z"></path>
                </g>
                <path fill="#fff"
                    d="M0,150 C600,136.666667 1000,106.666667 1200,60 C1200,74 1200,104 1200,150 L0,150 Z"></path>
                <defs></defs>
            </svg>
        </div><!-- end bread-svg -->
    </section>



    {{-- START FULL SCREEN SLIDER --}}
    <section class="full-screen-slider-area pt-5 pb-4">
        <div class="full-screen-slider owl-trigger-action owl-trigger-action-2 container pt-5">
            @php
                $galleries = $galleries->where('business_id', $business->id);
            @endphp
            @foreach ($galleries as $gallery)
                <a href="#" class="fs-slider-item d-block">
                    <img src="{{ url($gallery->path) }}" alt="image-gallery">
                </a>
            @endforeach
        </div>
    </section>



    {{-- START BREADCRUMB AREA --}}
    <section class="breadcrumb-area bg-gradient-gray py-5">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div
                        class="breadcrumb-content breadcrumb-content-2 d-flex flex-wrap align-items-end justify-content-between">
                        <div class="section-heading">
                            <div class="d-flex align-items-center pt-1">
                                <h2 class="sec__title mb-0">{{ $business->title }}</h2>
                            </div>
                            <p class="sec__desc py-2 font-size-17">
                                <i class="la la-map-marker mr-1 text-color-2"></i>
                                {{ $cities->where('id', $business->city_id)->pluck('city_name')->first() }}
                                , {{ $business->address }}
                            </p>
                            <p class=" py-2 font-size-17">
                                <i class="la la-globe mr-2 text-color-2 font-size-18"></i>
                                <a href="{{ $business->website }}" class="sec__desc">{{ $business->website }}</a>
                            </p>
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="star-rating-wrap d-flex align-items-center">
                                    <div class="star-rating text-color-5 font-size-18">
                                        <span><i class="la la-star"></i></span>
                                        <span class="ml-n1"><i class="la la-star"></i></span>
                                        <span class="ml-n1"><i class="la la-star"></i></span>
                                        <span class="ml-n1"><i class="la la-star"></i></span>
                                        <span class="ml-n1"><i class="la la-star"></i></span>
                                    </div>
                                    <p class="font-size-14 pl-2 font-weight-medium">0 reviews</p>
                                </div>
                            </div>
                            <div class="btn-box pt-3">
                                <a href="#review" class="btn-gray mr-1"><i class="la la-star mr-1"></i>Write a
                                    Review</a>
                                <a href="#" class="btn-gray mr-1"><i class="la la-bookmark mr-1"></i>Save</a>
                                <a href="#" class="btn-gray" data-toggle="modal" data-target="#shareModal"><i
                                        class="la la-external-link mr-1"></i>Share</a>
                            </div>
                        </div>
                        <div class="btn-box d-flex align-items-center">
                            <span class="btn-gray mr-2"><i class="la la-heart mr-1"></i>Saved - 124</span>
                            <div class="dropdown dot-action-wrap">
                                <button class="dot-action-btn dropdown-toggle after-none border-0" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="la la-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                        data-target="#reportModal"><i class="la la-flag mr-1"></i>Report</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>



    {{-- START LISTING DETAIL AREA --}}
    <section class="listing-detail-area padding-top-60px padding-bottom-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="listing-detail-wrap">

                        <div class="block-card mb-4">
                            <div class="block-card-header">
                                <h2 class="widget-title">Business Description</h2>
                                <div class="stroke-shape"></div>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <p class="pb-3 font-weight-medium line-height-30">
                                    {{ $business->description }}
                                </p>
                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->


                        <div class="block-card mb-4">
                            <div class="block-card-header">
                                <h2 class="widget-title">Location / Contact</h2>
                                <div class="stroke-shape"></div>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <ul class="list-items list--items list-items-style-2 py-4">
                                    <li><span class="text-color"><i
                                                class="la la-map mr-2 text-color-2 font-size-18"></i>Address:</span>
                                        {{ $business->address }}</li>
                                    <li><span class="text-color"><i
                                                class="la la-phone mr-2 text-color-2 font-size-18"></i>Phone:</span><a
                                            href="#">{{ $business->phone }}</a></li>
                                    <li><span class="text-color"><i
                                                class="la la-envelope mr-2 text-color-2 font-size-18"></i>Email:</span><a
                                            href="https://{{ $user->email }}">{{ $user->email }}</a>
                                    </li>
                                    <li><span class="text-color"><i
                                                class="la la-globe mr-2 text-color-2 font-size-18"></i>Website:</span>
                                        <a href="{{ $business->website }}">{{ $business->website }}</a>
                                    </li>
                                </ul>
                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->

                        <div class="block-card mb-4">
                            <div class="block-card-header">
                                <h2 class="widget-title">Rating Stats</h2>
                                <div class="stroke-shape"></div>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <div class="review-content d-flex flex-wrap align-items-center">
                                    <div class="review-rating-summary">
                                        <span class="stats-average__count">
                                            4.6
                                        </span><!-- end stats-average__count -->
                                        <div class="star-rating-wrap">
                                            <p class="font-size-14 font-weight-medium">out of 5.0</p>
                                            <div class="star-rating text-color-5 font-size-18">
                                                <span><i class="la la-star"></i></span>
                                                <span class="ml-n1"><i class="la la-star"></i></span>
                                                <span class="ml-n1"><i class="la la-star"></i></span>
                                                <span class="ml-n1"><i class="la la-star"></i></span>
                                                <span class="ml-n1"><i class="la la-star"></i></span>
                                            </div>
                                        </div>
                                    </div><!-- end review-rating-summary -->

                                </div><!-- end review-content -->
                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->
                        <div class="block-card mb-4">
                            <div class="block-card-header">
                                <h2 class="widget-title">Reviews <span class="ml-1 text-color-2">(5)</span></h2>
                                <div class="stroke-shape"></div>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <div class="comments-list">
                                    <div class="comment">
                                        <div class="user-thumb user-thumb-lg flex-shrink-0">
                                            <img src="images/avatar-img.jpg" alt="author-img">
                                        </div>
                                        <div class="comment-body">
                                            <div class="meta-data d-flex align-items-center justify-content-between">
                                                <div>
                                                    <h4 class="comment__title">Adam Smith</h4>
                                                    <span class="comment__meta">San Francisco, CA</span>
                                                </div>
                                                <div class="star-rating-wrap text-center">
                                                    <div class="star-rating text-color-5 font-size-18">
                                                        <span><i class="la la-star"></i></span>
                                                        <span class="ml-n1"><i class="la la-star"></i></span>
                                                        <span class="ml-n1"><i class="la la-star"></i></span>
                                                        <span class="ml-n1"><i class="la la-star"></i></span>
                                                        <span class="ml-n1"><i class="la la-star"></i></span>
                                                    </div>
                                                    <p class="font-size-13 font-weight-medium">04/10/2020</p>
                                                </div>
                                            </div>
                                            <p class="comment-desc">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                Ut enim ad minim veniam, quis nostrud exercitation.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="comment">
                                        <div class="user-thumb user-thumb-lg flex-shrink-0">
                                            <img src="images/avatar-img.jpg" alt="author-img">
                                        </div>
                                        <div class="comment-body">
                                            <div class="meta-data d-flex align-items-center justify-content-between">
                                                <div>
                                                    <h4 class="comment__title">Adam Smith</h4>
                                                    <span class="comment__meta">San Francisco, CA</span>
                                                </div>
                                                <div class="star-rating-wrap text-center">
                                                    <div class="star-rating text-color-5 font-size-18">
                                                        <span><i class="la la-star"></i></span>
                                                        <span class="ml-n1"><i class="la la-star"></i></span>
                                                        <span class="ml-n1"><i class="la la-star"></i></span>
                                                        <span class="ml-n1"><i class="la la-star"></i></span>
                                                        <span class="ml-n1"><i class="la la-star"></i></span>
                                                    </div>
                                                    <p class="font-size-13 font-weight-medium">04/10/2020</p>
                                                </div>
                                            </div>
                                            <p class="comment-desc">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                Ut enim ad minim veniam, quis nostrud exercitation.
                                            </p>
                                        </div>
                                    </div><!-- end comment -->
                                </div>

                                <div class="text-center">
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
                                                            <span aria-hidden="true"><i
                                                                    class="la la-angle-left"></i></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link page-link-active"
                                                            href="#">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Next">
                                                            <span aria-hidden="true"><i
                                                                    class="la la-angle-right"></i></span>
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
                                </div>
                            </div>
                        </div><!-- end block-card -->
                        <div class="block-card" id="review">
                            <div class="block-card-header">
                                <h2 class="widget-title pb-1">Add a Review</h2>
                                <p>Your email address will not be published. Required fields are marked *</p>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <div
                                    class="add-rating-bars review-bars d-flex flex-row flex-wrap flex-grow-1 align-items-center justify-content-between">
                                    <div class="review-bars-item mx-0 mt-0">
                                        <span class="review-bars-name">Service</span>
                                        <div class="review-bars-inner pt-1">
                                            <form class="leave-rating">
                                                <input type="radio" name="rating" id="rating-1" value="1">
                                                <label for="rating-1" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-2" value="2">
                                                <label for="rating-2" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-3" value="3">
                                                <label for="rating-3" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-4" value="4">
                                                <label for="rating-4" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-5" value="5">
                                                <label for="rating-5" class="fa fa-star"></label>
                                            </form>
                                        </div>
                                    </div><!-- end review-bars-item -->
                                    <div class="review-bars-item mx-0 mt-0">
                                        <span class="review-bars-name">Value for Money</span>
                                        <div class="review-bars-inner pt-1">
                                            <form class="leave-rating">
                                                <input type="radio" name="rating" id="rating-6" value="1">
                                                <label for="rating-6" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-7" value="2">
                                                <label for="rating-7" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-8" value="3">
                                                <label for="rating-8" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-9" value="4">
                                                <label for="rating-9" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-10" value="5">
                                                <label for="rating-10" class="fa fa-star"></label>
                                            </form>
                                        </div>
                                    </div><!-- end review-bars-item -->
                                    <div class="review-bars-item mx-0 mt-0">
                                        <span class="review-bars-name">Quality</span>
                                        <div class="review-bars-inner pt-1">
                                            <form class="leave-rating">
                                                <input type="radio" name="rating" id="rating-11" value="1">
                                                <label for="rating-11" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-12" value="2">
                                                <label for="rating-12" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-13" value="3">
                                                <label for="rating-13" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-14" value="4">
                                                <label for="rating-14" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-15" value="5">
                                                <label for="rating-15" class="fa fa-star"></label>
                                            </form>
                                        </div>
                                    </div><!-- end review-bars-item -->
                                    <div class="review-bars-item mx-0 mt-0">
                                        <span class="review-bars-name">Location</span>
                                        <div class="review-bars-inner pt-1">
                                            <form class="leave-rating">
                                                <input type="radio" name="rating" id="rating-16" value="1">
                                                <label for="rating-16" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-17" value="2">
                                                <label for="rating-17" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-18" value="3">
                                                <label for="rating-18" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-19" value="4">
                                                <label for="rating-19" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-20" value="5">
                                                <label for="rating-20" class="fa fa-star"></label>
                                            </form>
                                        </div>
                                    </div><!-- end review-bars-item -->
                                </div><!-- end review-bars -->
                                <form method="post" class="form-box row pt-3">
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Name</label>
                                            <div class="form-group">
                                                <span class="la la-user form-icon"></span>
                                                <input class="form-control" type="text" name="name"
                                                    placeholder="Your Name">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Email</label>
                                            <div class="form-group">
                                                <span class="la la-envelope-o form-icon"></span>
                                                <input class="form-control" type="email" name="email"
                                                    placeholder="Email Address">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Review</label>
                                            <div class="form-group">
                                                <span class="la la-pencil form-icon"></span>
                                                <textarea class="message-control form-control" name="message"
                                                    placeholder="Tell about your experience or leave a tip for others"></textarea>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                    <div class="col-lg-12">
                                        <div class="btn-box pt-1">
                                            <button class="theme-btn gradient-btn border-0">Submit Review<i
                                                    class="la la-arrow-right ml-2"></i></button>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                </form>
                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->
                    </div><!-- end listing-detail-wrap -->
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="sidebar mb-0">
                        <div class="sidebar-widget">
                            <h3 class="widget-title">General Information</h3>
                            <div class="stroke-shape mb-4"></div>
                            <ul class="list-items list-items-style-2">
                                <li><i class="la la-external-link mr-2 text-color-2 font-size-18"></i><a
                                        href="{{ $business->website }}">{{ $business->website }}</a></li>
                                <li><i class="la la-phone mr-2 text-color-2 font-size-18"></i><a
                                        href="#">{{ $business->phone }}</a></li>
                                <li><i class="la la-comment mr-2 text-color-2 font-size-18"></i><a
                                        href="https://{{ $user->email }}">Message
                                        the Business</a></li>
                            </ul>
                        </div><!-- end sidebar-widget -->

                        <div class="sidebar-widget">
                            <h3 class="widget-title">Subscribe</h3>
                            <div class="stroke-shape mb-4"></div>
                            <form method="post" class="form-box">
                                <div class="form-group">
                                    <span class="la la-envelope-o form-icon"></span>
                                    <input class="form-control form-control-styled" type="text" name="email"
                                        placeholder="Enter your email" />
                                </div>
                            </form>
                            <div class="btn-box">
                                <button type="submit" class="theme-btn gradient-btn w-100 border-0">Subscribe Now<i
                                        class="la la-arrow-right ml-2"></i></button>
                                <span class="font-size-13 font-weight-medium">You can unsubscribe at any time</span>
                            </div><!-- end btn-box -->
                        </div><!-- end sidebar-widget -->

                        <div class="sidebar-widget">
                            <h3 class="widget-title">Hosted by</h3>
                            <div class="stroke-shape mb-4"></div>
                            <div class="hosted-by d-flex align-items-center">
                                <a href="#" class="user-thumb user-thumb-md flex-shrink-0 mr-3">
                                    <img src="{{ url($user->image) }}" alt="author-img">
                                </a>
                                <div>
                                    <h4 class="font-size-18"><a href="user-profile.html"
                                            class="text-color">{{ $user->fullName }}</a>
                                    </h4>
                                    <span
                                        class="font-size-13 text-gray font-weight-medium d-block line-height-22">{{ $business->where('user_id', $user->id)->count() }}
                                        Business hosted</span>
                                </div>
                            </div>
                            <ul class="list-items py-4">
                                <li><i class="la la-envelope mr-2 text-color-2 font-size-18"></i><a
                                        href="https://{{ $user->email }}"
                                        class="before-none">{{ $user->email }}</a>
                                </li>
                            </ul>
                            <div class="btn-box">
                                <a href="user-profile.html" class="theme-btn gradient-btn w-100"><i
                                        class="la la-user mr-2"></i>View Profile</a>
                            </div>
                        </div><!-- end sidebar-widget -->
                    </div><!-- end sidebar -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>



    {{--  FOOTER AREA --}}
    <x-footer />



    {{-- <!--  back-to-top --> --}}
    <div id="back-to-top"> <i class="la la-arrow-up" title="Go top"></i>
        {{-- <!-- end back-to-top --> --}}

</x-app-layout>
