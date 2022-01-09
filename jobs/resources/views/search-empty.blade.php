@include('mysections')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Newsfeed</title>

        @yield('mystyles')
        <!-- Special Styling for the buttons -->
        @include('link-style')

    </head>
    <body class="antialiased" style="height: 100%; ">
        @yield('header')
        @yield('search-error')
        <p><?php
        echo $job_ids . "What'su p";
        echo $user_id;
        ?></p>
        @yield('myfooter')

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>