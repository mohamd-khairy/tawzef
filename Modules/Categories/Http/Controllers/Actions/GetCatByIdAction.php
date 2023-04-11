<?php

namespace Modules\Ads\Http\Controllers\Actions;
use Modules\Ads\Http\Resources\CategoryResource;
use Modules\Categories\Category;

class GetCatByIdAction
{
    public function execute($id)
    {
        // Find the Ad
        $cat = Category::find($id);

        // Return transformed Ad
        return new CategoryResource($cat);
    }
}
