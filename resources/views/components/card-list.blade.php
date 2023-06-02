<div class="card-item card-item-list">
    <div class="card-image">
        <a href="{{ $linkItem }}" class="d-block">
            <img src="images/{{ $image_business }}" class="card__img lazy" alt="image-business">
        </a>
        <span class="bookmark-btn" data-toggle="tooltip" data-placement="top" title="Save">
            <i class="la la-bookmark"></i>
        </span>
    </div>
    <div class="card-content">
        <a href="{{ $linkProfile }}" class="user-thumb d-inline-block" data-toggle="tooltip" data-placement="top"
            title="TechyDevs">
            <img src="images/{{ $logo }}" alt="author-img">
        </a>
        <h4 class="card-title pt-3">
            <a href="{{ $linkItem }}">{{ $title }}</a>
            <i class="la la-check-circle ml-1" data-toggle="tooltip" data-placement="top" title="Claimed"></i>
        </h4>
        <p class="card-sub">
            <a href="{{ $linkAddress }}">
                <i class="la la-map-marker mr-1 text-color-2"></i>
                {{ $address }}</a>
        </p>
        <ul class="listing-meta d-flex align-items-center">
            <li class="d-flex align-items-center">
                <span class="rate flex-shrink-0">{{ $rate }}</span>
                <span class="rate-text">5 Ratings</span>
            </li>
            <li>
                <span class="price-range" data-toggle="tooltip" data-placement="top" title="Pricey">
                    <strong class="font-weight-medium">$</strong>
                    <strong class="font-weight-medium">$</strong>
                    <strong class="font-weight-medium">$</strong>
                </span>
            </li>
            <li class="d-flex align-items-center">
                {{-- <i class="la la-cutlery mr-1 listing-icon"></i> --}}
                <a href="{{ $linkCategory }}" class="listing-cat-link">{{ $category }}</a>
            </li>
        </ul>
        <ul class="info-list padding-top-20px">
            <li><span class="la la-link icon"></span>
                <a href="{{ $linkWebSite }}"> {{ $webSite }}</a>
            </li>
            <li><span class="la la-calendar-check-o icon"></span>
                {{ $create_at }}
            </li>
        </ul>
    </div>
</div>
