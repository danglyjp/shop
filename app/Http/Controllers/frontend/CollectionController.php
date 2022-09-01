<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CollectionController extends Controller
{
    protected $categories;

    public function __construct()
    {
        $this->categories = Category::where(['is_active'=>1])->get();
        view::share('categories',$this->categories);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // lay san pham theo danh muc. co 1 danh muc
        //$product = Product::where('category_id', $category->id)->where('is_active',1)->get();
        $category = Category::where('slug', $slug)->where('is_active',1)->first();
        //dd($category);

        //$retVal = ($collection == null) ? dd(404); : $collection ;

        // if ($collections == null) {
        //     dd(404);
        // }
        //$category = Category::where(['is_active'=>1])->get();

        $ids[] = $category->id; // khai bao mang chua cac ma danh muc can tim kiem chua ca san pham
        //$child_categories = []; // luu danh muc con

        foreach ($this->categories as $key => $child) {
            if ($child->perent_id == $category->id) {
                $ids[] = $child->id;

                foreach ($this->categories as $key => $sub_child) {
                    if ($sub_child->perent_id == $child->id) {
                        $ids[] = $child->id;
                    }
                }
                $child_categories[] = $child;
            }
        }

        //can viet de quy

        // step 2 : lay list san pham theo the loai
        $products = Product::where('is_active', 1)->whereIn('category_id', $ids)->latest()->paginate(9);


         //return view('frontend.page.collection',['category' => $category]);
         return view('frontend.page.collection',['category' => $category,'products'=>$products]);
    }
}
