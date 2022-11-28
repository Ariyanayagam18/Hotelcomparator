<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body class="antialiased">
        @include('layout/header')
        @include('homepage')
        @include('layout/footer')
    </body>
</html>
