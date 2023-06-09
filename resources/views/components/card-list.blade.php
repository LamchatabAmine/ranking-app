<div class="card-item card-item-list">
    <div class="card-image">
        <a href="{{ $linkItem }}" class="d-block">
            <img src="{{ $image_business }}" class="card__img lazy" alt="image-business">
        </a>
        <span class="bookmark-btn" data-toggle="tooltip" data-placement="top" title="Save">
            <i class="la la-bookmark"></i>
        </span>
    </div>
    <div class="card-content">
        <a class="user-thumb d-inline-block" data-toggle="tooltip" data-placement="top">
            <img src="{{ $logo }}" alt="author-img">
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
            <li class="d-flex align-items-center mr-3">
                <span class="rate flex-shrink-0">{{ $rate }}</span>
                <span class="rate-text">5 Ratings</span>
            </li>
            <li class="d-flex align-items-center">
                <a href="{{ $linkCategory }}" class="listing-cat-link">{{ $category }}</a>
            </li>
        </ul>
        <ul class="info-list padding-top-20px">
            <li><span class="la la-link icon"></span>
                <a href="{{ $linkWebSite }}"> {{ $webSite }}</a>
            </li>
        </ul>
    </div>
</div>
