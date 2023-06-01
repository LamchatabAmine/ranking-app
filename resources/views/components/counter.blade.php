<div class="counter-item d-flex align-items-center">
    <div class="counter-icon section-icon flex-shrink-0 bg-opacity-{{ $opacity }}">
        {{ $svg }}
    </div>
    <div class="counter-content pl-3">
        <h3 class="counter__number text-color-{{ $color }} mb-2">
            <span class="counter">{{ $counter }}</span>
            <span class="count-symbol">+</span>
        </h3>
        <p class="counter__title">{{ $title }}</p>
    </div><!-- end counter-content -->
</div><!-- end counter-item -->
