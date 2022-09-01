<div id="carousel-home">
    <div class="owl-carousel owl-theme">
        {{-- <div class="owl-slide cover" style="background-image: url(frontend/img/slides/slide_home_2.jpg);">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-end">
                        <div class="col-lg-6 static">
                            <div class="slide-text text-right white">
                                <h2 class="owl-slide-animated owl-slide-title">Attack Air<br>Max 720 Sage Low</h2>
                                <p class="owl-slide-animated owl-slide-subtitle">
                                    Limited items available at this price
                                </p>
                                <div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/owl-slide-->
        <div class="owl-slide cover" style="background-image: url(frontend/img/slides/slide_home_1.jpg);">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-start">
                        <div class="col-lg-6 static">
                            <div class="slide-text white">
                                <h2 class="owl-slide-animated owl-slide-title">Attack Air<br>VaporMax Flyknit 3</h2>
                                <p class="owl-slide-animated owl-slide-subtitle">
                                    Limited items available at this price
                                </p>
                                <div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/owl-slide--> --}}
        @foreach($bannerItem as $key => $item)
        <div class="owl-slide cover" style="background-image: url({{ asset($item->image) }});">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(255, 255, 255, 0.5)">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-start">
                        <div class="col-lg-12 static">
                            <div class="slide-text text-center black">
                                <h2 class="owl-slide-animated owl-slide-title">{{ $item->title }}</h2>
                                <p class="owl-slide-animated owl-slide-subtitle">
                                    {!! $item->description !!}
                                </p>
                                <div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="{{ $item->url }}" role="button">{{ __('click here') }}</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/owl-slide-->
        </div>
        @endforeach
    </div>
    <div id="icon_drag_mobile"></div>
</div>