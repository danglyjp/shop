<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
   // protected $product;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCart = \Cart::getContent();
        $total_1 = \Cart::getTotal();
        return view('frontend.page.cart',['listCart'=>$listCart,'total_1'=>$total_1]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=null)
    {
        if ($id != null) {
            \Cart::remove($id);
        }
        //return redirect()->route('cart.index');
        return response()->json();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCart($id)
    {
        $product = Product::find($id);
        // print_r($product);
        // die();
        //'slug' => $product->slug
        $cartItem = array(
            'id' => $id, // inique row ID
            'name' => $product->name,
            'price' => $product->sale,
            'quantity' => 1,
            'attributes' => array('img'=> $product->image),
            'associatedModel' => $product,
        );

        \Cart::add($cartItem);

        return redirect()->route('cart.index');
    }

}
