<header class="version_1">
    <div class="layer"></div><!-- Mobile menu overlay mask -->
    <div class="main_header">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
                    <div id="logo">
                        <a href="{{ config('app.url') }}"><img src="{{url($setting->image)}}" alt="" width="100" height="35"></a>
                    </div>
                </div>
                <nav class="col-xl-6 col-lg-7">
                    <a class="open_close" href="javascript:void(0);">
                        <div class="hamburger hamburger--spin">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                    </a>
                    <!-- Mobile menu button -->
                    <div class="main-menu">
                        <div id="header_menu">
                            <a href="index.html"><img src="{{url('frontend')}}/img/logo_black.svg" alt="" width="100" height="35"></a>
                            <a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
                        </div>
                        <ul>
                            <li>
                                <a href="/">{{ __('home') }}</a>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">{{ __('home') }}</a>
                                <ul>
                                    <li><a href="/login">Đăng ký tài khoản</a></li>
                                    <li><a href="/track-order">Track Oders</a></li>
                                    <li><a href="{{route('article')}}">Danh sách bài viết</a></li>
                                    <li><a href="/">Chi bài viết</a></li>
                                    <li><a href="/404">404 Page</a></li>
                                    <li><a href="/confirm">confirm</a></li>
                                    <li><a href="{{route('cart.index')}}">Giỏ hàng</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{route('article')}}">{{ __('article') }}</a>
                            </li>
                        </ul>
                    </div>
                    <!--/main-menu -->
                </nav>
                {{-- <div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-right">
                    <a class="phone_top" href="tel://9438843343"><strong><span>Need Help?</span>+94 423-23-221</strong></a>
                </div> --}}
                <style>
                .styled-select.lang-selector 
                {
                    background-color: white;
                    width: auto;
                }
                .styled-select select 
                {
                color: #333 !important;
                }
                </style>
                <div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-right">
                    <div class="styled-select lang-selector">
                        <select onchange="changeLanguage(this.value)" title="Change language">
                            <option {{session()->has('locale')?(session()->get('locale')=='en'?'selected':''):''}} value="en">English</option>
                            <option {{session()->has('locale')?(session()->get('locale')=='ja'?'selected':''):''}} value="ja">日本語</option>
                            <option {{session()->has('locale')?(session()->get('locale')=='vi'?'selected':''):''}} value="vi">Tiếng Việt</option>
                        </select>
                        @push('scripts')
                        <script>
                            function changeLanguage(lang){
                                window.location='{{ url('lang') }}/'+lang;
                            }
                            </script>
                        @endpush
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /main_header -->

    <div class="main_nav Sticky">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <nav class="categories">
                        <ul class="clearfix">
                            <li><span>
                                    <a href="#">
                                        <span class="hamburger hamburger--spin">
                                            <span class="hamburger-box">
                                                <span class="hamburger-inner"></span>
                                            </span>
                                        </span>
                                    {{ __('category') }}
                                    </a>
                                </span>
                                <div id="menu">
                                    <ul>
                                        @foreach ($categoryList as $item)
                                        @if ($item->parent_id == 0)
                                        <li><span><a href="{{ route('collections',['slug'=>$item->slug]) }}">{{ $item->name }}</a></span>
                                        </li>
                                        @endif
                                        @endforeach
                                        {{-- <li><span><a href="#0">Collections</a></span>
                                            <ul>
                                                <li><a href="listing-grid-1-full.html">Trending</a></li>
                                                <li><a href="listing-grid-2-full.html">Life style</a></li>
                                                <li><a href="listing-grid-3.html">Running</a></li>
                                                <li><a href="listing-grid-4-sidebar-left.html">Training</a></li>
                                                <li><a href="listing-grid-5-sidebar-right.html">View all Collections</a></li>
                                            </ul>
                                        </li>
                                        <li><span><a href="#">Men</a></span>
                                            <ul>
                                                <li><a href="listing-grid-6-sidebar-left.html">Offers</a></li>
                                                <li><a href="listing-grid-7-sidebar-right.html">Shoes</a></li>
                                                <li><a href="listing-row-1-sidebar-left.html">Clothing</a></li>
                                                <li><a href="listing-row-3-sidebar-left.html">Accessories</a></li>
                                                <li><a href="listing-row-4-sidebar-extended.html">Equipment</a></li>
                                            </ul>
                                        </li>
                                        <li><span><a href="#">Women</a></span>
                                            <ul>
                                                <li><a href="listing-grid-1-full.html">Best Sellers</a></li>
                                                <li><a href="listing-grid-2-full.html">Clothing</a></li>
                                                <li><a href="listing-grid-3.html">Accessories</a></li>
                                                <li><a href="listing-grid-4-sidebar-left.html">Shoes</a></li>
                                            </ul>
                                        </li>
                                        <li><span><a href="#">Boys</a></span>
                                            <ul>
                                                <li><a href="listing-grid-6-sidebar-left.html">Easy On Shoes</a></li>
                                                <li><a href="listing-grid-7-sidebar-right.html">Clothing</a></li>
                                                <li><a href="listing-row-3-sidebar-left.html">Must Have</a></li>
                                                <li><a href="listing-row-4-sidebar-extended.html">All Boys</a></li>
                                            </ul>
                                        </li>
                                        <li><span><a href="#">Girls</a></span>
                                            <ul>
                                                <li><a href="listing-grid-1-full.html">New Releases</a></li>
                                                <li><a href="listing-grid-2-full.html">Clothing</a></li>
                                                <li><a href="listing-grid-3.html">Sale</a></li>
                                                <li><a href="listing-grid-4-sidebar-left.html">Best Sellers</a></li>
                                            </ul>
                                        </li>
                                        <li><span><a href="#">Customize</a></span>
                                            <ul>
                                                <li><a href="listing-row-1-sidebar-left.html">For Men</a></li>
                                                <li><a href="listing-row-2-sidebar-right.html">For Women</a></li>
                                                <li><a href="listing-row-4-sidebar-extended.html">For Boys</a></li>
                                                <li><a href="listing-grid-1-full.html">For Girls</a></li>
                                            </ul>
                                        </li> --}}
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
                    <form action="{{ route('search') }}" method="get">
                    <div class="custom-search-input">
                        <input name="keyword" type="text" placeholder="{{ __('product seach') }}">
                        <button type="submit"><i class="header-icon_search_custom"></i></button>
                    </div>
                    </form>
                </div>
                <div class="col-xl-3 col-lg-2 col-md-3">
                    <ul class="top_tools">
                        <li>
                            <div onclick="location.href='{{route('cart.index')}}';" class="dropdown dropdown-cart">
                                <a href="{{route('cart.index')}}" class="cart_bt"><strong>2</strong></a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li>
                                            <a href="product-detail-1.html">
                                                <figure><img src="{{url('frontend')}}/img/products/product_placeholder_square_small.jpg" data-src="{{url('frontend')}}/img/products/shoes/thumb/1.jpg" alt="" width="50" height="50" class="lazy"></figure>
                                                <strong><span>1x Armor Air x Fear</span>$90.00</strong>
                                            </a>
                                            <a href="#0" class="action"><i class="ti-trash"></i></a>
                                        </li>
                                        <li>
                                            <a href="product-detail-1.html">
                                                <figure><img src="{{url('frontend')}}/img/products/product_placeholder_square_small.jpg" data-src="{{url('frontend')}}/img/products/shoes/thumb/2.jpg" alt="" width="50" height="50" class="lazy"></figure>
                                                <strong><span>1x Armor Okwahn II</span>$110.00</strong>
                                            </a>
                                            <a href="0" class="action"><i class="ti-trash"></i></a>
                                        </li>
                                    </ul>
                                    <div class="total_drop">
                                        <div class="clearfix"><strong>Total</strong><span>$200.00</span></div>
                                        <a href="{{route('cart.index')}}" class="btn_1 outline">View Cart</a><a href="{{route('checkout.index')}}" class="btn_1">Checkout</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /dropdown-cart-->
                        </li>
                        <li>
                            <a href="#0" class="wishlist"><span>{{ __('wishlist') }}</span></a>
                        </li>
                        <li>
                            @if (Route::has('login'))
                                @auth
                                <div class="dropdown dropdown-access">
                                <a href="account.html" class="access_link"><span>Account</span></a>
                                <div class="dropdown-menu">
                                    <a href="account.html" class="btn_1">Sign In or Sign Up</a>
                                    <ul>
                                        <li>
                                            <a href="track-order.html"><i class="ti-truck"></i>Track your Order</a>
                                        </li>
                                        <li>
                                            <a href="account.html"><i class="ti-package"></i>My Orders</a>
                                        </li>
                                        <li>
                                            <a href="account.html"><i class="ti-user"></i>My Profile</a>
                                        </li>
                                        <li>
                                            <a href="help.html"><i class="ti-help-alt"></i>Help and Faq</a>
                                        </li>
                                    </ul>
                                </div>
                                </div>
                             <!-- /dropdown-access-->
                                @endauth
            
                            @endif
                            <a href="#sign-in-dialog" id="sign-in" class="access_link"><span>{{ __('account') }}</span></a>

                        </li>
                        <li>
                            <a href="javascript:void(0);" class="btn_search_mob"><span>{{ __('search') }}</span></a>
                        </li>
                        <li>
                            <a href="#menu" class="btn_cat_mob">
                                <div class="hamburger hamburger--spin" id="hamburger">
                                    <div class="hamburger-box">
                                        <div class="hamburger-inner"></div>
                                    </div>
                                </div>
                                {{ __('category') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <div class="search_mob_wp">
            <input type="text" class="form-control" placeholder="Search over 10.000 products">
            <input type="submit" class="btn_1 full-width" value="Search">
        </div>
        <!-- /search_mobile -->
    </div>
    <!-- /main_nav -->
</header>