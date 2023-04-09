<?php

namespace Modules\Ads\Http\Controllers\Actions;

use Modules\Ads\Ad;
use DB;
use Carbon\Carbon;

class DeleteAdAction
{
    public function execute($id)
    {
        // Get the ad
        $ad = Ad::find($id);

        // Delete ad 
        $ad->delete();

        return null;
    }
}
