@extends('frontend.layouts.master')
@section('head')
<link href="{{url('frontend')}}/css/cart.css" rel="stylesheet">
<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

input[type=number] {
  -moz-appearance: textfield;
}
.item_cart {
    margin: 18px 0 0 10px;
    color: black;
}
</style>
@endsection

@section('title','Giỏ hàng')
@section('description')
@endsection

@section('main')
<main class="bg_gray">
    <div class="container margin_30">
    <div class="page_header">
        <div class="breadcrumbs">
            <ul>
                <li><a href="/">{{ __('home') }}</a></li>
                <li>{{ __('cart') }}</li>
            </ul>
        </div>
    </div>
    @if(count($listCart) > 0 )

    <!-- /page_header -->
    <table class="table table-striped cart-list">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listCart  as $item)
                            <?php $attribute = $item->attributes; 
                            //dd($listCart);
                            ?>
                            <tr id="cart-item-{{ $item->id }}">
                                <td>
                                    <div class="thumb_cart">
                                        <img src="{{ asset($attribute['img'])}}" data-src="{{ asset($attribute['img'])}}" class="lazy" alt="Image">
                                    </div>
                                    <a href="{{ route('products.detail',['slug' => $item->associatedModel->slug ] ) }}">
                                    <span class="item_cart">{{ $item->name }}</span>
                                    </a>
                                </td>
                                <td>
                                    <strong>{{ number_format($item->price) }} VND</strong>
                                </td>
                                <td>
                                    <div class="numbers-row">
                                        <input type="number" value="{{ $item->quantity }}" class="qty2" name="quantity_1">
                                    <div class="inc button_inc">+</div><div class="dec button_inc">-</div></div>
                                </td>
                                <td class="price">
                                    <strong>{{ number_format($item->quantity * $item->price) }} VND</strong>
                                </td>
                                <td class="options">
                                    <a href="javascript:void(0);" class="cart-delete" data-id="{{ $item->id }}"><i class="ti-trash"></i></a>
                                    {{-- <a href="{{ route('cart.delete',['id' => $item->id]) }}" class="cart-delete" data-id="{{ $item->id }}"><i class="ti-trash"></i></a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="row add_top_30 flex-sm-row-reverse cart_actions">
                    <div class="col-sm-4 text-right">
                        <a href="/" type="button" class="btn_1 gray">Quay về trang chủ</a>
                        <button type="button" class="btn_1 gray">Update Cart</button>
                    </div>
                        <div class="col-sm-8">
                        <div class="apply-coupon">
                            <div class="form-group form-inline">
                                <input type="text" name="coupon-code" value="" placeholder="Promo code" class="form-control"><button type="button" class="btn_1 outline">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /cart_actions -->

    </div>
    <!-- /container -->
    
    <div class="box_cart">
        <div class="container">
        <div class="row justify-content-end">
            <div class="col-xl-4 col-lg-4 col-md-6">
        <ul>
            <li>
                <span>Thành tiền</span> {{ number_format($total_1) }} VND
            </li>
            <li>
                <span>Phí Ship</span> $7.00
            </li>
            <li>
                <span>Tổng tiền</span> $247.00
            </li>
        </ul>
        <a href="cart-2.html" class="btn_1 full-width cart">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /box_cart -->

    @push('scripts')
        <script>
            $('.cart-delete').click(function (e) { 
                e.preventDefault();
                const id = $(this).attr('data-id');
                // alert(id);
                $.ajax({
                    type: 'delete',
                    url: 'cart/delete/'+id,
                    data: {
                        id:id,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: function (response) {
                        $('#cart-item-'+id).remove();
                    },
                    error: function (res) {
                        alert(res);
                    }
                });
            });
        </script>
    @endpush

    @else
    <h3 class="text-center">{{ __('there are no products in the cart') }}</h3>
    <div class="text-center">
        <a href="/" type="button" class="btn_1 gray">{{ __('back to home page') }}</a>
    </div>
    @endif
</main>
@endsection

@section('js')

@endsection