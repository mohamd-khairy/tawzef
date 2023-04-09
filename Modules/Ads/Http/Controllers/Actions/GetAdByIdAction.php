<?php

namespace Modules\Ads\Http\Controllers\Actions;

use Modules\Ads\Ad;
use Modules\Ads\Http\Resources\AdResource;

class GetAdByIdAction
{
    public function execute($id)
    {
        // Find the Ad 
        $ad = Ad::find($id);

        // Return transformed Ad
        return new AdResource($ad);
    }
}
