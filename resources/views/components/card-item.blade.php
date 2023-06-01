<div class="card-item">
    <div class="card-image">
        <a href="listing-details.html" class="d-block">
            <img src="images/{{ $imageName }}.jpg" class="card__img lazy" alt="card-item">
        </a>
    </div>
    <div class="card-content">
        <a href="#" class="user-thumb d-inline-block" data-toggle="tooltip" data-placement="top" title="TechyDevs">
            <img src="images/{{ $businessLogo }}.png" alt="author-img">
        </a>
        <h4 class="card-title pt-3">
            <a href="listing-details.html">{{ $cardTitle }}</a>
            <i class="la la-check-circle ml-1" data-toggle="tooltip" data-placement="top" title="Claimed"></i>
        </h4>
        <p class="card-sub">
            <a href="#"><i class="la la-map-marker mr-1 text-color-2"></i>{{ $cardSub }}</a>
        </p>
        <ul class="listing-meta d-flex align-items-center">
            <li class="d-flex align-items-center">
                <span class="rate flex-shrink-0">{{ $rate }}</span>
                <span class="rate-text">{{ $review }} reviews</span>
            </li>
            <li>
                <span class="price-range" data-toggle="tooltip" data-placement="top" title="Pricey">
                    <strong class="font-weight-medium">$</strong>
                    <strong class="font-weight-medium">$</strong>
                    <strong class="font-weight-medium">$</strong>
                </span>
            </li>
            <li class="d-flex align-items-center">
                <i class="la la-cutlery mr-1 listing-icon"></i>
                <a href="#" class="listing-cat-link">{{ $category }}</a>
            </li>
        </ul>
        <ul class="info-list padding-top-20px">
            <li><span class="la la-link icon"></span>
                <a href="#"> {{ $linkWeb }}</a>
            </li>
            <li><span class="la la-calendar-check-o icon"></span>
                {{ $date }}
            </li>
        </ul>
    </div>
</div>
