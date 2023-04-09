<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Actions\Groups\GetGroupsAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Modules\Internationalizations\Http\Controllers\Actions\Currencies\AllCurrencyCodesAction;
use Modules\Inventory\Http\Controllers\Actions\Amenities\GetIAmenitiesAction;
use Modules\Inventory\Http\Controllers\Actions\AreaUnits\GetIAreaUnitsAction;
use Modules\Inventory\Http\Controllers\Actions\Bathrooms\GetIBathroomsAction;
use Modules\Inventory\Http\Controllers\Actions\Bedrooms\GetIBedroomsAction;
use Modules\Inventory\Http\Controllers\Actions\DesignTypes\GetIDesignTypesAction;
use Modules\Inventory\Http\Controllers\Actions\Facilities\GetIFacilitiesAction;
use Modules\Inventory\Http\Controllers\Actions\Favorites\GetIFavoritesAction;
use Modules\Inventory\Http\Controllers\Actions\FinishingTypes\GetIFinishingTypesAction;
use Modules\Inventory\Http\Controllers\Actions\FloorNumbers\GetIFloorNumbersAction;
use Modules\Inventory\Http\Controllers\Actions\FurnishingStatuses\GetIFurnishingStatusesAction;
use Modules\Inventory\Http\Controllers\Actions\OfferingTypes\GetIOfferingTypesAction;
use Modules\Inventory\Http\Controllers\Actions\PaymentMethods\GetIPaymentMethodsAction;
use Modules\Inventory\Http\Controllers\Actions\Positions\GetIPositionsAction;
use Modules\Inventory\Http\Controllers\Actions\Purposes\GetIPurposesAction;
use Modules\Inventory\Http\Controllers\Actions\PurposeTypes\GetIPurposeTypesAction;
use Modules\Inventory\Http\Controllers\Actions\Views\GetIViewsAction;
use Modules\Locations\Http\Controllers\Actions\GetCountriesAction;
use Modules\Tags\Http\Controllers\Actions\GetTagsAction;
use App\Http\Controllers\Actions\Users\UpdateUserAction;
use App\Http\Requests\Users\UpdateFrontUserRequest;
use Lang;
use App\Http\Helpers\ServiceResponse;
use App\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Services\Http\Controllers\Actions\Services\GetServicesAction;

use function GuzzleHttp\json_decode;

class UsersController extends Controller
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
        $user = new UserResource(auth()->user());

        $action =  new GetGroupsAction;
        $groups = json_decode(json_encode($action->execute()));

        return view('front.pages.profile', compact('user'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('front.pages.dashboard');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myOrders()
    {
        return view('front.pages.myorders');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myChats()
    {
        return view('front.pages.chat');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myUsers()
    {
        $users = User::where('parent_id', auth()->user()->id)->get();
        return view('front.pages.myusers', compact('users'));
    }

    public function offices(Request $request)
    {
        $offices = new User();

        if ($request->service_id) {
            $offices = $offices->whereHas('services', function ($services) use ($request) {
                $services->where('id', $request->service_id);
            });
        }
        if ($request->q) {
            $offices = $offices->where('full_name', 'like', '%' . $request->q . '%');
        }

        $offices = $offices->where('group_id', 4)->whereNotNull('email_verified_at')->paginate(6);

        $services = json_decode(json_encode((new GetServicesAction)->execute()));
        // Transform result
        $offices = UserResource::collection($offices);
        $offices = new LengthAwarePaginator(
            json_decode(json_encode($offices)),
            $offices->total(),
            $offices->perPage(),
            $offices->currentPage(),
            [
                'path' => \Request::url(),
                'query' => [
                    'page' => $offices->currentPage()
                ]
            ]
        );

        if ($request->ajax()) {
            return view('front.partials.offices.offices-ajax', compact('offices'))->render();
        } else {
            return view('front.pages.offices', compact('offices', 'services'));
        }
    }
    /**
     * Update user
     *
     * @param  [string] full_name
     * @param  [file] image
     * @param  [string] username
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @param  [string] mobile_number
     * @return [json] ServiceResponse object
     */
    public function update(UpdateFrontUserRequest $request, UpdateUserAction $action)
    {
        // Append group_id and permissions_user_id to the request
        $request->merge(["group_id" => auth()->user()->group_id]);
        $request->merge(["id" => auth()->user()->id]);
        $request->merge(["permissions_user_id" => auth()->user()->id]);

        // Update the user
        $user = $action->execute($request->input('id'), $request->except(['id', 'permissions_user_id']), $request->input('permissions_user_id'));

        // Transform the user
        $user = json_decode(json_encode(new UserResource($user)));

        // Return the response
        $resp = new ServiceResponse;
        $resp->message = Lang::get('main.profile_updated_successfully');
        $resp->status = true;
        $resp->data = $user;

        return response()->json($resp, 200);
    }
}
