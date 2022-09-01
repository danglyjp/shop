@extends('frontend.layouts.master')

@section('head')
<link href="{{url('frontend')}}/css/blog.css" rel="stylesheet">
@endsection

@section('title','Danh sách Bài viết')
@section('description')

@endsection

@section('main')

<main class="bg_gray">
    <div class="container margin_30">
        <div class="page_header">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Category</a></li>
                    <li>Page active</li>
                </ul>
            </div>
            <h1>Allaia Blog &amp; News</h1>
        </div>
        <!-- /page_header -->
        <div class="row">
            <div class="col-lg-9">
                <div class="widget search_blog d-block d-sm-block d-md-block d-lg-none">
                    <div class="form-group">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search..">
                        <button type="submit"><i class="ti-search"></i><span class="sr-only">Search</span></button>
                    </div>
                </div>
                <!-- /widget -->
                <div class="row">
                    @foreach($article as $key => $item)
                    <div class="col-md-6">
                        <article class="blog">
                            <figure>
                                <a href="{{ route('article.detail',['slug'=> $item->slug ] ) }}"><img src="@if($item->image && file_exists(public_path($item->image))){{ asset($item->image) }}@else{{ asset('upload/404.png') }}@endif" alt="">
                                    <div class="preview"><span>Read more</span></div>
                                </a>
                            </figure>
                            <div class="post_info">
                                <small>{{ date('d/m/Y', strtotime($item->created_at)) }}</small>
                                <h2><a href="{{ route('article.detail',['slug'=> $item->slug ] ) }}">{{ $item->title }}</a></h2>
                                <p>Quodsi sanctus pro eu, ne audire scripserit quo. Vel an enim offendit salutandi, in eos quod omnes epicurei, ex veri qualisque scriptorem mei.</p>
                                <ul>
                                    <li>
                                        <div class="thumb"><img src="{{url('frontend')}}/img/avatar.jpg" alt=""></div> Admin
                                    </li>
                                    <li><i class="ti-comment"></i>20</li>
                                </ul>
                            </div>
                        </article>
                        <!-- /article -->
                    </div>
                    @endforeach
                    <!-- /col -->
                </div>
                <!-- /row -->

                {{ $article->links('frontend.page.custom-pagination') }}
                <!-- /pagination -->

            </div>
            <!-- /col -->

            <aside class="col-lg-3">
                <div class="widget search_blog d-none d-sm-none d-md-none d-lg-block">
                    <div class="form-group">
                        <input type="text" name="search" id="search_blog" class="form-control" placeholder="Search..">
                        <button type="submit"><i class="ti-search"></i><span class="sr-only">Search</span></button>
                    </div>
                </div>
                <!-- /widget -->
                <div class="widget">
                    <div class="widget-title">
                        <h4>Latest Post</h4>
                    </div>
                    <ul class="comments-list">
                        <li>
                            <div class="alignleft">
                                <a href="#0"><img src="{{url('frontend')}}/img/blog-5.jpg" alt=""></a>
                            </div>
                            <small>Category - 11.08.2016</small>
                            <h3><a href="#" title="">Verear qualisque ex minimum...</a></h3>
                        </li>
                        <li>
                            <div class="alignleft">
                                <a href="#0"><img src="{{url('frontend')}}/img/blog-6.jpg" alt=""></a>
                            </div>
                            <small>Category - 11.08.2016</small>
                            <h3><a href="#" title="">Verear qualisque ex minimum...</a></h3>
                        </li>
                        <li>
                            <div class="alignleft">
                                <a href="#0"><img src="{{url('frontend')}}/img/blog-4.jpg" alt=""></a>
                            </div>
                            <small>Category - 11.08.2016</small>
                            <h3><a href="#" title="">Verear qualisque ex minimum...</a></h3>
                        </li>
                    </ul>
                </div>
                <!-- /widget -->
                <div class="widget">
                    <div class="widget-title">
                        <h4>Categories</h4>
                    </div>
                    <ul class="cats">
                        <li><a href="#">Food <span>(12)</span></a></li>
                        <li><a href="#">Places to visit <span>(21)</span></a></li>
                        <li><a href="#">New Places <span>(44)</span></a></li>
                        <li><a href="#">Suggestions and guides <span>(31)</span></a></li>
                    </ul>
                </div>
                <!-- /widget -->
                <div class="widget">
                    <div class="widget-title">
                        <h4>Popular Tags</h4>
                    </div>
                    <div class="tags">
                        <a href="#">Food</a>
                        <a href="#">Bars</a>
                        <a href="#">Cooktails</a>
                        <a href="#">Shops</a>
                        <a href="#">Best Offers</a>
                        <a href="#">Transports</a>
                        <a href="#">Restaurants</a>
                    </div>
                </div>
                <!-- /widget -->
            </aside>
            <!-- /aside -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>
<!--/main-->

@endsection