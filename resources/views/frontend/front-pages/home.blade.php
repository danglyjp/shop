@extends('frontend.layouts-master.master')
@section('head')
<link href="{{url('frontend')}}/css/home_1.css" rel="stylesheet">
@endsection


@section('title','Home Page')
@section('description')

@endsection

@section('main')

<main>
    @include('frontend.front-pages.slider')
    <!--/carousel-->

    @include('frontend.front-pages.banner')
    <!--/banners_grid -->
    
    @include('frontend.front-pages.top-selling')
    <!-- /container -->

    @include('frontend.front-pages.featured')
    <!-- /featured -->

    <!-- /container -->
    
    @include('frontend.front-pages.logo-slide')
    <!-- /bg_gray -->

    @include('frontend.front-pages.article')
    <!-- /container -->
</main>
<!-- /main -->
@endsection