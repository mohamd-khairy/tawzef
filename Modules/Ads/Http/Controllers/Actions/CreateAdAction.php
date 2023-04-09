<?php

namespace Modules\Ads\Http\Controllers\Actions;

use Modules\Ads\Ad;
use Modules\Ads\Http\Resources\AdResource;

class CreateAdAction
{
    public function execute(array $data): AdResource
    {
        if(isset($data['image']) && is_file($data['image'])){
            $data['image']=$data['image']->store('ad-images','public');
        }
        // Create Ad
        $ad = Ad::create($data);

        // Transform the result
        $ad = new AdResource($ad);

        return $ad;
    }
}
