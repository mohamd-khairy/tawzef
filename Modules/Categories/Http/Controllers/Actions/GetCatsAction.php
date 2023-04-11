<?php

namespace Modules\Categories\Http\Controllers\Actions;

use Cache;
use Modules\Categories\Category;
use Modules\Categories\Http\Resources\CategoryResource;

class GetCatsAction
{
    public function execute()
    {
        // Get Ads
        $cat = Category::where('is_featured',true)->get();

        // Transform Ads
        $cat = CategoryResource::collection($cat);

        // Return the response
        return $cat;
    }
}
