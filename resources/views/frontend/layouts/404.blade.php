@extends('frontend.layouts-master.master')

@section('head')
<link href="{{url('frontend')}}/css/error_track.css" rel="stylesheet">
@endsection

@section('title','home page')
@section('description')

@endsection

@section('main')
<main class="bg_gray">
    <div id="error_page">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-7 col-lg-9">
                    <img src="{{url('frontend')}}/img/404.svg" alt="" class="img-fluid" width="400" height="212">
                    <p>The page you're looking is not founded!</p>
                    <form>
                        <div class="search_bar">
                            <input type="text" class="form-control" placeholder="What are you looking for?">
                            <input type="submit" value="Search">
                        </div>
                    </form>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /error_page -->
</main>
@endsection