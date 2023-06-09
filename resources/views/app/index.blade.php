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
                    <div class="main-search-input">
                        <div class="main-search-input-item">
                            <form action="#" class="form-box">
                                <div class="form-group mb-0">
                                    <span class="la la-search form-icon"></span>
                                    <input class="form-control" type="search" placeholder="What are you looking for?">
                                </div>
                            </form>
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
                            {{-- <select class="user-chosen-select">
                                <option value="0">Select a Country</option>
                                <option value="AF">Afghanistan</option>
                                <option value="AX">Åland Islands</option>
                                <option value="AL">Albania</option>
                                <option value="DZ">Algeria</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguilla</option>
                                <option value="AQ">Antarctica</option>
                                <option value="AG">Antigua &amp; Barbuda</option>
                                <option value="AR">Argentina</option>
                                <option value="AM">Armenia</option>
                                <option value="AW">Aruba</option>
                                <option value="AC">Ascension Island</option>
                                <option value="AU">Australia</option>
                                <option value="AT">Austria</option>
                                <option value="AZ">Azerbaijan</option>
                                <option value="BS">Bahamas</option>
                                <option value="BH">Bahrain</option>
                                <option value="BD">Bangladesh</option>
                                <option value="BB">Barbados</option>
                                <option value="BY">Belarus</option>
                                <option value="BE">Belgium</option>
                                <option value="BZ">Belize</option>
                                <option value="BJ">Benin</option>
                                <option value="BM">Bermuda</option>
                                <option value="BT">Bhutan</option>
                                <option value="BO">Bolivia</option>
                                <option value="BA">Bosnia &amp; Herzegovina</option>
                                <option value="BW">Botswana</option>
                                <option value="BV">Bouvet Island</option>
                                <option value="BR">Brazil</option>
                                <option value="IO">British Indian Ocean Territory</option>
                                <option value="VG">British Virgin Islands</option>
                                <option value="BN">Brunei</option>
                                <option value="BG">Bulgaria</option>
                                <option value="BF">Burkina Faso</option>
                                <option value="BI">Burundi</option>
                                <option value="KH">Cambodia</option>
                                <option value="CM">Cameroon</option>
                                <option value="CA">Canada</option>
                                <option value="CV">Cape Verde</option>
                                <option value="BQ">Caribbean Netherlands</option>
                                <option value="KY">Cayman Islands</option>
                                <option value="CF">Central African Republic</option>
                                <option value="TD">Chad</option>
                                <option value="CL">Chile</option>
                                <option value="CN">China</option>
                                <option value="CO">Colombia</option>
                                <option value="KM">Comoros</option>
                                <option value="CG">Congo - Brazzaville</option>
                                <option value="CD">Congo - Kinshasa</option>
                                <option value="CK">Cook Islands</option>
                                <option value="CR">Costa Rica</option>
                                <option value="CI">Côte d’Ivoire</option>
                                <option value="HR">Croatia</option>
                                <option value="CW">Curaçao</option>
                                <option value="CY">Cyprus</option>
                                <option value="CZ">Czechia</option>
                                <option value="DK">Denmark</option>
                                <option value="DJ">Djibouti</option>
                                <option value="DM">Dominica</option>
                                <option value="DO">Dominican Republic</option>
                                <option value="EC">Ecuador</option>
                                <option value="EG">Egypt</option>
                                <option value="SV">El Salvador</option>
                                <option value="GQ">Equatorial Guinea</option>
                                <option value="ER">Eritrea</option>
                                <option value="EE">Estonia</option>
                                <option value="SZ">Eswatini</option>
                                <option value="ET">Ethiopia</option>
                                <option value="FK">Falkland Islands</option>
                                <option value="FO">Faroe Islands</option>
                                <option value="FJ">Fiji</option>
                                <option value="FI">Finland</option>
                                <option value="FR">France</option>
                                <option value="GF">French Guiana</option>
                                <option value="PF">French Polynesia</option>
                                <option value="TF">French Southern Territories</option>
                                <option value="GA">Gabon</option>
                                <option value="GM">Gambia</option>
                                <option value="GE">Georgia</option>
                                <option value="DE">Germany</option>
                                <option value="GH">Ghana</option>
                                <option value="GI">Gibraltar</option>
                                <option value="GR">Greece</option>
                                <option value="GL">Greenland</option>
                                <option value="GD">Grenada</option>
                                <option value="GP">Guadeloupe</option>
                                <option value="GU">Guam</option>
                                <option value="GT">Guatemala</option>
                                <option value="GG">Guernsey</option>
                                <option value="GN">Guinea</option>
                                <option value="GW">Guinea-Bissau</option>
                                <option value="GY">Guyana</option>
                                <option value="HT">Haiti</option>
                                <option value="HN">Honduras</option>
                                <option value="HK">Hong Kong SAR China</option>
                                <option value="HU">Hungary</option>
                                <option value="IS">Iceland</option>
                                <option value="IN">India</option>
                                <option value="ID">Indonesia</option>
                                <option value="IR">Iran</option>
                                <option value="IQ">Iraq</option>
                                <option value="IE">Ireland</option>
                                <option value="IM">Isle of Man</option>
                                <option value="IL">Israel</option>
                                <option value="IT">Italy</option>
                                <option value="JM">Jamaica</option>
                                <option value="JP">Japan</option>
                                <option value="JE">Jersey</option>
                                <option value="JO">Jordan</option>
                                <option value="KZ">Kazakhstan</option>
                                <option value="KE">Kenya</option>
                                <option value="KI">Kiribati</option>
                                <option value="XK">Kosovo</option>
                                <option value="KW">Kuwait</option>
                                <option value="KG">Kyrgyzstan</option>
                                <option value="LA">Laos</option>
                                <option value="LV">Latvia</option>
                                <option value="LB">Lebanon</option>
                                <option value="LS">Lesotho</option>
                                <option value="LR">Liberia</option>
                                <option value="LY">Libya</option>
                                <option value="LI">Liechtenstein</option>
                                <option value="LT">Lithuania</option>
                                <option value="LU">Luxembourg</option>
                                <option value="MO">Macao SAR China</option>
                                <option value="MG">Madagascar</option>
                                <option value="MW">Malawi</option>
                                <option value="MY">Malaysia</option>
                                <option value="MV">Maldives</option>
                                <option value="ML">Mali</option>
                                <option value="MT">Malta</option>
                                <option value="MQ">Martinique</option>
                                <option value="MR">Mauritania</option>
                                <option value="MU">Mauritius</option>
                                <option value="YT">Mayotte</option>
                                <option value="MX">Mexico</option>
                                <option value="MD">Moldova</option>
                                <option value="MC">Monaco</option>
                                <option value="MN">Mongolia</option>
                                <option value="ME">Montenegro</option>
                                <option value="MS">Montserrat</option>
                                <option value="MA">Morocco</option>
                                <option value="MZ">Mozambique</option>
                                <option value="MM">Myanmar (Burma)</option>
                                <option value="NA">Namibia</option>
                                <option value="NR">Nauru</option>
                                <option value="NP">Nepal</option>
                                <option value="NL">Netherlands</option>
                                <option value="NC">New Caledonia</option>
                                <option value="NZ">New Zealand</option>
                                <option value="NI">Nicaragua</option>
                                <option value="NE">Niger</option>
                                <option value="NG">Nigeria</option>
                                <option value="NU">Niue</option>
                                <option value="MK">North Macedonia</option>
                                <option value="NO">Norway</option>
                                <option value="OM">Oman</option>
                                <option value="PK">Pakistan</option>
                                <option value="PS">Palestinian Territories</option>
                                <option value="PA">Panama</option>
                                <option value="PG">Papua New Guinea</option>
                                <option value="PY">Paraguay</option>
                                <option value="PE">Peru</option>
                                <option value="PH">Philippines</option>
                                <option value="PN">Pitcairn Islands</option>
                                <option value="PL">Poland</option>
                                <option value="PT">Portugal</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="QA">Qatar</option>
                                <option value="RE">Réunion</option>
                                <option value="RO">Romania</option>
                                <option value="RU">Russia</option>
                                <option value="RW">Rwanda</option>
                                <option value="WS">Samoa</option>
                                <option value="SM">San Marino</option>
                                <option value="ST">São Tomé &amp; Príncipe</option>
                                <option value="SA">Saudi Arabia</option>
                                <option value="SN">Senegal</option>
                                <option value="RS">Serbia</option>
                                <option value="SC">Seychelles</option>
                                <option value="SL">Sierra Leone</option>
                                <option value="SG">Singapore</option>
                                <option value="SX">Sint Maarten</option>
                                <option value="SK">Slovakia</option>
                                <option value="SI">Slovenia</option>
                                <option value="SB">Solomon Islands</option>
                                <option value="SO">Somalia</option>
                                <option value="ZA">South Africa</option>
                                <option value="GS">South Georgia &amp; South Sandwich Islands</option>
                                <option value="KR">South Korea</option>
                                <option value="SS">South Sudan</option>
                                <option value="ES">Spain</option>
                                <option value="LK">Sri Lanka</option>
                                <option value="BL">St. Barthélemy</option>
                                <option value="SH">St. Helena</option>
                                <option value="KN">St. Kitts &amp; Nevis</option>
                                <option value="LC">St. Lucia</option>
                                <option value="MF">St. Martin</option>
                                <option value="PM">St. Pierre &amp; Miquelon</option>
                                <option value="VC">St. Vincent &amp; Grenadines</option>
                                <option value="SR">Suriname</option>
                                <option value="SJ">Svalbard &amp; Jan Mayen</option>
                                <option value="SE">Sweden</option>
                                <option value="CH">Switzerland</option>
                                <option value="TW">Taiwan</option>
                                <option value="TJ">Tajikistan</option>
                                <option value="TZ">Tanzania</option>
                                <option value="TH">Thailand</option>
                                <option value="TL">Timor-Leste</option>
                                <option value="TG">Togo</option>
                                <option value="TK">Tokelau</option>
                                <option value="TO">Tonga</option>
                                <option value="TT">Trinidad &amp; Tobago</option>
                                <option value="TA">Tristan da Cunha</option>
                                <option value="TN">Tunisia</option>
                                <option value="TR">Turkey</option>
                                <option value="TM">Turkmenistan</option>
                                <option value="TC">Turks &amp; Caicos Islands</option>
                                <option value="TV">Tuvalu</option>
                                <option value="UG">Uganda</option>
                                <option value="UA">Ukraine</option>
                                <option value="AE">United Arab Emirates</option>
                                <option value="GB">United Kingdom</option>
                                <option value="US">United States</option>
                                <option value="UY">Uruguay</option>
                                <option value="UZ">Uzbekistan</option>
                                <option value="VU">Vanuatu</option>
                                <option value="VA">Vatican City</option>
                                <option value="VE">Venezuela</option>
                                <option value="VN">Vietnam</option>
                                <option value="WF">Wallis &amp; Futuna</option>
                                <option value="EH">Western Sahara</option>
                                <option value="YE">Yemen</option>
                                <option value="ZM">Zambia</option>
                                <option value="ZW">Zimbabwe</option>
                            </select> --}}
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
                            <button class="theme-btn gradient-btn border-0 w-100" type="submit"><i
                                    class="la la-search mr-2"></i>Search Now</button>
                        </div>
                    </div><!-- end main-search-input -->

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
