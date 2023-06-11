    {{-- START FOOTER AREA --}}
    <section class="footer-area bg-gradient-gray padding-top-100px padding-bottom-30px position-relative">
        <span class="circle-bg circle-bg-1 position-absolute"></span>
        <span class="circle-bg circle-bg-2 position-absolute"></span>
        <span class="circle-bg circle-bg-3 position-absolute"></span>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 responsive-column">
                    <div class="footer-item">
                        <div class="footer-logo">
                            <a href="{{ route('home-page') }}" class="foot-logo"><img
                                    src="{{ url('images/new-logo-black.png') }}" alt="logo"></a>
                        </div>
                        <!-- end footer-logo -->
                        <ul class="list-items contact-links pt-3">
                            <li><span class="d-block text-color mb-1"><i
                                        class="la la-map mr-1 text-color-2"></i>Address:</span> 12345 Little Baker St,
                                Melbourne</li>
                            <li><span class="d-block text-color mb-1"><i
                                        class="la la-phone mr-1 text-color-2"></i>Phone:</span><a href="#">+ 61
                                    23 8093 3400</a></li>
                            <li><span class="d-block text-color mb-1"><i
                                        class="la la-envelope mr-1 text-color-2"></i>Email:</span><a
                                    href="#">listhub@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 responsive-column">

                    <x-footer-item>
                        <x-slot:title> Company </x-slot>
                            <x-link-item>
                                <x-slot:name>about.html</x-slot>
                                    <x-slot:title> About Us </x-slot>
                            </x-link-item>
                            <x-link-item>
                                <x-slot:name>career.html</x-slot>
                                    <x-slot:title> Careers </x-slot>
                            </x-link-item>
                            <x-link-item>
                                <x-slot:name>blog-grid.html</x-slot>
                                    <x-slot:title> Press </x-slot>
                            </x-link-item>
                            <x-link-item>
                                <x-slot:name>#</x-slot>
                                    <x-slot:title> Investor Relations </x-slot>
                            </x-link-item>
                            <x-link-item>
                                <x-slot:name>#</x-slot>
                                    <x-slot:title> Content Guidelines </x-slot>
                            </x-link-item>
                            <x-link-item>
                                <x-slot:name>#</x-slot>
                                    <x-slot:title> Ad Choices </x-slot>
                            </x-link-item>
                    </x-footer-item>

                </div>
                <div class="col-lg-3 responsive-column">

                    <x-footer-item>
                        <x-slot:title> Discover </x-slot>
                            <x-link-item>
                                <x-slot:name>#</x-slot>
                                    <x-slot:title> Listhub Project Cost Guides </x-slot>
                            </x-link-item>
                            <x-link-item>
                                <x-slot:name>#</x-slot>
                                    <x-slot:title> The Local Listhub </x-slot>
                            </x-link-item>
                            <x-link-item>
                                <x-slot:name>#</x-slot>
                                    <x-slot:title> Collections </x-slot>
                            </x-link-item>
                            <x-link-item>
                                <x-slot:name>#</x-slot>
                                    <x-slot:title> Listhub Mobile </x-slot>
                            </x-link-item>
                            <x-link-item>
                                <x-slot:name>blog-grid.html</x-slot>
                                    <x-slot:title> Listhub Blog </x-slot>
                            </x-link-item>
                            <x-link-item>
                                <x-slot:name>contact.html</x-slot>
                                    <x-slot:title> Support </x-slot>
                            </x-link-item>
                    </x-footer-item>

                </div>
                <div class="col-lg-3 responsive-column">

                    <x-footer-item>
                        <x-slot:title> Listhub for Business </x-slot>
                            <x-link-item>
                                <x-slot:name>#</x-slot>
                                    <x-slot:title> Claim your Business </x-slot>
                            </x-link-item>
                            <x-link-item>
                                <x-slot:name>#</x-slot>
                                    <x-slot:title> Advertise on Listhub </x-slot>
                            </x-link-item>
                            <x-link-item>
                                <x-slot:name>#</x-slot>
                                    <x-slot:title> Add Restaurant </x-slot>
                            </x-link-item>
                            <x-link-item>
                                <x-slot:name>#</x-slot>
                                    <x-slot:title> Business Support </x-slot>
                            </x-link-item>
                            <x-link-item>
                                <x-slot:name>#</x-slot>
                                    <x-slot:title> Products for Businesses </x-slot>
                            </x-link-item>
                            <x-link-item>
                                <x-slot:name>#</x-slot>
                                    <x-slot:title> Business Success Stories </x-slot>
                            </x-link-item>
                    </x-footer-item>

                </div>

            </div><!-- end row -->
            <div class="row pt-4 footer-action-wrap">
                <div class="col-lg-4">
                    <h4 class="font-size-17 pb-3">Follow us on</h4>
                    <ul class="social-profile social-profile-styled">
                        <li><a href="#" class="facebook-bg" data-toggle="tooltip" data-placement="top"
                                title="Facebook"><i class="lab la-facebook-f"></i></a></li>
                        <li><a href="#" class="twitter-bg" data-toggle="tooltip" data-placement="top"
                                title="Twitter"><i class="lab la-twitter"></i></a></li>
                        <li><a href="#" class="instagram-bg" data-toggle="tooltip" data-placement="top"
                                title="Instagram"><i class="lab la-instagram"></i></a></li>
                        <li><a href="#" class="dribbble-bg" data-toggle="tooltip" data-placement="top"
                                title="Dribble"><i class="la la-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="section-block-2 my-4"></div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="copy-right d-flex align-items-center justify-content-between">
                        <p class="copy__desc">
                            &copy; Copyright Listhub
                            <script>
                                document.write(new Date().getFullYear());
                            </script>. Made with
                            <span class="la la-heart-o"></span> by <a
                                href="https://themeforest.net/user/techydevs/portfolio">TechyDevs</a>
                        </p>
                        <ul class="list-items term-list text-right">
                            <li class="font-size-14"><a href="terms-and-conditions.html">Terms & Conditions</a></li>
                            <li class="font-size-14"><a href="privacy-policy.html">Privacy Policy</a></li>
                        </ul>
                    </div><!-- end copy-right -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
