<?php

namespace Modules\Categories\Http\Controllers\Api\V1;

use App\Http\Helpers\ServiceResponse;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Ads\Http\Controllers\Actions\GetAdsAction;
use Modules\Categories\Http\Controllers\Actions\CreateCatAction;
use Modules\Categories\Http\Controllers\Actions\DeleteCatAction;
use Modules\Categories\Http\Controllers\Actions\GetCatsAction;
use Modules\Categories\Http\Controllers\Actions\UpdateCatAction;
use Modules\Categories\Http\Requests\CreateCatRequest;
use Modules\Categories\Http\Requests\DeleteCatRequest;
use Modules\Categories\Http\Requests\UpdateCatRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request, GetCatsAction $action)

    {
        // Get Cats
        $cats = $action->execute();

        // Return the response
        $resp = new ServiceResponse;
        $resp->message = 'Categories retrieved successfully';
        $resp->status = true;
        $resp->data = $cats;

        return response()->json($resp, 200);
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateCatRequest $request, CreateCatAction $action)
    {
        // Create the Cat
        $cat = $action->execute($request->except(['attachments']));

        // Return the response
        $resp = new ServiceResponse;
        $resp->message = 'Category created successfully';
        $resp->status = true;
        $resp->data = $cat;

        return response()->json($resp, 200);
    }




    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateCatRequest $request, UpdateCatAction $action)
    {
        // Update the Cat
        $cat = $action->execute($request->input('id'), $request->except(['id']));

        // Return the response
        $resp = new ServiceResponse;
        $resp->message = 'Category updated successfully';
        $resp->status = true;
        $resp->data = $cat;

        return response()->json($resp, 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete(DeleteCatRequest $request, DeleteCatAction $action)
    {
        // Delete the Cat
        $action->execute($request->input('id'));

        // Return the response
        $resp = new ServiceResponse;
        $resp->message = 'Category deleted successfully';
        $resp->status = true;
        $resp->data = null;
        return response()->json($resp, 200);
    }
}
