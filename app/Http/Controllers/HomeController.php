<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Setting;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $setting = Setting::first();
    //     View::share('setting',$setting);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.home.index');
        //return view('frontend.home.index',['setting' => $setting]);
    }

}
