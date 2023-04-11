<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ServiceResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Modules\Careers\Career;
use Modules\Careers\CareerApply;
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
        }

        $features = $this->features();
        $features['career'] = $career;

        return view('front.pages.job', $features);
    }


    public function apply(Request $request)
    {
        $data = $request->all();
        if($data['resume']){
            $data['resume'] = $data['resume']->store('applications','public');
        }
        $career_apply =  CareerApply::create($data);

        // Return the response
        $resp = new ServiceResponse;
        $resp->message ='Created Successfully';
        $resp->status = true;
        $resp->data = $career_apply;

        return response()->json($resp, 200);
    }
}
