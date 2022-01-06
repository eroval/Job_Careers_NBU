@include('mysections')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Create Article</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <style>
            html{
                height: 100%;
            }
        </style>
        @yield('mystyles')
    </head>
    <body class="antialiased" style="height: 100%; width: 80%; margin: auto;">
        @if (Auth::user())
            @yield('header')
            
            @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            @yield('article-creator')
            @yield('myfooter')

            <script src="{{ asset('js/app.js') }}"></script>
        @else
            @yield('header')
            @yield('article-creator-error')
            @yield('myfooter')
        @endif
    </body>
</html>