<div class="featured lazy" data-bg="url(frontend/img/featured_home.jpg)">
    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
        <div class="container margin_60">
            <div class="row justify-content-center justify-content-md-start">
                <div class="col-lg-6 wow" data-wow-offset="150">
                    <h3>Armor<br>Air Color 720</h3>
                    <p>Lightweight cushioning and durable support with a Phylon midsole</p>
                    <div class="feat_text_block">
                        <div class="price_box">
                            <span class="new_price">$90.00</span>
                            <span class="old_price">$170.00</span>
                        </div>
                        <a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="container margin_60_35">
        @foreach ($list as $item)
                
        <div class="main_title">
            <h2>{{ $item['category']->name }}</h2>
            <span>Products</span>
            <p>{{ $item['category']->description }}</p>
        </div>
        <div class="owl-carousel owl-theme products_carousel">
            @foreach($item['products'] as $key => $product)
            <div class="item">
                {{-- <div class="grid_item">
                    <span class="ribbon new">New</span>
                    <figure>
                        <a href="product-detail-1.html">
                            <img class="owl-lazy" src="frontend/img/products/product_placeholder_square_medium.jpg" data-src="frontend/img/products/shoes/4.jpg" alt="">
                        </a>
                    </figure>
                    <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                    <a href="product-detail-1.html">
                        <h3>ACG React Terra</h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price">$110.00</span>
                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                    </ul>
                </div> --}}
                <div class="grid_item">
                    <figure>
                        <span class="ribbon off">@php
                            $saving_percentage = round( 100 - ( $product->sale / $product->price * 100 ), 1 ) . '%';
                            echo $saving_percentage;
                        @endphp</span>
                        <a href="{{ route('products.detail',['slug'=> $product->slug ] ) }}">
                            <img class="img-fluid lazy" src="@if($product->image && file_exists(public_path($product->image))){{ asset($product->image) }}@else{{ asset('upload/404.png') }}@endif" data-src="@if($product->image && file_exists(public_path($product->image))){{ asset($product->image) }}@else{{ asset('upload/404.png') }}@endif" data-src="@if($product->image && file_exists(public_path($product->image))){{ asset($product->image) }}@else{{ asset('upload/404.png') }}@endif" data-src="@if($product->image && file_exists(public_path($product->image))){{ asset($product->image) }}@else{{ asset('upload/404.png') }}@endif" alt="">
                            <img class="img-fluid lazy" src="@if($product->image && file_exists(public_path($product->image))){{ asset($product->image) }}@else{{ asset('upload/404.png') }}@endif" data-src="@if($product->image && file_exists(public_path($product->image))){{ asset($product->image) }}@else{{ asset('upload/404.png') }}@endif" data-src="@if($product->image && file_exists(public_path($product->image))){{ asset($product->image) }}@else{{ asset('upload/404.png') }}@endif" data-src="@if($product->image && file_exists(public_path($product->image))){{ asset($product->image) }}@else{{ asset('upload/404.png') }}@endif" alt="">
                        </a>
                    </figure>
                    <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                    <a href="{{ route('products.detail',['slug'=> $product->slug ] ) }}">
                        <h3>{{ $product->title }}</h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price">{{ number_format($product->sale,0,",",".") }} VND</span>
                        <span class="old_price">{{ number_format($product->price,0,",",".") }} VND</span>
                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                        <li><a href="{{ route('cart.add',['id' => $product->id ]) }}" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>

        @endforeach
        <!-- /products_carousel -->
    </div>