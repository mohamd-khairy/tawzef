<?php

namespace Modules\Ads\Http\Controllers\Actions;

use Cache;
use Modules\Ads\Ad;
use Modules\Ads\Http\Resources\AdResource;

class GetAdsAction
{
    public function execute()
    {
        // Get Ads
        $ads = Ad::where('is_featured',1)->get();

        // Transform Ads
        $ads = AdResource::collection($ads);

        // Return the response
        return $ads;
    }
}
