<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.meta')
    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('before-style')
    @include('includes.style')
    @stack('after-style')
</head>
<body>
    @include('includes.header')
    @yield('content')
    @include('includes.footer')
    

    @stack('before-script')
    @include('includes.script')
    @stack('after-script')
    @vite('resources/js/app.js')
</body>
</html>