<?php

namespace Modules\Socials\Http\Controllers\Actions;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Lang;
use Modules\Socials\Social;
use Modules\Socials\SocialTranslation;
use Modules\Socials\Http\Resources\SocialResource;

class CreateSocialAction
{
    function execute($data, $translations = null)
    {
        if (isset($data['icon']) && is_file($data['icon'])) {
            $data['icon'] = $data['icon']->store('icons', 'public');
        }
        // Create social
        $social = Social::create($data);

        // Create translation 
        foreach ($translations as $value) {
            $value['social_id'] = $social->id;
            SocialTranslation::insert($value);
        }

        // update for add cache
        $social->update();

        // Return transformed response
        return new SocialResource($social);
    }
}
