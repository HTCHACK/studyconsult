<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('admin.layouts.head')
    @yield('title')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admin.layouts.menu')
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>
    @include('admin.layouts.scripts')
</body>

</html>
