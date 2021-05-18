@extends('layouts.body')
@section('title')

@endsection
@section('content')


    <!--================End Slider Area =================-->



    <section class="trd-key-success-section trd-section trd-gray-section">
        <div class="container">
            <div class="row">

                <div class="trd-section-title-wrapper col-md-12 col-sm-12 col-xs-12">
                    <h1 class="trd-section-tittle">{{ __('lang.latest') }} <span
                            class="trd-highlight-text">{{ __('lang.news') }}</span></h1>
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
                                        <a href="{{route('post-detail.show',$post->id)}}">{{ $post->title }}</a>
                                    </h3>
                                    <p>{{ Str::limit($post->content, 80) }}</p>
                                </div>
                            </div>
                        </div></a>
                        <!-- End -->
                    @endforeach

                        {{$posts->links()}}
                </div>
            </div>
        </div>
    </section>



@endsection
