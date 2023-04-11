<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Actions\Groups\GetGroupsAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Careers\Career;
use Modules\Categories\Category;
use Modules\Products\Product;
use Modules\Settings\MainSlider;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = MainSlider::all();
        $categories = Category::take(8)->get();
        $careers = Career::take(8)->get();

        return view('front.pages.home',compact('sliders','categories','careers'));
    }

    public function login()
    {
        // Get Groups
        $action =  new GetGroupsAction;
        $groups = json_decode(json_encode($action->execute()));

        return view('front.pages.login', compact('groups'));
    }

}
