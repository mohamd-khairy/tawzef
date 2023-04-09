<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Products\Product;
use Modules\Settings\MainSlider;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = MainSlider::all();
        return view('front.pages.home',compact('sliders'));
    }

    public function get_products_ajax(Request $request)
    {
       $products = Product::where(['category_id'=>$request->category_id,'brand_id' => $request->brand_id])->take(8)->get();
       $category_id=$request->category_id;
       $brand_id = $request->brand_id;

       return view('front.partials.home.brands-ajax',compact('products','category_id','brand_id'))->render();
    }
}
