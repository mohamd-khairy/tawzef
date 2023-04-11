<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Careers\Career;
use Modules\Careers\Http\Controllers\Actions\GetCareerByIdAction;
use Modules\Careers\Http\Controllers\Actions\GetCareersAction;
use Modules\Careers\Http\Controllers\Actions\GetCareersFrontAction;
use Modules\Categories\Category;

class CareersController extends Controller
{
    public function features()
    {
        return [];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $careers = Career::all();

        $features = $this->features();
        $features['careers'] = $careers;

        return view('front.pages.jobs', $features);
    }

    public function categories()
    {
        $categories = Category::all();

        $features = $this->features();
        $features['categories'] = $categories;

        return view('front.pages.categories', $features);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, GetCareerByIdAction $action)
    {
        // Get career
        $career = $action->execute($id);

        if (!$career) {
            abort(404);
        } else {
            $career = json_decode(json_encode($career));
        }

        $features = $this->features();
        $features['career'] = $career;

        return view('front.pages.job', $features);
    }
}
