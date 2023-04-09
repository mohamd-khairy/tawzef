<?php

namespace Modules\Ads\Http\Controllers\Actions;

use Modules\Ads\Ad;
use Modules\Ads\Http\Resources\AdResource;

class UpdateAdAction
{

    public function execute($id, array $data): AdResource
    {
        // Get Ad
        $ad = Ad::find($id);
        if(isset($data['image']) && is_file($data['image'])){
            $data['image']=$data['image']->store('ad-images','public');
        }
        // Update Ad
        // Trigger update Ad on Ad to cache its values
        $ad->update($data);

        // Transform the result
        $ad = new AdResource($ad);

        // Return the response
        return $ad;
    }
}
