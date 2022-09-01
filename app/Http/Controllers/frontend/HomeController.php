<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Product;
use App\Models\Banner;

class HomeController extends Controller
{
    protected $categories;

    public function __construct()
    {
        // $setting = Setting::first();
        // View::share('setting',$setting);
        
        $this->categories = Category::where(['is_active'=>1])->get();
        View::share('categories',$this->categories);

        $latestItem = Product::latest()->limit(8)->get();
        View::share('latestItem',$latestItem);

        $categoryItem = Category::latest()->orderBy('id','DESC')->limit(3)->get();
        View::share('categoryItem',$categoryItem);

        $bannerItem = Banner::where(['is_active'=>1])->orderBy('id')->get();
        View::share('bannerItem',$bannerItem);


        // front page
        $list = []; // chua danh sach san pham theo danh muc

        foreach($this->categories as $key => $parent) {
            if($parent->parent_id == 0){ // check danh muc cha
                $ids = [] ; // tao chua cac id cua danh cha t danh muc con truc thugc
                $ids[] = $parent->id; // id danh muc cha

                foreach($this->categories as $child) {
                    if ($child->parent_id == $parent->id) {
                        $ids[] = $child->id; // them phan tu vao mang
                        // ids = [1,7,8,9, .. ]
                    }
                }
                $list[$key]['category'] = $parent; // dien thoai, table

                // SELECT * FROM'products' WHERE is_active = 1 AND is_hot = 0 AND category_id 
                $list[$key]['products'] = Product::where(['is_active'=> 1, 'is_hot' => 0])
                                                    ->whereIn('category_id',$ids)
                                                    ->limit(8)
                                                    ->orderBy('id', 'desc')
                                                    ->get();
            }
        }
        View::share('list',$list);
        //dd($list);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('frontend.home.index');
        //dd($latestitem);
        //return view('frontend.home.index',['setting' => $setting]);
    }
    public function latestItem()
    {
        // $latestItem = Product::offset(0)->limit(8)->get();

        // return view('frontend.home.top-selling',['latestItem' => $latestItem]);

        // dd($latestItem);
        //return view('frontend.home.index',['setting' => $setting]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bannerCategory()
    {
        $bannerCategory = Category::all();
        return view('frontend.home.banner', ['bannerCategory' => $bannerCategory]);
        //dd($bannerCategory);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function frontpageProductShow()
    {

        // lay san pham theo danh muc. co 1 danh muc
        //$category = Category::where('slug',$slug)->where('is_active',1)->get();

        // $products = [];

        // $ids[] = $category->id; // khai bao mang
        // //$child_categories = []; // luu danh muc con

        // foreach ($this->$categories as $child) {
        //     if ($child->perent_id == $category->id) {
        //         $ids[] = $child->id;
            
        //         foreach($this->$categories as $sub_child)
        //         {
        //             if($sub_child->perent_id == $child->id)
        //             {
        //                 $ids[] = $child->id;
        //             }
        //         }

        //     }
        // }


        //     // step 2 : lay list san pham theo the loai
        //     $products = Product::where('is_active', 1)
        //                             ->whereIn('category_id', $ids)
        //                             ->latest()
        //                             ->limit(8);
        //     // Lay san pham theo danh muc
        //     $products = Product::where('category_id', $category->id)->where('is_active', 1)->get();

            $list = []; // chua danh sach san pham theo danh muc

            foreach($this->categories as $key => $parent) {
                if($parent->parent_id == 0){ // check danh muc cha
                    $ids = [] ; // tao chua cac id cua danh cha t danh muc con truc thugc
                    $ids[] = $parent->id; // id danh muc cha

                    foreach($this->categories as $child) {
                        if ($child->parent_id == $parent->id) {
                            $ids[] = $child->id; // them phan tu vao mang
                            // ids = [1,7,8,9, .. ]
                        }
                    }
                    $list[$key]['category'] = $parent; // dien thoai, table

                    // SELECT * FROM'products' WHERE is_active = 1 AND is_hot = 0 AND category_id 
                    $list[$key]['products'] = Product::where(['is_active'=> 1, 'is_hot' => 0])
                                                        ->whereIn('category_id',$ids)
                                                        ->limit(8)
                                                        ->orderBy('id', 'desc')
                                                        ->get();
                }
            }
 
         return view('frontend.home.featured',['list'=>$list]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeLanguage($locale)
    {
        if (!in_array($locale, ['en', 'ja', 'vi'])) {
            abort(404);
        }

         \Session::put('locale', $locale);
         return redirect()->back();
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //dd($request->all());
        $keyword = $request->input('keyword');
        $slug = Str::slug($keyword);

        $products = Product::where([
            ['slug','like','%'.$slug.'%'],
            ['is_active','=',1]
        ])->orderByDesc('id')->paginate(3);

        $tmp = Product::search($keyword)->toArray();

        $totalResult = $products->total();

        return view('frontend.page.search',[
            'products' => $products,
            'totalResult' => $totalResult,
            'keyword'=> $keyword ? $keyword : ''
        ]);

    }

}
