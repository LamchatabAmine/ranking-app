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
            <li>
                <a href="{{ route('myAccount') }}">
                    {{ __('My_account') }}
                </a>
            </li>
        @endauth
    @endif
</ul>
