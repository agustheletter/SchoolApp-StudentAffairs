<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>StudentAffairs - @yield('title')</title>
        <!-- Add your CSS links here -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        @include('user.layouts.navbar')
        
        <main class="container mx-auto py-4">
            @yield('content')
        </main>
        
        @include('user.layouts.footer')
    </body>
</html>