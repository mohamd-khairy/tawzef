<?php

namespace Modules\Ads\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Ads\Http\Controllers\Actions\SearchAdsQueryAction;
use Modules\Ads\Http\Controllers\Actions\CreateAdAction;
use Modules\Ads\Http\Controllers\Actions\DeleteAdAction;
use Modules\Ads\Http\Controllers\Actions\GetAdsAction;
use Modules\Ads\Http\Controllers\Actions\UpdateAdAction;
use Modules\Ads\Http\Requests\CreateAdRequest;
use Modules\Ads\Http\Requests\DeleteAdRequest;
use Modules\Ads\Http\Requests\GetAdsRequest;
use Modules\Ads\Http\Requests\UpdateAdRequest;
use Modules\Ads\Http\Resources\AdResource;
use Modules\Ads\Ad;
use App\Http\Helpers\ServiceResponse;
use App\Http\Resources\MediaResource;
use Carbon\Carbon;
use Auth, Lang;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
use Yajra\Datatables\Datatables;
use App\Language;

class AdsController extends Controller
{
    /**
     * Store Ad
     *
     * @param  [array] translations
     * @param  [boolean] is_featured
     * @param  [date] start_date
     * @param  [date] end_date
     * @return [json] ServiceResponse object
     */
    public function store(CreateAdRequest $request, CreateAdAction $action)
    {
        // Create the Ad
        $ad = $action->execute($request->except(['attachments']));

        // Return the response
        $resp = new ServiceResponse;
        $resp->message = 'Ad created successfully';
        $resp->status = true;
        $resp->data = ['redirect_to' => route('ads.index'), 'ad' => $ad];

        return response()->json($resp, 200);
    }
    /**
     * Update Ad
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
        // Update the Ad
        $ad = $action->execute($request->input('id'), $request->except(['id']));

        // Return the response
        $resp = new ServiceResponse;
        $resp->message = 'Ad updated successfully';
        $resp->status = true;
        $resp->data = $ad;

        return response()->json($resp, 200);
    }
    /**
     * Delete Ad
     *
     * @param  [integer] id
     * @return [json] ServiceResponse object
     */
    public function delete(DeleteAdRequest $request, DeleteAdAction $action)
    {
        // Delete the Ad
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
    public function index(Request $request)
    {
        // Auth user
        $auth_user = Auth::user();

        if ($request->isMethod('POST')) {

            // Search the Ads
            $action = new SearchAdsQueryAction;
            $ads = $action->execute($auth_user, $request);

            return Datatables::of($ads)
                ->addColumn('created_at', function ($ad) {
                    return $ad->created_at->toDateTimeString();
                })
                ->addColumn('last_updated_at', function ($ad) {
                    return $ad->updated_at->toDateTimeString();
                })
                ->orderColumn('created_at', function ($query, $order) {
                    return  $query->orderBy('created_at', $order);
                })
                ->orderColumn('last_updated_at', function ($query, $order) {
                    return  $query->orderBy('updated_at', $order);
                })
                ->make(true);
        } else {
            $blade_name = ($request->ajax() ? 'index-partial' : 'index'); // Handle Partial Return
            $ads_count = Ad::count();
            return view('ads::ads.' . $blade_name,compact('ads_count'));
        }
    }

    /**
     * Create Ad
     * @return Response
     */
    public function create(Request $request)
    {
        // Auth user
        $auth_user = Auth::user();

        // Get the languages
        $languages = Language::all();

        $blade_name = ($request->ajax() ? 'create-partial' : 'create'); // Handle Partial Return

        return view('ads::ads.' . $blade_name, compact('languages'), []);
    }

    public function createAdModal(Request $request)
    {
        // Auth user
        $auth_user = Auth::user();

        return view('ads::ads.modals.create', [])->render();
    }

    public function UpdateAdModal(Request $request, $id = null)
    {
        // Auth user
        $auth_user = Auth::user();

        $ad = Ad::find($id);

        // If Ad does not exist, return error div
        if (!$ad) {
            $error = Lang::get('ads::ad.Ad_not_found_or_you_are_not_authorized_to_edit_the_Ad');

            return view('dashboard.components.error', compact('error'))->render();
        }
        // Get the languages
        $languages = Language::all();

        return view('ads::ads.modals.update', compact('ad', 'languages'), [])->render();
    }
}
