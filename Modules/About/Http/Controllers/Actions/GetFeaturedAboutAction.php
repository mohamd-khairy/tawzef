<?php

namespace Modules\About\Http\Controllers\Actions;

use Modules\About\About;
use Modules\About\Http\Resources\AboutResource;
use Cache;
use App;

class GetFeaturedAboutAction
{
    public function execute()
    {
        // Get about
        $about = About::where('is_featured',1)->whereNull('deleted_at')->first();

        if ($about) {
            $about = new AboutResource($about);
        }
        // Transform the about

        return $about;
    }
}
