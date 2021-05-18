<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('title')
    @include('layouts.head')
    <livewire:styles />
</head>

<body class="trd-home-template trd-homepage-one">

    @if (Route::currentRouteName() != 'login')
        @include('layouts.menu')
    @endif
    @yield('content')
    @if (Route::currentRouteName() != 'login')
        @include('layouts.footer')
    @endif
    @include('layouts.scripts')
    <livewire:scripts />
</body>

</html>
