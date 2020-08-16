<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<body>
<main id="app">
    <section class="d-flex-center">
        @yield('content')
    </section>
</main>
</body>
</html>