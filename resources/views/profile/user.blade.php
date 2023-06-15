<x-app-layout>
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
                            @if ($businesses->isNotEmpty())
                                @foreach ($businesses as $business)
                                    @php
                                        $reviews = $review->where('business_id', $business->id);
                                        $count = $review->where('business_id', $business->id)->count();
                                    @endphp
                                @endforeach

                                <div class="section-heading pb-1">
                                    <h2 class="sec__title font-size-24 line-height-30">Reviews <span
                                            class="ml-1 text-color-2">({{ $count }})</span></h2>
                                </div><!-- end section-heading -->
                                <div class="comments-list reviews-list">
                                    @if ($reviews->isEmpty())
                                        <p>There is no reviews in your businesses</p>
                                    @else
                                        @foreach ($reviews as $review)
                                            @php
                                                $user = $users->where('id', $review->user_id)->first();
                                            @endphp
                                            <div class="comment">
                                                <div class="comment-body">
                                                    <div
                                                        class="meta-data d-flex align-items-center justify-content-between">
                                                        <div>
                                                            <h4 class="comment__title">{{ $user->fullName }}</h4>
                                                        </div>
                                                        <div class="star-rating-wrap text-center">
                                                            <div class="star-rating text-color-5 font-size-18">
                                                                @if ($review->score > 0)
                                                                    @for ($i = 0; $i < $review->score; $i++)
                                                                        <span class="ml-n1"><i
                                                                                class="la la-star"></i></span>
                                                                    @endfor
                                                                @else
                                                                    <span class="ml-n1"><i
                                                                            class="lar la-star"></i></span>
                                                                    <span class="ml-n1"><i
                                                                            class="lar la-star"></i></span>
                                                                    <span class="ml-n1"><i
                                                                            class="lar la-star"></i></span>
                                                                    <span class="ml-n1"><i
                                                                            class="lar la-star"></i></span>
                                                                    <span class="ml-n1"><i
                                                                            class="lar la-star"></i></span>
                                                                @endif
                                                            </div>
                                                            <p class="font-size-13 font-weight-medium">
                                                                {{ $review->created_at }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <p class="comment-desc">
                                                        {{ $review->message }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div><!-- end comment-list -->
                            @endif

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
    <div id="back-to-top"><i class="la la-arrow-up" title="Go top"></i></div>
</x-app-layout>
