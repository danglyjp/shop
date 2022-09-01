<div class="container margin_60_35">
    <div class="main_title">
        <h2>Top Selling</h2>
        <span>Products</span>
        <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
    </div>
    <div class="row small-gutters">
        @foreach($latestItem as $key => $item)
        <div class="col-6 col-md-4 col-xl-3">
            <div class="grid_item">
                <figure>
                    <span class="ribbon off">-30%</span>
                    <a href="{{ route('products.detail',['slug'=> $item->slug ] ) }}">
                        <img class="img-fluid lazy" src="@if($item->image && file_exists(public_path($item->image))){{ asset($item->image) }}@else{{ asset('upload/404.png') }}@endif" data-src="@if($item->image && file_exists(public_path($item->image))){{ asset($item->image) }}@else{{ asset('upload/404.png') }}@endif" data-src="@if($item->image && file_exists(public_path($item->image))){{ asset($item->image) }}@else{{ asset('upload/404.png') }}@endif" data-src="@if($item->image && file_exists(public_path($item->image))){{ asset($item->image) }}@else{{ asset('upload/404.png') }}@endif" alt="">
                        <img class="img-fluid lazy" src="@if($item->image && file_exists(public_path($item->image))){{ asset($item->image) }}@else{{ asset('upload/404.png') }}@endif" data-src="@if($item->image && file_exists(public_path($item->image))){{ asset($item->image) }}@else{{ asset('upload/404.png') }}@endif" data-src="@if($item->image && file_exists(public_path($item->image))){{ asset($item->image) }}@else{{ asset('upload/404.png') }}@endif" data-src="@if($item->image && file_exists(public_path($item->image))){{ asset($item->image) }}@else{{ asset('upload/404.png') }}@endif" alt="">
                    </a>
                </figure>
                <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                <a href="{{ route('products.detail',['slug'=> $item->slug ] ) }}">
                    <h3>{{ $item->title }}</h3>
                </a>
                <div class="price_box">
                    <span class="new_price">{{ number_format($item->sale,0,",",".") }} VND</span>
                    <span class="old_price">{{ number_format($item->price,0,",",".") }} VND</span>
                </div>
                <ul>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                    <li><a href="{{ route('cart.add',['id' => $item->id]) }}" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                </ul>
            </div>
            <!-- /grid_item -->
        </div>
        @endforeach
        <!-- /col -->
    </div>
    <!-- /row -->
</div>