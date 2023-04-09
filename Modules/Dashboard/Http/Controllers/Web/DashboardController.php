<?php

namespace Modules\Dashboard\Http\Controllers\Web;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Blog\Blog;
use Modules\Informations\Information;
use Modules\Products\Product;
use Modules\Services\Service;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get Active Users Count
        $products_count = Product::count();

        $informations_count = Information::where('ref','info')->count();

        $blogs_count = Blog::count();

        $services_count = Service::count();
         // Return the response
        return view('dashboard::dashboard', compact(
            'products_count',
            'informations_count',
            'blogs_count',
            'services_count',
            
        ));
    }
}
