<header class="trd-header trd-fixed-header">
    <!-- Topbar -->
    <div class="trd-header-topbar">
        <div class="container">
            <div class="row">
                <!-- contact info -->
                <div class="trd-contact-infos">
                    <ul>
                        <li class="trd-header-info-phn">99-443-62-24</li>
                        <li class="trd-header-info-location">Toshkent Shahri Uzbekistan</li>
                    </ul>
                </div>
                <!-- End -->

                <!-- Social Links -->
                <div class="trd-social-links">
                    <ul>

                        <li class="trd-fb-icon">
                            <a href="#">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="trd-twitter-icon">
                            <a href="index.html#">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="trd-behance-icon">
                            <a href="#">
                                <i class="fa fa-youtube"></i>
                            </a>
                        </li>
                        <li class="trd-dribbble-icon">
                            <a href="#">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li>
                        <li class="trd-vimeo-icon">
                            <a href="#">
                                <i class="fa fa-paper-plane"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End -->
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- Bottombar -->
    <div class="trd-header-bottombar">
        <!-- Navigation Menu start-->
        <nav class="navbar trd-main-menu" role="navigation">
            <div class="container">
                <div class="row">
                    <!-- Navbar Toggle -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Logo -->
                        <a class="navbar-brand " href="{{route('home')}}">studyconsult.uz</a>
                    </div>
                    <!-- Navbar Toggle End -->

                    <!-- navbar-collapse start-->
                    <div id="nav-menu" class="navbar-collapse trd-menu-wrapper collapse" role="navigation">
                        <!-- Menu -->
                        <ul class="nav navbar-nav trd-menus">

                            <li>
                                <a href="{{route('home')}}">{{__('lang.home_page')}}</a>
                            </li>
                            <li>
                                <a href="{{route('posts-page.index')}}">{{__('lang.news')}}</a>
                            </li>
                            <li>
                                <a href="{{route('home')}}#consults">{{__('lang.consults')}}</a>
                            </li>
                            <li class="active">
                                <a href="">{{__('lang.language')}}</a>
                                <ul class="trd-dropdown-menu">
                                    @foreach ($languages as $lang)
                                        @if ($lang == 'uz')
                                            <li><a href="{{ url()->current() . '/?language=' . $lang }}">O'zbek</a>
                                            </li>

                                        @elseif($lang=='en')
                                            <li><a href="{{ url()->current() . '/?language=' . $lang }}">English</a>
                                            </li>

                                        @elseif($lang=='ru')
                                            <li><a href="{{ url()->current() . '/?language=' . $lang }}">Русский</a>
                                            </li>
                                        @elseif($lang=='kril')
                                            <li><a href="{{ url()->current() . '/?language=' . $lang }}">Kril</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                        <!-- End -->
                    </div>
                    <!-- navbar-collapse end-->

                    <!-- Search -->

                    <!-- End -->
                </div>
            </div>
        </nav>
        <!-- Navigation Menu end-->
    </div>
    <!-- End -->
</header>
