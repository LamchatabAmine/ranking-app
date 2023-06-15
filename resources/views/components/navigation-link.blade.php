<ul>
    <li>
        <a href="{{ route('home-page') }}">Home</a>
    </li>
    <li>
        <a href="{{ route('about-page') }}">About</a>
    </li>
    <li>
        <a href="{{ route('listing-page') }}">Listings</a>
    </li>
    <li>
        <a href="{{ route('contact-page') }}">Contact</a>
    </li>
    @if (Route::has('login'))
        @auth
            @if (Auth::user()->role == 2)
                <li>
                    <a href="{{ route('myAccount') }}">
                        {{ __('My Account') }}
                    </a>
                </li>
            @endif
        @endauth
    @endif
    @if (Route::has('login'))
        @auth
            @if (Auth::user()->role == 1)
                <li>
                    <a href="{{ route('manage') }}">
                        {{ __('Manage') }}
                    </a>
                </li>
            @endif
        @endauth
    @endif
    @if (Route::has('login'))
        @auth
            @if (Auth::user()->role == 0)
                <li>
                    <a href="{{ route('admin') }}">
                        {{ __('Dashboard') }}
                    </a>
                </li>
            @endif
        @endauth
    @endif
</ul>
