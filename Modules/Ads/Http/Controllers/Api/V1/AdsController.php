<?php

namespace Modules\Ads\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Ads\Http\Controllers\Actions\CreateAdAction;
use Modules\Ads\Http\Controllers\Actions\DeleteAdAction;
use Modules\Ads\Http\Controllers\Actions\GetAdsAction;
use Modules\Ads\Http\Controllers\Actions\UpdateAdAction;
use Modules\Ads\Http\Requests\CreateAdRequest;
use Modules\Ads\Http\Requests\DeleteAdRequest;
use Modules\Ads\Http\Requests\UpdateAdRequest;
use App\Http\Helpers\ServiceResponse;

class AdsController extends Controller
{
    /**
     * Store ad
     *
     * @param  [array] translations 
     * @param  [date] start_date
     * @param  [date] end_date
     * @param  [boolean] is_featured
     * @return [json] ServiceResponse object
     */
    public function store(CreateAdRequest $request, CreateAdAction $action)
    {
        // Create the ad
        $ad = $action->execute($request->all());

        // Return the response
        $resp = new ServiceResponse;
        $resp->message = 'Ad created successfully';
        $resp->status = true;
        $resp->data = $ad;

        return response()->json($resp, 200);
    }

    /**
     * Update ad
     *
     * @param  [integer] id
     * @param  [array] translations 
     * @param  [boolean] is_featured
     * @param  [date] start_date
     * @param  [date] end_date
     * @return [json] ServiceResponse object
     */
    public function update(UpdateAdRequest $request, UpdateAdAction $action)
    {
        // Update the ad
        $ad = $action->execute($request->input('id'), $request->except(['id', 'attachments']), $request->attachments);

        // Return the response
        $resp = new ServiceResponse;
        $resp->message = 'Ad updated successfully';
        $resp->status = true;
        $resp->data = $ad;

        return response()->json($resp, 200);
    }

    /**
     * Delete ad
     *
     * @param  [integer] id
     * @return [json] ServiceResponse object
     */
    public function delete(DeleteAdRequest $request, DeleteAdAction $action)
    {
        // Delete the ad
        $action->execute($request->input('id'));

        // Return the response
        $resp = new ServiceResponse;
        $resp->message = 'Ad deleted successfully';
        $resp->status = true;
        $resp->data = null;

        return response()->json($resp, 200);
    }

    /**
     * Index Ads
     * @return Response
     */
    public function index(Request $request, GetAdsAction $action)
    {
        // Get Ads
        $ads = $action->execute();

        // Return the response
        $resp = new ServiceResponse;
        $resp->message = 'Ads retrieved successfully';
        $resp->status = true;
        $resp->data = $ads;

        return response()->json($resp, 200);
    }
}
