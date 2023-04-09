<?php

namespace Modules\Dashboard\Http\Controllers\Api\V1;

use App\Http\Helpers\ServiceResponse;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Dashboard\Http\Controllers\Actions\GetActiveUsersCountAction;
use Modules\Dashboard\Http\Controllers\Actions\GetContactUsCountAction;
use Modules\Dashboard\Http\Controllers\Actions\GetDevelopersCountAction;
use Modules\Dashboard\Http\Controllers\Actions\GetNewSellRequestsCountAction;
use Modules\Dashboard\Http\Controllers\Actions\GetProjectsCountAction;
use Modules\Dashboard\Http\Controllers\Actions\GetUnitsCountAction;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get Units Count
        $action =  new GetUnitsCountAction();
        $units = $action->execute();

        // Get Projects Count
        $action =  new GetProjectsCountAction();
        $projects = $action->execute();

        // Get Active Users Count
        $action =  new GetActiveUsersCountAction();
        $users_active = $action->execute();

        // Get New Sell Requests Count
        $action =  new GetNewSellRequestsCountAction();
        $sell_requests = $action->execute();

        // Get Developers Count
        $action =  new GetDevelopersCountAction();
        $developers = $action->execute();

        // Get Contact Us Count 
        $action =  new GetContactUsCountAction();
        $contact_us = $action->execute();

        // Return the response
        $resp = new ServiceResponse;
        $resp->message = 'Dashboard retrieved successfully';
        $resp->status = true;
        $resp->data = [
            'units' => $units,
            'projects' => $projects,
            'users_active' => $users_active,
            'sell_requests' => $sell_requests,
            'developers' => $developers,
            'contact_us' => $contact_us
        ];
        return response()->json($resp, 200);
    }
}
