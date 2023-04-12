<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Actions\Groups\GetGroupsAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Actions\Users\UpdateUserAction;
use App\Http\Requests\Users\UpdateFrontUserRequest;
use Lang;
use App\Http\Helpers\ServiceResponse;
use Modules\Careers\Career;
use Modules\Careers\CareerApply;
use Modules\Categories\Category;

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
        if (auth()->user()->group_id == 4) {
            $careers = Career::where('created_by', auth()->user()->id)->get();
        }else{
            $careers = null;
        }
        $categories = Category::all();

        $applications =  new CareerApply();
        if (auth()->user()->group_id == 4) {
            $applications = $applications->whereHas('career', function ($career) {
                $career->where('created_by', auth()->user()->id);
            });
        } elseif (auth()->user()->group_id == 5) {
            $applications = $applications->where('applied_by', auth()->user()->id);
        }

        $applications = $applications->with('career')->get();

        return view('front.pages.profile', compact('user', 'careers', 'categories', 'applications'));
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
        // Check if auth user matches the request user
        if (auth()->user()->id != $request->input('id')) {
            // Return the response
            $resp = new ServiceResponse;
            $resp->message = Lang::get('main.hacking_incident_received_our_team_will_investigate_this_case');
            $resp->status = false;
            $resp->data = null;

            return response()->json($resp, 401);
        }

        // Append group_id and permissions_user_id to the request
        $request->merge(["group_id" => auth()->user()->group_id]);
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
