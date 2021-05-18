<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('admin.index') }}" class="nav-link">Home</a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('force_to_logout') }}" class="nav-link">Logout</a>
        </li>

        @foreach ($languages as $lang)
            @if ($lang == 'uz')
                <li class="nav-item d-none d-sm-inline-block"><a
                        href="{{ url()->current() . '/?language=' . $lang }}" class="@if (app()->getLocale() == $lang) tilbolsa active @endif nav-link">O'zbek</a>
                </li>

            @elseif($lang=='en')
                <li class="nav-item d-none d-sm-inline-block"><a
                        href="{{ url()->current() . '/?language=' . $lang }}" class="@if (app()->getLocale() == $lang) tilbolsa active @endif nav-link">English</a>
                </li>

            @elseif($lang=='ru')
                <li class="nav-item d-none d-sm-inline-block"><a
                        href="{{ url()->current() . '/?language=' . $lang }}" class="@if (app()->getLocale() == $lang) tilbolsa active @endif nav-link">Русский</a>
                </li>
            @elseif($lang=='kril')
                <li class="nav-item d-none d-sm-inline-block"><a
                        href="{{ url()->current() . '/?language=' . $lang }}" class="@if (app()->getLocale() == $lang) tilbolsa active @endif nav-link">Kril</a>
                </li>
            @endif
        @endforeach

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

    </ul>
</nav>


<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Administration</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('admin.index') }}"
                        class="nav-link {{ Route::currentRouteName() == 'admin.index' ? 'active' : null }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Admin
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}"
                        class="nav-link {{ Str::contains(Route::currentRouteName(), 'categories') ? 'active' : null }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('posts.index') }}"
                        class="nav-link {{ Str::contains(Route::currentRouteName(), 'posts') ? 'active' : null }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Posts
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('banners.index') }}"
                        class="nav-link {{ Str::contains(Route::currentRouteName(), 'banners') ? 'active' : null }}">
                        <i class="nav-icon fas fa-flag"></i>
                        <p>
                            Banners
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('proud_memebers.index') }}"
                        class="nav-link {{ Str::contains(Route::currentRouteName(), 'proud_memebers') ? 'active' : null }}">
                        <i class="nav-icon fas fa-business-time"></i>
                        <p>
                            Footer Company
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contacts.index') }}"
                        class="nav-link {{ Str::contains(Route::currentRouteName(), 'contacts') ? 'active' : null }}">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Contacts
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('consults.index') }}"
                        class="nav-link {{ Str::contains(Route::currentRouteName(), 'consults') ? 'active' : null }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Consults
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('socials.index') }}"
                        class="nav-link {{ Str::contains(Route::currentRouteName(), 'socials') ? 'active' : null }}">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>
                            Social Links
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('statistics.index') }}"
                        class="nav-link {{ Str::contains(Route::currentRouteName(), 'statistics') ? 'active' : null }}">
                        <i class="nav-icon fas fa-chart-area"></i>
                        <p>
                            Statistics
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('galleries.index') }}"
                        class="nav-link {{ Str::contains(Route::currentRouteName(), 'galleries') ? 'active' : null }}">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Gallery
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
