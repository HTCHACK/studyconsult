@extends('layouts.body')
@section('title')

@endsection
@section('content')


    <section class="trd-hero-slider-section">
        <div class="slider-pro trd-hero-slider" id="trd-hero-slider">
            <div class="sp-slides">
                @foreach ($banners as $banner)
                    <!-- Slides -->
                    <div class="sp-slide trd-main-slides">
                        <!-- <div class="az-dark-color-overlay"></div> -->
                        <img class="sp-image" src="{{ asset(str_replace('public', 'storage', $banner->picture)) }}"
                            alt="Slider Image" />

                        <div class="sp-layer trd-slider-img trd-mac-img" data-position="bottomCenter" data-vertical="-25"
                            data-horizontal="125" data-show-delay="500" data-hide-delay="200" data-show-transition="left"
                            data-hide-transition="right">
                            <img src="{{ asset('front/images/shape.png') }}" alt="Triangle Shape">
                        </div>

                        <h1 class="sp-layer trd-slider-text-big" data-position="center" data-vertical="-130"
                            data-horizontal="150" data-show-transition="left" data-hide-transition="up"
                            data-show-delay="1000" data-hide-delay="200">
                            <span class="trd-highlight-text"></span><br>
                        </h1>


                    </div>
                    <!-- Slides End -->
                @endforeach
                <!-- Slides -->


            </div>
        </div>
    </section>


    <section class="trd-key-success-section trd-section trd-gray-section">
        <div class="container">
            <div class="row">

                <div class="trd-section-title-wrapper col-md-12 col-sm-12 col-xs-12">
                    <h1 class="trd-section-tittle">{{ __('lang.latest') }} <span
                            class="trd-highlight-text">{{ __('lang.news') }}</span></h1>
                    <a href="#" class="trd-details-link">{{ __('lang.see_all') }}</a>
                </div>


                <div class="trd-key-to-success">


                    @foreach ($posts as $post)
                        <!-- Imagebox with details -->
                        <a href="{{route('post-detail.show',$post->id)}}"><div class="col-md-4 col-sm-4 col-xs-12 trd-imagebox-with-text-wrapper appear fadeIn"
                            data-wow-duration="1s" data-wow-delay=".5s">
                            <div class="trd-imagebox-with-text">
                                <div class="trd-image-wrapper">
                                    <img src="{{ asset(str_replace('public', 'storage', $post->picture)) }}"
                                        alt="Success Image" style="height:250px">
                                </div>

                                <div class="trd-imagebox-details">
                                    <h3>
                                        <a href="#">{{ $post->title }}</a>
                                    </h3>
                                    <p>{{ Str::limit($post->content, 80) }}</p>
                                </div>
                            </div>
                        </div></a>
                        <!-- End -->
                    @endforeach


                </div>
            </div>
        </div>
    </section>
    <!-- KEY TO SUCCESS SECTION END -->


    <!-- ABOUT BUSINESS -->

    <!-- ABOUT BUSINESS END -->


    <!-- COUNTER SECTION -->
    <section class="trd-counter-section trd-section" style="background-color:#fff">
        <div class="container">
            <div class="row">
                <!-- Counter Item -->
                @foreach ($statistics as $statistic)
                    <div class="col-md-4 col-sm-4 col-xs-12 trd-counter trd-mulicolor-counter">
                        <h3 class="trd-count" data-from="0" data-to="{{ $statistic->number }}">0</h3>
                        <p>{{ $statistic->name }}</p>
                    </div>
                @endforeach
                <!-- End -->
            </div>
        </div>
    </section>
    <!-- COUNTER SECTION END -->


    <!-- CUSTOM SECTION -->

    <!-- CUSTOM SECTION END -->


    <!-- IMAGEBOX SECTION -->
    <section class="trd-category-section">
        <div class="container-fluid">
            <div class="row">
                <!-- Imagebox -->
                @foreach ($galleries as $gallery)
                    <div class="trd-image-with-overlay">
                        <img src="{{ asset(str_replace('public', 'storage', $gallery->picture)) }}"
                            alt="{{ $gallery->name }}" style="height:250px;width:100%">
                        <a href="#" class="trd-img-overlay">
                            <span>{{ $gallery->name }}</span>
                        </a>
                    </div>
                    <!-- End -->
                @endforeach

            </div>
        </div>
    </section>
    <!-- IMAGEBOX SECTION END -->


    <!-- CLIENT TESTIMONIAL SECTION -->
    <section class="trd-client-testimonial-section trd-section">
        <div class="container">
            <div class="row">
                <!-- Section Title -->
                <div class="trd-section-title-wrapper">
                    <h1 class="trd-section-tittle"><span class="trd-highlight-text">{{__('lang.testimonials')}}</span></h1>
                </div>
                <!-- End -->

                <div id="trd-testimonial" class="trd-testimonial">
                    <!-- Slides -->
                    @foreach ($proud_memebers as $proud_memeber)
                        <div class="trd-testimonial-slides">
                            <div class="trd-testimonial-text">
                                <p>{{ $proud_memeber->description }}</p>
                            </div>

                            <div class="trd-satisfied-user-info">
                                <div class="trd-user-img-wrapper">
                                    <img src="{{ asset(str_replace('public', 'storage', $proud_memeber->picture)) }}"
                                        alt="Clients Image">
                                </div>
                                <h3>{{ $proud_memeber->name }}</h3>
                                <p>{{ $proud_memeber->job }}</p>
                            </div>
                        </div>
                    @endforeach
                    <!-- End -->
                    <!-- End -->
                </div>
            </div>
        </div>
    </section>
    <!-- CLIENT TESTIMONIAL SECTION END -->


    <!-- CONTACT SECTION -->
    <section class="trd-contact-section trd-section">
        <!-- Google Map -->
        <div class="trd-map-wrapper">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d191884.74398102277!2d69.13927952385873!3d41.28277055759809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae8b0cc379e9c3%3A0xa5a9323b4aa5cb98!2z0KLQvtGI0LrQtdC90YIsIE9gemJla2lzdG9u!5e0!3m2!1suz!2s!4v1619711209468!5m2!1suz!2s"
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <!-- End -->

        <!-- Contact Form -->
        <div class="trd-contact-form-sec" id="consults">
            <h1 class="trd-section-tittle"><span class="trd-highlight-text">{{__('lang.free_consulting')}}</span></h1>

            <div class="trd-contact-form-wrapper">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul style="list-style:none;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @elseif (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('consults.store') }}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="{{__('lang.name')}}">
                    <input type="tel" name="phone_number" placeholder="{{__('lang.phone_number')}}">
                    <input type="text" name="message" placeholder="{{__('lang.message')}}">
                        <div class="form-group">
                            <div class="g-recaptcha"
                                data-sitekey="6LfJBL8aAAAAAGTI2REScovSbdGCclCyYsiMgSZd
                                "></div>

                    </div>
                    <button type="submit" class="trd-btn">{{__('lang.send')}}</button>
                </form>
            </div>
        </div>
        <!-- End -->
    </section>

@endsection
