@extends('frontend.layouts.master')
@section('head')
<link href="{{url('frontend')}}/css/home_1.css" rel="stylesheet">
@endsection


@section('title','Home Page')
@section('description')

@endsection

@section('main')

<main>
    @include('frontend.home.slider')
    <!--/carousel-->

    @include('frontend.home.banner')
    <!--/banners_grid -->
    
    @include('frontend.home.top-selling')
    <!-- /container -->

    @include('frontend.home.featured')
    <!-- /featured -->

    <!-- /container -->
    
    @include('frontend.home.logo-slide')
    <!-- /bg_gray -->

    @include('frontend.home.article')
    <!-- /container -->
</main>
<!-- /main -->
@endsection