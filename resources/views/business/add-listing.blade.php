<x-app-layout>
    <!-- start per-loader -->
    <div class="loader-container">
        <div class="loader-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- end per-loader -->

    {{--  HEADER AREA --}}
    <x-header />



    <section class="breadcrumb-area bread-bg-2 bread-overlay overflow-hidden">
        <div class="overlay"></div><!-- end overlay -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                        <div class="section-heading">
                            <h2 class="sec__title text-white font-size-40 mb-0">Submit Your Listing</h2>
                        </div>
                        <ul class="list-items bread-list ">
                            <li><a href="{{ route('home-page') }}">Home</a></li>
                            <li>Add New Listing</li>
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
    </section><!-- end breadcrumb-area -->




    {{-- START ADD-LISTING AREA --}}
    <section class="add-listing-area section-padding">
        <div class="container">
            <div class="row">
                <form action="{{ route('business.store') }}" method="POST" enctype="multipart/form-data"
                    class="col-lg-10 mx-auto">
                    @csrf
                    <div class="block-card mb-4">
                        <div class="block-card-header">
                            <h2 class="widget-title">General Information</h2>
                            <div class="stroke-shape"></div>
                        </div><!-- end block-card-header -->
                        <div class="block-card-body">
                            <div class="form-box row">
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text d-flex align-items-center">Title</label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="title"
                                                placeholder="Example: Super Duper Burgers" value="{{ old('title') }}">
                                            @error('title')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 -->
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text d-flex align-items-center">Business phone</label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="phone"
                                                placeholder=" Example: +212 0500000051" value="{{ old('phone') }}"
                                                min="10">
                                            @error('phone')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 -->
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">Category</label>
                                        <div class="form-group user-chosen-select-container">
                                            <select name="category" id="category" class="user-chosen-select">
                                                <option value="">Select a category</option>
                                                @foreach ($categories->where('parent_category_id', null) as $category)
                                                    <optgroup label="{{ $category->category_name }}">
                                                        @foreach ($categories->where('parent_category_id', $category->id) as $subCategory)
                                                            <option value="{{ $subCategory->id }}">
                                                                {{ $subCategory->category_name }}
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                @endforeach
                                            </select>
                                            @error('category')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 -->
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text d-flex align-items-center">City</label>
                                        <div class="form-group user-chosen-select-container">
                                            <select name="city" id="city" class="user-chosen-select">
                                                <option value="">Select a city</option>
                                                @foreach ($cities->where('parent_city_id', null) as $city)
                                                    <optgroup label="{{ $city->city_name }}">
                                                        @foreach ($cities->where('parent_city_id', $city->id) as $subCity)
                                                            <option value="{{ $subCity->id }}">
                                                                {{ $subCity->city_name }}
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                @endforeach
                                            </select>
                                            @error('city')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">Description</label>
                                        <div class="form-group">
                                            <textarea class="message-control form-control user-text-editor" name="description" id="description">{{ old('description') }}</textarea>
                                            @error('description')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 -->
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text d-flex align-items-center">Web Address</label>
                                        <div class="form-group">
                                            <span class="la la-globe form-icon"></span>
                                            <input class="form-control" type="text" name="website"
                                                placeholder="https://www.ranking.com/" value="{{ old('website') }}">
                                            @error('website')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 -->
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text d-flex align-items-center">Local Address</label>
                                        <div class="form-group mb-0">
                                            <span class="la la-globe form-icon"></span>
                                            <input class="form-control" type="text" name="address"
                                                placeholder="Morocco-Tanger-Boulvard app-5°"
                                                value="{{ old('address') }}">
                                            @error('address')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 -->
                            </div>
                        </div><!-- end block-card-body -->
                    </div>

                    <div class="block-card mb-4">
                        <div class="block-card-header">
                            <h2 class="widget-title">Media</h2>
                            <div class="stroke-shape"></div>
                        </div><!-- block-card-header -->
                        <div class="block-card-body">
                            <label class="label-text">Gallery Images</label>
                            <div class="file-upload-wrap">
                                <input type="file" name="images[]" class="multi file-upload-input with-preview"
                                    multiple>
                                <span class="file-upload-text"><i class="la la-upload mr-2"></i>Drop files here or
                                    click to upload</span>
                                @error('images.*')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <label class="label-text">Upload Business Logo</label>
                            <div class="file-upload-wrap file-upload-wrap-2">
                                <input type="file" name="logo" class="multi file-upload-input with-preview">
                                <span class="file-upload-text"><i class="la la-photo mr-2"></i>Choose a file</span>
                                @error('logo')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div><!-- end block-card-body -->
                    </div>
                    <div class="submit-wrap pt-4">
                        <div class="custom-checkbox">
                            <input type="checkbox" id="agreeChb2">
                            <label for="agreeChb2" class="text-gray">By continuing, you agree to Listhub's <a
                                    href="terms-and-conditions.html" class="text-color-2">Terms of Service</a> and
                                acknowledge our <a href="privacy-policy.html" class="text-color-2">Privacy
                                    Policy</a>.
                            </label>
                        </div>
                        <div class="btn-box mt-4">
                            <button type="submit" class="theme-btn gradient-btn border-0">Save & Preview</button>
                        </div>
                    </div>
                </form>
            </div><!-- end row -->
        </div><!-- end container -->
    </section>



    {{--  FOOTER AREA --}}
    <x-footer />



    <!-- start back-to-top -->
    <div id="back-to-top"><i class="la la-arrow-up" title="Go top"></i></div>
    <!-- end back-to-top -->

</x-app-layout>
