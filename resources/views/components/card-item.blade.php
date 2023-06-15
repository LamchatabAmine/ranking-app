<div class="card-item">
    <div class="card-image">
        <a href="{{ isset($linkBusiness) ? $linkBusiness : '#' }}" class="d-block">
            <img src="{{ $imageName }}" class="card__img lazy" alt="card-item">
        </a>
    </div>
    <div class="card-content">
        <a href="{{ isset($linkUser) ? $linkUser : '#' }}" class="user-thumb d-inline-block" data-toggle="tooltip"
            data-placement="top">
            <img src="{{ $businessLogo }}" alt="author-img">
        </a>
        <h4 class="card-title pt-3">
            <a href=" {{ isset($linkCard) ? $linkCard : '#' }}">{{ $cardTitle }}</a>
            <i class="la la-check-circle ml-1" data-toggle="tooltip" data-placement="top" title="Claimed"></i>
        </h4>
        <p class="card-sub">
            <a href="#"><i class="la la-map-marker mr-1 text-color-2"></i>{{ $cardSub }}</a>
        </p>
        <ul class="listing-meta d-flex align-items-center">
            <li class="d-flex align-items-center mr-3">
                <span class="rate flex-shrink-0">{{ $rate }}</span>
                <span class="rate-text">{{ $review }} reviews</span>
            </li>
            <li class="d-flex align-items-center">
                <a href="#" class="listing-cat-link">{{ $category }}</a>
            </li>
        </ul>
        <ul class="info-list padding-top-20px">
            <li><span class="la la-link icon"></span>
                <a href="#"> {{ $linkWeb }}</a>
            </li>
        </ul>
        {{ $slot }}
    </div>
</div>
