{{-- @dd($galleries->where('business_id', $business->id)->count()) --}}


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
                            <h2 class="sec__title text-white font-size-40 mb-0">Edit Business</h2>
                        </div>
                        <ul class="list-items bread-list ">
                            <li><a href="{{ route('home-page') }}">Home</a></li>
                            <li>Edit Business</li>
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
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('business.update', $business->id) }}" method="POST" enctype="multipart/form-data"
                class="col-lg-10 mx-auto">
                @csrf
                @method('patch')
                <div class="row">
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
                                                value="{{ $business->title }}">
                                            @error('title')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text d-flex align-items-center">Business phone</label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="phone"
                                                value="{{ $business->phone }}" min="10">
                                            @error('phone')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">Category</label>
                                        <div class="form-group user-chosen-select-container">
                                            <select name="category" id="category" class="user-chosen-select">
                                                <option
                                                    value="{{ $categories->firstWhere('id', $business->category_id)['id'] }}">
                                                    {{ $categories->firstWhere('id', $business->category_id)['category_name'] }}
                                                </option>
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
                                </div>

                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text d-flex align-items-center">City</label>
                                        <div class="form-group user-chosen-select-container">
                                            <select name="city" id="city" class="user-chosen-select">
                                                <option
                                                    value="{{ $cities->firstWhere('id', $business->city_id)['id'] }}">
                                                    {{ $cities->firstWhere('id', $business->city_id)['city_name'] }}
                                                </option>
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
                                            <textarea name="description" class="message-control form-control user-text-editor" id="description">{{ $business->description }}</textarea>
                                            @error('description')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text d-flex align-items-center">Web Address</label>
                                        <div class="form-group">
                                            <span class="la la-globe form-icon"></span>
                                            <input class="form-control" type="text" name="website"
                                                value="{{ $business->website }}">
                                            @error('website')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text d-flex align-items-center">Local Address</label>
                                        <div class="form-group mb-0">
                                            <span class="la la-globe form-icon"></span>
                                            <input class="form-control" type="text" name="address"
                                                value="{{ $business->address }}">
                                            @error('address')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end block-card-body -->
                    </div>

                    <div class="block-card mb-4">
                        <div class="block-card-header">
                            <h2 class="widget-title">Media</h2>
                            <div class="stroke-shape"></div>
                        </div><!-- block-card-header -->


                        <label class="label-text">Gallery Images</label>
                        <div class="row">
                            @php
                                $filteredGalleries = $galleries->where('business_id', $business->id)->toArray();
                            @endphp
                            @foreach ($filteredGalleries as $gallery)
                                <div class="card col-lg-4 responsive-column mt-2 mr-2"
                                    style="width: 18rem;padding-right: 0px;padding-left: 0px;">
                                    <div class="cart-item">
                                        <div class="card-image">
                                            <img src="{{ url($gallery['path']) }}" class="card-img"
                                                alt="card-image">
                                        </div>
                                        <div class="card-content mt-4 mb-2" style="margin-left: 10px;">
                                            <a href="{{ route('business.removeImage', $gallery['id']) }}"
                                                class="btn btn-primary site-button button-sm">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="file-upload-wrap mt-3">
                            <label for="images[]" class="label-text">Add new Gallery</label>
                            <input type="file" name="images[]" class="multi file-upload-input with-preview"
                                multiple>
                            <span class="file-upload-text"><i class="la la-upload mr-2"></i>Drop files here or
                                click to upload</span>
                            @error('images.*')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mt-4">
                            <label class="label-text">Upload Business Logo</label>
                            <div class="row mt-3">
                                <div class="mr-4">
                                    <a href="#$linkUser" class="user-thumb d-inline-block " data-toggle="tooltip"
                                        data-placement="top">
                                        <img src="{{ url($business->logo) }}" alt="author-img">
                                    </a>
                                </div>
                                <div class="file-upload-wrap file-upload-wrap-2 ">
                                    <input type="file" name="logo"
                                        class="multi file-upload-input with-preview">
                                    <span class="file-upload-text"><i class="la la-photo mr-2"></i>Update logo</span>
                                    @error('logo')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
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
                            <button type="submit" class="theme-btn gradient-btn border-0">Update & Preview</button>
                        </div>
                    </div>
                </div><!-- end row -->
            </form>
        </div>
    </section>



    {{--  FOOTER AREA --}}
    <x-footer />



    <!-- start back-to-top -->
    <div id="back-to-top"><i class="la la-arrow-up" title="Go top"></i></div>
    <!-- end back-to-top -->

</x-app-layout>
