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

        $blogs_count = Blog::count();

         // Return the response
        return view('dashboard::dashboard', compact(

            'blogs_count',

        ));
    }
}
