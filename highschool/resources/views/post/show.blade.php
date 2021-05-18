@extends('layouts.body')
@section('title')

@endsection
@section('content')

    <section class="trd-page-header" style="background: url({{ asset(str_replace('public', 'storage', $post->picture)) }});
    background-repeat:no-repeat;
    background-position:center;
    background-size:cover;
    ">
        <div class="container">
            <div class="row">
                <h1 class="trd-page-title"></h1>
            </div>
        </div>
    </section>
    <!-- PAGE HEADER END -->

    <!-- PAGE CONTENTS -->
    <section class="trd-page-contents-wrapper">
        <div class="container">
            <div class="row">

                <!-- Page Contents -->
                <div class="trd-page-contents col-md-12 col-sm-12 col-xs-12">

                    <!-- Post title -->

                    <!-- End -->
                    <div class="trd-post-header-meta">
                        <h1 class="trd-post-title">{{$post->title}}</h1>
                        <ul class="trd-post-meta">
                            <li class="trd-post-date">{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</li>
                            <li class="trd-author-link"><a href="#">{{$post->author}}</a></li>
                        </ul>
                    </div>

                    <!-- Featured Image -->

                    <!-- End  -->

                    <!-- Post Details -->
                    <div class="trd-post-details trd trd-inner-section">
                        <p>
                         {{$post->content}}
                        </p>




                    </div>

                    <!-- END -->

                    <!-- COMMENTS -->

                    <!-- END -->

                    <!-- COMMENTS FORM -->

                    <!-- END -->
                </div>
                <!-- End -->
            </div>
        </div>
    </section>


@endsection
