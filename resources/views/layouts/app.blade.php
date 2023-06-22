<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ url('images/new-logo.png') }}">


    <!-- Fonts -->
    <link rel="preconnect" href="{{ url('https://fonts.bunny.net') }}">
    <link href="{{ url('https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap') }}" rel="stylesheet" />

    <!-- Styles -->
    <!-- Template CSS Files -->
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/animated-headline.css') }}">
    <link rel="stylesheet" href="{{ url('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ url('css/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ url('css/chosen.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">

</head>

<body>


    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>





    {{-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> --}}
    <!-- Script -->
    {{-- <script src="{{ url('https://unpkg.com/axios/dist/axios.min.js') }}"></script> --}}
    <script src="{{ url('https://kit.fontawesome.com/c7a60e43cd.js') }}" crossorigin="anonymous"></script>

    <!-- Template JS Files -->
    <script src="{{ url('https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js') }}"></script>
    <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ url('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ url('js/jquery-ui.js') }}"></script>
    <script src="{{ url('js/popper.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ url('js/animated-headline.js') }}"></script>
    <script src="{{ url('js/chosen.min.js') }}"></script>
    <script src="{{ url('js/moment.min.js') }}"></script>
    <script src="{{ url('js/datedropper.min.js') }}"></script>
    <script src="{{ url('js/waypoints.min.js') }}"></script>
    <script src="{{ url('js/jquery.counterup.min.js') }}"></script>
    <script src="{{ url('js/jquery-rating.js') }}"></script>
    <script src="{{ url('js/tilt.jquery.min.js') }}"></script>
    <script src="{{ url('js/jquery-supperslides.min.js') }}"></script>
    <script src="{{ url('js/superslider-script.js') }}"></script>
    <script src="{{ url('js/jquery.lazy.min.js') }}"></script>
    <script src="{{ url('js/main.js') }}"></script>

</body>

</html>
