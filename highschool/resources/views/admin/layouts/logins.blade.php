<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('admin.layouts.head')
    @yield('title')
</head>

<body class="hold-transition login-page">
    @yield('content')
</body>



@include('admin.layouts.scripts')
</body>

</html>
