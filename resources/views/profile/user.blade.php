{{-- @dd($businesses) --}}

{{-- @dd($galleries->where('business_id', $businesses->id)->where('type', 1)); --}}

<x-app-layout>

    {{--  HEADER AREA --}}
    <x-header />




    {{-- <!--  per-loader --> --}}
    <div class="loader-container">
        <div class="loader-ripple">
            <div></div>
            <div></div>
        </div>
    </div>

    {{-- START BREADCRUMB AREA --}}
    <section class="breadcrumb-area bg-gray user-bread-bg pt-9 pb-0">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content d-flex flex-wrap align-items-end justify-content-between">
                        <div class="d-flex align-items-end">
                            <div class="user-thumb user-thumb-xl bread-thumb mr-3 flex-shrink-0">
                                <img src="{{ $user->image }}" alt="avatar">
                            </div>
                            <div class="section-heading pb-3">
                                <h2 class="sec__title mb-0 font-size-28 line-height-30">
                                    <span class="text-white">{{ $user->fullName }}</span>
                                    <i class="la la-check-circle ml-1 font-size-24 text-success" data-toggle="tooltip"
                                        data-placement="top" title="Verified Account"></i>
                                </h2>
                            </div>
                        </div>
                        <div class="btn-box bread-btns d-flex align-items-center pb-3">
                            <span class="btn-gray mr-2"><i class="la la-file-text-o mr-1"></i><span
                                    class="text-color font-weight-semi-bold mr-1">12</span>Places</span>
                            <span class="btn-gray mr-2"><i class="la la-star-o mr-1"></i><span
                                    class="text-color font-weight-semi-bold mr-1">34</span>Reviews</span>
                            <a href="{{ route('profile.edit') }}">
                                <button
                                    class="btn-gray mr-2 gradient-btn shadow-none add-listing-btn-hide d-flex align-items-center">
                                    Edit Profile<iconify-icon icon="uil:edit" style="color: white;margin-left: 5px;">
                                    </iconify-icon>
                                </button>

                            </a>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

    {{-- START USER-DETAILS AREA --}}
    <section class="user-detail-area padding-top-60px padding-bottom-100px">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-8">
                    <div class="user-listing-detail-wrap">
                        <div class="section-heading pb-1">
                            <h2 class="sec__title font-size-24 line-height-30">{{ $user->fullName }} Businesses</h2>
                        </div><!-- end section-heading -->
                        <div class="row pb-3">
                            @if ($businesses->isNotEmpty())
                                @foreach ($businesses as $business)
                                    <div class="col-lg-6 responsive-column">
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
                                                                                    <div class="mt-3 d-flex"
                                                                                        role="group"
                                                                                        aria-label="Basic example">
                                                                                        <div class="mr-3">
                                                                                            <a href="{{ route('business.edit', $business->id) }}"
                                                                                                class="btn gradient-btn me-3">Edit</a>
                                                                                        </div>
                                                                                        <div class="">
                                                                                            <form
                                                                                                action="{{ route('business.destroy', $business->id) }}"
                                                                                                method="post">
                                                                                                @csrf
                                                                                                @method('DELETE')
                                                                                                <input
                                                                                                    class="btn btn-danger"
                                                                                                    type="submit"
                                                                                                    value="Delete">
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                        </x-card-item>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-danger">There is no businesses
                                    <a href="{{ route('business.index') }}" class="btn-link">Go to add a
                                        business</a>
                                </p>
                            @endif

                        </div><!-- end row -->
                        <div class="user-reviews">
                            <div class="section-heading pb-1">
                                <h2 class="sec__title font-size-24 line-height-30">Reviews</h2>
                            </div><!-- end section-heading -->
                            <div class="comments-list reviews-list">
                                <div class="comment">
                                    <div class="user-thumb user-thumb-lg flex-shrink-0">
                                        <img src="images/avatar-img.jpg" alt="author-img">
                                    </div>
                                    <div class="comment-body">
                                        <div class="meta-data d-flex align-items-center justify-content-between">
                                            <div>
                                                <h4 class="comment__title"><a href="listing-details.html">Kam Lok
                                                        Restaurant</a></h4>
                                                <span class="comment__meta">Mark Hardson</span>
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
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi at aut
                                            consequuntur debitis dicta dolor ducimus eaque eum, illo ipsa labore,
                                        </p>
                                        <div class="review-photos d-flex flex-wrap align-items-center ml-n1">
                                            <a href="images/single-listing-img1.jpg" class="d-inline-block"
                                                data-fancybox="gallery">
                                                <img class="lazy" src="images/img-loading.html"
                                                    data-src="images/single-listing-img1.jpg" alt="review image">
                                            </a>
                                            <a href="images/single-listing-img2.jpg" class="d-inline-block"
                                                data-fancybox="gallery">
                                                <img class="lazy" src="images/img-loading.html"
                                                    data-src="images/single-listing-img2.jpg" alt="review image">
                                            </a>
                                        </div><!-- end review-photos -->
                                    </div>
                                </div><!-- end comment -->
                                <div class="comment">
                                    <div class="user-thumb user-thumb-lg flex-shrink-0">
                                        <img src="images/avatar-img.jpg" alt="author-img">
                                    </div>
                                    <div class="comment-body">
                                        <div class="meta-data d-flex align-items-center justify-content-between">
                                            <div>
                                                <h4 class="comment__title"><a href="listing-details.html">Mel’s
                                                        Drive-In</a></h4>
                                                <span class="comment__meta">Mark Hardson</span>
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
                                        <p class="comment-desc mb-0">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi at aut
                                            consequuntur debitis dicta dolor ducimus eaque eum, illo ipsa labore,
                                        </p>
                                    </div>
                                </div><!-- end comment -->
                                <div class="comment">
                                    <div class="user-thumb user-thumb-lg flex-shrink-0">
                                        <img src="images/avatar-img.jpg" alt="author-img">
                                    </div>
                                    <div class="comment-body">
                                        <div class="meta-data d-flex align-items-center justify-content-between">
                                            <div>
                                                <h4 class="comment__title"><a href="listing-details.html">Pearl’s
                                                        Deluxe Burgers</a></h4>
                                                <span class="comment__meta">Mark Hardson</span>
                                            </div>
                                            <div class="star-rating-wrap text-center">
                                                <div class="star-rating text-color-5 font-size-18">
                                                    <span><i class="la la-star"></i></span>
                                                    <span class="ml-n1"><i class="la la-star"></i></span>
                                                    <span class="ml-n1"><i class="la la-star"></i></span>
                                                    <span class="ml-n1"><i class="la la-star"></i></span>
                                                    <span class="ml-n1"><i class="la la-star-o"></i></span>
                                                </div>
                                                <p class="font-size-13 font-weight-medium">04/10/2020</p>
                                            </div>
                                        </div>
                                        <p class="comment-desc">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi at aut
                                            consequuntur debitis dicta dolor ducimus eaque eum, illo ipsa labore,
                                        </p>
                                        <div class="review-photos d-flex flex-wrap align-items-center ml-n1 mb-3">
                                            <a href="images/single-listing-img1.jpg" class="d-inline-block"
                                                data-fancybox="gallery">
                                                <img class="lazy" src="images/img-loading.html"
                                                    data-src="images/single-listing-img1.jpg" alt="review image">
                                            </a>
                                            <a href="images/single-listing-img2.jpg" class="d-inline-block"
                                                data-fancybox="gallery">
                                                <img class="lazy" src="images/img-loading.html"
                                                    data-src="images/single-listing-img2.jpg" alt="review image">
                                            </a>
                                            <a href="images/single-listing-img3.jpg" class="d-inline-block"
                                                data-fancybox="gallery">
                                                <img class="lazy" src="images/img-loading.html"
                                                    data-src="images/single-listing-img3.jpg" alt="review image">
                                            </a>
                                        </div><!-- end review-photos -->
                                    </div>
                                </div><!-- end comment -->
                            </div><!-- end comment-list -->
                            <div class="pt-3 text-center">
                                <div class="section-pagination">
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination flex-wrap justify-content-center">
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true"><i class="la la-arrow-left"></i></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link page-link-active"
                                                    href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true"><i class="la la-arrow-right"></i></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div><!-- end section-pagination -->
                            </div>
                        </div><!-- end user-reviews -->
                    </div><!-- end listing-detail-wrap -->
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <h3 class="widget-title">User Contact</h3>
                            <div class="stroke-shape mb-4"></div>
                            <ul class="list-items list--items list--items-2 list-items-style-2">
                                <li><span class="text-color mr-1"><i
                                            class="la la-map-marker mr-2 text-color-2 font-size-18"></i>Address:</span>USA
                                    27TH Brooklyn NY</li>
                                <li><span class="text-color mr-1"><i
                                            class="la la-phone mr-2 text-color-2 font-size-18"></i>Phone:</span><a
                                        href="tel:+7(123)987654">+7(123)987654</a></li>
                                <li><span class="text-color mr-1"><i
                                            class="la la-envelope mr-2 text-color-2 font-size-18"></i>Mail:</span><a
                                        href="mailto:markhardson@gmail.com">markhardson@gmail.com</a></li>
                                <li><span class="text-color mr-1"><i
                                            class="la la-globe mr-2 text-color-2 font-size-18"></i>Website:</span><a
                                        href="#">www.techydevs.com</a></li>
                            </ul>
                            <ul class="social-profile social-profile-colored border-top border-top-color py-4 mt-4">
                                <li><a href="#" class="facebook-bg"><i class="lab la-facebook-f"></i></a></li>
                                <li><a href="#" class="twitter-bg"><i class="lab la-twitter"></i></a></li>
                                <li><a href="#" class="instagram-bg"><i class="lab la-instagram"></i></a></li>
                                <li><a href="#" class="behance-bg"><i class="lab la-behance"></i></a></li>
                                <li><a href="#" class="dribbble-bg"><i class="lab la-dribbble"></i></a></li>
                            </ul>
                            <a href="#" class="btn-gray" data-toggle="modal"
                                data-target="#sendMessageModal"><i class="la la-envelope mr-1"></i> Send Message</a>
                        </div><!-- end sidebar-widget -->
                        <div class="sidebar-widget">
                            <h3 class="widget-title">Get in Touch</h3>
                            <div class="stroke-shape mb-4"></div>
                            <form method="post" class="form-box">
                                <div class="input-box">
                                    <label class="label-text">Your Name</label>
                                    <div class="form-group">
                                        <span class="la la-user form-icon"></span>
                                        <input class="form-control" type="text" name="text"
                                            placeholder="Your name">
                                    </div>
                                </div>
                                <div class="input-box">
                                    <label class="label-text">Your Email</label>
                                    <div class="form-group">
                                        <span class="la la-envelope form-icon"></span>
                                        <input class="form-control" type="email" name="email"
                                            placeholder="Your email">
                                    </div>
                                </div>
                                <div class="input-box">
                                    <label class="label-text">Message</label>
                                    <div class="form-group">
                                        <span class="la la-pencil form-icon"></span>
                                        <textarea class="message-control form-control" name="message" placeholder="Write Message"></textarea>
                                    </div>
                                </div>
                                <div class="btn-box">
                                    <button type="submit" class="theme-btn gradient-btn w-100 border-0">
                                        Send Message <i class="la la-arrow-right ml-1"></i>
                                    </button>
                                </div>
                            </form>
                        </div><!-- end sidebar-widget -->
                        <div class="sidebar-widget">
                            <h3 class="widget-title">Rating Distribution</h3>
                            <div class="stroke-shape mb-4"></div>
                            <ul class="list-items">
                                <li><span class="ribbon ribbon-lg mr-1">5 stars</span> <span
                                        class="text-color font-weight-semi-bold">18</span></li>
                                <li><span class="ribbon ribbon-lg mr-1">4 stars</span> <span
                                        class="text-color font-weight-semi-bold">10</span></li>
                                <li><span class="ribbon ribbon-lg mr-1">3 stars</span> <span
                                        class="text-color font-weight-semi-bold">2</span></li>
                                <li><span class="ribbon ribbon-lg mr-1">2 stars</span> <span
                                        class="text-color font-weight-semi-bold">2</span></li>
                                <li><span class="ribbon ribbon-lg mr-1">1 star</span> <span
                                        class="text-color font-weight-semi-bold">2</span></li>
                            </ul>
                        </div><!-- end sidebar-widget -->
                        <div class="sidebar-widget">
                            <h3 class="widget-title">Review Votes</h3>
                            <div class="stroke-shape mb-4"></div>
                            <ul class="list-items list--items list-items-style-2">
                                <li><i class="la la-thumbs-up mr-1 font-size-18"></i>Useful: <span
                                        class="text-color font-weight-semi-bold ml-2">28</span></li>
                                <li><i class="la la-smile mr-1 font-size-18"></i>Funny: <span
                                        class="text-color font-weight-semi-bold ml-2">20</span></li>
                            </ul>
                        </div><!-- end sidebar-widget -->
                    </div><!-- end sidebar -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>


    {{--  FOOTER AREA --}}
    <x-footer />



    {{-- back-to-top  --}}
    <div id="back-to-top">
        <i class="la la-arrow-up" title="Go top"></i>
    </div>



</x-app-layout>
