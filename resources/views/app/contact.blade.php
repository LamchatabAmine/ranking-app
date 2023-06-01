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
                            <h2 class="sec__title text-white font-size-40 mb-0">Contact Us</h2>
                        </div>
                        <ul class="list-items bread-list ">
                            <li><a href="{{ route('home-page') }}">Home</a></li>
                            <li>Contact</li>
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

    {{--  CONTACT AREA --}}
    <section class="contact-area section-padding position-relative">
        <span class="circle-bg circle-bg-1 position-absolute"></span>
        <span class="circle-bg circle-bg-2 position-absolute"></span>
        <span class="circle-bg circle-bg-3 position-absolute"></span>
        <span class="circle-bg circle-bg-4 position-absolute"></span>
        <span class="circle-bg circle-bg-5 position-absolute"></span>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 responsive-column">
                    <div class="info-box info--box">
                        <div class="info-icon gradient-icon">
                            <x-svgs.svg-contact1 />
                        </div><!-- end info-icon-->
                        <div class="info-content">
                            <h4 class="info__title mb-2">Call Us Today</h4>
                            <p class="info__desc"><a href="tel:+1811864592" class="btn-text">+1 (811) 86 45 92</a>
                            </p>
                        </div><!-- end info-content -->
                    </div><!-- end info-box -->
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4 responsive-column">
                    <div class="info-box info--box">
                        <div class="info-icon gradient-icon">
                            <x-svgs.svg-contact2 />
                            {{-- <svg width="40" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                                <defs>
                                    <linearGradient id="svg-gradient2">
                                        <stop offset="5%" stop-color="#ff6b6b"></stop>
                                        <stop offset="95%" stop-color="#ffbb3d"></stop>
                                    </linearGradient>
                                </defs>
                                <g>
                                    <g>
                                        <path
                                            d="M469.333,64H42.667C19.135,64,0,83.135,0,106.667v298.667C0,428.865,19.135,448,42.667,448h426.667
                                        C492.865,448,512,428.865,512,405.333V106.667C512,83.135,492.865,64,469.333,64z M42.667,85.333h426.667
                                        c1.572,0,2.957,0.573,4.432,0.897c-36.939,33.807-159.423,145.859-202.286,184.478c-3.354,3.021-8.76,6.625-15.479,6.625
                                        s-12.125-3.604-15.49-6.635C197.652,232.085,75.161,120.027,38.228,86.232C39.706,85.908,41.094,85.333,42.667,85.333z
                                         M21.333,405.333V106.667c0-2.09,0.63-3.986,1.194-5.896c28.272,25.876,113.736,104.06,169.152,154.453
                                        C136.443,302.671,50.957,383.719,22.46,410.893C21.957,409.079,21.333,407.305,21.333,405.333z M469.333,426.667H42.667
                                        c-1.704,0-3.219-0.594-4.81-0.974c29.447-28.072,115.477-109.586,169.742-156.009c7.074,6.417,13.536,12.268,18.63,16.858
                                        c8.792,7.938,19.083,12.125,29.771,12.125s20.979-4.188,29.76-12.115c5.096-4.592,11.563-10.448,18.641-16.868
                                        c54.268,46.418,140.286,127.926,169.742,156.009C472.552,426.073,471.039,426.667,469.333,426.667z M490.667,405.333
                                        c0,1.971-0.624,3.746-1.126,5.56c-28.508-27.188-113.984-108.227-169.219-155.668c55.418-50.393,140.869-128.57,169.151-154.456
                                        c0.564,1.91,1.194,3.807,1.194,5.897V405.333z" />
                                    </g>
                                </g>
                            </svg> --}}
                        </div><!-- end info-icon-->
                        <div class="info-content">
                            <h4 class="info__title mb-2">Send Us Email</h4>
                            <p class="info__desc"><a href="mailto:dirto@gamil.com"
                                    class="btn-text">listhub@gmail.com</a></p>
                        </div><!-- end info-content -->
                    </div><!-- end info-box -->
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4 responsive-column">
                    <div class="info-box info--box">
                        <div class="info-icon gradient-icon">
                            <x-svgs.svg-contact3 />
                        </div><!-- end info-icon-->
                        <div class="info-content">
                            <h4 class="info__title mb-2">Visit Our HQ</h4>
                            <p class="info__desc">Las Vegas, USA</p>
                        </div><!-- end info-content -->
                    </div><!-- end info-box -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="block-card">
                        <div class="block-card-header">
                            <h3 class="widget-title pb-0">Send us a message</h3>
                            <p class="pt-1">Contact us today using this form and our support team will reach out as
                                soon as possible.</p>
                        </div><!-- block-card-header -->
                        <div class="block-card-body">
                            <form method="post" class="form-box row">
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Your Name</label>
                                        <div class="form-group">
                                            <span class="la la-user form-icon"></span>
                                            <input class="form-control form-control-styled" type="text"
                                                name="text" placeholder="Name">
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Your Email</label>
                                        <div class="form-group">
                                            <span class="la la-envelope-o form-icon"></span>
                                            <input class="form-control form-control-styled" type="email"
                                                name="email" placeholder="Email">
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">Subject</label>
                                        <div class="form-group">
                                            <span class="la la-pencil form-icon"></span>
                                            <input class="form-control form-control-styled" type="text"
                                                name="text" placeholder="Subject">
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 -->
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">Your Message</label>
                                        <div class="form-group">
                                            <span class="la la-pencil form-icon"></span>
                                            <textarea class="message-control form-control" name="message" placeholder="Write message"></textarea>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 -->
                                <div class="col-lg-12">
                                    <div class="btn-box">
                                        <button type="submit" class="theme-btn gradient-btn border-0">Send Message <i
                                                class="la la-arrow-right ml-1"></i></button>
                                        <p class="font-size-14 pt-1">*We'll never share your email with anyone else.
                                        </p>
                                    </div>
                                </div><!-- end col-lg-12 -->
                            </form>
                        </div><!-- end block-card-body -->
                    </div><!-- end block-card -->
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="block-card">
                        <div class="block-card-header">
                            <h3 class="widget-title">Our Office</h3>
                            <div class="stroke-shape"></div>
                        </div><!-- block-card-header -->
                        <div class="block-card-body">
                            <img src="images/img-loading.html" data-src="images/img31.jpg" alt="group-img"
                                class="w-100 radius-round lazy">
                            <ul class="list-items list--items list-items-style-2 py-4">
                                <li><span class="text-color"><i
                                            class="la la-map mr-2 text-color-2 font-size-18"></i>Address:</span> 123
                                    Little Baker St, NY</li>
                                <li><span class="text-color"><i
                                            class="la la-phone mr-2 text-color-2 font-size-18"></i>Phone:</span><a
                                        href="#">+ 61 23 8093 3400</a></li>
                                <li><span class="text-color"><i
                                            class="la la-envelope mr-2 text-color-2 font-size-18"></i>Email:</span><a
                                        href="#">listhub@gmail.com</a></li>
                            </ul>
                            <div class="section-block-2"></div>
                            <h3 class="widget-title font-size-16 pt-4">Working Hours</h3>
                            <ul class="list-items pb-4">
                                <li class="d-flex align-items-center justify-content-between"><span>Monday To
                                        Friday</span> <span class="text-success">9am - 7pm</span></li>
                                <li class="d-flex align-items-center justify-content-between"><span>Saturday To
                                        Sunday</span> <span class="text-color-2">Closed</span></li>
                            </ul>
                            <ul class="social-profile social-profile-styled">
                                <li><a href="#" class="facebook-bg" data-toggle="tooltip" data-placement="top"
                                        title="Facebook"><i class="lab la-facebook-f"></i></a></li>
                                <li><a href="#" class="twitter-bg" data-toggle="tooltip" data-placement="top"
                                        title="Twitter"><i class="lab la-twitter"></i></a></li>
                                <li><a href="#" class="instagram-bg" data-toggle="tooltip"
                                        data-placement="top" title="Instagram"><i class="lab la-instagram"></i></a>
                                </li>
                                <li><a href="#" class="youtube-bg" data-toggle="tooltip" data-placement="top"
                                        title="Youtube"><i class="la la-youtube"></i></a></li>
                                <li><a href="#" class="behance-bg" data-toggle="tooltip" data-placement="top"
                                        title="Behance"><i class="la la-behance"></i></a></li>
                                <li><a href="#" class="dribbble-bg" data-toggle="tooltip" data-placement="top"
                                        title="Dribbble"><i class="la la-dribbble"></i></a></li>
                            </ul>
                        </div><!-- end block-card-body -->
                    </div><!-- end block-card -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end contact-area -->
    {{-- END CONTACT AREA --}}


    {{--  FOOTER AREA --}}
    <x-footer />

    <!--  back-to-top -->
    <div id="back-to-top">
        <i class="la la-arrow-up" title="Go top"></i>
    </div>
    <!-- end back-to-top -->


</x-app-layout>
