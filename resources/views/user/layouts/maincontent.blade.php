<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>StudentAffairs - @yield('title', 'Welcome')</title>
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        <link rel="stylesheet" href="{{ asset('usercss/custom.css') }}">
    </head>
    <body>
        @include('user.layouts.navigation')
        
        <main>
            @yield('content')
        </main>
        
        @include('user.layouts.footer')
    </body>
</html>